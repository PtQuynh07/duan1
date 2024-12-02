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
                <h1 class="m-0">Đơn hàng</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Địa chỉ Email</th>
                            <th scope="col">Điện thoại</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Địa chỉ nhận hàng</th>
                            <th scope="col">Tổng đơn hàng</th>
                            <th scope="col">Notes</th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($orders) && is_array($orders)) {
                        foreach ($orders as $order) {
                    ?>
                            <tbody>
                                <tr>
                                    <td scope="row"><?php echo $order['id'] ?></td>
                                    <td>
                                        <a href="?action=items&id=<?php echo $order['id'] ?>">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </a>
                                    </td>
                                    <td><?php echo $order['customer_name'] ?></td>
                                    <td><?php echo $order['customer_email'] ?></td>
                                    <td><?php echo $order['customer_phone'] ?></td>
                                    <td><?php echo $order['order_date'] ?></td>
                                    <td><?php echo $order['shipping_address'] ?></td>
                                    <td><?php echo $order['total_amount'] ?></td>
                                    <td><?php echo $order['note'] ?></td>
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