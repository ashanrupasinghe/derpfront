<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>D2D</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Default Description">
        <meta name="keywords" content="fashion, store, E-commerce">
        <meta name="robots" content="*">
        <link rel="icon" href="#" type="image/x-icon">
        <link rel="shortcut icon" href="#" type="image/x-icon">

        <!-- CSS Style -->
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('font-awesome.css') ?>
        <?= $this->Html->css('revslider.css') ?>
        <?= $this->Html->css('owl.carousel.css') ?>
        <?= $this->Html->css('owl.theme.css') ?>
        <?= $this->Html->css('jquery.bxslider.css') ?>
        <?= $this->Html->css('jquery.mobile-menu.css') ?>
        <?= $this->Html->css('datepicker/datepicker3.css') ?>
        <?= $this->Html->css('timepicker/bootstrap-timepicker.min.css') ?>
        <?= $this->Html->css('jquery-confirm.min.css') ?>
        <?= $this->Html->css('style.css') ?>
        <?= $this->Html->css('responsive.css') ?>

        <link rel="stylesheet" type="text/css"
              href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.css"
              media="all">
        <link rel="stylesheet" type="text/css" href="/css/revslider.css">
        <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="/css/owl.theme.css">
        <link rel="stylesheet" type="text/css" href="/css/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css"
              href="/css/jquery.mobile-menu.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css" media="all">
        <link rel="stylesheet" type="text/css" href="/css/responsive.css"
              media="all">


        <link
            href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800'
            rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700'
              rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700'
              rel='stylesheet' type='text/css'>
        <script type="text/javascript">var myBaseUrl = '<?php echo $this->Url->build('/', true); ?>';</script>
    </head>
    <body>
        <div id="page">
            <header>
                <div class="header-banner">
                    <div class="assetBlock">
                        <div style="height: 20px; overflow: hidden;" id="slideshow">
                            <p style="display: block;">
                                HOT DAYS! - <span>50%</span> GET READY FOR SUMMER! &gt;
                            </p>
                            <p style="display: none;">
                                SALE UP TO <span>40%</span> HURRY LIMITED OFFER! &gt;
                            </p>
                        </div>
                    </div>
                </div>
                <div id="header">
                    <div class="header-container container">
                        <div class="row">
                            <div class="logo" style="width: 70%;">
                                <a href="index.html" title="Direct2door.lk">
                                    <div>
                                        <img src="/images/Direct-2-door-final.png"
                                             alt="Direct2door.lk Store" style="width: 200px;">
                                    </div>
                                </a>
                            </div>
                            <div class="fl-header-right">
                                <div class="fl-links">
                                    <div class="no-js">
                                        <a title="Company" class="clicker"></a>
                                        <div class="fl-nav-links">
                                            <!--                                            <div class="language-currency">
                                                        <div class="fl-language">
                                                            <ul class="lang">
                                                                <li><a href="#"> <img src="/images/english.png" alt="English"> <span>English</span> </a></li>
                                                                <li><a href="#"> <img src="/images/francais.png" alt="French"> <span>French</span> </a></li>
                                                                <li><a href="#"> <img src="/images/german.png" alt="German"> <span>German</span> </a></li>
                                                            </ul>
                                                        </div>
                                                        fl-language
                                                         END For version 1,2,3,4,6 
                                                         For version 1,2,3,4,6 
                                                        <div class="fl-currency">
                                                            <ul class="currencies_list">
                                                                <li><a href="#" title="EGP"> £</a></li>
                                                                <li><a href="#" title="EUR"> €</a></li>
                                                                <li><a href="#" title="USD"> LKR</a></li>
                                                            </ul>
                                                        </div>
                                                        fl-currency
                                                         END For version 1,2,3,4,6 
                                                    </div>-->
                                            <ul class="links">
                                                <?php if ($authUser): ?>
                                                    <li><a href="<?php echo $this->Url->build('/user/dashboard'); ?>" title="My Account">My Account</a></li>
                                                    <li><a href="<?php echo $this->Url->build('/user/wishlist'); ?>" title="Wishlist">Wishlist</a></li>
                                                <?php endif; ?>	
                                                
                                                <li><a
                                                        href="<?php echo $this->Url->build('/order/checkout'); ?>"
                                                        title="Checkout">Checkout</a></li>

                                                <?php if (!$authUser): ?>	
                                                    <li class="last"><a
                                                            href="<?php echo $this->Url->build('/user/login'); ?>"
                                                            title="Login"><span>Login/Sign Up</span></a></li>
                                                        <?php
                                                    else:
                                                        ?>	
                                                    <li class="last"><a
                                                            href="<?php echo $this->Url->build('/user/logout'); ?>"
                                                            title="Login"><span>Logout</span></a></li>
                                                    <?php endif; ?>	
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="fl-cart-contain">
                                    <div class="mini-cart" id="mini-cart-head">
                                        <div class="basket">
                                            <a href="<?php echo $this->Url->build('/user/cart'); ?>"><span id="total_items"> <?php echo $cart_size; ?> </span></a>
                                        </div>
                                        <?php if (sizeof($cart_products) > 0): ?>
                                            <?php
                                            // print '<pre>';
                                            // print_r($cart_products);
                                            // die();										
                                            ?>
                                            <div class="fl-mini-cart-content" id="fl-mini-cart-content" style="display: none;">
                                                <div class="block-subtitle">
                                                    <div class="top-subtotal" id="top-sub-total">
                                                        <?php echo $cart_size; ?> items, <span class="price">LKR<?php echo $total['grand_total']; ?></span>
                                                    </div>
                                                    <!--top-subtotal-->
                                                    <!--pull-right-->
                                                </div>
                                                <!--block-subtitle-->
                                                <ul class="mini-products-list" id="cart-sidebar">
                                                    <?php $count = 0; ?>
                                                    <?php foreach ($cart_products as $product): ?>
                                                        <li
                                                            class="item <?php if ($count == 0): ?>first<?php endif; ?> <?php if ($count == sizeof($cart_products) - 1): ?>last<?php endif; ?>">
                                                            <div class="item-inner">
                                                                <a class="product-image"
                                                                   title="<?php echo $product['name']; ?>" href="#l"><img
                                                                        alt="<?php echo $product['name']; ?>"
                                                                        src="<?php echo $product['image']; ?>"></a>
                                                                <div class="product-details">
                                                                    <div class="access">
                                                                        <input type="hidden" value="<?php echo $product['id']; ?>"
                                                                               name="product_id" class=""> <a class="btn-remove1 remove-from-cart-jq-function"
                                                                               title="Remove This Item" href="#">Remove</a> <a
                                                                               class="btn-edit edit-product-jq-function" title="Edit item" href="#"><i
                                                                                class="icon-pencil"></i><span class="hidden">Edit item</span></a>
                                                                    </div>
                                                                    <!--access-->
                                                                    <strong><?php echo $product['quantity'] ?></strong> x <span
                                                                        class="price"><?php echo $product['price']; ?></span>
                                                                    <p class="product-name">
                                                                        <a href="product-detail.html"><?php echo $product['name']; ?></a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php $count++; ?>
                                                    <?php endforeach; ?>

                                                </ul>
                                                <div class="actions">
                                                    <button class="btn-checkout" title="Checkout" type="button"
                                                            onClick="location.href = '<?php echo $this->Url->build('/order/checkout'); ?>'">
                                                        <span>Checkout</span>
                                                    </button>
                                                </div>
                                                <!--actions-->
                                            </div>
                                            <!--fl-mini-cart-content-->
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!--mini-cart-->
                                <!-- wishlist -->
                                <div class="fl-cart-contain first-icon">
          <div class="mini-cart min-wishlist" id="mini-wishlist-head">
            <div class="basket"> <a href="<?php echo $this->Url->build('/user/wishlist'); ?>"><span> <?php echo $wishlist_size;?> </span></a> </div>
            
          </div>
        </div>
        <!--mini-cart-->
                                <!-- ../ wishlist end -->
                                
                                
                                <div class="collapse navbar-collapse">
                                    <form class="navbar-form" role="search">
                                        <div class="input-group">
                                            <input id="search-product" name="search-product" type="text" class="form-control search-product" placeholder="Search" value="">
                                            <span class="input-group-btn">
                                                <button type="submit" class="search-btn">
                                                    <span class="glyphicon glyphicon-search"> <span
                                                            class="sr-only">Search</span>
                                                    </span>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <!--links-->
                            </div>
                            <div class="fl-nav-menu" style="width: 100%; float: left;">

                                <nav>
                                    <div class="mm-toggle-wrap">
                                        <div class="mm-toggle">
                                            <i class="icon-align-justify"></i><span class="mm-label">Menu</span>
                                        </div>
                                    </div>
                                    <div class="nav-inner">
                                        <!-- BEGIN NAV -->
                                        <?php include('Partials/main_menu.ctp'); ?>
                                        <!--nav-->
                                    </div>
                                </nav>
                            </div>




                            <!--row-->



                        </div>
                    </div>
                </div>

            </header>
            <!--container-->


            <?= $this->fetch('content') ?>


            <!-- For version 1,2,3,4,6 -->

            <footer>
                <!-- BEGIN INFORMATIVE FOOTER -->
                <div class="footer-inner">
                    <div class="newsletter-row">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col">
                                    <!-- Footer Payment Link -->
                                    <div class="payment-accept">
                                        <div>
                                            <img src="/images/payment-1.png" alt="payment1"> <img
                                                src="/images/payment-2.png" alt="payment2"> <img
                                                src="/images/payment-3.png" alt="payment3"> <img
                                                src="/images/payment-4.png" alt="payment4">
                                        </div>
                                    </div>
                                </div>
                                <!-- Footer Newsletter -->
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col1">
                                    <div class="newsletter-wrap">
                                        <h4>Sign up for emails</h4>
                                        <form action="#" method="post" id="newsletter-validate-detail1">
                                            <div id="container_form_news">
                                                <div id="container_form_news2">
                                                    <input type="text" name="email" id="newsletter1"
                                                           title="Sign up for our newsletter"
                                                           class="input-text required-entry validate-email"
                                                           placeholder="Enter your email address">
                                                    <button type="submit" title="Subscribe"
                                                            class="button subscribe">
                                                        <span>Subscribe</span>
                                                    </button>
                                                </div>
                                                <!--container_form_news2-->
                                            </div>
                                            <!--container_form_news-->
                                        </form>

                                    </div>
                                    <!--newsletter-wrap-->
                                </div>

                            </div>
                        </div>
                        <!--footer-column-last-->
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12 col-lg-4">
                                <div class="co-info">
                                    <div>
                                        <a href="index.html"><img src="/images/logo.png"
                                                                  alt="footer logo"></a>
                                    </div>
                                    <address>
                                        <div>
                                            <em class="icon-location-arrow"></em> <span> Colombo, Sri
                                                Lanka</span>
                                        </div>
                                        <div>
                                            <em class="icon-mobile-phone"></em><span> 011 7 55 66 00</span>
                                        </div>
                                        <div>
                                            <em class="icon-envelope"></em><span>info@direct2door.lk</span>
                                        </div>
                                    </address>
                                    <div class="social">
                                        <ul class="link">
                                            <li class="fb pull-left"><a target="_blank" rel="nofollow"
                                                                        href="#" title="Facebook"></a></li>
                                            <li class="tw pull-left"><a target="_blank" rel="nofollow"
                                                                        href="#" title="Twitter"></a></li>
                                            <li class="googleplus pull-left"><a target="_blank"
                                                                                rel="nofollow" href="#" title="GooglePlus"></a></li>
                                            <!--                  <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                          <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                          <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-xs-12 col-lg-8">
                                <div class="footer-column">
                                    <h4>Quick Links</h4>
                                    <ul class="links">
                                        <li class="first"><a title="How to buy" href="/blog/">Blog</a></li>
                                        <li><a title="FAQs" href="#">FAQs</a></li>
                                        <li><a title="Payment" href="#">Payment</a></li>
                                        <li><a title="Shipment" href="#">Shipment</a></li>
                                        <li><a title="Where is my order?" href="#">Where is my order?</a></li>
                                        <li class="last"><a title="Return policy" href="#">Return
                                                policy</a></li>
                                    </ul>
                                </div>
                                <div class="footer-column">
                                    <h4>Style Advisor</h4>
                                    <ul class="links">
                                        <li class="first"><a title="Your Account" href="#">Your Account</a></li>
                                        <li><a title="Information" href="#">Information</a></li>
                                        <li><a title="Addresses" href="#">Addresses</a></li>
                                        <li><a title="Addresses" href="#">Discount</a></li>
                                        <li><a title="Orders History" href="#">Orders History</a></li>
                                        <li class="last"><a title=" Additional Information" href="#">
                                                Additional Information</a></li>
                                    </ul>
                                </div>
                                <div class="footer-column">
                                    <h4>Information</h4>
                                    <ul class="links">
                                        <li class="first"><a title="Site Map" href="#">Site Map</a></li>
                                        <li><a title="Search Terms" href="#">Search Terms</a></li>
                                        <li><a title="Advanced Search" href="#">Advanced Search</a></li>
                                        <li><a title="History" href="#">About Us</a></li>
                                        <li><a title="History" href="#">Contact Us</a></li>
                                        <li><a title="Suppliers" href="#">Suppliers</a></li>
                                    </ul>
                                </div>




                            </div>

                            <!--col-sm-12 col-xs-12 col-lg-8-->
                            <!--col-xs-12 col-lg-4-->
                        </div>
                        <!--row-->

                    </div>

                    <!--container-->
                </div>
                <!--footer-inner-->

                <div class="footer-middle">
                    <div class="container">
                        <div class="row">
                            <div class="row"></div>
                        </div>
                        <!--row-->
                    </div>
                    <!--container-->
                </div>
                <!--footer-middle-->
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 coppyright">© 2017
                                Direct2door.lk. All Rights Reserved.</div>

                        </div>
                        <!--row-->
                    </div>
                    <!--container-->
                </div>
                <!--footer-bottom-->
                <!-- BEGIN SIMPLE FOOTER -->
            </footer>
            <!-- End For version 1,2,3,4,6 -->

        </div>
        <!--page-->
        <!-- Mobile Menu-->
        <div id="mobile-menu">
            <ul>
                <li>
                    <div class="home">
                        <a href="/"><i class="icon-home"></i>Home</a>
                    </div>
                </li>

                <?php
                $i = 0;
                foreach ($category_tree[0] AS $main_cat) {
                    ?>
                    <li> <a href="/products/category/<?php echo $main_cat['slug']; ?>"><?php echo $main_cat['title']; ?></a>

                        <ul>
                            <?php foreach ($category_tree[1][$main_cat['id']] AS $sub_cat) { ?>
                                <li> <a href="/products/category/<?php echo $sub_cat['slug']; ?>"> <?php echo $sub_cat['title']; ?> </a>
                                    <ul>
                                        <?php foreach ($category_tree[2][$sub_cat['id']] AS $sub_sub_cat) { ?>
                                            <li> <a href="/products/category/<?php echo $sub_sub_cat['slug']; ?>"> <?php echo $sub_sub_cat['title']; ?> </a>

                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php
                    $i++;
                }
                ?>
            </ul>
        </div>
        <div class="popup1" style="display: block;">

            <div class="newsletter-sign-box">

                <div class="newsletter">
                    <img src="/images/close-icon.png" alt="close" class="x"
                         onClick="HideMe();">
                    <div class="newsletter_img">
                        <img alt="newsletter" src="/images/newsletter_img.png">
                    </div>
                    <form method="post" id="popup-newsletter" name="popup-newsletter"
                          class="email-form">
                        <h3>Newsletter Sign up</h3>

                        <h4>sign up for our exclusive email list and be the first to hear
                            of special offers.</h4>
                        <div class="newsletter-form">
                            <div class="input-box">
                                <input type="text" name="email" id="newsletter2"
                                       title="Sign up for our newsletter"
                                       placeholder="Enter your email address"
                                       class="input-text required-entry validate-email">
                                <button type="submit" title="Subscribe" class="button subscribe">
                                    <span>Subscribe</span>
                                </button>

                            </div>
                            <!--input-box-->
                        </div>
                        <!--newsletter-form-->
                        <label class="subscribe-bottom"><input type="checkbox"
                                                               name="notshowpopup" id="notshowpopup">Don’t show this popup
                            again</label>
                    </form>



                </div>
                <!--newsletter-->

            </div>
            <!--newsletter-sign-box-->
        </div>

        <!-- quick view start -->	
        <div id="popup-quick-view-edit" class="popup1" style="display: none;">

            <div class="quick-view-box">


                <img src="/images/close-icon.png" alt="close" class="x close-quic-edit">

                <div class="product-view product-essential container">
                    <div class="row">

                        <form action="" method="post" id="product_addtocart_form">
                            <!--End For version 1, 2, 6 -->
                            <!-- For version 3 -->
                            <div class="product-img-box col-sm-6 col-xs-12">
                                <div class="new-label new-top-left"> New </div>
                                <div class="product-image">
                                    <div class="large-image"> <a href="/products-images/product-img.jpg" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img src="/products-images/product-img.jpg" id="quick_view_img"> </a> </div>
                                    <!-- <div class="flexslider flexslider-thumb">
                                      <ul class="previews-list slides">
                                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/products-images/product-img.jpg' "><img src="/products-images/product-img.jpg" alt = "Thumbnail 1"/></a></li>
                                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/products-images/product-img.jpg' "><img src="/products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/products-images/product-img.jpg' "><img src="/products-images/product-img.jpg" alt = "Thumbnail 1"/></a></li>
                                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/products-images/product-img.jpg' "><img src="/products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/products-images/product-img.jpg' "><img src="/products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/products-images/product-img.jpg' "><img src="/products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/products-images/product-img.jpg' "><img src="/products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                                      </ul>
                                    </div> -->
                                </div>
                                <!-- end: more-images -->
                            </div>
                            <!--End For version 1,2,6-->
                            <!-- For version 3 -->
                            <div class="product-shop col-sm-6 col-xs-12">

                                <div class="product-name">
                                    <h1 itemprop="name" id="quick_edit_h1">RETIS LAPEN CASEN</h1>
                                </div>
                                <!--product-name-->
                                <span itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                                    <div class="rating">
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:50%"></div>
                                            </div>
                                            <p class="rating-links"><!-- <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a>  --></p>
                                        </div>
                                    </div>
                                </span>
                                <div class="price-block">
                                    <div class="price-box"> <span class="regular-price" id="product-price-123"> <span class="price" id="quick_edit_price">$129.00</span>&nbsp;(<span id="quick_edit_package"></span>)</span> </div>
                                    <p class="availability in-stock">
                                        <link itemprop="availability" href="http://schema.org/InStock">
                                        <span>In stock</span></p>
                                </div>
                                <!--price-block-->
                                <div class="short-description">
                                    <h2>Quick Overview</h2>
                                    <p id="quick_edit_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.  </p>
                                </div>
                                <div class="add-to-box">
                                    <div class="add-to-cart">
                                        <div class="pull-left">
                                            <div class="custom pull-left">
                                                <button onclick="var result = document.getElementById('quick_edit_qty');
                                                        var qty = result.value;
                                                        if (!isNaN(qty))
                                                            result.value++;
                                                        return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>

                                                <input type="text" name="qty" id="quick_edit_qty" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                                <input name="product_id" id="product_id" value="" class="add_to_cart_product_qty" type="hidden">
                                                <button onclick="var result = document.getElementById('quick_edit_qty'); var qty = result.value; if (!isNaN(qty) && qty > 0) result.value--; return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                            </div>
                                            <!--custom pull-left-->
                                        </div>
                                        <!--pull-left-->
                                        <button type="button" title="update Cart" class="button btn-cart add-to-cart-jq-function" onClick=""><span><i class="icon-basket"></i>Add to Cart</span></button>
                                    </div>

                                </div>
                                <!--add-to-box-->
                                <!-- thm-mart Social Share-->
                                <div class="social">
                                    <ul class="link">
                                        <li class="tw"> <a href="http://twitter.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                                        <li class="fb"> <a href="http://www.facebook.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>


                                        <!-- <li class="linkedin"> <a href="http://www.linkedin.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                                        <li class="pintrest"> <a href="http://pinterest.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                                        <li class="googleplus"> <a href="https://plus.google.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>-->
                                    </ul>
                                </div>
                                <!-- thm-mart Social Share Close-->
                            </div>
                            <!--product-shop-->
                            <!--Detail page static block for version 3-->
                        </form>
                    </div>
                </div> 





            </div> 
        </div>
        <!-- end quick view -->
        <div id="fade" style="display: block;"></div>

        <!-- JavaScript -->
        <?= $this->Html->script('jquery.min.js'); ?>
        <?= $this->Html->script('bootstrap.min.js'); ?>
        <?= $this->Html->script('parallax.js'); ?>
        <?= $this->Html->script('revslider.js'); ?>
        <?= $this->Html->script('common.js'); ?>
        <?= $this->Html->script('jquery.bxslider.min.js'); ?>
        <?= $this->Html->script('owl.carousel.min.js'); ?>
        <?= $this->Html->script('jquery.mobile-menu.min.js'); ?>

        <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
        <script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
        <?= $this->Html->script('datepicker/bootstrap-datepicker.js'); ?>
        <?= $this->Html->script('timepicker/bootstrap-timepicker.min.js'); ?>
        <?= $this->Html->script('jquery-confirm.min.js'); ?>
        <?= $this->Html->script('custom.js'); ?>

        <script type="text/javascript">
                                                    jQuery(document).ready(function () {
                                                        HideMe();
                                                        jQuery('#thm-rev-slider').show().revolution({
                                                            dottedOverlay: 'none',
                                                            delay: 5000,
                                                            startwidth: 0,
                                                            startheight: 650,
                                                            hideThumbs: 200,
                                                            thumbWidth: 200,
                                                            thumbHeight: 50,
                                                            thumbAmount: 2,
                                                            navigationType: 'thumb',
                                                            navigationArrows: 'solo',
                                                            navigationStyle: 'round',
                                                            touchenabled: 'on',
                                                            onHoverStop: 'on',
                                                            swipe_velocity: 0.7,
                                                            swipe_min_touches: 1,
                                                            swipe_max_touches: 1,
                                                            drag_block_vertical: false,
                                                            spinner: 'spinner0',
                                                            keyboardNavigation: 'off',
                                                            navigationHAlign: 'center',
                                                            navigationVAlign: 'bottom',
                                                            navigationHOffset: 0,
                                                            navigationVOffset: 20,
                                                            soloArrowLeftHalign: 'left',
                                                            soloArrowLeftValign: 'center',
                                                            soloArrowLeftHOffset: 20,
                                                            soloArrowLeftVOffset: 0,
                                                            soloArrowRightHalign: 'right',
                                                            soloArrowRightValign: 'center',
                                                            soloArrowRightHOffset: 20,
                                                            soloArrowRightVOffset: 0,
                                                            shadow: 0,
                                                            fullWidth: 'on',
                                                            fullScreen: 'on',
                                                            stopLoop: 'off',
                                                            stopAfterLoops: -1,
                                                            stopAtSlide: -1,
                                                            shuffle: 'off',
                                                            autoHeight: 'on',
                                                            forceFullWidth: 'off',
                                                            fullScreenAlignForce: 'off',
                                                            minFullScreenHeight: 0,
                                                            hideNavDelayOnMobile: 1500,
                                                            hideThumbsOnMobile: 'off',
                                                            hideBulletsOnMobile: 'off',
                                                            hideArrowsOnMobile: 'off',
                                                            hideThumbsUnderResolution: 0,
                                                            hideSliderAtLimit: 0,
                                                            hideCaptionAtLimit: 0,
                                                            hideAllCaptionAtLilmit: 0,
                                                            startWithSlide: 0,
                                                            fullScreenOffsetContainer: ''
                                                        });
                                                    });
        </script>
        <script type="text/javascript">
            function HideMe()
            {
                jQuery('.popup1').hide();
                jQuery('#fade').hide();
            }

            function addToCart() {
                var $product_id = jQuery(this).closest('div').find('#product_id').val();
                var $qty = jQuery(this).closest('div').find('#qty').val();

                jQuery.ajax({
                    type: 'post',
                    url: '/cart/add',
                    dataType: 'json',
                    data: {
                        product_id: $product_id,
                        qty: $qty
                    },
                    success: function (response) {
                        document.getElementById("total_items").value = response;
                    }
                });
            }


            jQuery(document).ready(function () {
                jQuery('.add-to-cart-jq-function').click(function () {
                    var $product_id = jQuery(this).closest('div').find("input[name='product_id']").val();
                    var $qty = jQuery(this).closest('div').find("input[name='qty']").val();
                    /*  var $product_id = jQuery(this).closest('div').find('input.add_to_cart_product_id').val();
                     var $qty = jQuery(this).closest('div').find('input.add_to_cart_product_qty').val(); */
                    //alert($product_id+" "+$qty);
                    jQuery.ajax({
                        type: 'post',
                        url: '<?php echo $this->Url->build('/', true); ?>cart/addproduct',
                        dataType: 'json',
                        data: {
                            product_id: $product_id,
                            qty: $qty
                        },
                        success: function (response) {
                        	
                            if (response.status == 0) {
                                list = "";
                                table = "";
                                Totaltable = "";

                                wishlist_list="";
                                wishlist_table="";
                                // alert(JSON.stringify(response));

                                if (response.result.cart_size>=0) {
                                    //document.getElementById("total_items").innerHTML = response.result.cart_size;

                                    list += '<div class="basket">';
                                    list += '<a href="' + myBaseUrl + 'user/cart' + '"><span id="total_items"> ' + response.result.cart_size + ' </span></a>';
                                    list += '</div>';
                                }
                                if (response.result.wishlist_size>=0) {
                                    //document.getElementById("total_items").innerHTML = response.result.cart_size;

                                    wishlist_list += '<div class="basket">';
                                    wishlist_list += '<a href="' + myBaseUrl + 'user/wishlist' + '"><span id="total_items"> ' + response.result.wishlist_size + ' </span></a>';
                                    wishlist_list += '</div>';
                                }
                                
                                if (response.result.product_list) {
                                    //alert(JSON.stringify(response.result.product_list));
                                    var count = 0;
                                    list += '<div class="fl-mini-cart-content" style="display: none;">';
                                    list += '<div class="block-subtitle">';
                                    list += '<div class="top-subtotal" id="top-sub-total">';
                                    list += response.result.cart_size + ' items, <span class="price">LKR' + response.result.total.grand_total + '</span>';
                                    list += '</div>';
                                    list += '</div>';
                                    list += '<ul class="mini-products-list" id="cart-sidebar">';
                                    jQuery.each(response.result.product_list, function (index, value) {

                                        list += '<li class="item first last">';
                                        list += '<div class="item-inner">';
                                        list += '<a class="product-image" title="' + value.name + '" href="#">';
                                        list += '<img alt="' + value.name + '" src="' + value.image + '"></a>';
                                        list += '<div class="product-details">';
                                        list += '<div class="access">';
                                        list += '<input type="hidden" value="' + value.id + '" name="product_id" class="">';
                                        list += '<a class="btn-remove1 remove-from-cart-jq-function" title="Remove This Item" href="#">Remove</a>';
                                        list += '<a class="btn-edit edit-product-jq-function" title="Edit item" href="#">';
                                        list += '<i class="icon-pencil"></i><span class="hidden">Edit item</span></a>';
                                        list += '</div>';

                                        list += '<strong>' + value.quantity + '</strong> x <span class="price">' + value.price + '</span>';
                                        list += '<p class="product-name">';
                                        list += '<a href="product-detail.html">' + value.name + '</a>';
                                        list += '</p>';
                                        list += '</div>';
                                        list += '</div>';
                                        list += '</li>';

                                        count++;
                                    });

                                    //document.getElementById("cart-sidebar").innerHTML=list;
                                    //document.getElementById("top-sub-total").innerHTML=response.result.cart_size+' items, <span class="price">$'+response.result.total.grand_total+'</span>';


                                    list += '</ul>';
                                    list += '<div class="actions">';
                                    list += '<button class="btn-checkout" title="Checkout" type="button" onClick="location.href=\'' + myBaseUrl + '/order/checkout\'">';
                                    list += '<span>Checkout</span>';
                                    list += '</button>';
                                    list += '</div>';
                                    list += '</div>';
                                }
                                
                                //alert(list);
                                document.getElementById("mini-wishlist-head").innerHTML = wishlist_list;
                                document.getElementById("mini-cart-head").innerHTML = list;
                                
                                //if in cart page,
                                if (jQuery("#shopping-cart-table").length) {
                                    //cart table

                                    table += '<input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">';
                                    table += '<fieldset>';
                                    table += '<table id="shopping-cart-table" class="data-table cart-table table-striped">';
                                    table += '<colgroup><col width="1"><col><col width="1"><col width="1"><col width="1"><col width="1"><col width="1"></colgroup><thead>';
                                    table += '<tr class="first last"><th rowspan="1">&nbsp;</th><th rowspan="1"><span class="nobr">Product Name</span></th><th rowspan="1"></th><th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th><th rowspan="1" class="a-center">Qty</th><th class="a-center" colspan="1">Subtotal</th></tr>';
                                    table += '</thead><tfoot><tr class="first last"><td colspan="50" class="a-right last"><button type="button" title="Continue Shopping" class="button btn-continue" onClick=""><span><span>Continue Shopping</span></span></button><button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button btn-update"><span><span>Update Cart</span></span></button><button type="submit" name="update_cart_action" value="empty_cart" title="Clear Cart" class="button btn-empty" id="empty_cart_button"><span><span>Clear Cart</span></span></button></td></tr></tfoot>';
                                    table += '<tbody>';
                                    productcount = 1;
                                    jQuery.each(response.result.product_list, function (index, value) {
                                        trclass = "odd";
                                        if (productcount == 1) {
                                            trclass += " first last"
                                        }
                                        if (Object.keys(response.result.product_list).length == productcount) {
                                            trclass += " last"
                                        }
                                        table += '<tr class="' + trclass + '">'
                                        table += '<td class="image hidden-table"><a href="product-detail.html" title="' + value.name + '" class="product-image"><img src="' + value.image + '" width="75" alt="' + value.name + '"></a></td>';
                                        table += '<td>';
                                        table += '<h2 class="product-name">';
                                        table += '<a href="product-detail.html">' + value.name + '</a>';
                                        table += '</h2>';
                                        table += '</td>';
                                        table += '<td class="a-center hidden-table">';
                                        table += '<input value="' + value.id + '" name="product_id" class="" type="hidden"> ';
                                        table += '<a href="#" class="edit-bnt edit-product-jq-function" title="Edit item parameters"></a>';
                                        table += '</td>';
                                        table += '<td class="a-right hidden-table">';
                                        table += '<span class="cart-price">';
                                        table += '<span class="price">LKR' + value.price + '</span>';
                                        table += '</span>';
                                        table += '</td>';
                                        table += '<td class="a-center movewishlist">';
                                        table += '<input name="cart[26340][qty]" value="' + value.quantity + '" size="4" title="Qty" class="input-text qty" maxlength="12">';
                                        table += '</td>';
                                        table += '<td class="a-right movewishlist">';
                                        table += '<span class="cart-price">';
                                        table += '<span class="price">LKR' + value.total + '</span>';
                                        table += '</span>';
                                        table += '</td>';
                                        table += '<td class="a-center last">';
                                        table += '<input type="hidden" value="' + value.id + '" name="product_id" class="">';
                                        table += '<a href="#" title="Remove item" class="button remove-item remove-from-cart-jq-function"><span><span>Remove item</span></span></a></td>';
                                        table += '</tr> ';
                                        productcount++;
                                    });

                                    table += '</tbody></table></fieldset>';

                                    Totaltable += '<colgroup><col>';
                                    Totaltable += '<col width="1">';
                                    Totaltable += '</colgroup><tfoot>';
                                    Totaltable += '<tr>';
                                    Totaltable += '<td style="" class="a-left" colspan="1"><strong>Grand Total</strong></td>';
                                    Totaltable += '<td style="" class="a-right"><strong><span class="price">LKR' + response.result.total.grand_total + '</span></strong></td>';
                                    Totaltable += '</tr>';
                                    Totaltable += '</tfoot>';
                                    Totaltable += '<tbody>';
                                    Totaltable += '<tr>';
                                    Totaltable += '<td style="" class="a-left" colspan="1"> Subtotal</td>';
                                    Totaltable += '<td style="" class="a-right"><span class="price">LKR' + response.result.total.sub_total + '</span></td>';
                                    Totaltable += '</tr>';
                                    Totaltable += '<tr>';
                                    Totaltable += '<td style="" class="a-left" colspan="1">  Tax    </td>';
                                    Totaltable += '<td style="" class="a-right"> <span class="price">LKR' + response.result.total.tax + '</span></td>';
                                    Totaltable += '</tr>';
                                    Totaltable += '<tr>';
                                    Totaltable += '<td style="" class="a-left" colspan="1">     Discount    </td>';
                                    Totaltable += '<td style="" class="a-right"><span class="price">LKR' + response.result.total.discount + '</span>    </td>';
                                    Totaltable += '</tr>';
                                    Totaltable += '<tr>';
                                    Totaltable += '<td style="" class="a-left" colspan="1">        Counpon Value    </td>';
                                    Totaltable += '<td style="" class="a-right"><span class="price">LKR' + response.result.total.counpon_value + '</span>    </td>';
                                    Totaltable += '</tr>';
                                    Totaltable += '</tbody>';
                                    document.getElementById("get-checkot-table-form").innerHTML = table;
                                    document.getElementById("shopping-cart-totals-table").innerHTML = Totaltable;

                                }






                              //if in wishlist page,
                                if (jQuery("#wishlist-table").length) {
                                    //cart table

                                    wishlist_table += '<input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">';
                                    wishlist_table += '<fieldset>';
                                    wishlist_table += '<table id="wishlist-table" class="data-table wishlist-table table-striped">';
                                    wishlist_table += '<colgroup><col width="1"><col><col width="1"><col width="1"><col width="1"><col width="1"><col width="1"></colgroup><thead>';
                                    wishlist_table += '<tr class="first last"><th rowspan="1">&nbsp;</th><th rowspan="1"><span class="nobr">Product Name</span></th><th rowspan="1"></th><th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th><th rowspan="1" class="a-center">Qty</th><th class="a-center" colspan="1">Subtotal</th></tr>';
                                    wishlist_table += '</thead><tfoot><tr class="first last"><td colspan="50" class="a-right last"><button type="button" title="Continue Shopping" class="button btn-continue" onClick=""><span><span>Continue Shopping</span></span></button><button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button btn-update"><span><span>Update Cart</span></span></button><button type="submit" name="update_cart_action" value="empty_cart" title="Clear Cart" class="button btn-empty" id="empty_cart_button"><span><span>Clear Cart</span></span></button></td></tr></tfoot>';
                                    wishlist_table += '<tbody>';
                                    productcount = 1;
                                    jQuery.each(response.result.wishlist_product_list, function (index, value) {
                                        trclass = "odd";
                                        if (productcount == 1) {
                                            trclass += " first last"
                                        }
                                        if (Object.keys(response.result.wishlist_product_list).length == productcount) {
                                            trclass += " last"
                                        }
                                        wishlist_table += '<tr class="' + trclass + '">'
                                        wishlist_table += '<td class="image hidden-table"><a href="product-detail.html" title="' + value.name + '" class="product-image"><img src="' + value.image + '" width="75" alt="' + value.name + '"></a></td>';
                                        wishlist_table += '<td>';
                                        wishlist_table += '<h2 class="product-name">';
                                        wishlist_table += '<a href="product-detail.html">' + value.name + '</a>';
                                        wishlist_table += '</h2>';
                                        wishlist_table += '</td>';
                                        wishlist_table += '<td class="a-center hidden-table">';
                                        wishlist_table += '<input value="' + value.id + '" name="product_id" class="" type="hidden"> ';
                                        wishlist_table += '<a href="#" class="edit-bnt add-to-cart-btn edit-product-jq-function" title="Edit item parameters"></a>';
                                        wishlist_table += '</td>';
                                        wishlist_table += '<td class="a-right hidden-table">';
                                        wishlist_table += '<span class="cart-price">';
                                        wishlist_table += '<span class="price">LKR' + value.price + '</span>';
                                        wishlist_table += '</span>';
                                        wishlist_table += '</td>';
                                        wishlist_table += '<td class="a-center movewishlist">';
                                        wishlist_table += '<input name="cart[26340][qty]" value="' + value.quantity + '" size="4" title="Qty" class="input-text qty" maxlength="12">';
                                        wishlist_table += '</td>';
                                        wishlist_table += '<td class="a-right movewishlist">';
                                        wishlist_table += '<span class="cart-price">';
                                        wishlist_table += '<span class="price">LKR' + value.total + '</span>';
                                        wishlist_table += '</span>';
                                        wishlist_table += '</td>';
                                        wishlist_table += '<td class="a-center last">';
                                        wishlist_table += '<input type="hidden" value="' + value.id + '" name="product_id" class="">';
                                        wishlist_table += '<a href="#" title="Remove item" class="button remove-item remove-from-cart-jq-function"><span><span>Remove item</span></span></a></td>';
                                        wishlist_table += '</tr> ';
                                        productcount++;
                                    });

                                    wishlist_table += '</tbody></table></fieldset>';

                                    if(Object.keys(response.result.wishlist_product_list).length>0){
                                    	document.getElementById("get-wishlist-table-form").innerHTML = wishlist_table;
        	                            }else{
        	                            	document.getElementById("get-wishlist-table-form").innerHTML = "<p class='nothing-found'>Your Wishlist Is Empty</p>";
        	                            }
    	                            
                                    
                                    
                                    

                                }
                            }



                            jQuery.alert(response.message);

                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                        	jQuery.alert(xhr.status);
                        	jQuery.alert(thrownError);
                        }
                    });
                });


            });



        </script>
        <!-- quick view page js -->        
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('#rev_slider_4').show().revolution({
                    dottedOverlay: 'none',
                    delay: 5000,
                    startwidth: 0,
                    startheight: 900,
                    hideThumbs: 200,
                    thumbWidth: 200,
                    thumbHeight: 50,
                    thumbAmount: 2,
                    navigationType: 'thumb',
                    navigationArrows: 'solo',
                    navigationStyle: 'round',
                    touchenabled: 'on',
                    onHoverStop: 'on',
                    swipe_velocity: 0.7,
                    swipe_min_touches: 1,
                    swipe_max_touches: 1,
                    drag_block_vertical: false,
                    spinner: 'spinner0',
                    keyboardNavigation: 'off',
                    navigationHAlign: 'center',
                    navigationVAlign: 'bottom',
                    navigationHOffset: 0,
                    navigationVOffset: 20,
                    soloArrowLeftHalign: 'left',
                    soloArrowLeftValign: 'center',
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,
                    soloArrowRightHalign: 'right',
                    soloArrowRightValign: 'center',
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,
                    shadow: 0,
                    fullWidth: 'on',
                    fullScreen: 'on',
                    stopLoop: 'off',
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: 'off',
                    autoHeight: 'on',
                    forceFullWidth: 'off',
                    fullScreenAlignForce: 'off',
                    minFullScreenHeight: 0,
                    hideNavDelayOnMobile: 1500,
                    hideThumbsOnMobile: 'off',
                    hideBulletsOnMobile: 'off',
                    hideArrowsOnMobile: 'off',
                    hideThumbsUnderResolution: 0,
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0,
                    fullScreenOffsetContainer: ''
                });
            });
        </script>
        <!-- end quick view page js -->        
    </body>
</html>
