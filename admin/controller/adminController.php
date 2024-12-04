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

    //dang nhap, dang xuat
    public function login() {
        if (isset($_POST['submit'])) {
            $username = $_POST['user'];
            $password = $_POST['pass'];
    
            // Lấy thông tin người dùng từ CSDL
            $userInfo = $this->adminModel->getUserByUsername($username);
            if($userInfo){
                if ($userInfo && $userInfo['password'] === $password) { // So sánh trực tiếp mật khẩu
                    if ($userInfo['role'] === 'admin') {
                        // Lưu thông tin vào session
                        $_SESSION['username'] = $userInfo['username'];
                        $_SESSION['role'] = $userInfo['role'];
        
                        // Chuyển hướng đến trang chính
                        header("Location: ?action=home");
                        exit();
                    } else {
                        echo "<script>alert('Bạn không có quyền truy cập trang quản trị');</script>";
                    }
                } else {
                    echo "<script>alert('Mật khẩu không đúng');</script>";
                }
            }else{
                echo "<script>alert('Người dùng không tồn tại');</script>";
            }
            // Hiển thị lại form với thông báo lỗi
            include './view/login.php';
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
                move_uploaded_file($tmp, '../assets/images/product/default/home-1/' . $img);
            }
    
          
            $product_id = $this->adminModel->insertProduct($data);
    
      
            $product_variant_id = $this->adminModel->insertProductVariant($product_id, $data['sku'], $data['price'], $data['stock_quantity']);
    
          
            $this->adminModel->insertVariantOptions($product_variant_id, $data['option_color'], $data['option_size']);
    
          
            if (!empty($img)) {
                $alt_text = isset($_POST['alt_text']) ? $_POST['alt_text'] : '';

                $this->adminModel->insertProductImage($product_variant_id, $img, $alt_text);
            }
  
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

            if (move_uploaded_file($tmp, '../assets/images/product/default/home-1/' . $img)) {
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

    //quản trị tài khoản
    function loadViewUser(){
        // require_once "./view/user.php";
        $admins = $this->adminModel->getAllUser();
        include "./view/adminAcc.php";
    }

    function loadViewClient(){
        $customers = $this->adminModel->getAllUser();
        include "./view/customerAcc.php";
    }

    //quản trị đơn hàng
    function orders(){
        $listOrder = $this->adminModel->getAllOrders();
        include "./view/orders.php";
    }

    function orderDetail(){
        $order_id = $_GET['order_id'];

        //lấy thông tin đơn hàng ở bảng orders
        $order = $this-> adminModel->getDetailOrder($order_id);

        //lấy thông tin danh sách sản phẩm của đơn hàng của bảng order_item
        $sanphamOrder = $this->adminModel-> getListSpOrder($order_id);

        $listOrderStatus = $this->adminModel->getAllOrderStatus();

        include "./view/orderDetail.php";
    }

    //sửa đơn hàng
    function formEditOrder(){
        $order_id = $_GET['order_id'];
        $order = $this-> adminModel->getDetailOrder($order_id);
        $listOrderStatus = $this->adminModel->getAllOrderStatus();
        if($order){
            include "./view/formOrderEdit.php";
        }else{
            header("location:?action=orders");
            exit();
        }
    }

    function postEditOrder(){
        // hàm này xử lí thêm dữ liệu
        // Kiểm tra xem dữ liệu có phải được submit lên không
        if($_SERVER['REQUEST_METHOD'] == "POST"){
          
            // Lấy ra dữ liệu
            // Lấy ra dữ liệu cũ của sản phẩm
            $order_id = $_POST['order_id'] ?? '';
           
            $name = $_POST['name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';
            $address = $_POST['address'] ?? '';
            $note = $_POST['note'] ?? '';
            $order_status_id = $_POST['order_status_id'] ?? '';
            
  
          
            // Tạo 1 mảng trống chứa dữ liệu 
            $error = [];
            if(empty($name)){
              $error["name"] = "Tên người nhận không được bỏ trống !";
            }
            if(empty($phone)){
              $error["phone"] = "Số điện thoại người nhận không được bỏ trống !";
            }
            if(empty($email)){
              $error["email"] = "Email người nhận không được bỏ trống !";
            }
            if(empty($address)){
              $error["address"] = "Địa chỉ người nhận không được bỏ trống !";
            }
            if(empty($order_status_id)){
              $error["order_status_id"] = "Trạng thái đơn hàng phải chọn!";
            }
            
            $_SESSION['error'] = $error;
            // Nếu không có lỗi thì tiến hành sửa
            // var_dump($error);die;
            // var_dump($order_id);die;
            if(empty($error)){
             
              // Nếu không có lỗi tiến hành thêm sản phẩm
              // var_dump("đã nhận dc dữ liệu");
              $this->adminModel->updateDonHang(
                                                $order_id,
                                                $name,
                                                $phone, 
                                                $email,
                                                $address,
                                                $note,
                                                $order_status_id, 
                                              );
                                            //   var_dump($abc);die;
        
              header("location:?action=orders");
              exit();
            }else
              // Nếu có lỗi trả về form và lỗi
              // Đặt chỉ tị và xóa session sau khi hiển thị from
              $_SESSION['flash'] = true;
              header("location:?action=formEditOrder&order_id=$order_id");
              exit();
              // require_once './views/sanpham/addSanPham.php';
          }
    }
}

