<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS + Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #F5F5F5;
            background-image: url('background1.jpg');
            background-size: cover;
            background-position: center;
        }

        .custom-margin {
            margin-top: 70px;
        }

        .box {
            width: 450px;
            height: 520px;
            background-color: white;
            border: 1px solid black;
            border-radius: 10px;
            float: left;
            margin-top: 7%;
            margin-left: 36%;
        }
    </style>

</head>

<body>
    <!-- <section class="vh-100"> -->
    <div class="container-fluid">
        <div>
            <!-- Phần Form Đăng Nhập -->
            <div class="text-black">
                <!-- <div class="px-5 ms-xl-4">
                        <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <span class="h1 fw-bold mb-0">Logo</span>
                    </div> -->
                <?php
                $check = "";
                if (isset($_POST['submit'])) {
                    if ($_POST['username'] == "user1" && $_POST['password'] == "123456") {
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['password'] = $_POST['password'];
                        header("location: home.php");
                    } else {
                        $check = "Thông tin đăng nhập không đúng!";
                    }
                }
                ?>
                <div class="box ">
                    <div class="d-flex align-items-center" style="padding-left:30px; padding-right:30px; padding-top:20px">
                        <form action="" method="POST" style="width: 23rem;">
                            <h3 class="fw-normal" style="letter-spacing: 2px; padding-top:10px;">
                                <span><img src="logo.jpg" style="width:120px; height:120px;"></span>
                                Customer Log In
                            </h3>

                            <div class="form-outline" style="margin-bottom: 25px;">
                                <label class="form-label" for="username">User name:</label>
                                <input type="text" id="username" name="username" class="form-control form-control-lg" required placeholder="User name..." />

                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" required placeholder="Password..." />

                            </div>
                            <p style="color:red"><?= $check ?></p>

                            <button type="submit" name="submit" class="btn btn-outline-secondary btn-lg btn-block" style="width:66px; height:66px; margin-top:15px; margin-left:150px;">-></button>

                        </form>

                    </div>

                </div>

            </div>


        </div>
    </div>
    <!-- </section> -->
</body>

</html>