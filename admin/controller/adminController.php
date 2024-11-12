<?php
    include "./model/adminModel.php";

    class AdminController{
        public $adminModel;
        function __construct()
        {
            $this -> adminModel = new AdminModel();
        }
        function homeController(){
            include "./view/home.php";

        }
         
    }
?>
