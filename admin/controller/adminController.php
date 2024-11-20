<?php
include "./model/adminModel.php";

class AdminController
{
    public $adminModel;
    function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function showLoginForm(){
        // header('Location: ./view/login.php');
        include "./view/login.php";
    }

    public function login(){
        if(isset($_POST['submit'])){
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $user = new AdminModel();

            if($user->authenticate($username, $password)){
                $_SESSION['username'] = $username;
                header("location:?action=home");
                exit();
            } else {
                $error = "Sai thông tin đăng nhập!";
                include './view/login.php';
            }
        }
    }

    function logout(){
        include "./view/login.php";
        session_destroy();
        exit();
    }

    function homeController()
    {
        include "./view/home.php";
    }

    // quan tri san pham
    function sanphamController(){
        $allsanpham = $this->adminModel->getAllsanpham();
        include "./view/sanpham.php";
    }

    function addSanpham()
    {
        $product = $this->adminModel->getAllsanpham();
        include "./view/addSanpham.php";
    }
    public function prushSanpham() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $data = [
                'category_id' => $_POST['category_id'],
                'product_name' => $_POST['product_name'],
                'product_featured' => $_POST['product_featured'],
                'description' => $_POST['description'],
                'material' => $_POST['material'],
                'created_at' => $_POST['created_at'],
                'price' => $_POST['price'],
                'sku' => $_POST['sku'],
                'stock_quantity' => $_POST['stock_quantity'],
                'text_url'=>$_POST['text_url'],
                'option_color' => $_POST['option_color'],
                'option_size' => $_POST['option_size'],
                'image_url' => $_FILES['image_url']['name'], // Lưu tên ảnh
            ];
    
            // Xử lý tải ảnh lên
            if (!empty($_FILES['image_url']['name'])) {
                $img = $_FILES['image_url']['name'];
                $tmp = $_FILES['image_url']['tmp_name'];
                move_uploaded_file($tmp, './assets/dist/img/' . $img);
            }
    
            // Thêm sản phẩm vào bảng products và lấy product_id
            $product_id = $this->adminModel->insertProduct($data);
    
            // Thêm biến thể sản phẩm vào bảng product_variants và lấy product_variant_id
            $product_variant_id = $this->adminModel->insertProductVariant($product_id, $data['sku'], $data['price'], $data['stock_quantity']);
    
            // Thêm các tùy chọn biến thể vào bảng variant_options
            $this->adminModel->insertVariantOptions($product_variant_id, $data['option_color'], $data['option_size']);
    
            // Thêm ảnh sản phẩm vào bảng product_images với product_variant_id
            if (!empty($img)) {
                $alt_text = isset($_POST['alt_text']) ? $_POST['alt_text'] : '';

                $this->adminModel->insertProductImage($product_variant_id, $img, $alt_text);
            }
    
            // Sau khi thêm tất cả các dữ liệu, chuyển hướng về trang sản phẩm
            header("Location: ?action=sanpham");
        } else {
            echo "Lỗi";
        }
    }
    

       // Hiển thị biểu mẫu cập nhật sản phẩm
       public function editProduct($id) {
        $product = $this->adminModel->getProductById($id);
        $variants = $this->adminModel->getProductVariants($id);
    
        // Giả sử bạn muốn lấy dữ liệu cho biến thể đầu tiên (nếu có)
        if (!empty($variants)) {
            $product_variant_id = $variants[0]['id'];
            $images = $this->adminModel->getProductImages($product_variant_id);
            $options = $this->adminModel->getVariantOptions($product_variant_id);
        } else {
            $images = [];
            $options = [];
        }
    
        include "./view/editSanpham.php";
    }
    

    // Xử lý cập nhật dữ liệu sản phẩm
    public function updateProduct($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'id' => $id,
            'category_id' => $_POST['category_id'],
            'product_name' => $_POST['product_name'],
            'product_featured' => $_POST['product_featured'],
            'description' => $_POST['description'],
            'material' => $_POST['material'],
            'sku' => $_POST['sku'],
            'price' => $_POST['price'],
            'stock_quantity' => $_POST['stock_quantity'],
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $product_variant_id = $_POST['product_variant_id'] ?? $this->adminModel->getProductVariantId($id);

        // Cập nhật sản phẩm chính
        $this->adminModel->updateProduct($data);

        // Cập nhật biến thể sản phẩm
        $this->adminModel->updateProductVariant([
            'sku' => $_POST['sku'],
            'price' => $_POST['price'],
            'stock_quantity' => $_POST['stock_quantity'],
            'product_id' => $id
        ]);

        // Cập nhật hình ảnh
        if (!empty($_FILES['image_url']['name'])) {
            $img = $_FILES['image_url']['name'];
            $tmp = $_FILES['image_url']['tmp_name'];
            $alt_text = $_POST['alt_text'];

            if (move_uploaded_file($tmp, './assets/dist/img/' . $img)) {
                $this->adminModel->updateProductImage([
                    'image_url' => $img,
                    'alt_text' => $alt_text,
                    'product_variant_id' => $product_variant_id
                ]);
            }
        }

        // Cập nhật tùy chọn màu sắc và kích thước
        $this->adminModel->updateVariantOptions([
            'option_color' => $_POST['option_color'],
            'option_size' => $_POST['option_size'],
            'product_variant_id' => $product_variant_id
        ]);

        header("Location:?action=sanpham");
        exit();
    }
}

    function deleteSanpham() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->adminModel->deletesanphamById($id);
           
            header("Location:?action=sanpham");
            exit();
        }
    }

    //quan tri danh muc
    function danhmucController()
    {
        $danhmucs = $this->adminModel->getAllloai();
        include "./view/danhmuc.php";
    }

    function addDanhmuc()
    {
        $category = $this->adminModel->getAllloai();
        include "./view/addDanhmuc.php";
    }

    function pushDanhmuc()
    {
        if (isset($_POST['addDanhmuc'])) {
            $tenloai = $_POST['name'];
            $ngaytao = $_POST['created_at'];
            // $ngaycapnhat = $_POST['updated_at'];
            $this->adminModel->addDanhmuc($tenloai, $ngaytao);
        }
        header("location:?action=danhmuc");
    }

    function deleteDanhmuc()
    {
        $id = $_GET['id'];
        $this->adminModel->destroyDanhmuc($id);
        header("location:?action=danhmuc");
    }

    function loadViewEditDanhmuc()
    {
        $id = $_GET['id'];
        $danhmuc = $this->adminModel->getDanhmucById($id);
        $loaihang = $this->adminModel->getAllloai();
        include "./view/editDanhmuc.php";
    }

    function updateDanhmuc()
    {
        $id = $_GET['id'];
        if (isset($_POST['editDanhmuc'])) {
            $tenloai = $_POST['name'];
            // $ngaytao = $_POST['created_at'];
            $ngaycapnhat = $_POST['updated_at'];
            $this->adminModel->updateDanhmuc($tenloai, $ngaycapnhat, $id);
        }
        header("location:?action=danhmuc");
    }

    function loadViewUser(){
        // require_once "./view/user.php";
        $admins = $this->adminModel->getAllUser();
        include "./view/adminAcc.php";
    }

    function loadViewClient(){
        $customers = $this->adminModel->getAllUser();
        include "./view/customerAcc.php";
    }


}

