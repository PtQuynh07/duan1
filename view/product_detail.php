<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/product-details-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:32:21 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product details</title>
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
            display: flex;
            justify-content: center;
            width: 100%;
            max-width: 600px;
        }

        /* Nút Close */
        #search .close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: white;
            background: transparent;
            border: none;
            cursor: pointer;
            z-index: 1001;
            margin-right: 280px;
        }

        #search .close:hover {
            color: #f1c40f;
            /* Màu nổi bật khi hover */
        }

        /* Input Search */
        #search input[type="search"] {
            width: 50%;
            margin-top: -280px;
            padding: 10px 15px;
            border: 1px solid white;
            border-radius: 25px;
            background-color: transparent;
            color: white;
            font-size: 1rem;
            outline: none;
        }

        #search input[type="search"]::placeholder {
            color: #ddd;
        }

        #search .icon-search {
            margin-right: 10px;
            margin-left: 130px;
            margin-top: 30px;
            font-size: 1.5rem;
        }

        .product-add-cart-btn {
            margin-left: 20px;
        }

        /* Slideshow Container */
        #slideshow-container {
            right: 18%;
            width: 120%;
            margin: 0 auto;
            position: relative;
        }

        .product-large-image img {
            width: 100%;
            /* Đảm bảo ảnh lấp đầy container */
            height: auto;
            /* Giữ tỷ lệ ảnh */
            object-fit: cover;
            background-color: #f0f0f0;
        }

        /* Thumbnails */
        #thumbnails {
            width: 100%;
            margin: 20px auto;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .product-image-thumb-single img {
            width: 150px;
            /* Thumbnail size */
            height: 120px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border 0.3s ease;
        }

        .product-image-thumb-single img:hover,
        .product-image-thumb-single img.active {
            border-color: #000;
            /* Đổi màu khi hover hoặc active */
        }

        /* Thiết kế cơ bản cho label */
        .product-variable-color label {
            display: inline-block;
            padding: 15px 20px;
            border: 2px solid #ccc;
            /* Khung mặc định */
            border-radius: 2px;
            margin: 3px;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        /* Ẩn input radio */
        .product-variable-color input[type="radio"] {
            display: none;
        }

        /* Hiệu ứng hover */
        .product-variable-color label:hover {
            background-color: #66aaff;
            border-color: #66aaff;
        }

        /* Khi input radio được chọn */
        .product-variable-color input[type="radio"]:checked+label {
            background-color: #66aaff;
            border-color: #66aaff;
            color: white;
            font-weight: bold;
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }

        .align-items-center {
            margin-left: -20px;
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
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Start Offcanvas Search Bar Section tìm kiếm -->
    <div id="search" class="search-modal">
        <form class="form-search">
            <!-- Icon Search -->
            <span class="icon-search">
                <i class="bi bi-search"></i>
            </span>
            <!-- Input -->
            <input type="search" placeholder="Tìm kiếm sản phẩm" />
            <!-- Close Button -->
            <button type="button" class="close">×</button>
        </form>
    </div>


    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Product Details - Default</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active" aria-current="page">Product Details Default</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- Start Product Details Section -->
    <div class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Large Image -->
                        <div id="slideshow-container" class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($productData['variants'] as $color => $variant): ?>
                                    <?php foreach ($variant['images'] as $index => $image): ?>
                                        <div
                                            class="product-image-large-image swiper-slide zoom-image-hover img-responsive"
                                            data-color="<?php echo strtolower($color); ?>">
                                            <img src="./assets/images/product/default/home-1/<?php echo $image; ?>" alt="<?php echo $color; ?> Image">
                                        </div>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- dieu huong -->
                            <div class="gallery-thumb-arrow swiper-button-next"></div>
                            <div class="gallery-thumb-arrow swiper-button-prev"></div>
                        </div>

                        <div id="thumbnails" class="product-image-thumb product-image-thumb-horizontal swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($productData['variants'] as $color => $variant): ?>
                                    <?php foreach ($variant['images'] as $index => $image): ?>
                                        <div
                                            class="product-image-thumb-single swiper-slide"
                                            data-color="<?php echo strtolower($color); ?>">
                                            <img class="img-fluid" src="./assets/images/product/default/home-1/<?php echo $image; ?>" alt="<?php echo $color; ?> Thumbnail">
                                        </div>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="product-details-content-area product-details--golden" data-aos="fade-up" data-aos-delay="200">
                        <!-- Start  Product Details Text Area-->
                        <div class="product-details-text">
                            <h4 class="title"><?php echo $productData['product_name']; ?></h4>
                            <div class="d-flex align-items-center">
                                <ul class="review-star">
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="empty"><i class="ion-android-star"></i></li>
                                </ul>
                                <a href="#" class="customer-review ml-2">(customer review )</a>
                            </div>
                            <div class="price"><?php echo $productData['price']; ?></div>
                            <p><?php echo $productData['description']; ?></p>
                        </div> <!-- End  Product Details Text Area-->

                        <!-- Start Product Variable Area -->
                        <div class="product-details-variable">
                            <h4 class="title">Color Options</h4>
                            <!-- Product Variable Single Item -->
                            <div class="variable-single-item">
                                <!-- Start Color Options -->
                                <div class="product-variable-color">
                                    <?php foreach ($productData['variants'] as $color => $variant): ?>
                                        <input
                                            name="modal-product-color"
                                            id="modal-product-color-<?php echo strtolower($color); ?>"
                                            class="color-select"
                                            type="radio"
                                            value="<?php echo strtolower($color); ?>"
                                            <?php echo $color === array_key_first($productData['variants']) ? 'checked' : ''; ?>
                                            style="display: none;"> <!-- Ẩn input radio -->
                                        <label for="modal-product-color-<?php echo strtolower($color); ?>">
                                            <?php echo ucfirst($color); ?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Product Variable Single Item -->
                            <div class="variable-single-item ">
                                <span>Quantity</span>
                                <div class="product-variable-quantity">
                                    <input min="1" max="100" value="1" type="number" id="quantity-input">
                                </div>
                            </div>
                            <div class="d-flex align-items-center ">
                                <!-- Nút Buy Now -->
                                <div class="product-add-cart-btn">
                                    <a href="javascript:void(0);" class="btn-buy-now btn btn-block btn-lg btn-black-default-hover"
                                        data-product-id="<?php echo $productData['id']; ?>"
                                        data-product-name="<?php echo $productData['product_name']; ?>"
                                        data-product-price="<?php echo $productData['price']; ?>"
                                        data-selected-color="<?php echo $color === array_key_first($productData['variants']) ? 'checked' : ''; ?>"
                                        data-quantity="1"
                                        data-product-description="<?php echo $productData['description']; ?>">Buy Now</a>
                                </div>

                                <!-- js xử lý dữ liệu nút buynow -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', () => {
                                        const buyNowButton = document.querySelector('.btn-buy-now');
                                        const quantityInput = document.getElementById('quantity-input');

                                        // Hàm để lấy màu sắc đã chọn
                                        function getSelectedColor() {
                                            const selectedColorInput = document.querySelector('.color-select:checked');
                                            return selectedColorInput ? selectedColorInput.value : null;
                                        }

                                        // Cập nhật data-quantity khi người dùng thay đổi số lượng
                                        quantityInput.addEventListener('input', () => {
                                            buyNowButton.setAttribute('data-quantity', quantityInput.value);
                                        });

                                        buyNowButton.addEventListener('mouseover', () => {
                                            // Lấy dữ liệu từ nút
                                            const productId = buyNowButton.getAttribute('data-product-id'); // Lấy ID sản phẩm
                                            const productName = buyNowButton.getAttribute('data-product-name');
                                            const productPrice = buyNowButton.getAttribute('data-product-price');
                                            const selectedColor = getSelectedColor(); // Lấy màu đã chọn
                                            const quantity = quantityInput.value; // Lấy số lượng
                                            const productDescription = buyNowButton.getAttribute('data-product-description');

                                            // Cập nhật data-quantity
                                            buyNowButton.setAttribute('data-quantity', quantity);

                                            // Tạo URL
                                            const checkoutUrl = `?action=checkout&product_id=${productId}&product_name=${encodeURIComponent(productName)}&product_price=${productPrice}&color=${encodeURIComponent(selectedColor)}&quantity=${quantity}&product_description=${encodeURIComponent(productDescription)}`;

                                            // Hiển thị URL khi hover
                                            buyNowButton.setAttribute('href', checkoutUrl);
                                        });

                                        // Khởi tạo giá trị data-quantity ban đầu
                                        buyNowButton.setAttribute('data-quantity', quantityInput.value);
                                    });
                                </script>

                                <div class="product-add-cart-btn">
                                    <a href="" class="btn btn-block btn-lg btn-black-default-hover">+ Add To Cart</a>
                                </div>
                            </div>

                        </div> <!-- End Product Variable Area -->

                        <!-- Start  Product Details Catagories Area-->
                        <div class="product-details-catagory mb-2">
                            <span class="title">CATEGORIES:</span>
                            <ul>
                                <li><a href="#">BAR STOOL</a></li>
                                <li><a href="#">KITCHEN UTENSILS</a></li>
                                <li><a href="#">TENNIS</a></li>
                            </ul>
                        </div> <!-- End  Product Details Catagories Area-->
                        <!-- Start  Product Details Social Area-->
                        <div class="product-details-social">
                            <span class="title">SHARE THIS PRODUCT:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- End  Product Details Social Area-->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Product Details Section -->

    <!-- js xử lý sự kiện khi click vào màu thì hiển thi ảnh tương ứng và ngược lại -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const colorInputs = document.querySelectorAll('.color-select'); // Các input màu sắc
            const thumbnails = document.querySelectorAll('#thumbnails .product-image-thumb-single'); // Các ảnh thumbnail
            const swiper = new Swiper('#slideshow-container', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 1, // Số lượng ảnh lớn hiển thị
            });

            // Hàm hiển thị ảnh theo màu đã chọn
            function displayImagesByColor(color) {
                // Hiển thị các ảnh lớn tương ứng với màu đã chọn
                const slides = document.querySelectorAll('.product-image-large-image');
                slides.forEach(slide => {
                    if (slide.dataset.color === color) {
                        slide.classList.add('active'); // Hiển thị ảnh
                    } else {
                        slide.classList.remove('active'); // Ẩn ảnh không tương ứng
                    }
                });

                // Hiển thị các ảnh thumbnail tương ứng với màu đã chọn
                thumbnails.forEach(thumb => {
                    if (thumb.dataset.color === color) {
                        thumb.style.display = 'block'; // Hiển thị thumbnail
                    } else {
                        thumb.style.display = 'none'; // Ẩn thumbnail không tương ứng
                    }
                });

                // Điều hướng đến slide đầu tiên của màu đã chọn
                const firstSlideIndex = [...swiper.slides].findIndex(slide => slide.dataset.color === color);
                if (firstSlideIndex !== -1) {
                    swiper.slideTo(firstSlideIndex); // Chuyển đến slide đầu tiên của màu đã chọn
                }
            }

            // Lắng nghe sự kiện khi chọn màu
            colorInputs.forEach(input => {
                input.addEventListener('change', (e) => {
                    if (e.target.checked) {
                        displayImagesByColor(e.target.value); // Cập nhật ảnh khi chọn màu mới
                    }
                });
            });

            // Hiển thị ảnh mặc định theo màu đầu tiên khi trang tải
            const defaultColor = document.querySelector('.color-select:checked')?.value;
            if (defaultColor) {
                displayImagesByColor(defaultColor);
            }

            // Lắng nghe sự kiện khi click vào ảnh thumbnail
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', () => {
                    const color = thumb.dataset.color;
                    // Chuyển đến slide tương ứng khi click vào ảnh thumbnail
                    const slideIndex = [...swiper.slides].findIndex(slide => slide.dataset.color === color);
                    if (slideIndex !== -1) {
                        swiper.slideTo(slideIndex); // Chuyển đến slide tương ứng
                    }
                });
            });
        });
    </script>


    <!-- Start Product Nổi bật-->
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
                                    ?>
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            <div class="image-box">
                                                <a href="?action=productDetail&id=<?php echo $spnoibat['id'] ?>" class="image-link">
                                                    <img src="./assets/images/product/default/home-1/<?php echo $spnoibat['image_url'] ?>" alt="">
                                                    <!-- <img src="./assets/images/product/default/home-1/<?php echo $spnoibat['hover_image'] ?>" alt=""> -->
                                                </a>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="?action=productDetail&id=<?php echo $spnoibat['id'] ?>">Buy Now</a>
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
    <!-- End Product Nổi bật-->

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

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/product-details-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:32:23 GMT -->

</html>