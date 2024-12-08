<?php
include "./controller/userController.php";
// require_once "./view/home.php";
// echo "Ket noi thanh cong";
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

if(isset($_POST['search']))
{
    $search = trim($_POST['search']);
    $action = 'search';
    
}

$userController = new UserController();
switch ($action) {
    case 'home':
        $userController->showSanpham();
        break;
    //đăng nhập
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->login();
        } else {
            $userController->showLoginForm();
        }
        break;
    //đăng kí
    case 'signUp':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->register();
        } else {
            $userController->showSignUpForm();
        }
        break;
    //quên pass
    case 'forgot_form':
        $userController->showForgotPasswordForm();
        break;

    case 'forgot_password':
        $userController->handleForgotPassword();
        break;

    case 'reset_form':
        $token = $_GET['token'] ?? '';
        $userController->showResetPasswordForm($token);
        break;

    case 'reset_password':
        $userController->handleResetPassword();
        break;
    //đăng xuất
    case 'logout':
        $userController->logout();
        break;
        
    case 'product_category':
        $userController->product_category($_GET['id']);
        break;
        
   // giỏ hàng
    case 'giohang':
        $userController->addGiohang();
        break; 

    case 'viewCart':
        $userController->gioHang();
        break;

    case 'productDetail':
        $userController->productDetail();
        break;

    case 'updateCart':
        $userController->updateCart();
        break;

    case 'xoasanphamcart':
        $userController->deleteOneGioHang();
        break;
//tim kiem
    case 'search':
        $userController->featureSearch($search);
    break;
    // checkout
    case 'checkout':
        $userController->checkout();
        break;
    case 'createOrder':
        $userController->createOrder();
        break;
    
    //CHECKOUT CART 
    case 'checkoutCart':
        $userController->checkoutCart();
        break;
   case 'xulidathang':
        $userController->postDathang();
        break;

    // Đơn hàng
    case 'donhang':
        $userController->donHang();
        break;
    case 'chitietdonhang':
            $userController->chiTietDonHang();
            break;
    case 'huydonhang':
            $userController->huyDonHang();
            break;

}
