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
    public function login() {
        // Kiểm tra nếu form đã được gửi
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin từ form
            $formUsername = trim($_POST['user']);
            $formPassword = trim($_POST['pass']);
             $userModel = new UserModel();
             $user = $userModel->checkLogin($formUsername, $formPassword);
             if ($user) {
            $_SESSION['user'] = $user;  
             header('Location: ?action=home'); 
                exit; 
            } else {
            $error = 'Đăng nhập không thành công!';
            }
        }

        include './view/login.php';
    }

    // Hiển thị sản phẩm theo danh mục
    function product_category($id) {
        $product_category = $this->userModel->getProductCategory($id);
        $danhmucs = $this->userModel->getDanhmuc();
        $category_info = $this->userModel->getCategoryInfo($id);
        include "./view/product_category.php";
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart() {

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
    public function cart() {
        $cartItems = $_SESSION['cart'] ?? [];
        $cartTotal = $this->userModel->totalCart($cartItems);  
        $danhmucs = $this->userModel->getDanhmuc();
        
        include './view/cart.php'; 
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart() {
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
    public function updateQuantity() {
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
}
