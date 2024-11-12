<?php
    include "./includes/connect.php";
    class UserModel{
        public $conn;

        function __construct()
        {
            $this -> conn = connectDB();
        }
    }
?>