<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:32:25 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Checkout</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="?action=home"><img src="assets/images/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--golden">
                                <nav>
                                    <ul>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="?action=home">Home </a>
                                            <!-- Sub Menu -->
                                        </li>
                                        <li class="has-dropdown ">
                                            <?php
                                            foreach ($danhmucs as $danhmuc) {
                                            ?>
                                        <li><a href="?action=product_category&id=<?= $danhmuc['id'] ?>"><?php echo $danhmuc['category_name'] ?></a></li>
                                    <?php
                                            }
                                    ?>
                                    </li>

                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--black action-hover-color--golden">

                                <li>
                                    <a href="#search">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="?action=cart">
                                        <i class="icon-bag"></i>
                                        <span class="item-count">3</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="?action=login"><i class="bi bi-person-circle"></i></a>
                                </li>
                                <li>
                                    <a href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-golden">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Checkout</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="?action=home">Home</a></li>
                                    <li class="active" aria-current="page">Checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Checkout Section:::... -->
    <div class="checkout-section">
        <div class="container">
            <div class="row">
                <!-- User Quick Action Form -->
                <div class="col-12">
                   
                    <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="200">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Khách hàng quay lại?
                            <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon" aria-expanded="true">Nhấp vào đây để nhập mã của bạn</a>

                        </h3>
                        <div id="checkout_coupon" class="collapse checkout_coupon" data-parent="#checkout_coupon">
                            <div class="checkout_info">
                                <form action="#">
                                    <input placeholder="Mã giảm giá" type="text">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Áp dụng phiếu giảm giá</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Quick Action Form -->
            </div>
            <!-- Start User Details Checkout Form -->
            <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <form action="?action=createOrder" method="POST">
                        <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                            <div class="row">
                               
                                <!-- Cột bên trái: Điền thông tin khách hàng -->
                                <div class="col-lg-6 col-md-6">
                                    <h3>CHI TIẾT THANH TOÁN</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="default-form-box">
                                                <label>Họ và Tên  <span>*</span></label>
                                                <input type="text" name="fullname" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="default-form-box">
                                                <label>Quốc gia <span>*</span></label>
                                                <input type="text" name="country" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="default-form-box">
                                                <label>Địa chỉ cụ thể <span>*</span></label>
                                                <input placeholder="Số nhà và tên phố" type="text" name="address" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="default-form-box">
                                                <input placeholder="Thị trấn/Xã..." type="text" name="town" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="default-form-box">
                                                <label>Thành phố <span>*</span></label>
                                                <input type="text" name="city" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="default-form-box">
                                                <label>Quận <span>*</span></label>
                                                <input type="text" name="district" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="default-form-box">
                                                <label>Điện thoại <span>*</span></label>
                                                <input type="text" name="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="default-form-box">
                                                <label>Địa chỉ Email <span>*</span></label>
                                                <input type="email" name="email"  required>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="order-notes">
                                                <label for="order_note">Ghi chú</label>
                                                <textarea id="order_note" placeholder="Ghi chú về đơn hàng của bạn, ví dụ ghi chú đặc biệt về việc giao hàng." name="note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cột bên phải: Sản phẩm và thanh toán -->
                                <div class="col-lg-6 col-md-6">
                                    <h3>ĐƠN HÀNG CỦA BẠN</h3>
                                    <div class="order_table table-responsive">
                                        <table id="checkoutTable">
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Tổng cộng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $checkoutData = $_SESSION['checkout_data'] ?? [];
                                                $totalAmount = 0; // Khởi tạo biến tổng để tính tổng cho tất cả sản phẩm

                                                foreach ($checkoutData as $item) {
                                                    if (
                                                        empty($item['product_name']) ||
                                                        empty($item['product_price']) ||
                                                        empty($item['quantity'])
                                                    ) {
                                                        continue;
                                                    }
                                                    // Chuyển đổi product_price thành số
                                                    $productPrice = (int)preg_replace('/[^0-9]/', '', $item['product_price']); // Loại bỏ ký tự không phải số
                                                    $totalPrice = $productPrice * $item['quantity'];
                                                    $totalAmount += $totalPrice; // Cộng dồn vào tổng
                                                ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($item['product_name'] . ' - ' . $item['color']); ?></td>
                                                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                                        <td class="item-total"><?php echo number_format($totalPrice, 0, ',', '.') . 'đ'; ?></td> <!-- Hiển thị tổng giá trị từng sản phẩm -->
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tổng cộng giỏ hàng:</th>
                                                    <td></td>
                                                    <td id="totalAmount"><?php echo number_format($totalAmount, 0, ',', '.') . 'đ'; ?></td> <!-- Hiển thị tổng cộng ở đây -->
                                                </tr>
                                                <tr>
                                                    <th>Vận chuyển:</th>
                                                    <td></td>
                                                    <td><strong>35.000đ</strong></td>
                                                </tr>
                                                <tr class="order_total">
                                                    <th>Tổng đơn hàng:</th>
                                                    <td></td>
                                                    <td id="finalTotal"></td>
                                                    <input type="hidden" name="finalTotal" id="hiddenTotalAmount" value="<?php echo number_format($totalAmount, 0, ',', '.'); ?>">
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                const shippingCost = 35000; // Phí vận chuyển
                                                const totalAmountElement = document.getElementById('totalAmount').textContent.replace('đ', '').replace(/\./g, '').trim();
                                                const totalAmount = parseInt(totalAmountElement); // Chuyển đổi tổng cộng thành số nguyên

                                                // Tính tổng đơn hàng
                                                const finalTotal = totalAmount + shippingCost;
                                                document.getElementById('finalTotal').textContent = finalTotal.toLocaleString('vi-VN') + 'đ';

                                                // Cập nhật giá trị hidden input cho tổng số tiền
                                                document.getElementById('hiddenTotalAmount').value = finalTotal;
                                            });
                                        </script>
                                    </div>
                                    <div class="payment_method">
                                        <div>
                                            <label class="checkbox-default" for="currencyCod">
                                                <input type="radio" name="payment_method" id="currencyCod" value="1" checked>
                                                <span>Thanh toán khi nhận hàng</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="checkbox-default" for="currencyPaypal">
                                                <input type="radio" name="payment_method" id="currencyPaypal" value="2">
                                                <span>MoMo</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order_button pt-3">
                                        <button class="btn btn-md btn-black-default-hover" type="submit">Thanh toán</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->

    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg section-top-gap-100">
        <div class="footer-wrapper">
            <!-- Start Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="0">
                                <h5 class="title">INFORMATION</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                    <li><a href="#">Returns</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="200">
                                <h5 class="title">MY ACCOUNT</h5>
                                <ul class="footer-nav">
                                    <li><a href="my-account.html">My account</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="faq.html">Frequently Questions</a></li>
                                    <li><a href="#">Order History</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="400">
                                <h5 class="title">CATEGORIES</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Decorative</a></li>
                                    <li><a href="#">Kitchen utensils</a></li>
                                    <li><a href="#">Chair & Bar stools</a></li>
                                    <li><a href="#">Sofas and Armchairs</a></li>
                                    <li><a href="#">Interior lighting</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden" data-aos="fade-up" data-aos-delay="600">
                                <h5 class="title">ABOUT US</h5>
                                <div class="footer-about">
                                    <p>We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.</p>

                                    <address class="address">
                                        <span>Address: 4710-4890 Breckinridge St, Fayettevill</span>
                                        <span>Email: yourmail@mail.com</span>
                                    </address>
                                </div>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top -->

            <!-- Start Footer Center -->
            <div class="footer-center">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-6">
                            <div class="footer-social" data-aos="fade-up" data-aos-delay="0">
                                <h4 class="title">FOLLOW US</h4>
                                <ul class="footer-social-link">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-6 mb-6">
                            <div class="footer-newsletter" data-aos="fade-up" data-aos-delay="200">
                                <h4 class="title">DON'T MISS OUT ON THE LATEST</h4>
                                <div class="form-newsletter">
                                    <form action="#" method="post">
                                        <div class="form-fild-newsletter-single-item input-color--golden">
                                            <input type="email" placeholder="Your email address..." required>
                                            <button type="submit">SUBSCRIBE!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Center -->

            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                        <div class="col-auto mb-6">
                            <div class="footer-copyright">
                                <p> COPYRIGHT &copy; <a href="https://hasthemes.com/" target="_blank">HasThemes</a>. ALL RIGHTS RESERVED.</p>
                            </div>
                        </div>
                        <div class="col-auto mb-6">
                            <div class="footer-payment">
                                <div class="image">
                                    <img src="assets/images/company-logo/payment.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid" src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart successfully!</div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="cart.html">View Cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li> <strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your Cart.</strong></li>
                                    <li> <strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE SHOPPING</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->


    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>