<?php
    include "./controller/userController.php";
    // echo "Ket noi thanh cong";
    $action = isset($_GET['action']) ? $_GET['action'] : 'home';
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
    }

?>