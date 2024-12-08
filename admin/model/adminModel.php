<?php
include "../includes/connect.php";
class AdminModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }
    //dang nhap
    public function getUserByUsername($username) {
        try {
            // Query để lấy thông tin người dùng
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['username' => $username]);
    
            // Trả về thông tin người dùng nếu tồn tại
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Ghi log lỗi nếu có vấn đề
            error_log("Error fetching user: " . $e->getMessage());
            return false;
        }
    }

    public function getUserById($user_id)
    {
        try {
            $sql = 'SELECT * FROM users WHERE username = :username'; // Sửa :user thành :id
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $user_id // Đảm bảo tên tham số trùng khớp
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC); // Đảm bảo trả về dữ liệu dạng mảng
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
    
    // san pham
    function allsanpham(){
        $sql = "SELECT * FROM products order by id desc";
        return $this->conn->query($sql);
   }

   function getAllsanpham(){
    $sql = "SELECT p.id, c.category_name, p.category_id, p.product_name, p.material,
                   GROUP_CONCAT(DISTINCT pv.sku) AS sku,
                   GROUP_CONCAT(DISTINCT pv.price) AS price,
                   GROUP_CONCAT(DISTINCT pv.stock_quantity ) AS stock_quantity ,
                   GROUP_CONCAT(DISTINCT vo.option_color ) AS option_color ,
                   GROUP_CONCAT(DISTINCT vo.option_size ) AS option_size ,
                   GROUP_CONCAT(DISTINCT pi.image_url) AS image_url
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN product_variants pv ON p.id = pv.product_id
             LEFT JOIN product_images pi ON pv.id = pi.product_variant_id AND pi.is_primary = 1  
            LEFT JOIN variant_options vo ON pv.id = vo.product_variant_id
            GROUP BY p.id, c.category_name, p.category_id, p.product_name, p.material";
            
    
    return $this->conn->query($sql);
}

// addSanpham
function insertProduct($data) {
    $sql = "INSERT INTO products (category_id, product_name, product_featured, description, material, created_at) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        $data['category_id'],
        $data['product_name'],
        $data['product_featured'],
        $data['description'],
        $data['material'],
        $data['created_at']
      
    ]);
    return $this->conn->lastInsertId(); 
}

// Hàm thêm biến thể sản phẩm vào bảng product_variants
 function insertProductVariant($product_id, $sku, $price, $stock_quantity) {
    $sql = "INSERT INTO product_variants (product_id, sku, price, stock_quantity) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$product_id, $sku, $price, $stock_quantity]);
    return $this->conn->lastInsertId(); // Trả về product_variant_id
}

// Hàm thêm tùy chọn biến thể vào bảng variant_options
 function insertVariantOptions($product_variant_id, $option_color, $option_size) {
    $sql = "INSERT INTO variant_options (product_variant_id, option_color, option_size) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$product_variant_id, $option_color, $option_size]);
}

// Hàm thêm ảnh sản phẩm vào bảng product_images
 function insertProductImage($product_variant_id, $image_url, $alt_text) {
    $sql = "INSERT INTO product_images (product_variant_id, image_url, alt_text) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$product_variant_id, $image_url, $alt_text]);
}

//update

public function getProductVariantId($product_id) {
    $stmt = $this->conn->prepare("SELECT id FROM product_variants WHERE product_id = ? LIMIT 1");
    $stmt->execute([$product_id]);
    return $stmt->fetchColumn();
}

