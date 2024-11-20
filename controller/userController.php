<?php
    include "./model/userModel.php";
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