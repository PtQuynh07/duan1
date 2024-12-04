<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>NỘI THẤT NHÀ XINH</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .header-logo .logo img {
            height: 100px;
            width: 150px;
        }
        .cart-image {
    width: 200px;
    height: auto;
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2); /* Đổ bóng nhẹ cho ảnh */
    border-radius: 5px; /* Bo góc cho ảnh để mềm mại hơn */
    transition: box-shadow 0.3s ease; /* Hiệu ứng khi hover */
    background: transparent; /* Đảm bảo không có nền */
    border: none; /* Loại bỏ viền nếu có */
}

.cart-image:hover {
    box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.3); /* Bóng đậm hơn khi hover */
}
.product-price::after {
    content: " đ";
    text-transform: none; /* Giữ nguyên chữ thường */
}
.product-total-price {
    text-transform: none; /* Đảm bảo không thay đổi kiểu chữ */
}


    </style>

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
                                    <a href="index.html"><img src="assets/images/logo/logo.png" alt=""></a>
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
                                                foreach($danhmucs as $danhmuc){
                                            ?>
                                               <li><a href="?action=product_category&id=<?=$danhmuc['id']?>"><?php echo $danhmuc['category_name'] ?></a></li>
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
                                    <a href="cart.html">
                                        <i class="icon-bag"></i>
                                        <span class="item-count">3</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="login.html"><i class="bi bi-person-circle"></i></a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
 
    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <!-- Start Mobile contact Info -->

        <!-- End Mobile contact Info -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->

        <!-- GIỎ HÀNG -->
     

    </div> <!-- End  Offcanvas Addcart Section -->



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
   

    <!-- Start Hero Slider Section-->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Cart</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="?action=home">Home</a></li>
                                    <li><a href="blog-grid-sidebar-left.html">Blog</a></li>
                                    <li><a href="#">Cart</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Product Default Slider Section -->
     <!-- ...:::: Start Cart Section:::... -->
     <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                            <th class="product_remove">Delete</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php
                                        $tongGioHang = 0; 
                                        foreach( $chiTietGioHang as $key => $sanPham) {
                                        ?>
                                            <tr>
                                                <td class="product_thumb">
                                                    <a href="#">
                                                        <img src="assets/images/product/default/home-1/<?= $sanPham['image_url'] ?>" alt="">
                                                    </a>
                                                </td>
                                                <td class="product_name">
                                                    <a href="#"><?= $sanPham['product_name'] ?></a>
                                                </td>
                                                <td class="product-price">
                                            <?php
                                            // Đảm bảo giá tiền là số thực
                                            $price = str_replace(',', '', $sanPham['price']);
                                            $price = str_replace('.', '', $price);
                                            $price = floatval($price); // Chuyển sang kiểu số thực để tránh sai lệch
                                            echo number_format($price, 0, ',', '.'); // Định dạng lại số với dấu phẩy phân cách hàng nghìn
                                            ?>
                                        </td>

                                        <td class="product_quantity">
                                            <input min="1" max="100" value="<?= $sanPham['quantity'] ?>" type="number" class="quantity-input" data-price="<?= $price ?>" data-product-id="<?= $sanPham['id'] ?>">
                                        </td>

                                        <td class="product_total">
                                            <span class="product-total-price" data-price="<?= $price ?>" data-quantity="<?= $sanPham['quantity'] ?>">
                                                <?php
                                                $quantity = intval($sanPham['quantity']);
                                                $tongTien = $price * $quantity;
                                                $tongGioHang += $tongTien;

                                                $formattedPrice = number_format($tongTien, 0, ',', '.'); // Định dạng lại số tiền
                                                echo $formattedPrice . " đ";
                                                ?>
                                            </span>
                                        </td>

                                        <td class="pro-remove">
                                            <form method="POST" action="<?= '?action=xoasanphamcart' ?>" onsubmit="return showNotification()">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="cart_detail_id" value="<?= $sanPham['id'] ?>">
                                                <button type="submit"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
    <button class="btn btn-md btn-golden" type="button" id="update-cart">Update Cart</button>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->
        <!-- Gọi sự kiện update -->
         <script>
            document.addEventListener('DOMContentLoaded', function () {
    const quantityInput = document.querySelector('.quantity-input');
    const updateButton = document.getElementById('update-cart');
    
    // Khi trang được tải lại, kiểm tra và cập nhật giá trị quantity từ localStorage
    const productId = quantityInput.getAttribute('data-product-id');
    if (localStorage.getItem('quantity_' + productId)) {
        quantityInput.value = localStorage.getItem('quantity_' + productId);
    }

    // Lắng nghe sự kiện click vào nút "Update Cart"
    updateButton.addEventListener('click', function () {
        const newQuantity = quantityInput.value;

        // Kiểm tra số lượng hợp lệ
        if (newQuantity < 1 || newQuantity > 100) {
            alert("Số lượng phải nằm trong khoảng từ 1 đến 100");
            return;
        }

        // Lưu giá trị số lượng mới vào localStorage
        localStorage.setItem('quantity_' + productId, newQuantity);

        alert('Số lượng đã được cập nhật!');
    });
});

         </script>


        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left"  data-aos="fade-up"  data-aos-delay="200">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" type="text">
                                <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right"  data-aos="fade-up"  data-aos-delay="400">
                            <h3>Tổng đơn hàng</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Tổng tiền sản phẩm:</p>
                                    <span id="cart-total">
                                    <p class="cart_amount">
                                        <?=number_format($tongGioHang, 0, '', '.')?>.đ
                                    </p>
                                    </span>
                                    
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Vận chuyển:</p>
                                    <p class="cart_amount"><span></span> 255.000 đ</p>
                                </div>
                                <a href="#"></a>

                                <div class="cart_subtotal">
                                    <p>Tổng:</p>
                                    <span id="grand-total">
                                    <!-- <p class="cart_amount"> -->
                                    <?=number_format($tong, 0, '', '.') ?> đ   
                                     <!-- </p> -->
                                    </span>
                                  
                                </div>
                                <div class="checkout_btn">
                                    <a href="?action=checkoutCart" class="btn btn-md btn-golden">Tiến hành đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> 
    
    <script>
    function showNotification() {
        // Hiển thị hộp thoại xác nhận
        const userConfirmed = confirm('Bạn có muốn xóa sản phẩm này không?');

        // Nếu người dùng chọn "Cancel", ngừng hành động xóa
        if (!userConfirmed) {
            return false; // Không gửi form, ngừng hành động
        }

        // Nếu người dùng chọn "OK", tiếp tục gửi form
        return true;
    }

    // Thực hiện tăng số lượng

    document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả các ô nhập số lượng
    const quantityInputs = document.querySelectorAll('.quantity-input');

    // Hàm định dạng số tiền theo kiểu Việt Nam, không làm tròn, giữ nguyên tất cả các chữ số
    function formatCurrency(amount) {
        return amount.toLocaleString('vi-VN'); // Dùng dấu ',' phân cách hàng nghìn
    }

    // Hàm cập nhật tổng tiền sản phẩm
    function updateProductTotal(input) {
        const price = parseFloat(input.getAttribute('data-price').replace(',', '.')); // Lấy giá trị gốc từ data-price (đảm bảo không làm tròn)
        const quantity = parseInt(input.value); // Số lượng hiện tại
        if (isNaN(quantity) || quantity <= 0) return; // Kiểm tra số lượng hợp lệ

        const productTotal = price * quantity; // Tính tổng tiền sản phẩm
        const totalPriceElement = input.closest('tr').querySelector('.product-total-price');

        if (totalPriceElement) {
            totalPriceElement.innerText = `${formatCurrency(productTotal)} đ`; // Cập nhật giá trị tiền sản phẩm với định dạng
        }
    }

    // Hàm cập nhật tổng tiền giỏ hàng
    function updateCartTotal() {
        let cartTotal = 0;

        // Duyệt qua tất cả các sản phẩm trong giỏ hàng và tính tổng tiền
        document.querySelectorAll('.product-total-price').forEach((totalPriceElement) => {
            const priceText = totalPriceElement.innerText.replace(' đ', '').replace(/\./g, ''); // Lấy giá tiền, bỏ dấu '.'
            const price = parseFloat(priceText); // Chuyển sang số
            if (!isNaN(price)) {
                cartTotal += price; // Tính tổng tiền giỏ hàng
            }
        });

        const shippingFee = 250000; // Phí vận chuyển
        const grandTotal = cartTotal + shippingFee; // Tổng tiền giỏ hàng + phí vận chuyển

        // Cập nhật tổng tiền giỏ hàng
        const cartTotalElement = document.getElementById('cart-total');
        if (cartTotalElement) {
            cartTotalElement.innerText = `${formatCurrency(cartTotal)} đ`;
        }

        // Cập nhật tổng tiền cuối cùng (bao gồm phí vận chuyển)
        const grandTotalElement = document.getElementById('grand-total');
        if (grandTotalElement) {
            grandTotalElement.innerText = `${formatCurrency(grandTotal)} đ`;
        }
    }

    // Lắng nghe sự kiện thay đổi số lượng
    quantityInputs.forEach((input) => {
        input.addEventListener('input', function () {
            updateProductTotal(input); // Cập nhật tiền sản phẩm
            updateCartTotal(); // Cập nhật tổng giỏ hàng
        });
    });

    // Cập nhật tổng tiền giỏ hàng ngay khi trang tải
    updateCartTotal();
});



