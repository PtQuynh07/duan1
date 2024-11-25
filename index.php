<?php
    include "./controller/userController.php";
    // echo "Ket noi thanh cong";
    $action = isset($_GET['action']) ? $_GET['action'] : 'login';
    $userController = new UserController();
    switch($action){
        case 'home':
            $userController -> showSanpham();
            break;
        case 'login':
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userController->login();
            } else {
                $userController->showLoginForm();
            }
            break;
        case 'signUp':
            break;

         case 'product_category':
                $userController -> product_category($_GET['id']);
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
    }

?>