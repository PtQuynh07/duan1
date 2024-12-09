<?php

include "./includes/connect.php";

class UserModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
        // Đặt múi giờ Việt Nam
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    // trang chủ
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
            ORDER BY latest_date DESC";
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
            ORDER BY latest_date DESC";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    // login
    public function checkLogin($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra người dùng và xác thực mật khẩu với password_verify
        if ($user && password_verify($password, $user['password'])) {
            // Trả về toàn bộ thông tin người dùng (bao gồm ID)
            return $user;
        }

        return false; // Trả về false nếu thông tin không khớp
    }

    function isLoggedIn()
    {
        return isset($_SESSION['mail']);
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

    //đăng kí tài khoản
    
    public function createUser($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$username, $email, $hashedPassword]);
    }

    public function userExists($username, $email)
    {
        $query = "SELECT COUNT(*) FROM users WHERE username = ? OR email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username, $email]);
        return $stmt->fetchColumn() > 0;
    }



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
                WHERE p.id = '$id';";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function getFormattedProductData($id)
    {
        //lấy dữ liệu thô
        $productDetails = $this->getRawProductDetails($id);

        //cbi dữ liệu đã xử lý
        $data = [];
        foreach ($productDetails as $detail) {
            $productId = $detail['productId'];

            //xử lý cấp độ sản phẩm

            if (!isset($data[$id])) {
                $data[$id] = [
                    'id' => $id,
                    'product_name' => $detail['product_name'],
                    'description' => $detail['description'],
                    'material' => $detail['material'],
                    'price' => $detail['price'],
                    'variants' => []
                ];
            }
            // xử lí cấp độ biến thể 
            $variantKey = $detail['option_color'];
            if (!isset($data[$id]['variants'][$variantKey])) {
                $data[$id]['variants'][$variantKey] = [
                    'images' => []
                ];
            }
            //thêm ảnh vào biến thể
            $data[$id]['variants'][$variantKey]['images'][] = $detail['image_url'];
        }

        return $data[$id];
    }



    // xử lí giỏ hàng

     // Lấy giỏ hàng của người dùng theo user_id
     public function getTaiKhoanFormEmail($email)
     {
         try {
             $sql = 'SELECT * from users where email =:email';
             $stmt = $this->conn->prepare($sql);
             $stmt->execute(
                 [
                     ':email' => $email
                 ]
             );
             return $stmt->fetch();
         } catch (Exception $e) {
             echo "lỗi" . $e->getMessage();
         }
     }


     public function getGioHangFromUser($id){
        try{
            $sql = "SELECT * FROM carts WHERE user_id = :user_id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':user_id'=>$id]);

            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }

    }
    public function getDetailGioHang($id){
        try{
            $sql = "SELECT ci.*, p.product_name, pi.image_url, pv.price,pi.is_primary
            FROM cart_items ci
            INNER JOIN products p  ON ci.product_id = p.id
            JOIN product_variants pv ON pv.product_id=p.id
            JOIN product_images pi ON pi.product_variant_id=pv.id
            WHERE ci.cart_id = :cart_id AND is_primary =1  " ;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':cart_id'=>$id]);
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }

    }

    public function addGioHang($id){
        try{
            $sql = "INSERT INTO carts(user_id) VALUES (:id)";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);
            $cart_id = $this->conn->lastInsertId();
            // var_dump($cart_id); die();
            return $cart_id;
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }

    public function updateSoLuong($cart_id, $product_id, $quantity){
        try{
            $sql = "UPDATE cart_items 
            SET quantity = :quantity
            WHERE cart_id = :cart_id AND product_id = :product_id
            ";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':cart_id'=>$cart_id, ':product_id'=>$product_id, ':quantity'=>$quantity]);

            return true;
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }


    public function addDetailGioHang($cart_id, $product_id, $quantity){
        try{
            $sql = "INSERT INTO cart_items(cart_id, product_id, quantity,added_at) 
            VALUES (:cart_id, :product_id, :quantity,CURRENT_TIMESTAMP) ";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':cart_id'=>$cart_id, ':product_id'=>$product_id, ':quantity'=>$quantity]);

            return true;
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }

    public function deleteChiTietGioHang($id)
    {
        try {
            $sql = "DELETE FROM cart_items WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function addDonHang($user_id,
    $customer_name,
    $customer_email,
    $customer_phone,
    $shipping_address, 
    $note,
    $total_amount, 
    $payment_method_id,
    $order_date,
    $order_status_id){
        try{
            $sql = "INSERT INTO orders (user_id,
            customer_name,
            customer_email,
            customer_phone,
            shipping_address, 
            note,
            total_amount, 
            payment_method_id,
            order_date,
            order_status_id)
            VALUES(:user_id,
            :customer_name,
            :customer_email,
            :customer_phone,
            :shipping_address, 
            :note,
            :total_amount, 
            :payment_method_id,
            :order_date,
            :order_status_id)
            ";
            $stmt = $this->conn->prepare($sql);
                                
            $order = $stmt->execute([':user_id'=>$user_id,
                            ':customer_name'=>$customer_name,
                            ':customer_email'=>$customer_email,
                            ':customer_phone'=>$customer_phone,
                            ':shipping_address'=>$shipping_address,
                            ':note'=>$note,
                            ':total_amount'=>$total_amount,
                            ':payment_method_id'=>$payment_method_id,
                            ':order_date'=>$order_date,
                            ':order_status_id'=>$order_status_id
                           
                            ]);
                                
            return $this->conn->lastInsertId();
            }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();            
            }

    }

    public function addChiTietDonHang($order_id,$product_id,$unit_price,$quantity,$total) {
        try {
        $sql = "INSERT INTO order_items (order_id, product_id, unit_price, quantity, total) 
        VALUES (:order_id, :product_id, :unit_price, :quantity, :total)";
        $stmt = $this->conn->prepare($sql);
                            
        $result = $stmt->execute([
            ':order_id'=>$order_id,
            ':product_id'=>$product_id,
            ':unit_price'=>$unit_price,
            ':quantity'=>$quantity,
            ':total'=>$total,
        ]);
        return $result;
                
        } catch (Exception $e){
        echo "Lỗi: " .$e->getMessage();
                            
        }
    }

    public function deleteCartBought($gioHangId) {
        try {
            
            $sql = "DELETE FROM `cart_items` WHERE cart_id = :cart_id ";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([ ':cart_id' => $gioHangId ]);
        
        } catch (Exception $e) {
    
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
    
    public function clearGioHang($user_id) {
        try {
            
            $sql = "DELETE FROM `carts` WHERE user_id = :user_id ";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([ ':user_id' => $user_id ]);
        
        } catch (Exception $e) {
    
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    

    public function getCartIdByUser($user_id) {
        try {
            $sql = "SELECT id FROM `carts` WHERE user_id = :user_id";
            
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([':user_id' => $user_id]);
    
            return $stmt->fetch(PDO::FETCH_COLUMN);
            
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }

    // ĐƠN HÀNG

    public function getDonHangFormUser($taikhoan){
        try{
            $sql = " SELECT * FROM orders WHERE user_id=:user_id ";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':user_id'=>$taikhoan,]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }

    public function getTrangThaiDonHang(){
        try{
            $sql = " SELECT * FROM order_status ";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }

    public function getPhuongThucThanhToan(){
        try{
            $sql = " SELECT * FROM payment_methods ";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }

    public function getDonHangById($donhangId){
        try{
            $sql = " SELECT * FROM orders WHERE  id=:id ";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute(
                [':id'=>$donhangId]
            );

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }

    public function updateTrangThaiDonHang($donhangId,$trangThaiId){
        try{
            $sql = " UPDATE orders SET order_status_id=:order_status_id WHERE  id=:id ";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute(
                [':id'=>$donhangId,
                        ':order_status_id'=>$trangThaiId
                
                ]
            );

            return true;
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }

    public function getChiTietDonHangByDonHangId($donhangId){
        try{
            $sql = " SELECT oi.*,o.*,p.product_name,pi.image_url
             FROM order_items oi 
             JOIN orders o ON o.id=oi.order_id
             JOIN products p ON p.id = oi.product_id
             JOIN product_variants pv ON p.id=pv.product_id
             JOIN product_images pi ON pi.product_variant_id = pv .id
             WHERE  oi.order_id=:id  AND pi.is_primary=1";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute(
                [':id'=>$donhangId]
            );

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Lỗi" .$e->getMessage();

        }
    }






















    //chức năng quên pass
    public function findByEmail($email)
    {
        $sql = 'SELECT * FROM `users` WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'UPDATE users SET password = :password WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'password' => $hashedPassword,
            'email' => $email
        ]);
    }

    public function createPasswordResetToken($email)
    {
        $token = bin2hex(random_bytes(32));

        // Đặt thời gian hết hạn token là 1 giờ từ khi tạo
        $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $sql = 'INSERT INTO password_resets (email, token, expires_at) VALUES (:email, :token, :expires)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'email' => $email,
            'token' => $token,
            'expires' => $expires
        ]);

        return $token;
    }

    public function findByToken($token)
    {
        $sql = 'SELECT * FROM password_resets WHERE token = :token AND expires_at > NOW()';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['token' => $token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteToken($email)
    {
        $sql = 'DELETE FROM password_resets WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
    }

//tim kiem
    public function searchProducts($search)
    {
        // $sql = "SELECT * FROM product_images WHERE alt_text LIKE :search";
        $sql = "SELECT
            p.id,
            p.product_name, 
            pv.price,
            pi.image_url
            FROM products as p
            JOIN product_variants as pv ON p.id= pv.product_id
            JOIN product_images as pi ON pv.id= pi.product_variant_id
            WHERE alt_text LIKE :search
            ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':search' => "%$search%"]);
        return $stmt->fetchAll();
    }

    //checkout
    function createOrder($userId, $fullName, $address, $phone, $email, $paymentMethodId, $order_status_id, $totalAmount, $note)
{
    // Sử dụng câu lệnh chuẩn bị để tránh lỗi và bảo mật hơn
    $sql = "INSERT INTO orders (user_id, customer_name, customer_email, customer_phone, total_amount, shipping_address, note, payment_method_id, order_status_id)
            VALUES (:userId, :fullName, :email, :phone, :totalAmount, :address, :note, :paymentMethodId, :orderStatusId)";
    
    $stmt = $this->conn->prepare($sql);

    // Nếu $userId là null, PDO sẽ tự động ánh xạ thành NULL trong SQL
    $stmt->execute([
        ':userId' => $userId, // NULL nếu người dùng chưa đăng nhập
        ':fullName' => $fullName,
        ':email' => $email,
        ':phone' => $phone,
        ':totalAmount' => $totalAmount,
        ':address' => $address,
        ':note' => $note,
        ':paymentMethodId' => $paymentMethodId,
        ':orderStatusId' => $order_status_id,
    ]);

    // Trả về ID của đơn hàng vừa được tạo
    return $this->conn->lastInsertId();
}


    function addOrderItem($orderId, $productId, $quantity, $unitPrice){
        // Tính subtotal
        $total = $unitPrice * $quantity;
        $sql = "INSERT INTO order_items(order_id, product_id, quantity, unit_price, total)
                VALUES ('$orderId','$productId', '$quantity', '$unitPrice', '$total')";
        $this->conn->query($sql);
    }

    
}
