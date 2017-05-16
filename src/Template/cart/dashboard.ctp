<div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
        <div class="page-title">
<h2>Dashboard</h2>
</div>
        </div>
      </div>
    </div>
  </div>	
  
  <!-- BEGIN Main Container col2-right -->
  <section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-9 col-xs-12 wow bounceInUp animated animated" style="visibility: visible;">
          <div class="my-account">
            
            <!--page-title--> 
            <!-- BEGIN DASHBOARD-->
            <div class="dashboard">
              <div class="welcome-msg">
                <p class="hello"><strong>Hello, <?php echo $user['firstName'].' '.$user['lastName'];?>!</strong></p>
                <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
              </div>
              <div class="recent-orders">
                <div class="title-buttons"> <strong>Recent Orders</strong> <a href="#">View All</a> </div>
                <div class="table-responsive">
                  <table class="data-table table-striped" id="my-orders-table">
                    <colgroup>
                    <col width="">
                    <col width="">
                    <col>
                    <col width="1">
                    <col width="1">
                    <col width="20%">
                    </colgroup>
                    <thead>
                      <tr class="first last">
                        <th>Order # </th>
                        <th>Date</th>
                        <th>Ship To</th>
                        <th><span class="nobr">Order Total</span></th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $count=1;?>
                    <?php foreach ($orders as $order):?>
                    <tr class="<?php if ($count==1){echo 'first';}if ($count==sizeof($orders)){echo 'last';}if ($count%2!=0){echo 'odd';}else{echo 'even';}?>first odd">
                        <td><?php echo $order['id'];?></td>
                        <td><span class="nobr"><?php echo $order['created'];?></span></td>
                        <td>jhon doe</td>
                        <td><span class="price">LKR<?php echo $order['total'];?></span></td>
                        <td><em><?php echo $order['status'];?></em></td>
                        <td class="a-center last"><span class="nobr"> <a href="#">View Order</a> <span class="separator">|</span> <a href="#" class="link-reorder">Reorder</a> </span></td>
                      </tr>
                     <?php $count++;?> 
                    <?php endforeach;?>
                      
                    </tbody>
                  </table>
                </div>
                <!--table-responsive-->                 
              </div>
              <!--recent-orders-->
              <div class="box-account">
                <div class="page-title">
                  <h2>Account Information</h2>
                </div>
                <div class="col2-set">
                  <div class="col-1">
                    <div class="box">
                      <div class="box-title">
                        <h5>Contact Information</h5>
                        <a href="#">Edit</a> </div>
                      <!--box-title-->
                      <div class="box-content">
                      <!-- need to add user name or name -->
                        <p><?php echo $user['firstName'].' '.$user['lastName']?><br>
                          <?php echo $user['email']?><br>
                          <?php echo $user['mobileNo']?><br>
                          <a href="#">Change Password</a> </p>
                      </div>
                      <!--box-content--> 
                    </div>
                    <!--box--> 
                  </div>
                  <div class="col-2">
                    <div class="box">
                      <div class="box-title">
                        <h5>Newsletters</h5>
                        <a href="#">Edit</a> </div>
                      <!--box-title-->
                      <div class="box-content">
                      <?php 
                      $news_letter=[0=>'You are currently not subscribed to any newsletter.',
                      				1=>'You are scbscribed to the newsletter'];
                      ?>
                        <p> <?php 
                        if ($user['newsLetter']!=""):
                        echo $news_letter[$user['newsLetter']];
                        endif;?> </p>
                      </div>
                      <!--box-content--> 
                    </div>
                    <!--box--> 
                  </div>
                </div>
                <div class="col2-set">
                  <div class="box">
                    
                    <!--box-title-->
                    <div class="box-content">
                      <div class="col-1">
                        <h5>Address</h5>
                        <address>                        
                        <?php if ($user['address']!=null):
                        echo $user['address'].'<br>';
                        endif;?>
                        <?php 
                        if($user['city']!=null):                        
                        echo $user['city'].'<br>';
                        endif;?>
                        <a href="#">Edit Address</a>
                        </address>
                      </div>
                      <div class="col-2">
                        <div class="box-title">
                      <h4>Address Book</h4>
                      <a href="#">Manage Addresses</a> </div>
                      </div>
                    </div>
                    <!--box-content--> 
                  </div>
                  <!--box--> 
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--col-main col-sm-9 wow bounceInUp animated-->
        <aside class="col-right sidebar col-sm-3 col-xs-12 wow bounceInUp animated animated" style="visibility: visible;">
          <div class="block block-account">
            <div class="block-title"> My Account </div>
            <div class="block-content">
              <ul>
                <li class="current"><a>Account Dashboard</a></li>
                <li><a href="#"><span> Account Information</span></a></li>
                <li><a href="#"><span> Address Book</span></a></li>
                <li><a href="#"><span> My Orders</span></a></li>
                <li><a href="#"><span> Billing Agreements</span></a></li>
                <li><a href="#"><span> Recurring Profiles</span></a></li>
                <li><a href="#"><span> My Product Reviews</span></a></li>
                <li><a href="#"><span> My Wishlist</span></a></li>
                <li><a href="#"><span> My Applications</span></a></li>
                <li><a href="#"><span> Newsletter Subscriptions</span></a></li>
                <li class="last"><a href="#"><span> My Downloadable Products</span></a></li>
              </ul>
            </div>
            <!--block-content--> 
          </div>
          <!--block block-account-->
          
          <div class="custom-slider">
            <div>
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li class="active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                 <div class="carousel-inner">
                  <div class="item active"><img src="images/blog-banner.png" alt="slide3">
                    <div class="carousel-caption">
                      <h3><a title=" Sample Product" href="#">50% OFF</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <a class="link" href="#">Buy Now</a></div>
                  </div>
                  <div class="item"><img src="images/blog-banner.png" alt="slide1">
                    <div class="carousel-caption">
                      <h3><a title=" Sample Product" href="#">Hot collection</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                  <div class="item"><img src="images/blog-banner.png" alt="slide2">
                    <div class="carousel-caption">
                      <h3><a title=" Sample Product" href="#">Summer collection</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#" data-slide="prev"> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#" data-slide="next"> <span class="sr-only">Next</span> </a></div>
            </div>
          </div>
        </aside>
        <!--col-right sidebar col-sm-3 wow bounceInUp animated--> 
      </div>
      <!--row--> 
    </div>
    <!--main container--> 
  </section>
  <!--main-container col2-left-layout--> 
  

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
  <!-- For version 1,2,3,4,6 -->
  