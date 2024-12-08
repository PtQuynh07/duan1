<?php
// Kiểm tra yêu cầu từ AJAX (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu gửi từ AJAX
    $cart_ids = json_decode($_POST['cart_id']); // Mảng cart_id
    $product_ids = json_decode($_POST['product_id']); // Mảng product_id
    $quantities = json_decode($_POST['quantity']); // Mảng quantity

    // Đảm bảo rằng tất cả các mảng có cùng số lượng phần tử
    if (count($cart_ids) == count($product_ids) && count($product_ids) == count($quantities)) {
        $result = true;

        // Duyệt qua tất cả các sản phẩm trong giỏ hàng và cập nhật số lượng
        for ($i = 0; $i < count($cart_ids); $i++) {
            $cart_id = $cart_ids[$i];
            $product_id = $product_ids[$i];
            $quantity = $quantities[$i];

            // Gọi phương thức để cập nhật số lượng
            $updateResult = $yourClassInstance->updateSoLuong($cart_id, $product_id, $quantity);

            // Kiểm tra nếu việc cập nhật gặp lỗi
            if (!$updateResult) {
                $result = false;
                break;
            }
        }

        // Trả về kết quả cho JavaScript
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật giỏ hàng thành công.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Cập nhật giỏ hàng thất bại.']);
        }
    } else {
        // Nếu mảng không đồng nhất về số lượng phần tử
        echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
    }
    exit;
}
?>
