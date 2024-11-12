<?php
    include "./controller/userController.php";
    // echo "Ket noi thanh cong";
    $action = isset($_GET['action']) ? $_GET['action'] : 'home';
    $userController = new UserController();
    switch($action){
        case '/':
            break;
    }

?>