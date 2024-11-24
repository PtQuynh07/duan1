<?php
include "./model/userModel.php";
class UserController
{
    public $userModel;
    function __construct()
    {
        $this->userModel = new UserModel();
    }

    //trang chủ
    function showSanpham()
    {
        $danhmucs = $this->userModel->getDanhmuc();
        $spmois = $this->userModel->getSpMoi();
        $spnoibats = $this->userModel->getSpNoibat();
        include "./view/home.php";
    }

    //hiển thị form đăng nhập
    function showLoginForm()
    {
        include "./view/login.php";
    }

    //xử lý đăng nhập
    public function login()
    {
        if (isset($_POST['submit'])) {
            $formUsername = trim($_POST['user']);
            $formPassword = trim($_POST['pass']);
            $user = new UserModel();

            if ($user->checkLogin($formUsername, $formPassword)) {
                header("location:?action=home");
                exit();
            } else {
                $error = 'Đăng nhập không thành công!';
            }
            include './view/login.php';
        }
    }
}
