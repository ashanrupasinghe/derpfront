<div class="content">
    <div id="thm-mart-slideshow" class="thm-mart-slideshow">
        <div class="container">
            <div id='thm_slider_wrapper' class='thm_slider_wrapper fullwidthbanner-container' >
                <div id='thm-rev-slider' class='rev_slider fullwidthabanner'>
                    <ul>
                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='/images/slider-image.png'><img src='/images/slider-image.png'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="slider-image1" />
                            <div class="info">
                                <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='0'  data-y='180'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;max-width:auto;max-height:auto;white-space:nowrap;'><span>Get 50% off</span></div>
                                <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='300'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;max-width:auto;max-height:auto;white-space:nowrap;'>Simply <span>delicious</span></div>
                                <div class='tp-caption sfb  tp-resizeme ' data-x='0'  data-y='550'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'><a href='#' class="buy-btn">Shop Now</a></div>
                                <div    class='tp-caption Title sft  tp-resizeme ' data-x='0'  data-y='420'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'>Little things make a big difference</div>
                            </div>
                        </li>
                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='/images/slider-image.png'><img src='/images/slider-image.png'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="slider-image2"  />
                            <div class="info">
                                <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='0'  data-y='180'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;max-width:auto;max-height:auto;white-space:nowrap;'><span>Fresh Look</span></div>
                                <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='300'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;max-width:auto;max-height:auto;white-space:nowrap;'><span>100%</span> Organic</div>
                                <div class='tp-caption sfb  tp-resizeme ' data-x='0'  data-y='550'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'><a href='#' class="buy-btn">Shop Now</a></div>
                                <div    class='tp-caption Title sft  tp-resizeme ' data-x='0'  data-y='420'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'>Farm Fresh Produce Right to Your Door</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <div class="our-features-box wow bounceInUp animated animated">
        <div class="container">
            <ul>
                <li>
                    <div class="feature-box free-shipping">
                        <div class="icon-truck"></div>
                        <div class="content">FREE SHIPPING</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box need-help">
                        <div class="icon-support"></div>
                        <div class="content">Need Help <br/> 011 7 55 66 00</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box money-back">
                        <div class="icon-money"></div>
                        <div class="content">Money Back Guarantee</div>
                    </div>
                </li>
                <li class="last">
                    <div class="feature-box return-policy">
                        <div class="icon-return"></div>
                        <div class="content">30 days return Service</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!--Category slider Start-->
    <div class="top-cate">
        <div class="featured-pro container">
            <div class="row">
                <div class="slider-items-products">
                    <div class="new_title">
                        <h2>Top Categories</h2>

                    </div> 
                    <div id="top-categories" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <?php foreach ($main_categories AS $main_cat) { ?>
                                <div class="item">
                                    <a href="/products/category/<?php echo $main_cat['slug']; ?>">
                                        <div class="pro-img"><img src="/products-images/product-img.jpg" alt="<?php echo $main_cat['title']; ?>">
                                            <div class="pro-info"><?php echo $main_cat['title']; ?></div>
                                        </div>
                                    </a>
                                </div>
                                <!-- Item -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Category silder End--> 

    <div id="top">
        <div class="container">
            <div class="row">
                <ul>
                    <li>
                        <div>
                            <a href="#" data-scroll-goto="1">
                                <img src="/images/banner.png" alt="promotion-banner1">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#" data-scroll-goto="2">
                                <img src="/images/banner.png" alt="promotion-banner2">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#" data-scroll-goto="3">
                                <img src="/images/banner.png" alt="promotion-banner3">
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>






    <!-- best Pro Slider -->
    <section class=" wow bounceInUp animated">
        <div class="best-pro slider-items-products container">
            <div class="new_title">
                <h2>Best Seller</h2>
            </div>
            <div class="cate-banner-img"><img src="/images/bestseller-banner.png" alt="Retis lapen casen"></div>
            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="/products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                    <div class="new-label new-top-left">New</div>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                        </div>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="/products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                    <div class="new-label new-top-left">New</div>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                        </div>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item --> 

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="/products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                    <div class="sale-label sale-top-left">Sale</div>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                        </div>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->

                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="/products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                    <div class="new-label new-top-left">New</div>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                        </div>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="/products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                    <div class="new-label new-top-left">New</div>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                        </div>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item --> 

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="/products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                    <div class="new-label new-top-left">New</div>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125.00</span> </span> </div>
                                        </div>
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item --> 
                </div>
            </div>
        </div>
    </section>



    <!-- Home Lastest Blog Block -->
    <div class="latest-blog wow bounceInUp animated animated container">
        <!--exclude For version 6 -->

        <!--For version 1,2,3,4,5,6,8 -->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                <div class="blog_inner">
                    <div class="blog-img"> <a href="blog-detail.html"> <img src="/images/blog-img.jpg" alt="blog image"> </a>
                        <div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>
                    </div>
                    <!--blog-img-->
                    <div class="blog-info">
                        <div class="post-date">
                            <time class="entry-date" datetime="2015-05-11T11:07:27+00:00">14 <br> April</time>
                        </div>
                        <h3><a href="blog-detail.html">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada ...</p>
                        <a class="readmore" href="blog-detail.html">Read More</a> </div>
                </div>
                <!--blog_inner-->
            </div>
            <!--col-lg-4 col-md-4 col-xs-12 col-sm-4-->
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                <div class="blog_inner">
                    <div class="blog-img"> <a href="blog-detail.html"> <img src="/images/blog-img.jpg" alt="blog image"> </a>
                        <div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>
                    </div>
                    <!--blog-img-->
                    <div class="blog-info">
                        <div class="post-date">
                            <time class="entry-date" datetime="2015-05-11T11:07:27+00:00">14 <br> April</time>
                        </div>
                        <h3><a href="blog-detail.html">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada ...</p>
                        <a class="readmore" href="blog-detail.html">Read More</a> </div>
                </div>
                <!--blog_inner-->
            </div>

            <!--col-lg-4 col-md-4 col-xs-12 col-sm-4-->
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                <div class="blog_inner">
                    <div class="blog-img"> <a href="blog-detail.html"> <img src="/images/blog-img.jpg" alt="blog image"> </a>
                        <div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>
                    </div>
                    <!--blog-img-->
                    <div class="blog-info">
                        <div class="post-date">
                            <time class="entry-date" datetime="2015-05-11T11:07:27+00:00">14 <br> April</time>
                        </div>
                        <h3><a href="blog-detail.html">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada ...</p>
                        <a class="readmore" href="blog-detail.html">Read More</a> </div>
                </div>
                <!--blog_inner-->
            </div>
            <!--col-lg-4 col-md-4 col-xs-12 col-sm-4-->


        </div>
        <!--END For version 1,2,3,4,5,6,8 -->
        <!--exclude For version 6 -->
        <!--container-->
    </div>

    <!-- Logo Brand Block -->
    <div class="brand-logo wow bounceInUp animated">
        <div class="container">
            <div class="row">
                <div class="logo-brand col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="new_title">
                        <h2>Brand Logo</h2>
                    </div>
                    <div class="slider-items-products">
                        <div id="brand-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col6">
                                <!-- Item -->
                                <div class="item">
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                </div>
                                <!-- End Item -->
                                <!-- Item -->
                                <div class="item">
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                    <div class="logo-item"><a href="#"><img src="/images/brand-logo.jpg" alt="Image"></a></div>
                                </div>
                                <!-- End Item -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 testimonials-section">
                    <div class="offer-slider parallax parallax-2">
                        <ul class="bxslider">
                            <li>
                                <div class="avatar"><img src="/images/testimonial-photo.png" alt="Image"></div>
                                <div class="testimonials">"Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer."</div>
                                <div class="clients_author">	Smith John	<span>Happy Customer</span>	</div>
                            </li>
                            <li>
                                <div class="avatar"><img src="/images/testimonial-photo.png" alt="Image"></div>
                                <div class="testimonials">"Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer."</div>
                                <div class="clients_author">	Karla Anderson	<span>Happy Customer</span>	</div>
                            </li>
                            <li>
                                <div class="avatar"><img src="/images/testimonial-photo.png" alt="Image"></div>
                                <div class="testimonials">"Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer."</div>
                                <div class="clients_author">	Smith John	<span>Happy Customer</span>	</div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>