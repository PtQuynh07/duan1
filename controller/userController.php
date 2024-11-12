<?php
    include "./model/userModel.php";
    include "./view/home.php";
    class UserController{
        public $userModel;
        function __construct()
        {
            $this -> userModel = new UserModel();
        }
    }
?>