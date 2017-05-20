<!--<div class="page-heading">
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <ul>
              <li class="home"> <a href="/" title="Go to Home Page">Home</a> <span>—› </span> </li>
              <li class="category1601"> <strong><?php echo ucwords($product->name); ?></strong> </li>
            </ul>
          </div>
          col-xs-12
        </div>
        row
      </div>
      container
    </div>
    <div class="page-title">
      <h2><?php echo ucwords($product->name); ?></h2>
    </div>
  </div>-->
  <!-- BEGIN Main Container -->
  <div class="main-container col1-layout wow bounceInUp animated">
    <div class="main">
      <div class="col-main">
        <!-- Endif Next Previous Product -->
        <div class="product-view wow bounceInUp animated" itemscope="" itemtype="http://schema.org/Product" itemid="#product_base">
          <div id="messages_product_view"></div>
          <!--product-next-prev-->
          <div class="product-essential container">
            <div class="row">
              <div class="product-next-prev"> <a class="product-next" title="Next" href="#"><span></span></a> <a class="product-prev" title="Previous" href="#"><span></span></a> </div>
              <form action="" method="post" id="product_addtocart_form">
                <!--End For version 1, 2, 6 -->
                <!-- For version 3 -->
                <div class="product-img-box col-sm-6 col-xs-12">
                  <div class="new-label new-top-left"> New </div>
                  <div class="product-image">
                    <div class="large-image"> <a href="#" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img src="/products-images/product-img.jpg"> </a> </div>
<!--                    <div class="flexslider flexslider-thumb">
                      <ul class="previews-list slides">
                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product-img.jpg' "><img src="products-images/product-img.jpg" alt = "Thumbnail 1"/></a></li>
                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product-img.jpg' "><img src="products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product-img.jpg' "><img src="products-images/product-img.jpg" alt = "Thumbnail 1"/></a></li>
                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product-img.jpg' "><img src="products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product-img.jpg' "><img src="products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                        <li><a href='/products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product-img.jpg' "><img src="products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                        <li><a href='products-images/product-img.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product-img.jpg' "><img src="products-images/product-img.jpg" alt = "Thumbnail 2"/></a></li>
                      </ul>-->
                    <!--</div>-->
                  </div>
                  <!-- end: more-images -->
                </div>
                <!--End For version 1,2,6-->
                <!-- For version 3 -->
                <div class="product-shop col-sm-6 col-xs-12">
                
                  <div class="product-name">
                    <h1 itemprop="name"><?php echo ucwords($product->name); ?></h1>
                  </div>
                  <!--product-name-->
                  <span itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                  <div class="rating">
                    <div class="ratings">
                      <div class="rating-box">
                        <div class="rating" style="width:50%"></div>
                      </div>
                      <!--<p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>-->
                    </div>
                  </div>
                  </span>
                  <div class="price-block">
                    <div class="price-box"> <span class="regular-price" id="product-price-123"> <span class="price">LKR <?php echo $product->price; ?>.00</span> (<?php echo $package_type[$product->package]; ?>)</span> </div>
                    <p class="availability in-stock">
                      <link itemprop="availability" href="http://schema.org/InStock">
                      <span>In stock</span></p>
                  </div>
                  <!--price-block-->
                  <div class="short-description">
                    <h2>Quick Overview</h2>
                    <p><?php echo $product->description; ?></p>
                  </div>
                  <div class="add-to-box">
                    <div class="add-to-cart">
                      <div class="pull-left">
                        <div class="custom pull-left">
                         <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                          <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Quantity:" class="input-text qty add_to_cart_product_qty">
                          <input type="hidden" name="product_id" id="product_id" value="<?php echo $product->id; ?>" class="add_to_cart_product_qty">
                           <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                        </div>
                        <!--custom pull-left-->
                      </div>
                      <!--pull-left-->
                      <button type="button" title="Add to Cart" class="button btn-cart fuck add-to-cart-jq-function" onClick=""><span><i class="icon-basket"></i>Add to Cart</span></button>
                      <?php if ($authUser): ?>
                      <button type="button" title="Add to Wishlist" class="button btn-cart btn-wishlist fuck add-to-wishlist-jq-function" onClick=""><span><i class="icon-basket"></i>Wishlist</span></button>
                      <?php endif;?>
                    </div>
                    <!--add-to-cart-->
