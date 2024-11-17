<?php
include "./model/adminModel.php";

class AdminController
{
    public $adminModel;
    function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function showLoginForm(){
        // header('Location: ./view/login.php');
        include "./view/login.php";
    }

    public function login(){
        if(isset($_POST['submit'])){
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $user = new AdminModel();

            if($user->authenticate($username, $password)){
                $_SESSION['username'] = $username;
                header("location:?action=home");
                exit();
            } else {
                $error = "Sai thông tin đăng nhập!";
                include './view/login.php';
            }
        }
    }

    function logout(){
        include "./view/login.php";
        session_destroy();
        exit();
    }

    function homeController()
    {
        include "./view/home.php";
    }

    //quan tri danh muc
    function danhmucController()
    {
        $danhmucs = $this->adminModel->getAllloai();
        include "./view/danhmuc.php";
    }

    function addDanhmuc()
    {
        $category = $this->adminModel->getAllloai();
        include "./view/addDanhmuc.php";
    }

    function pushDanhmuc()
    {
        if (isset($_POST['addDanhmuc'])) {
            $tenloai = $_POST['name'];
            $ngaytao = $_POST['created_at'];
            // $ngaycapnhat = $_POST['updated_at'];
            $this->adminModel->addDanhmuc($tenloai, $ngaytao);
        }
        header("location:?action=danhmuc");
    }

    function deleteDanhmuc()
    {
        $id = $_GET['id'];
        $this->adminModel->destroyDanhmuc($id);
        header("location:?action=danhmuc");
    }

    function loadViewEditDanhmuc()
    {
        $id = $_GET['id'];
        $danhmuc = $this->adminModel->getDanhmucById($id);
        $loaihang = $this->adminModel->getAllloai();
        include "./view/editDanhmuc.php";
    }

    function updateDanhmuc()
    {
        $id = $_GET['id'];
        if (isset($_POST['editDanhmuc'])) {
            $tenloai = $_POST['name'];
            // $ngaytao = $_POST['created_at'];
            $ngaycapnhat = $_POST['updated_at'];
            $this->adminModel->updateDanhmuc($tenloai, $ngaycapnhat, $id);
        }
        header("location:?action=danhmuc");
    }

    function loadViewUser(){
        // require_once "./view/user.php";
        $admins = $this->adminModel->getAllUser();
        include "./view/adminAcc.php";
    }

    function loadViewClient(){
        $customers = $this->adminModel->getAllUser();
        include "./view/customerAcc.php";
    }


}
