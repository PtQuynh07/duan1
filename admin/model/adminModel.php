<?php
    include "../includes/connect.php";
    class AdminModel{
        public $conn;

        function __construct()
        {
            $this -> conn = connectDB();
        }
    
    }
?>