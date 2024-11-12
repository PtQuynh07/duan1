<?php
include "../includes/connect.php";
class AdminModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }
    //danh muc
    function getAllloai()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    function addDanhmuc($tenloai, $ngaytao)
    {
        $sql = "INSERT INTO categories(category_name, created_at) 
        VALUES ('$tenloai', '$ngaytao') ";
        $this->conn->query($sql);
    }
    function destroyDanhmuc($id)
    {
        $sql = "DELETE FROM categories WHERE id = $id";
        $this->conn->query($sql);
    }
    function getDanhmucById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    function updateDanhmuc($tenloai, $ngaycapnhat, $id)
    {
        $sql = "UPDATE categories SET category_name = '$tenloai', updated_at = '$ngaycapnhat'
        WHERE id = '$id'";
        $this->conn->query($sql);
    }
}
