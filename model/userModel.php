<?php
include "./includes/connect.php";
class UserModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }

    //trang chủ
    function getDanhmuc()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    function getSpMoi()
    {
        $sql = "SELECT
            p.product_name, 
            pv.price,
            pi.image_url,
            IFNULL(p.updated_at, p.created_at) as latest_date
            FROM products as p
            JOIN product_variants as pv ON p.id= pv.product_id
            JOIN product_images as pi ON pv.id= pi.product_variant_id
            WHERE pi.is_primary = 1
            ORDER BY latest_date DESC
            ";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSpNoibat()
    {
        $sql = "SELECT
            p.product_name, 
            pv.price,
            pi.image_url,
            IFNULL(p.updated_at, p.created_at) as latest_date
            FROM products as p
            JOIN product_variants as pv ON p.id= pv.product_id
            JOIN product_images as pi ON pv.id= pi.product_variant_id AND pi.is_primary=1
            WHERE p.product_featured = 1
            ORDER BY latest_date DESC
            ";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function checkLogin($user, $pass)
    {
        $sql = "SELECT username, password 
                FROM users 
                WHERE username = :username 
                  AND password = :password 
                  AND role = 'client'";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $user, PDO::PARAM_STR);
        $stmt->bindParam(':password', $pass, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
