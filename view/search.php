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
    <style>
        .header-logo .logo img {
            height: 100px;
            width: 150px;
        }

        .product-default-single-item .image-link img {
            margin-bottom: 50px;
        }

        #search {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            z-index: 1000;
        }

        #search form {
            width: 80%;
            /* max-width: 600px; */
        }

        /* Nút Close */
        #search .close {
            font-size: 2rem;
            color: white;
            background: transparent;
            border: none;
            cursor: pointer;
            z-index: 1001;
            margin-right: 250px;
            margin-top: -20px;
        }

        #search .close:hover {
            color: #f1c40f;
            /* Màu nổi bật khi hover */
        }

        /* Input Search */
        #search input[type="text"] {
            width: 60%;
            height: 50px;
            margin-top: 0px;
            margin-left: 300px;
            padding: 10px 15px;
            border: 1px solid white;
            border-radius: 25px;
            background-color: transparent;
            color: white;
            font-size: 1rem;
            outline: none;
        }

        #search input[type="text"]::placeholder {
            color: #ddd;
        }

        #search .form-search .icon-search {
            float: right;
            margin-top: 5px;
            margin-right: 50px;
            font-size: 1.5rem;
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

        <!-- End Mobile contact Info -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
    </div>

    <!-- Start Offcanvas Search Bar Section tìm kiếm -->
    <div id="search" class="search-modal">
        <form class="form-search" method="post" action="http://localhost/duan1/index.php">
            <!-- Input -->
            <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" />
            <!-- Close Button -->
            <button type="button" class="close">×</button>
            <!-- Icon Search -->
            <span class="icon-search">
                <i class="bi bi-search"></i>
            </span>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="assets/images/hero-slider/home-1/hero-slider-1.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle">New collection</h4>
                                        <h2 class="title">Best Of NeoCon <br> Gold Award </h2>
                                        <a href="product-details-default.html" class="btn btn-lg btn-outline-golden">shop now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="assets/images/hero-slider/home-1/hero-slider-2.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle">New collection</h4>
                                        <h2 class="title">Luxy Chairs <br> Design Award </h2>
                                        <a href="#" class="btn btn-lg btn-outline-golden">shop now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-golden"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>

    <!-- Start Search -->
    <div class="container">
        <h1 style="margin-top:20px; margin-left:27px">Kết quả tìm kiếm</h1>
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Product Default Single Item- sp mới -->
                                    <div class="container">
                                        <?php
                                        if (empty($ketqua)) {
                                            echo '<p>Không tìm thấy sản phẩm nào phù hợp</p>';
                                        } else {
                                            foreach ($ketqua as $spmoi) {
                                        ?>
                                                <div class="product-default-single-item product-color--golden swiper-slide">
                                                    <div class="image-box">
                                                        <a href="?action=productDetail&id=<?php echo $spmoi['id'] ?>" class="image-link">
                                                            <img class="img_product" src="./assets/images/product/default/home-1/<?php echo $spmoi['image_url'] ?>" alt="">
                                                            <!-- <img src="./assets/images/product/default/home-1/<?php echo $spmoi['hover_image'] ?>" alt=""> -->
                                                        </a>
                                                        <div class="tag">
                                                            <span>sale</span>
                                                        </div>
                                                        <div class="action-link">
                                                            <div class="action-link-left">
                                                                <a href="?action=productDetail&id=<?php echo $spmoi['id'] ?>">Buy Now</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="#"><i class="icon-heart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href=""><?php echo $spmoi['product_name'] ?></a></h6>
                                                            <ul class="review-star">
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                                <li class="empty"><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="content-right">
                                                            <span class="price"><?php echo $spmoi['price'] ?></span>
                                                        </div>

                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Search -->

    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-1.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">FREE SHIPPING</h6>
                                <p>Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-2.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">30 DAYS MONEY BACK</h6>
                                <p>100% satisfaction guaranteed, or get your money back within 30 days!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-3.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">SAFE PAYMENT</h6>
                                <p>Pay with the world’s most popular and secure payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-4.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">LOYALTY CUSTOMER</h6>
                                <p>Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->


    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100 section-fluid">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <div class="row mb-n6">

                    <div class="col-lg-6 col-12 mb-6">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-1 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="assets/images/banner/banner-style-1-img-1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">Mini rechargeable
                                    Table Lamp - E216</h4>
                                <h5 class="sub-title">We design your home</h5>
                                <a href="product-details-default.html" class="btn btn-lg btn-outline-golden icon-space-left"><span class="d-flex align-items-center">discover now <i class="ion-ios-arrow-thin-right"></i></span></a>
                            </div>
                        </div>
                        <!-- End Banner Single Item -->
                    </div>

                    <div class="col-lg-6 col-12 mb-6">
                        <div class="row mb-n6">
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-1.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Kitchen <br>
                                            utensils</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-2.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Sofas and <br>
                                            Armchairs</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-3.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Chair & Bar<br>
                                            stools</h4>
                                        <a href="product-details-default.html" class="link-text"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="assets/images/banner/banner-style-2-img-4.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4>Interior <br>
                                            lighting</h4>
                                        <a href="product-details-default.html"><span>Shop now</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">BEST SELLERS</h3>
                                <p>Add our best sellers to your weekly lineup.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Product Default Single Item - sp nổi bật -->
                                    <?php

                                    foreach ($spnoibats as $spnoibat) {
                                        if (isset($spnoibat['product_name'])) {
                                    ?>
                                            <div class="product-default-single-item product-color--golden swiper-slide">
                                                <div class="image-box">
                                                    <a href="" class="image-link">
                                                        <img src="./assets/images/product/default/home-1/<?php echo $spnoibat['image_url'] ?>" alt="">
                                                        <!-- <img src="./assets/images/product/default/home-1/<?php echo $spnoibat['hover_image'] ?>" alt=""> -->
                                                    </a>
                                                    <div class="action-link">
                                                        <div class="action-link-left">
                                                            <a href="cart.html">Add to Cart</a>
                                                        </div>
                                                        <div class="action-link-right">
                                                            <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-left">
                                                        <h6 class="title"><a href=""><?php echo $spnoibat['product_name'] ?></a></h6>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="content-right">
                                                        <span class="price"><?php echo $spnoibat['price'] ?></span>
                                                    </div>

                                                </div>
                                            </div>
                                    <?php
                                        } else {
                                            echo ('Không có sản phẩm phù hợp!');
                                            break;
                                        }
                                    }

                                    ?>

                                    <!-- End Product Default Single Item -sp nổi bật-->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Instagramr Section -->
    <div class="instagram-section section-top-gap-100 section-inner-bg">
        <div class="instagram-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="instagram-box">
                            <div id="instagramFeed" class="instagram-grid clearfix">
                                <a href="https://www.instagram.com/p/CCFOZKDDS6S/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-1.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOYDNjWF5/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-2.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOXH6D-zQ/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-3.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOVcrDDOo/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-4.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOUajjABP/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-5.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOS2MDmjj/" target="_blank" class="instagram-image-link float-left banner-animation"><img src="assets/images/instagram/instagram-6.jpg" alt=""></a>
                            </div>
                            <div class="instagram-link">
                                <h5><a href="https://www.instagram.com/myfurniturecom/" target="_blank" rel="noopener noreferrer">HONOTEMPLATE</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagramr Section -->

    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg">
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
                                    </div> <!-- End Product Variable Area -->
                                    <div class="modal-product-about-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae</p>
                                    </div>
                                    <!-- Start  Product Details Social Area-->
                                    <div class="modal-product-details-social">
                                        <span class="title">SHARE THIS PRODUCT</span>
                                        <ul>
                                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>

                                    </div> <!-- End  Product Details Social Area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Quickview cart -->

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <!-- <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>  -->

    <!--Plugins JS-->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:31:38 GMT -->

</html>