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
            p.id,
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
            p.id,
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

    //login
    public function checkLogin($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['password']) {
            // Trả về toàn bộ thông tin người dùng (bao gồm ID)
            return $user;
        }

        return false;
    }
   
    function isLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    // Sản phẩm theo danh mục
    function getProductCategory($id)
    {
        if (isset($id)) {
            $sql = "SELECT p.id, p.product_name, pv.price, pi.image_url
                    FROM products p
                    JOIN product_variants pv ON p.id = pv.product_id
                    JOIN product_images pi ON pv.id = pi.product_variant_id
                   WHERE p.category_id = :id AND pi.is_primary = 1";


            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return [];
            }
        } else {
            echo "ID danh mục không hợp lệ";
            exit;
        }
    }


    function getCategoryInfo($id)
    {
        $sql = "SELECT category_name FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }



    public function totalCart($cartItems)
    {
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function createUser($username, $email, $password) {
        $hashedPassword = $password;
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$username, $email, $hashedPassword]);
    }

    public function userExists($username, $email) {
        $query = "SELECT COUNT(*) FROM users WHERE username = ? OR email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username, $email]);
        return $stmt->fetchColumn() > 0; 


    //sp chi tiết
    function getRawProductDetails($id)
    {
        $sql = "SELECT
                p.id as productId,
                p.product_name,
                p.description,
                p.material,
                pv.price,
                pi.image_url,
                vo.option_color
                FROM products p
                JOIN product_variants pv ON p.id = pv.product_id
                JOIN product_images pi ON pv.id = pi.product_variant_id
                JOIN variant_options vo ON pv.id = vo.product_variant_id
                WHERE p.id = '$id';
                ";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    function getFormattedProductData($id) {
        //lấy dữ liệu thô
        $productDetails = $this->getRawProductDetails($id);

        //cbi dữ liệu đã xử lý
        $data = [];
        foreach($productDetails as $detail){
            $id = $detail['productId'];

            //xử lý cấp độ sản phẩm
            if(!isset($data[$id])){
                $data[$id] = [
                    'product_name' => $detail['product_name'],
                    'description' => $detail['description'],
                    'material' => $detail['material'],
                    'price' => $detail['price'],
                    'variants' => []
                ];
            }
            // xử lí cấp độ biến thể 
            $variantKey = $detail['option_color'];
            if(!isset($data[$id]['variants'][$variantKey])){
                $data[$id]['variants'][$variantKey] = [
                    'images' => []
                ];
            }
            //thêm ảnh vào biến thể
            $data[$id]['variants'][$variantKey]['images'][] = $detail['image_url'];
        }
        
        return $data[$id];

    }
}

