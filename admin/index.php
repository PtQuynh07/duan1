<?php
include "./controller/adminController.php";
// echo "Ket noi thanh cong";
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$adminController = new AdminController();
switch ($action) {
    case 'login':
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminController->login();
        } else {
            $adminController->showLoginForm();
        }
        break;
    case 'logout':
        $adminController->logout();
        break;
    case 'home':
        $adminController->homeController();
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
    case 'user':
        $adminController->loadViewUser();
        break;
    case 'client':
        $adminController->loadViewClient();
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

    //orders
    case 'orders':
        $adminController->orders();
        break;
    case 'orderDetail':
        $adminController->orderDetail();
        break;
    case 'formEditOrder':
        $adminController->formEditOrder();
        break;
    case 'editOrder':
        $adminController->postEditOrder();
        break;
    
}
?>
