
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
    
    
}
