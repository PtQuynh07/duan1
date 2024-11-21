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
            $spmois = $this->userModel->getSpMoi();
            $spnoibats = $this->userModel->getSpNoibat();
            include "./view/home.php";
        }
    }
?>