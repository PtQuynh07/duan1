<?php
    include "./controller/adminController.php";
    // echo "Ket noi thanh cong";
    $action = isset($_GET['action']) ? $_GET['action'] : 'home';
    $adminController = new AdminController();
    switch($action){
        case 'home':
            $adminController->homeController();
            break;
    }


?>