<!--                    <div class="email-addto-box">
                      <p class="email-friend"><a href="#" title="Email to a Friend"><span>Email to a Friend</span></a></p>
                      <ul class="add-to-links">
                        <li> <a class="link-wishlist" href="wishlist.html" onClick="" title="Add To Wishlist"><span>Add To Wishlist</span></a> </li>
                        <li> <span class="separator">|</span> <a class="link-compare" href="Compare.html" title="Add To Compare"><span>Add To Compare</span></a> </li>
                      </ul>
                      add-to-links
                    </div>-->
                    <!--email-addto-box-->
                  </div>
                  <!--add-to-box-->
                  <!-- thm-mart Social Share-->
                  <div class="social">
                    <ul class="link">
                      <li class="fb"> <a href="http://www.facebook.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                      <!--<li class="linkedin"> <a href="http://www.linkedin.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>-->
                      <li class="tw"> <a href="http://twitter.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                      <!--<li class="pintrest"> <a href="http://pinterest.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>-->
                      <!--<li class="googleplus"> <a href="https://plus.google.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>-->
                    </ul>
                  </div>
                  <!-- thm-mart Social Share Close-->
                </div>
                <!--product-shop-->
                <!--Detail page static block for version 3-->
              </form>
            </div>
          </div>
          <!--product-essential-->
          <div class="product-collateral container">
            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
              <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
<!--              <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li>
              <li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>
              <li> <a href="#product_tabs_custom" data-toggle="tab">Custom Tab</a> </li>
              <li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li>-->
            </ul>
            <div id="productTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="product_tabs_description">
                <div class="std">
                    <p><?php echo $product->description; ?></p>
                </div>
              </div>
            </div>
          </div>
     
      
          <!--product-collateral-->
          <div class="box-additional">
            <!-- BEGIN RELATED PRODUCTS -->
            <div class="related-pro container">
              <div class="slider-items-products">
                <div class="new_title center">
                  <h2>Related Products</h2>
                </div>
                <div id="related-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
          <div class="item">
                            <div class="item-inner">
                              <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                  <div class="new-label new-top-left">New</div>
                                  <div class="item-box-hover">
                                    <div class="box-inner">
                                      <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
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
                                      <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">LKR125.00</span> </span> </div>
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
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                  <div class="new-label new-top-left">New</div>
                                  <div class="item-box-hover">
                                    <div class="box-inner">
                                      <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
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
                                      <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">LKR125.00</span> </span> </div>
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
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                  <div class="sale-label sale-top-left">Sale</div>
                                  <div class="item-box-hover">
                                    <div class="box-inner">
                                      <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
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
                                      <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">LKR125.00</span> </span> </div>
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
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                  <div class="new-label new-top-left">New</div>
                                  <div class="item-box-hover">
                                    <div class="box-inner">
                                      <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
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
                                      <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">LKR125.00</span> </span> </div>
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
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                  <div class="new-label new-top-left">New</div>
                                  <div class="item-box-hover">
                                    <div class="box-inner">
                                      <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
                                      <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                      
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
                                      <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">LKR125.00</span> </span> </div>
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
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="products-images/product-img.jpg" alt="Retis lapen casen"></a>
                                  <div class="new-label new-top-left">New</div>
                                  <div class="item-box-hover">
                                    <div class="box-inner">
                                      <div class="product-detail-bnt"><a class="button detail-bnt" type="button"><span>Quick View</span></a></div>
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
                                      <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">LKR125.00</span> </span> </div>
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
            </div>
            <!-- end related product -->
            
          </div>
          <!-- end related product -->
        </div>
        <!--box-additional-->
        <!--product-view-->
      </div>
    </div>
    <!--col-main-->
  </div>
  <!--main-container-->
</div>
<!--col1-layout-->
<div class="our-features-box wow bounceInUp animated animated">
  <div class="container">
    <ul>
      <li>
        <div class="feature-box free-shipping">
          <div class="icon-truck"></div>
          <div class="content">FREE SHIPPING on order over LKR99</div>
        </div>
      </li>
      <li>
        <div class="feature-box need-help">
          <div class="icon-support"></div>
          <div class="content">Need Help +1 800 123 1234</div>
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
