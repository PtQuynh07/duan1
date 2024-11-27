<?php
session_start();
include "./model/userModel.php";
class UserController
{
    public $userModel;
    function __construct()
    {
        $this->userModel = new UserModel();
    }

    //trang chủ
    function showSanpham()
    {
        $danhmucs = $this->userModel->getDanhmuc();
        $spmois = $this->userModel->getSpMoi();
        $spnoibats = $this->userModel->getSpNoibat();
        include "./view/home.php";
    }

    //hiển thị form đăng nhập
    function showLoginForm()
    {
        include "./view/login.php";
    }

    //xử lý đăng nhập
    public function login()
    {
        // Kiểm tra nếu form đã được gửi
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy thông tin từ form
            $username = trim($_POST['user'] ?? '');
            $password = trim($_POST['pass'] ?? '');

            if (empty($username) || empty($password)) {
                $error = 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!';
            } else {
                $userModel = new UserModel();
                $user = $userModel->checkLogin($username, $password);

                if ($user) {
                    // Lưu ID và thông tin cần thiết của người dùng vào session
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                    ];

                    // Chuyển hướng đến trang chủ
                    header('Location: ?action=home');
                    exit;
                } else {
                    $error = 'Đăng nhập không thành công!';
                }
            }
        }

        include './view/login.php';
    }

    // Hiển thị sản phẩm theo danh mục
    function product_category($id)
    {
        $product_category = $this->userModel->getProductCategory($id);
        $danhmucs = $this->userModel->getDanhmuc();
        $category_info = $this->userModel->getCategoryInfo($id);
        $spnoibats = $this->userModel->getSpNoibat();
        include "./view/product_category.php";
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {

        if (!$this->userModel->isLoggedIn()) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            header('Location: ?action=login');
            exit;
        }
        // Lấy thông tin từ URL
        $name = $_GET['name'] ?? null;
        $price = (float) preg_replace('/[^0-9.]/', '', $_GET['price'] ?? 0);
        $image = $_GET['image'] ?? null;

        $userId = $_SESSION['user']['id'];

        if (!$name || !$price || !$image) {
            header('Location: ?action=cart');
            exit;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $productFound = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] == $name) {
                $item['quantity'] += 1;
                $productFound = true;
                break;
            }
        }

        // Nếu sản phẩm chưa có trong giỏ, thêm mới vào giỏ
        if (!$productFound) {
            $_SESSION['cart'][] = [
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'quantity' => 1
            ];
        }


        header('Location: ?action=cart');
        exit;
    }



    // Hiển thị giỏ hàng
    public function cart()
    {
        $cartItems = $_SESSION['cart'] ?? [];
        $cartTotal = $this->userModel->totalCart($cartItems);
        $danhmucs = $this->userModel->getDanhmuc();

        include './view/cart.php';
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart()
    {
        $name = $_GET['name'] ?? null;
        if (isset($_SESSION['cart']) && $name) {

            $_SESSION['cart'] = array_values(array_filter($_SESSION['cart'], function ($item) use ($name) {
                return $item['name'] !== $name;
            }));
        }
        header('Location: ?action=cart');
        exit;
    }


    // Cập nhật số lượng sản phẩm
    public function updateQuantity()
    {
        $name = $_POST['name'] ?? null;
        $quantity = max(1, intval($_POST['quantity'] ?? 1));

        if (!$name || !isset($_SESSION['cart'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid product.']);
            exit;
        }

        $newTotal = 0;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] === $name) {
                $item['quantity'] = $quantity;
                $newTotal = $item['price'] * $item['quantity']; // Tính tổng giá mới
                break;
            }
        }

        echo json_encode([
            'success' => true,
            'newTotalFormatted' => number_format($newTotal, 0, ',', '.') . 'đ'
        ]);
        exit;
    }

    //xử lý đăng ký tài khoản
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Kiểm tra mật khẩu khớp
            if ($password !== $confirmPassword) {
                $error = "Mật khẩu không khớp.";
                require 'views/register.php';
                return;
            }

            // Kiểm tra tài khoản đã tồn tại
            if ($this->userModel->userExists($username, $email)) {
                $error = "Tên đăng nhập hoặc email đã được sử dụng.";
                require 'views/register.php';
                return;
            }

            // Tạo tài khoản
            $success = $this->userModel->createUser($username, $email, $password);
            if ($success) {
                session_destroy();
                header('Location: ?action=login');
                exit;
            } else {
                $error = "Đã xảy ra lỗi trong quá trình tạo tài khoản.";
            }
        }

        require 'views/register.php';
    }

    //hiển thị form đăng ký
    public function showSignUpForm()
    {
        include "./view/register.php";
    }

    //sp chi tiết
    function productDetail()
    {
        $danhmucs = $this->userModel->getDanhmuc();
        $spnoibats = $this->userModel->getSpNoibat();
        $id = $_GET['id'];
        $productData = $this->userModel->getFormattedProductData($id);
        include "./view/product_detail.php";
    }
}
