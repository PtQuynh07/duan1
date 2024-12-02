<?php
include "./controller/userController.php";
// echo "Ket noi thanh cong";
$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$userController = new UserController();
switch ($action) {
    case 'home':
        $userController->showSanpham();
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->login();
        } else {
            $userController->showLoginForm();
        }
        break;
    case 'signUp':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->register();
        } else {
            $userController->showSignUpForm();
        }
        break;
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
    case 'product_category':
        $userController->product_category($_GET['id']);
        break;
    case 'addToCart':
        $userController->addToCart();
        break;
    case 'cart':
        $userController->cart();
        break;
    case 'removeFromCart':
        $userController->removeFromCart();
        break;
    case 'updateQuantity':
        $userController->updateQuantity();
        break;
    case 'productDetail':
        $userController->productDetail();
        break;
    // checkout
    case 'checkout':
        $userController->checkout();
        break;
    case 'createOrder':
        $userController->createOrder();
        break;
}
