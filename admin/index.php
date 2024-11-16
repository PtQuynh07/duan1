<?php
    include "./controller/adminController.php";
    // echo "Ket noi thanh cong";
    $action = isset($_GET['action']) ? $_GET['action'] : 'home';
    $adminController = new AdminController();
    switch($action){
        case 'home':
            $adminController->homeController();
            break;
        case 'sanpham':
            $adminController->sanphamController();
            break;
        case 'addSanpham':
            $adminController->addSanpham();
            break;
        case 'pushSanpham':
            $adminController->prushSanpham();
            break;

         case 'editProduct':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $adminController->editProduct($id);
                } else {
                    echo "Không tìm thấy ID sản phẩm.";
                }
                break;
            
            case 'updateProduct':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $adminController->updateProduct($id);
                } else {
                    echo "Không tìm thấy ID sản phẩm.";
                }
                break;

        case 'deleteSanpham':
            $adminController->deleteSanpham();
            break;
        














        case 'danhmuc':
            $adminController->danhmucController();
            break;
        case 'addDanhmuc':
            $adminController->addDanhmuc();
            break;
        case 'pushDanhmuc':
            $adminController->pushDanhmuc();
            break;
        case 'deleteDanhmuc':
            $adminController->deleteDanhmuc();
            break;
        case 'editDanhmuc':
            $adminController->loadViewEditDanhmuc();
            break;
        case 'updateDanhmuc':
            $adminController->updateDanhmuc();
            break;
    }


?>