</script>
        
    <!-- FOOTER -->

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

    <!-- Start Modal Quickview cart -->
    <div class="modal fade" id="modalQuickview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
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
                            <div class="col-md-6">
                                <div class="product-details-gallery-area mb-7">
                                    <!-- Start Large Image -->
                                    <div class="product-large-image modal-product-image-large swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-2.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-3.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-4.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-5.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-6.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Large Image -->
                                    <!-- Start Thumbnail Image -->
                                    <div class="product-image-thumb modal-product-image-thumb swiper-container pos-relative mt-5">
                                        <div class="swiper-wrapper">
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid" src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid" src="assets/images/product/default/home-1/default-2.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid" src="assets/images/product/default/home-1/default-3.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid" src="assets/images/product/default/home-1/default-4.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid" src="assets/images/product/default/home-1/default-5.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid" src="assets/images/product/default/home-1/default-6.jpg" alt="">
                                            </div>
                                        </div>
                                        <!-- Add Arrows -->
                                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                    </div>
                                    <!-- End Thumbnail Image -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-details-content-area">
                                    <!-- Start  Product Details Text Area-->
                                    <div class="product-details-text">
                                        <h4 class="title">Nonstick Dishwasher PFOA</h4>
                                        <div class="price"><del>$70.00</del>$80.00</div>
                                    </div> <!-- End  Product Details Text Area-->
                                    <!-- Start Product Variable Area -->
                                    <div class="product-details-variable">
                                        <!-- Product Variable Single Item -->
                                        <div class="variable-single-item">
                                            <span>Color</span>
                                            <div class="product-variable-color">
                                                <label for="modal-product-color-red">
                                                    <input name="modal-product-color" id="modal-product-color-red" class="color-select" type="radio" checked>
                                                    <span class="product-color-red"></span>
                                                </label>
                                                <label for="modal-product-color-tomato">
                                                    <input name="modal-product-color" id="modal-product-color-tomato" class="color-select" type="radio">
                                                    <span class="product-color-tomato"></span>
                                                </label>
                                                <label for="modal-product-color-green">
                                                    <input name="modal-product-color" id="modal-product-color-green" class="color-select" type="radio">
                                                    <span class="product-color-green"></span>
                                                </label>
                                                <label for="modal-product-color-light-green">
                                                    <input name="modal-product-color" id="modal-product-color-light-green" class="color-select" type="radio">
                                                    <span class="product-color-light-green"></span>
                                                </label>
                                                <label for="modal-product-color-blue">
                                                    <input name="modal-product-color" id="modal-product-color-blue" class="color-select" type="radio">
                                                    <span class="product-color-blue"></span>
                                                </label>
                                                <label for="modal-product-color-light-blue">
                                                    <input name="modal-product-color" id="modal-product-color-light-blue" class="color-select" type="radio">
                                                    <span class="product-color-light-blue"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Product Variable Single Item -->
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="variable-single-item ">
                                                <span>Quantity</span>
                                                <div class="product-variable-quantity">
                                                    <input min="1" max="100" value="1" type="number">
                                                </div>
                                            </div>

                                            <div class="product-add-to-cart-btn">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="modal-product-about-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae</p>
                                    </div>
                               
                                    <div class="modal-product-details-social">
                                        <span class="title">SHARE THIS PRODUCT</span>
                                        <ul>
                                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>



</html>