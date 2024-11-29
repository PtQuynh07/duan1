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
        * {
            box-sizing: border-box;
        }

        body {
            display: grid;
            place-items: center;
            gap: 50px;
            margin: 0;
            height: 100vh;
            padding: 0 32px;
            font-family: "Euclid Circular A", "Poppins";
            position: relative;
            /* Quan trọng để tạo pseudo-element */
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('./assets/images/banner/background1.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(5px);
            /* Áp dụng hiệu ứng làm mờ */
            z-index: -1;
            /* Đặt ảnh nền phía sau */
        }


        @media (width >=500px) {
            body {
                padding: 0;
            }
        }

        .background::after {
            content: "";
            position: inherit;
            right: -50vmin;
            bottom: -55vmin;
            width: inherit;
            height: inherit;
            border-radius: inherit;
            background: #143d81;
        }

        .card {
            overflow: hidden;
            position: relative;
            left: 35%;
            z-index: 3;
            width: 94%;
            margin: 0 20px;
            padding: 170px 30px 54px;
            border-radius: 24px;
            background-image: url('./assets/images/banner/banner.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
            box-shadow: 0 100px 100px rgb(0 0 0 / 10%);
        }

        @media (width >=500px) {
            .card {
                margin: 0;
                width: 360px;
            }
        }

        .card .logo {
            position: absolute;
            top: 15px;
            left: 50%;
            translate: -50% 0;
            width: 64px;
            height: 64px;
        }

        .card>h4 {
            font-size: 22px;
            font-weight: 400;
            margin: 0 0 25px;
            color: black;
        }

        .form {
            margin: 0 0 33px 0;
            display: grid;
            gap: 12px;
        }

        .form :is(input, button) {
            width: 100%;
            height: 56px;
            border-radius: 28px;
            font-size: 16px;
            font-family: inherit;
        }

        .form>input {
            border: 0;
            padding: 0 24px;
            color: #222222;
            background: #ededed;
        }

        .form>input::placeholder {
            color: rgb(0 0 0 / 28%);
        }

        .form>button {
            border: 0;
            color: #f9f9f9;
            background: #226ce7;
            display: grid;
            place-items: center;
            font-weight: 500;
            cursor: pointer;
        }

        .card>footer {
            color: black;
        }

        .card>footer>a {
            color: darkred;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <div>
            <!-- Phần Form Đăng Nhập -->
            <div class="text-black">
                <div class="card">
                    <img class="logo" src="./assets/images/logo/logo.jpg" style="mix-blend-mode: multiply; width:auto; height:130px;">
                    <h4 class="margin-bottom:40px;">Nhập mật khẩu mới</h4>
                    <?php if (!empty($error)): ?>
                        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
                    <?php endif; ?>
                    <form method="POST" action="index.php?action=reset_password" class="form">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($reset['email']); ?>">
                        <input type="password" id="password" name="password" required placeholder="Password">
                        <input type="password" id="password_confirm" name="password_confirm" required placeholder="Password Confirm">
                        <button type="submit" name="submit">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </section> -->

</body>

</html>