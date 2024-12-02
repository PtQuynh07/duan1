<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị đơn hàng</title>
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
                <h1 class="m-0">Sản phẩm đơn hàng</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Price</th>
                            <th scope="col">Giảm giá</th>
                            <th scope="col">Tổng đơn hàng</th>
                            <th scope="col">Trạng thái thanh toán</th>
                            <th scope="col">Trạng thái đơn hàng</th>
                            <th scope="col">Phương thức thanh toán</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($items) && is_array($items)) {
                        foreach ($items as $item) {
                    ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?php echo $item['product_name'] ?></td>
                                    <td scope="row"><?php echo $item['quantity'] ?></td>
                                    <td scope="row"><?php echo $item['unit_price'] ?></td>
                                    <td scope="row"><?php echo $item['discount_amount'] ?></td>
                                    <td scope="row"><?php echo $item['subtotal'] ?></td>
                                    <td scope="row"><?php echo $item['payment_status'] ?></td>
                                    <td scope="row"><?php echo $item['shipping_status'] ?></td>
                                    <td scope="row"><?php echo $item['payment_method'] ?></td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div><!-- /.col -->
</body>

</html>