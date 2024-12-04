<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin đơn hàng</title>
</head>

<body>
    <?php
    include "./view/khung.php";
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Chỉnh sửa thông tin đơn hàng</h1>
                <div class="content-header">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="?action=editOrder" method="POST" enctype="multipart/form-data">

                            <input type="text" name="order_id" value="<?= $order['id']?>" hidden>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên người nhận:</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên khách hàng..." name="name" value="<?php echo $order['customer_name'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Địa chỉ Email:</label>
                                    <input type="email" class="form-control" placeholder="Nhập địa chỉ email..." name="email" value="<?php echo $order['customer_email'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Điện thoại:</label>
                                    <input type="number" class="form-control" placeholder="Nhập số điện thoại..." name="phone" value="<?php echo $order['customer_phone'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Địa chỉ:</label>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ nhận hàng..." name="address" value="<?php echo $order['shipping_address'] ?>" required>
                                </div>
                                <!-- trạng thái đơn hàng -->
                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái đơn hàng</label>
                                    <select id="inputStatus" name="order_status_id" class="form-control custom-select">
                                        <?php foreach ($listOrderStatus as $status): ?>
                                            <option
                                                <?php
                                                if (
                                                    $order["order_status_id"] > $status['id']
                                                    || $order["order_status_id"] == 9
                                                    || $order["order_status_id"] == 10
                                                    || $order["order_status_id"] == 11
                                                ) {
                                                    echo "disabled";
                                                }
                                                ?>
                                                <?= $status["id"] == $order["order_status_id"] ? 'selected' : '' ?>
                                                value="<?= $status["id"] ?>">
                                                <?= $status["status_name"] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ghi chú:</label>
                                    <input type="text" class="form-control" placeholder="Nhập ghi chú..." name="note" value="<?php echo $order['note'] ?>" required>
                                </div>


                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
</body>

</html>