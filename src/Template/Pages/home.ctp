<div class="content">
    <div id="thm-mart-slideshow" class="thm-mart-slideshow">
        <div class="container">
            <div id='thm_slider_wrapper' class='thm_slider_wrapper fullwidthbanner-container' >
                <div id='thm-rev-slider' class='rev_slider fullwidthabanner'>
                    <ul>
                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='/images/slide_one_new.jpg'>
						<img src='/images/slide_one_new.jpg'  data-bgposition='center center'  data-bgfit='contain' data-bgrepeat='no-repeat' alt="slider-image1" />
                        </li>
                        
						<li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='/images/slide_organics.jpg'>
						<img src='/images/slide_organics.jpg'  data-bgposition='center center'  data-bgfit='contain' data-bgrepeat='no-repeat' alt="slider-image1" />
                        </li>
						
						<li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='/images/free_delivery_1.jpg'>
						<img src='/images/free_delivery_1.jpg'  data-bgposition='center center'  data-bgfit='contain' data-bgrepeat='no-repeat' alt="slider-image1" />
                        </li>
						
						<li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='/images/household_esse.jpg'>
						<img src='/images/household_esse.jpg'  data-bgposition='center center'  data-bgfit='contain' data-bgrepeat='no-repeat' alt="slider-image1" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <?php include('../Layout/Partials/our_features.ctp'); ?>

    <!--Category slider Start-->
    <div class="top-cate" style="margin-top: -80px;">
        <div class="featured-pro container">
            <div class="row">
                <div class="slider-items-products">
                    <div class="new_title">
                        <h2>Top Categories</h2>

                    </div> 
                    <div id="top-categories" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <?php foreach ($category_tree[0] AS $main_cat) { ?>
                                <div class="item">
                                    <a href="/products/category/<?php echo $main_cat['slug']; ?>">
                                        <div class="pro-img"><img src="/category-images/<?php echo $main_cat['image']; ?>" alt="<?php echo $main_cat['title']; ?>">
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

<!--    <div id="top">
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
    </div>-->






    <!-- best Pro Slider -->
    <section class=" wow bounceInUp animated">
        <div class="best-pro slider-items-products container">
            <div class="new_title">
                <h2>Latest Products</h2>
            </div>
            <!--<div class="cate-banner-img"><img src="/images/bestseller-banner.png" alt="Retis lapen casen"></div>-->
            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                    <?php foreach($latest_products  AS $latest_product){ ?>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="/product/<?php echo $latest_product['slug']; ?>" title="<?php echo $latest_product['name']; ?>" class="product-image">
                                        <img src="<?php echo $latest_product['image']; ?>" alt="<?php echo $latest_product['name']; ?>"></a>
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
                                    <div class="item-title"><a href="/product/<?php echo $latest_product['slug']; ?>" title="<?php echo $latest_product['name']; ?>"><?php echo $latest_product['name']; ?></a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <!--<p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>-->
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">LKR <?php echo $latest_product['price']; ?>.00</span> </span> </div>
                                        </div>
                                        <div class="add_cart">
											<input name="qty" id="qty" maxlength="12" value="1" title="Quantity" class="input-text qty" type="hidden" class="add_to_cart_product_qty">
                                            <input name="product_id" id="product_id" value="<?php echo $latest_product->id?>" type="hidden" class="add_to_cart_product_id">
                                            <button class="button btn-cart add-to-cart-jq-function" type="button"><span>Add to Cart</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

</div>