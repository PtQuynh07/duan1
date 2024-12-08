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
        include_once "./view/home.php";
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
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['pass'] ?? '');

            if (empty($email) || empty($password)) {
                $error = 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!';
            } else {
                $userModel = new UserModel();
                $user = $userModel->checkLogin($email, $password);
    
                if ($user) {
                    // Lưu email và id của người dùng vào session
                    $_SESSION['mail'] = $user['email'];
                    $_SESSION['user_id'] = $user['id'];  // Lưu id của người dùng
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


    //logout
    function logout()
{
    // Bắt đầu session nếu chưa được bắt đầu
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Hủy toàn bộ dữ liệu trong session
    $_SESSION = []; // Xóa tất cả các giá trị trong session
    session_unset(); // Dọn dẹp biến session
    session_destroy(); // Hủy phiên session

    // Chuyển hướng về trang chủ hoặc trang đăng nhập
    echo "<script>
                alert('Bạn đã đăng xuất thành công!');
                window.location.href = '?action=home';
              </script>";
        exit();
    header("location:?action=home");
    exit();
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

   function addGiohang(){
    if($_SERVER['REQUEST_METHOD']){
        if(isset($_SESSION['mail'])){
            $email=$this->userModel->getTaiKhoanFormEmail($_SESSION['mail']);

          
            $gioHang = $this->userModel->getGioHangFromUser($email["id"]);
            $chiTietGioHang = $this->userModel->getDetailGioHang($gioHang['id']);
            if(!$gioHang){
                $gioHangId = $this->userModel->addGioHang($email["id"]);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->userModel->getDetailGioHang($gioHang['id']);
             }else{
              $chiTietGioHang = $this->userModel->getDetailGioHang($gioHang['id']);
             }

            $productId = $_POST['product_id'];
            $quantity= $_POST['quantity'];
            $checkSanPham = false;
         foreach($chiTietGioHang as $detail){
              if($detail['product_id'] == $productId){
                $newSoLuong = $detail["quantity"] + $quantity;
                $this->userModel->updateSoLuong($gioHang['id'], $productId, $newSoLuong);
                $checkSanPham = true;
                break;
              }
          }
          if(!$checkSanPham){
            $this->userModel->addDetailGioHang($gioHang['id'], $productId, $quantity);

          }
          header("Location:?action=viewCart");
        }else{
            echo "<script>
                alert('Bạn chưa đăng nhập');
                window.location.href='?action=login';
            </script>";
           
        } 
        
    }
   }

   public function gioHang(){
    $danhmucs = $this->userModel->getDanhmuc();
    if(isset($_SESSION["mail"])){
      $email = $this->userModel->getTaiKhoanFormEmail($_SESSION["mail"]);
   
       $gioHang = $this->userModel->getGioHangFromUser($email["id"]);
       if(!$gioHang){
          $gioHangId = $this->userModel->addGioHang($email["id"]);
          $gioHang = ['id' => $gioHangId];
          $chiTietGioHang = $this->userModel->getDetailGioHang($gioHang['id']);
       }else{
        $chiTietGioHang = $this->userModel->getDetailGioHang($gioHang['id']);
       }

    include "./view/cart.php";
 
    }else{
      header("Location: ?action=login");
    }
  }


  function updateCart() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_SESSION['mail'])) {
            $data = json_decode(file_get_contents('php://input'), true);

            $productId = $data['product_id'];
            $quantity = $data['quantity'];

            // Lấy thông tin tài khoản và giỏ hàng
            $email = $this->userModel->getTaiKhoanFormEmail($_SESSION['mail']);
            $gioHang = $this->userModel->getGioHangFromUser($email["id"]);

            if ($gioHang) {
                // Kiểm tra xem sản phẩm có trong giỏ hàng hay chưa
                $chiTietGioHang = $this->userModel->getDetailGioHang($gioHang['id']);
                $productExists = false;

                foreach ($chiTietGioHang as $detail) {
                    if ($detail['product_id'] == $productId) {
                        // Cập nhật số lượng sản phẩm
                        $this->userModel->updateSoLuong($gioHang['id'], $productId, $quantity);
                        $productExists = true;
                        break;
                    }
                }

                // Nếu sản phẩm không tồn tại, thêm sản phẩm vào giỏ hàng
                if (!$productExists) {
                    $this->userModel->addDetailGioHang($gioHang['id'], $productId, $quantity);
                }

                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "Không tìm thấy giỏ hàng!"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Bạn chưa đăng nhập!"]);
        }
    }
}


  public function deleteOneGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['_method'] == 'DELETE') {
            $cartDetailId = $_POST['cart_detail_id'];
            $this->userModel->deleteChiTietGioHang($cartDetailId);
            header("Location:?action=viewCart");
            exit();
        }
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
                require './view/signUp.php';
                return;
            }

            // Kiểm tra tài khoản đã tồn tại
            if ($this->userModel->userExists($username, $email)) {
                $error = "Tên đăng nhập hoặc email đã được sử dụng.";
                require './view/signUp.php';
                return;
            }

            // Tạo tài khoản
            $success = $this->userModel->createUser($username, $email, $password);
            if ($success) {
                echo "<script>
                        alert('Đăng kí tài khoản thành công!');
                        window.location.href = '?action=login';
                    </script>";
                session_destroy();
                exit;
            } else {
                $error = "Đã xảy ra lỗi trong quá trình tạo tài khoản.";
            }
        }

        require './view/signUp.php';
    }

    //hiển thị form đăng ký
    public function showSignUpForm()
    {
        include "./view/signUp.php";
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

    //quen mat khau
    public function showForgotPasswordForm()
    {
        include './view/forgot_password.php';
    }

    public function handleForgotPassword()
    {
        $email = $_POST['email'];
        $user = $this->userModel->findByEmail($email);

        if ($user) {
            $token = $this->userModel->createPasswordResetToken($email);
            $resetLink = "http://localhost/duan1/index.php?action=reset_form&token=$token";

            // Gửi email (thay thế bằng công cụ chuyên nghiệp nếu cần)
            mail($email, "Reset Password", "Click here to reset your password: $resetLink");

            // echo '<a href="'.$resetLink.'">Bấm vào đây</a> để đổi lại mật khẩu.';
            header('location: ' . $resetLink);
        } else {
            echo "Email không tồn tại.";
        }
    }

    public function showResetPasswordForm($token)
    {
        $reset = $this->userModel->findByToken($token);

        if ($reset) {
            include './view/reset_password.php';
        } else {
            echo "Token không hợp lệ hoặc đã hết hạn.";
        }
    }

    public function handleResetPassword()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->userModel->updatePassword($email, $password)) {
            $this->userModel->deleteToken($email);
            echo "Mật khẩu đã được cập nhật thành công.";
            header("Location: index.php?action=login");
        } else {
            echo "Có lỗi xảy ra. Vui lòng thử lại.";
        }
    }

    //timkiem
    public function featureSearch($search)
    {
        $danhmucs = $this->userModel->getDanhmuc();
        $spnoibats = $this->userModel->getSpNoibat();
        $ketqua = $this->userModel->searchProducts($search);
        include "./view/search.php";
    }

    //checkout
    function checkout()
    {
        $danhmucs = $this->userModel->getDanhmuc();

        if (isset($_GET['action']) && $_GET['action'] == 'checkout') {
            $id = $_GET['product_id'];
            $color = $_GET['color'] ?? '';
            $quantity = $_GET['quantity'] ?? 1;
            $productName = $_GET['product_name'] ?? '';
            $productPrice = $_GET['product_price'] ?? '';
            $productDescription = $_GET['product_description'] ?? '';

            // lưu vào session
            if (!isset($_SESSION['checkout_data'])) {
                $_SESSION['checkout_data'] = [];
            }


            $_SESSION['checkout_data'] = [
                [
                    'id' => $id,
                    'color' => $color,
                    'quantity' => $quantity,
                    'product_name' => $productName,
                    'product_price' => $productPrice,
                    'product_description' => $productDescription,
                ]
            ];

            include "./view/checkout.php";
        }
    }

    function createOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';

            // Lấy dữ liệu từ form
            $fullName = $_POST['fullname'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $town = $_POST['town'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $paymentMethodId = $_POST['payment_method']; // Lấy phương thức thanh toán
            $order_status_id = 1; // trạng thái đơn hàng  = 1 chưa xác nhận
            $addressLine = $_POST['address']; // Lấy địa chỉ cụ thể
            $address = $addressLine . ', ' . $town  . ', ' . $district . ', ' . $city . ', ' . $country; // Nối các phần của địa chỉ
            $note = $_POST['note'];


            // Lấy tổng tiền từ form
            $totalAmount = (float)preg_replace('/[^0-9.]/', '', $_POST['finalTotal']); // Lấy tổng tiền

            //id người dùng nếu đã đăng nhập
            $userId = $_SESSION['user_id'] ?? null;

            // Tạo đối tượng Order
            $orderId = $this->userModel->createOrder($userId, $fullName, $address, $phone, $email, $paymentMethodId, $order_status_id, $totalAmount, $note);

            foreach ($_SESSION['checkout_data'] ?? [] as $item) {
                if (!empty($item['id']) && !empty($item['product_name']) && !empty($item['quantity'])) {
                    $productPrice = (float)preg_replace('/[^0-9.]/', '', $item['product_price']);
                    $result = $this->userModel->addOrderItem($orderId, $item['id'], $item['quantity'], $productPrice);
                }
            }

            // Xóa dữ liệu checkout khỏi session
            unset($_SESSION['checkout_data']);

            // Chuyển hướng đến trang xác nhận đơn hàng
            echo '<script>alert("Đặt hàng thành công")</script>';
            echo '<script>window.location.href = "?action=home";</script>';
            exit();
        }
    }

    //CHECKOUT CART

    function checkoutCart(){
        $danhmucs = $this->userModel->getDanhmuc();
        if (isset($_SESSION["mail"])) {
            $user = $this->userModel->getTaiKhoanFormEmail($_SESSION["mail"]);
            $gioHang = $this->userModel->getGioHangFromUser($user['id']);
            if (!$gioHang) {
              $gioHangId = $this->userModel->addgioHang($user['id']);
              $gioHang = ['id' => $gioHangId];
            }
            $chiTietGioHang = $this->userModel->getDetailGioHang($gioHang['id']);
            require_once './view/checkoutCart.php';
          } else {
            header("Location: ?action=login");
            exit;
          }
    }
    function postDathang(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $customer_name = $_POST["name"];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $town = $_POST['town'];
            $customer_email = $_POST["email"];
            $customer_phone = $_POST["phone"];
            $addressLine  = $_POST["address"];
            $shipping_address= $addressLine . ', ' . $town  . ', ' . $district . ', ' . $city . ', ' . $country; 
            $note = $_POST["note"];
            $total_amount = $_POST["tong_tien"];
            $payment_method_id = $_POST["phuong_thuc_thanh_toan"]; // phuong_thuc_thanh_toan_id
    
            $order_date = date('Y-m-d');
            $order_status_id = 1; // trạng thái đơn hàng  = 1 chưa xác nhận
    
            $user = $this->userModel->getTaiKhoanFormEmail($_SESSION["mail"]);
            $user_id = $user['id']; // tai_khoan_id
           
    
            // Thêm thông tin vào db
            $donHang = $this->userModel->addDonHang($user_id,
            $customer_name,
            $customer_email,
            $customer_phone,
            $shipping_address, 
            $note,
            $total_amount, 
            $payment_method_id,
            $order_date,
            $order_status_id
            
           
          );
    
          $gioHang= $this->userModel->getGioHangFromUser($user_id);
          if($donHang){
            $chiTietGioHang = $this->userModel->getDetailGioHang($gioHang['id']);
            foreach($chiTietGioHang as $item){
                $donGia =$item['price'];

                $this->userModel->addChiTietDonHang(
                    $donHang,
                    $item['product_id'],
                    $donGia,
                    $item['quantity'],
                    $donGia*$item['quantity']


                );
            }
            // Xóa sản phẩm trong giỏ hàng
            $this->userModel->deleteCartBought($gioHang['id']);
            $this->userModel->clearGioHang($user_id);
            echo '<script>alert("Đặt hàng thành công")</script>';
            echo '<script>window.location.href = "?act=/";</script>';

          }
        }
    }

   // ĐƠN HÀNG

   function donHang(){
     $danhmucs = $this->userModel->getDanhmuc();
      if(isset($_SESSION['mail'])){
        // lấy  thông tin tài khoản đăng nhập
        $user = $this->userModel->getTaiKhoanFormEmail($_SESSION["mail"]);
        $user_id = $user['id']; // tai_khoan_id

        // lấy ra danh sách trạng thái đơn hàng
        $arrTrangThaiDonHang = $this->userModel->getTrangThaiDonHang();
        $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'status_name', 'id');
        // echo ("<pre>");
        // print_r($trangThaiDonHang);die;

        //lấy ra phương thức thanh  thanh toán
        $arrPhuongThucThanhToan = $this->userModel->getPhuongThucThanhToan();
        $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'method_name','id');
        // echo ("<pre>");
        // print_r($phuongThucThanhToan);die;

        // lấy ra danh sách đơn hàng của tài khoản
        $donHangs = $this->userModel->getDonHangFormUser($user_id);
        // echo("<pre>");
        // print_r($donHangs );
        
       include './view/donhang.php';
      }else{
        echo "<script>
        alert('Bạn chưa đăng nhập');
        window.location.href='?action=login';
        </script>";
      }
   }

   function chiTietDonHang(){
    $danhmucs = $this->userModel->getDanhmuc();
    if(isset($_SESSION['mail'])){
        // lấy  thông tin tài khoản đăng nhập
        $user = $this->userModel->getTaiKhoanFormEmail($_SESSION["mail"]);
        $user_id = $user['id']; 

        $donhangId= $_GET['id'];

        $arrTrangThaiDonHang = $this->userModel->getTrangThaiDonHang();
        $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'status_name', 'id');
        // echo ("<pre>");
        // print_r($trangThaiDonHang);die;

        //lấy ra phương thức thanh  thanh toán
        $arrPhuongThucThanhToan = $this->userModel->getPhuongThucThanhToan();
        $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'method_name','id');
        
        // Lấy thông tin đơn hàng theo ID

        $donHang=$this->userModel->getDonHangById($donhangId);

         //lấy thông tin sản phẩm đơn hàng

         $chitietdonhang = $this->userModel->getChiTietDonHangByDonHangId($donhangId);
        //     echo("<pre>");
        //    print_r($donHang );
        //    print_r($chitietdonhang );die;
        if($donHang['user_id']!=$user_id){
            echo "<script>
            alert('Bạn không có quyền truy cập đơn hàng này');
        
            </script>";
            exit;

        }
        include './view/order_detail.php';

      }else{
        echo "<script>
        alert('Bạn chưa đăng nhập');
        window.location.href='?action=login';
        </script>";
      }
   }

   function huyDonHang(){
    if(isset($_SESSION['mail'])){
        // lấy  thông tin tài khoản đăng nhập
        $user = $this->userModel->getTaiKhoanFormEmail($_SESSION["mail"]);
        $user_id = $user['id']; 

        $donhangId= $_GET['id'];

        $donHang=$this->userModel->getDonHangById($donhangId);
      

        if($donHang['user_id']!=$user_id ){
            echo "<script>
            alert('Bạn không có quyền hủy đơn hàng này');
            </script>";
            exit;
        }
        if($donHang['order_status_id']!=1){
            echo "<script>
            alert('Chỉ đơn hàng ở trạng thái 'Chưa xác nhận' mới được hủy');
            </script>";
            exit;
        }
        //Hủy đơn hàng
        $this->userModel->updateTrangThaiDonHang($donhangId,11);
        header("Location: ?action=donhang");
      }else{
        echo "<script>
        alert('Bạn chưa đăng nhập');
        window.location.href='?action=login';
        </script>";
      }
   }
}
