<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh sách đơn hàng</title>
    <style>
        .table {
            width: 100%;
            /* Make the table take up the full width of its container */
            max-width: 800px;
            /* Limit the max width */
            margin: 20px auto;
            /* Center the table */
            border-collapse: collapse;
            /* Remove space between cells */
            font-family: Arial, sans-serif;
            /* Font style */
            font-size: 16px;
            /* Increase font size */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Soft shadow around the table */
            margin-top: -1px;
        }

        .table th,
        .table td {
            padding: 15px;
            /* Padding for cells */
            text-align: center;
        }

        .table thead {
            background-color: #4d79ff;
            /* Blue header */
            color: #ffffff;
            /* White text in the header */
        }

        .table th {
            text-transform: uppercase;
            /* Make headers uppercase */
            font-weight: bold;
            text-align: center;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Light grey for even rows */
        }

        .table tbody tr:hover {
            background-color: #e0e0e0;
            /* Slightly darker grey on hover */
        }

        .table td {
            border: 1px solid #ddd;
            /* Light border for cells */
        }

        .table-bordered {
            border: 2px solid #007bff;
            /* Border around the table */
            border-radius: 8px;
            /* Rounded corners */
        }

        .m-0 {
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php
    include "./view/khung.php";
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-sm-10">
                    <h1 class="m-0">Quản lý đơn hàng</h1>
                </div>
                
                <div class="col-sm-2">
                    <form action="" method="post">
                        <select name="" id="" class="form-group">
                            <?php foreach ($listOrderStatus as $key => $status): ?>
                                <option
                                    <?= $status['id'] == $order['order_status_id'] ? 'selected' : '' ?>
                                    <?= $status['id'] < $order['order_status_id'] ? 'disabled' : '' ?>
                                    value="<?= $status['id'] ?>"><?= $status['status_name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </form>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            if ($order['order_status_id'] == 1) {
                                $colorAlerts = 'primary';
                            } else if ($order['order_status_id'] >= 2 && $order['order_status_id'] <= 9) {
                                $colorAlerts = 'warning';
                            } else if ($order['order_status_id'] == 2) {
                                $colorAlerts = 'success';
                            } else {
                                $colorAlerts = 'danger';
                            }
                            ?>
                            <div class="alert alert-<?= $colorAlerts ?>" role="alert">
                                Đơn hàng: <?= $order["status_name"]; ?>
                            </div>


                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-home"></i> Nội thất phòng khách - Family & Home.
                                            <small class="float-right">Ngày đặt hàng: <?= ($order['order_date']) ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Người gửi:
                                        <address>
                                            <strong>Family - Home</strong><br>
                                            409 Hồ Tùng Mậu, Mai Dịch<br>
                                            Cầu giấy, Hà nội, Việt Nam<br>
                                            Điện thoại: (804) 123-5432<br>
                                            Email: family@gmail.com
                                        </address>
                                    </div>
                                    <!-- /.col -->

                                    <!-- cắt chuỗi địa chỉ -->
                                    <?php
                                    $address = $order['shipping_address'];
                                    $limit = 2;

                                    // Chia chuỗi thành các phần dựa trên dấu phẩy
                                    $addressParts = explode(',', $address);

                                    // Lấy phần đầu và phần còn lại
                                    $shortAddress = implode(',', array_slice($addressParts, 0, $limit));
                                    $remainingAddress = implode(',', array_slice($addressParts, $limit));
                                    ?>
                                    <div class="col-sm-4 invoice-col">
                                        Người nhận:
                                        <address>
                                            <strong><?= $order['customer_name'] ?></strong><br>
                                            <?= $shortAddress ?><br>
                                            <?= $remainingAddress ?><br>
                                            Điện thoại: <?= $order['customer_phone'] ?><br>
                                            Email: <?= $order['customer_email'] ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Thông tin:
                                        <address>
                                            <strong>Tổng tiền:<?= number_format($order['total_amount'], 0, ',', '.') . ' đ'; ?></strong><br>
                                            Ghi chú: <?= $order['note'] ?><br>
                                            Thanh toán: <?= $order['method_name'] ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($sanphamOrder as $key => $sanpham) {
                                                ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $sanpham['product_name'] ?></td>
                                                        <td><?= number_format($sanpham['unit_price'], 0, ',', '.') . ' đ'; ?></td>
                                                        <td><?= $sanpham['quantity'] ?></td>
                                                        <td><?= number_format($sanpham['total'], 0, ',', '.') . ' đ'; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead">Ngày đặt hàng: <?= ($order['order_date']) ?></p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Tổng đơn hàng:</th>
                                                    <td><?= number_format($sanpham['total'], 0, ',', '.') . ' đ'; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Phí vận chuyển:</th>
                                                    <td>35.000đ</td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng tiền:</th>
                                                    <td><?= number_format($order['total_amount'], 0, ',', '.') . ' đ'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    </div><!-- /.col -->
</body>

</html>