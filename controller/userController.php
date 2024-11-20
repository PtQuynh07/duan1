<?php
    include "./model/userModel.php";
    include "./view/home.php";
    class UserController{
        public $userModel;
        function __construct()
        {
            $this -> userModel = new UserModel();
        }

        //trang chủ
        function showSanpham(){
            $danhmucs = $this->userModel->getDanhmuc();
            include "./view/home.php";
        }
    }
?>