public function getProductById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function getProductVariants($product_id) {
    $stmt = $this->conn->prepare("SELECT * FROM product_variants WHERE product_id = ?");
    $stmt->execute([$product_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getProductImages($product_variant_id) {
    $stmt = $this->conn->prepare("SELECT * FROM product_images WHERE product_variant_id = ?");
    $stmt->execute([$product_variant_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getVariantOptions($product_variant_id) {
    $stmt = $this->conn->prepare("SELECT * FROM variant_options WHERE product_variant_id = ?");
    $stmt->execute([$product_variant_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function updateProduct($data) {
    $sql = "UPDATE products SET category_id = ?, product_name = ?, product_featured = ?, 
            description = ?, material = ?, updated_at = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        $data['category_id'], $data['product_name'], $data['product_featured'],
        $data['description'], $data['material'],
        $data['updated_at'], $data['id']
    ]);
}

public function updateProductVariant($data) {
    $sql = "UPDATE product_variants SET sku = ?, price = ?, stock_quantity = ? WHERE product_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        $data['sku'], $data['price'], $data['stock_quantity'], $data['product_id']
    ]);
}

public function updateProductImage($data) {
    $stmt = $this->conn->prepare("UPDATE product_images SET image_url = ?, alt_text = ? WHERE product_variant_id = ?");
    $stmt->execute([
        $data['image_url'], $data['alt_text'], $data['product_variant_id']
    ]);
}

public function updateVariantOptions($data) {
    $sql = "UPDATE variant_options SET option_color = ?, option_size = ? WHERE product_variant_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        $data['option_color'], $data['option_size'], $data['product_variant_id']
    ]);
}

//deleteSanPham
function deletesanphamById($id) {

    // Xóa từ bảng product_options dựa trên các product_variant 
    $sql_option = "DELETE FROM variant_options WHERE product_variant_id IN (
                       SELECT id FROM product_variants WHERE product_id = :id
                   )";
    $stmt_option = $this->conn->prepare($sql_option);
    $stmt_option->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_option->execute();

    // Xóa từ bảng product_images dựa trên các product_variant 
    $sql_images = "DELETE FROM product_images WHERE product_variant_id IN (
                       SELECT id FROM product_variants WHERE product_id = :id
                   )";
    $stmt_images = $this->conn->prepare($sql_images);
    $stmt_images->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_images->execute();

    // Xóa từ bảng product_variants dựa trên product_id
    $sql_variants = "DELETE FROM product_variants WHERE product_id = :id";
    $stmt_variants = $this->conn->prepare($sql_variants);
    $stmt_variants->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_variants->execute();

    // Cuối cùng, xóa từ bảng products
    $sql_product = "DELETE FROM products WHERE id = :id";
    $stmt_product = $this->conn->prepare($sql_product);
    $stmt_product->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_product->execute();
}
    //danh muc
    function getAllloai()
    {
        $sql = "SELECT * FROM categories  ORDER BY id DESC";
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

    //quản trị tài khoản
    function getAllUser(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //quản trị đơn hàng
    //show danh sách đơn hàng
    function getAllOrders(){
        try {
            $sql = "SELECT orders.*, order_status.status_name 
                    FROM orders
                    INNER JOIN order_status ON orders.order_status_id = order_status.id
                    ORDER BY id DESC
                    ";
            $result = $this->conn->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo "lỗi" . $e-> getMessage();
        }
    }

    //chi tiết đơn hàng
    function getDetailOrder($order_id){
        try {
            $sql = "SELECT orders.*, order_status.status_name, payment_methods.method_name
                    FROM orders
                    INNER JOIN order_status ON orders.order_status_id = order_status.id
                    INNER JOIN payment_methods ON orders.payment_method_id  = payment_methods.id
                    WHERE orders.id = $order_id";
            $result = $this->conn->query($sql);
            return $result->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            echo "lỗi" . $e-> getMessage();
        }
    }

    function getListSpOrder($order_id){
        try{
            $sql = "SELECT order_items.*, products.product_name
                    FROM order_items
                    INNER JOIN products ON order_items.product_id  = products.id
                    WHERE order_id = $order_id";
            $result = $this->conn->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            echo "lỗi" . $e-> getMessage();
        }
    }
    //trang thái đơn hàng
    function getAllOrderStatus(){
        try {
            $sql = "SELECT * FROM order_status";
            $result = $this->conn->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo "lỗi" . $e-> getMessage();
        }
    }

    //update đơn hàng
    public function updateDonHang($order_id,$name,$phone, $email,$address,$note,$order_status_id){
        try{
            // var_dump($order_id);die;
            $sql = "UPDATE orders
            SET
             customer_name = :name,
             customer_phone = :phone,
             customer_email = :email,
             shipping_address = :address,
             note = :note,
             order_status_id = :order_status_id
           WHERE id = :order_id ";
            $stmt = $this->conn->prepare($sql);

            // var_dump($stmt);die;
            $stmt->execute([
                ':name' => $name,
                ':phone'=> $phone,
                ':email'=> $email,
                ':address' => $address,
                ':note'=> $note,
                ':order_status_id' => $order_status_id,
                ':order_id'=> $order_id
            ]);
          
            return true;
            
        }catch(Exception $e){
            echo "Lỗi".      $e->getMessage();
        }
    }

}
