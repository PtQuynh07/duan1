<?php
    function connectDB(){
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'duan1';
        
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "loi: " .$e->getMessage();
        }
    }
?>