<?php
    include "./includes/connect.php";
    class UserModel{
        public $conn;

        function __construct()
        {
            $this -> conn = connectDB();
        }

        //trang chủ
        function getDanhmuc(){
            $sql = "SELECT * FROM categories";
            $result = $this->conn->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>