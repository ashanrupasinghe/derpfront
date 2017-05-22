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
  <section class="main-container col2-right-layout" >
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-12 col-xs-12 wow bounceInUp animated animated" style="visibility: visible;">
          <div class="my-account">
            
            <!--page-title--> 
            <!-- BEGIN DASHBOARD-->
            <div class="dashboard">
              <div class="welcome-msg">
                <p class="hello"><strong>Hello, <?php echo $user['firstName'].' '.$user['lastName'];?>!</strong></p>
                <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
              </div>
              <div class="recent-orders">
                <div class="title-buttons"> <strong>Recent Orders</strong> </div>
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
                        
                        <td><span class="price">LKR<?php echo ' '.$order['total'];?></span></td>
                        <td><em><?php echo $payment_status[$order['status']];?></em></td>
                        <td class="a-center last">
                        	<span class="nobr"> 
                        		<a href="<?php echo $this->Url->build('/order/view/'.$order['id']);?>">View Order</a>
                        	 	<span class="separator">|</span>                        	 
                        	 	<a href="#" class="link-reorder">Reorder</a> 
                        	 	<input type="hidden" name="product_id" value="<?php echo $order['id']; ?>">
                        	 </span>
                        </td>
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
                         </div>
                      <!--box-title-->
                      <div class="box-content">
                      <!-- need to add user name or name -->
                        <p><?php echo $user['firstName'].' '.$user['lastName']?><br>
                          <?php echo $user['email']?><br>
                          <?php echo $user['mobileNo']?><br>
                          </p>
                      </div>
                      <!--box-content--> 
                    </div>
                    <!--box--> 
                  </div>
                  <div class="col-2">
                    <div class="box">
                      <div class="box-title">
                        <h5>Newsletters</h5>
                         </div>
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
                    <div class="box-content" style="display:none;">
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
                        
                        </address>
                      </div>
                      <div class="col-2">
                        <div class="box-title">
                      
					  </div>
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
        <!--col-right sidebar col-sm-3 wow bounceInUp animated--> 
      </div>
      <!--row--> 
    </div>
    <!--main container--> 
  </section>
  <!--main-container col2-left-layout--> 
  
  