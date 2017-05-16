  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
        <div class="page-title">
<h2>Shopping Cart</h2>
</div>
        </div>
      </div>
    </div>
  </div>
      
<!-- BEGIN Main Container -->  
          
       <div class="main-container col1-layout wow bounceInUp animated">     
              
	       <div class="main">                     
                            <div class="cart wow bounceInUp animated">
    
            <div class="table-responsive shopping-cart-tbl  container">
    <form action="" method="post" id="get-checkot-table-form">
    <?php if (sizeof($return['result']['product_list'])>0):?>
        <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
        <fieldset>
            <table id="shopping-cart-table" class="data-table cart-table table-striped">
                <colgroup><col width="1">
                <col>
                <col width="1">
                                        <col width="1">
                                        <col width="1">
                            <col width="1">
                                        <col width="1">

                            </colgroup><thead>
                    <tr class="first last">
                        <th rowspan="1">&nbsp;</th>
                        <th rowspan="1"><span class="nobr">Product Name</span></th>
                        <th rowspan="1"></th>
                                                <th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th>
                        <th rowspan="1" class="a-center">Qty</th>
                        <th class="a-center" colspan="1">Subtotal</th>
                        <th rowspan="1" class="a-center">&nbsp;</th>
                    </tr>
                                    </thead>
                <tfoot>
                    <tr class="first last">
                        <td colspan="50" class="a-right last">
                                                            <button type="button" title="Continue Shopping" class="button btn-continue" onClick=""><span><span>Continue Shopping</span></span></button>
                                                        <!-- <button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button btn-update"><span><span>Update Cart</span></span></button> -->
                            <button type="submit" name="update_cart_action" value="empty_cart" title="Clear Cart" class="button btn-empty" id="empty_cart_button"><span><span>Clear Cart</span></span></button>
                  
                        </td>
                    </tr>
                </tfoot>
                <tbody>
<?php $count=0;?>                
<?php foreach ($return['result']['product_list'] as $product):?>                                    
<tr class="<?php if ($count==0){echo 'first last ';}?>odd <?php if ($count==sizeof($return['result']['product_list'])-1){echo ' last';}?>">
    <td class="image hidden-table"><a href="product-detail.html" title="<?php echo $product['name'];?>" class="product-image"><img src="<?php echo $product['image'];?>" width="75" alt="<?php echo $product['name'];?>"></a></td>
    <td>
        <h2 class="product-name">
                    <a href="product-detail.html"><?php echo $product['name']?></a>
                </h2>
                                                        </td>
    <td class="a-center hidden-table">
    			<input type="hidden" value="<?php echo $product['id'];?>" name="product_id" class="">
                <a href="#" class="edit-bnt edit-product-jq-function" title="Edit item parameters"></a>
            </td>
    
    
                <td class="a-right hidden-table">
                            <span class="cart-price">
                                                <span class="price">LKR<?php echo $product['price'];?></span>                
            </span>


                    </td>
                        <td class="a-center movewishlist">
        <input name="cart[26340][qty]" value="<?php echo $product['quantity'];?>" size="4" title="Qty" class="input-text qty" maxlength="12">
    </td>
        <td class="a-right movewishlist">
                    <span class="cart-price">
        
                                                <span class="price">LKR<?php echo $product['total'];?></span>                            
        </span>
            </td>
            <td class="a-center last">
	<input type="hidden" value="<?php echo $product['id'];?>" name="product_id" class="">
   <a href="#" title="Remove item" class="button remove-item remove-from-cart-jq-function"><span><span>Remove item</span></span></a></td>





</tr> 
<?php $count++;?>
<?php endforeach;?>




                          </tbody>
            </table>
            
        </fieldset>
<?php else :?>
<p class="nothing-found">Your Cart Is Empty</p>
<?php endif;?>        
    </form>
</div>

   <!-- BEGIN CART COLLATERALS -->


<div class="cart-collaterals container"> 
<!-- BEGIN COL2 SEL COL 1 -->


<!-- BEGIN TOTALS COL 2 -->
<div class="col-sm-4">

</div>   

<div class="col-sm-4">    
    

</div> <!--col-sm-4-->

<div class="col-sm-4">
 <div class="totals">
<h3>Shopping Cart Total</h3>
<div class="inner">

    <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
        <colgroup><col>
        <col width="1">
        </colgroup><tfoot>
            <tr>
    <td style="" class="a-left" colspan="1">
        <strong>Grand Total</strong>
    </td>
    <td style="" class="a-right">
        <strong><span class="price">LKR<?php echo $return['result']['total']['grand_total'];?></span></strong>
    </td>
</tr>
        </tfoot>
        <tbody>
            <tr>
    <td style="" class="a-left" colspan="1">
        Subtotal    </td>
    <td style="" class="a-right">
        <span class="price">LKR<?php echo $return['result']['total']['sub_total'];?></span>    </td>
</tr>
<tr>
    <td style="" class="a-left" colspan="1">
        Tax    </td>
    <td style="" class="a-right">
        <span class="price">LKR<?php echo $return['result']['total']['tax'];?></span>    </td>
</tr>
<tr>
    <td style="" class="a-left" colspan="1">
        Discount    </td>
    <td style="" class="a-right">
        <span class="price">LKR<?php echo $return['result']['total']['discount'];?></span>    </td>
</tr>
<tr>
    <td style="" class="a-left" colspan="1">
        Counpon Value    </td>
    <td style="" class="a-right">
        <span class="price">LKR<?php echo $return['result']['total']['counpon_value'];?></span>    </td>
</tr>
        </tbody>
    </table>
  
<ul class="checkout">           
<li>
    <button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout" onClick="location.href = '<?php echo $this->Url->build('/order/checkout');?>'"><span>Proceed to Checkout</span></button>
</li><br>
<!-- <li><a href="multiple-addresses.html" title="Checkout with Multiple Addresses">Checkout with Multiple Addresses</a>
</li><br> -->
</ul>                
</div><!--inner-->
 </div><!--totals-->
</div> <!--col-sm-4-->


</div> <!--cart-collaterals-->



</div>  <!--cart-->
          
	       </div><!--main-container-->
          
          </div> <!--col1-layout-->
          

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
  