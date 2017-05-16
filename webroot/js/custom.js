
jQuery(document).ready(function () {
	
	//Timepicker:::http://jdewit.github.io/bootstrap-timepicker/
	jQuery(".delivery_time").timepicker({
      showInputs: false,
      showMeridian:false,
      defaultTime:'current'
    });

  //Date picker
	jQuery('#delivery_date').datepicker({
      autoclose: true
    });
	
	if(jQuery("#address_id").val()===""){
    	jQuery("#billing-new-address-form").css("display", "block");
        
    }	
	jQuery("#address_id").change(function(){
        if(jQuery("#address_id").val()===""){        	
        	jQuery("#billing-new-address-form").css("display", "block");
            
        }else{
        	jQuery("#billing-new-address-form").css("display", "none");
        }
        
    });
	
//
	jQuery(".continue").click(function(){
		if (jQuery('#checkout-step-billing').is(":visible")){
			//console.log( jQuery("#co-billing-form").serialize() );	
			jQuery(".back").hide();
			current_fs = jQuery('#checkout-step-billing');
			next_fs = jQuery('#checkout-step-shipping');
			current_collored = jQuery("#opc-billing");
			next_collored = jQuery("#opc-shipping");
			
			jQuery("div#err_1").empty();
			if(jQuery("#address_id").val()!==""){
				var address_id=jQuery("#address_id").val();				
				jQuery("#billing-please-wait").show();
				jQuery.ajax({
					type: 'post',
                    url: myBaseUrl+'cart/updateAddress',
                    dataType: 'json',
                    data: {
                    	address_id: address_id                        
                    }, 
			        success: function(response) { 
			        	jQuery(".back").show();
			          jQuery("#billing-please-wait").hide();
			         // alert(JSON.stringify(response.result));	
			          var address_list=addressDropdown(response.result);
			          //alert(address_list);
			          jQuery("#address_id").empty();
			          jQuery("#address_id").append(address_list);
			          next_fs.show(); 
			  		  current_fs.hide();
			  		  current_collored.removeClass("active");
			  		  next_collored.addClass("active");
			        }, 
			        error: function (xhr, status) {  
			        	var err = eval("(" + xhr.responseText + ")");
			        	jQuery(".back").show();
			        	jQuery("#billing-please-wait").hide();			        	
			        	jQuery("div#err_1").append("<p>Something went wrong: "+err.message+"</p>");
			        }    
			      });  
			}else{
				var street_number=jQuery("#street_number").val();
				var street_address=jQuery("#street_address").val();
				var city=jQuery("#city").val();
				var country=jQuery("#country").val();
				var phone_number=jQuery("#phone_number").val();				
				
				jQuery("#billing-please-wait").show();
				jQuery.ajax({
					type: 'post',
                    url: myBaseUrl+'cart/addAddress',
                    dataType: 'json',
                    data: {
                    	street_number: street_number,
                    	street_address: street_address,
                    	city:city,
                    	country:country,
                    	phone_number:phone_number
                    }, 
			        success: function(response) { 
			        	jQuery(".back").show();
			          jQuery("#billing-please-wait").hide();
			          //alert(JSON.stringify(response));
			          var address_list=addressDropdown(response.result);
			         // alert(address_list);
			          jQuery("#address_id").empty();
			          jQuery("#address_id").append(address_list)
			          
			          next_fs.show(); 
			  		  current_fs.hide();
			  		  current_collored.removeClass("active");
			  		  next_collored.addClass("active");
			        }, 
			        error: function (xhr, status) {  
			        	var err = eval("(" + xhr.responseText + ")");
			        	jQuery(".back").show();
			        	jQuery("#billing-please-wait").hide();	
			        	//jQuery("div#err_1").empty();
			        	jQuery("div#err_1").append("<p>Something went wrong: "+err.message+"</p>");
			        }    
			      });  
			}
			
			
		}else if(jQuery('#checkout-step-shipping').is(":visible")){
			jQuery(".back").hide();
			current_fs = jQuery('#checkout-step-shipping');
			next_fs = jQuery('#checkout-step-review');
			current_collored = jQuery("#opc-shipping");
			next_collored = jQuery("#opc-review");
			jQuery("#shipping-please-wait").show();
			jQuery("div#err_2").empty();
			
			var delivery_date=jQuery("#delivery_date").val();
			var delivery_time=jQuery("#delivery_time").val();
			jQuery.ajax({
				type: 'post',
                url: myBaseUrl+'cart/updateDeliveryTime',
                dataType: 'json',
                data: {
                	delivery_date: delivery_date, 
                	delivery_time:delivery_time
                }, 
		        success: function(response) { 
		          jQuery(".back").show();	
		          jQuery("#shipping-please-wait").hide();
		          /*alert(JSON.stringify(response)); */
		          next_fs.show(); 
		  		  current_fs.hide();
		  		  current_collored.removeClass("active");
		  		  next_collored.addClass("active");
		        }, 
		        error: function (xhr, status) {  
		        	var err = eval("(" + xhr.responseText + ")");
		        	jQuery("#shipping-please-wait").hide();	
		        	jQuery(".back").show();
		        	//jQuery("div#err_2").empty();
		        	jQuery("div#err_2").append("<p>Something went wrong: "+err.message+"</p>");
		        }    
		      }); 
						
		
		}else if(jQuery('#checkout-step-review').is(":visible")){
			jQuery(".back").hide();
			current_fs = jQuery('#checkout-step-review');			
			current_collored = jQuery("#opc-review");			
			jQuery("#review-please-wait").show();
			jQuery("div#err_3").empty();
			jQuery.ajax({
				type: 'post',
                url: myBaseUrl+'cart/completeCheckout',
                dataType: 'json',                 
		        success: function(response) { 
		          jQuery("#review-please-wait").hide();		     
		          document.getElementById("fl-mini-cart-content").innerHTML="";
		          document.getElementById("total_items").value = 0;
		          jQuery("div#err_3").append("<p style='color:green;'>Checkout compleated</p>");
		          setTimeout(function(){// wait for 5 secs(2)
		        	  location.href = myBaseUrl+'user/dashboard';
		         }, 2000); 
		          
		          /*alert(JSON.stringify(response)); */
		          //next_fs.show(); 
		  		  //current_fs.hide();
		  		  //current_collored.removeClass("active");
		  		  //next_collored.addClass("active");
		        }, 
		        error: function (xhr, status) { 
		        	var err = eval("(" + xhr.responseText + ")");
		        	jQuery("#review-please-wait").hide();	
		        	jQuery(".back").show();
		        	//jQuery("div#err_3").empty();
		        	jQuery("div#err_3").append("<p>Something went wrong: "+err.message+"</p>");
		        }    
		      }); 
			
		}
		
		/*next_fs.show(); 
		current_fs.hide();
		current_collored.removeClass("active");
		next_collored.addClass("active");*/
	});
	
	jQuery(".back").click(function(){
		if (jQuery('#checkout-step-review').is(":visible")){
			current_fs = jQuery('#checkout-step-review');
			back_fs = jQuery('#checkout-step-shipping');
			current_collored = jQuery("#opc-review");
			next_collored = jQuery("#opc-shipping");
			
		}else if(jQuery('#checkout-step-shipping').is(":visible")){
			current_fs = jQuery('#checkout-step-shipping');
			back_fs = jQuery('#checkout-step-billing');
			current_collored = jQuery("#opc-shipping");
			next_collored = jQuery("#opc-billing");
			
		}
		
		back_fs.show(); 
		current_fs.hide();		
		current_collored.removeClass("active");
		next_collored.addClass("active");
	});
	
	function addressDropdown(responseAddress){
		var i;
		var len;
		var list="";
		for (i = 0; i < responseAddress.length; i++) {
			list +="<option value='"+responseAddress[i].id+"'>"+responseAddress[i].address + "</option>";
			
		}
		list+="<option>New Address</option>";
		return list;
	}
	//remove item from cart
	/*jQuery(".remove-from-cart-jq-function").click(function(){		
		product_id = jQuery(this).parent().find("input[name='product_id']").val();
		alert(product_id);
		
	});*/
	
	jQuery("body").on("click",".remove-from-cart-jq-function", function(){
		product_id = jQuery(this).parent().find("input[name='product_id']").val();
		
		jQuery.confirm({
		    title: 'Confirm!',
		    content: 'Are you sure you would like to remove this item from the shopping cart?',
		    buttons: {
		        confirm: function () {
		        	jQuery.ajax({
		    			type: 'post',
		                url: myBaseUrl+'cart/deleteproduct',
		                dataType: 'json',
		                data: {
		                	product_id: product_id
		                },
		    	        	
		    	         
		    	        	success: function (response) {

	                            if(response.status==0){
	                        	list="";
	                        	table="";
	                        	Totaltable="";
	                           
	                           if(response.result.result.cart_size>=0){
	                           //document.getElementById("total_items").innerHTML = response.result.cart_size;
	                        	   
	                        	   list+='<div class="basket">';
	                        	   list+='<a href="shopping-cart.html"><span id="total_items"> '+response.result.result.cart_size+' </span></a>';
	                        	   list+='</div>';                        	   
	                           }
	                           if(Object.keys(response.result.result.product_list).length>0){
	                        	   //alert(JSON.stringify(response.result.product_list));
	                        	   var count=0;
	                        	   list+='<div class="fl-mini-cart-content" style="display: none;">';
								   list+='<div class="block-subtitle">';
								   list+='<div class="top-subtotal" id="top-sub-total">';									
								   list+=response.result.result.cart_size+' items, <span class="price">$'+response.result.result.total.grand_total+'</span>';
								   list+='</div>';																		
								   list+='</div>';								
								   list+='<ul class="mini-products-list" id="cart-sidebar">';								
	                        	   jQuery.each(response.result.result.product_list, function( index, value ) {
	                            	   
	                        		list+='<li class="item first last">';
	                        		list+='<div class="item-inner">';
	                        		list+='<a class="product-image" title="'+value.name+'" href="#">';
	                        		list+='<img alt="'+value.name+'" src="'+value.image+'"></a>';
	                        		list+='<div class="product-details">';
	                        		list+='<div class="access">';
	                        		list+='<input type="hidden" value="'+value.id+'" name="product_id" class="">';
	                        		list+='<a class="btn-remove1 remove-from-cart-jq-function" title="Remove This Item" href="#">Remove</a>';
	                        		list+='<a class="btn-edit" title="Edit item" href="#">';
	                        		list+='<i class="icon-pencil"></i><span class="hidden">Edit item</span></a>';
	                        		list+='</div>';
										
	                        		list+='<strong>'+value.quantity+'</strong> x <span class="price">'+value.price+'</span>';
	                        		list+='<p class="product-name">';
	                        		list+='<a href="product-detail.html">'+value.name+'</a>';
	                        		list+='</p>';
	                        		list+='</div>';
	                        		list+='</div>';
	                        		list+='</li>';
	                        															   
	  									count++;
									});
									
	                           //document.getElementById("cart-sidebar").innerHTML=list;
	                           //document.getElementById("top-sub-total").innerHTML=response.result.cart_size+' items, <span class="price">$'+response.result.total.grand_total+'</span>';

	                        	  
								
	                           
	                           list+='</ul>';                           
							   list+='<div class="actions">';							
							   list+='<button class="btn-checkout" title="Checkout" type="button" onClick="location.href=\''+myBaseUrl+'/order/checkout\'">';								
							   list+='<span>Checkout</span>';									
							   list+='</button>';								
							   list+='</div>';							
							   list+='</div>';
	                           }
	                        document.getElementById("mini-cart-head").innerHTML=list;   
	                        if(jQuery( "#shopping-cart-table" ).length){
	                        	//cart table
	                        	
	                        	table+='<input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">';
	                        	table+='<fieldset>';
	                        	table+='<table id="shopping-cart-table" class="data-table cart-table table-striped">';
	                        	table+='<colgroup><col width="1"><col><col width="1"><col width="1"><col width="1"><col width="1"><col width="1"></colgroup><thead>';
	                        	table+='<tr class="first last"><th rowspan="1">&nbsp;</th><th rowspan="1"><span class="nobr">Product Name</span></th><th rowspan="1"></th><th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th><th rowspan="1" class="a-center">Qty</th><th class="a-center" colspan="1">Subtotal</th></tr>';
	                        	table+='</thead><tfoot><tr class="first last"><td colspan="50" class="a-right last"><button type="button" title="Continue Shopping" class="button btn-continue" onClick=""><span><span>Continue Shopping</span></span></button><button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button btn-update"><span><span>Update Cart</span></span></button><button type="submit" name="update_cart_action" value="empty_cart" title="Clear Cart" class="button btn-empty" id="empty_cart_button"><span><span>Clear Cart</span></span></button></td></tr></tfoot>';
	                        	table+='<tbody>';
	                        	productcount=1;
	                        	jQuery.each(response.result.result.product_list, function( index, value ) {
	                        		trclass="odd";
	                        		if(productcount==1){
	                        			trclass+=" first last"
	                        		}
	                        		if(Object.keys(response.result.result.product_list).length==productcount){
	                        			trclass+=" last"
	                        		}
	                        		table+= '<tr class="'+trclass+'">'
	                        	    table+= '<td class="image hidden-table"><a href="product-detail.html" title="'+value.name+'" class="product-image"><img src="'+value.image+'" width="75" alt="'+value.name+'"></a></td>';
	                        	    table+= '<td>';
	                        	    table+= '<h2 class="product-name">';
	                        	    table+= '<a href="product-detail.html">'+value.name+'</a>';
	                        	    table+= '</h2>';
	                        	    table+= '</td>';
	                        	    table+= '<td class="a-center hidden-table">';
	                        	    table+= '<a href="#" class="edit-bnt" title="Edit item parameters"></a>';
	                        	    table+= '</td>';
	                        	    table+= '<td class="a-right hidden-table">';
	                        	    table+= '<span class="cart-price">';
	                        	    table+= '<span class="price">$'+value.price+'</span>';                
	                        	    table+= '</span>';
                                    table+= '</td>';
	                                table+= '<td class="a-center movewishlist">';
	                                table+= '<input name="cart[26340][qty]" value="'+value.quantity+'" size="4" title="Qty" class="input-text qty" maxlength="12">';
	                        	    table+= '</td>';
	                        	    table+= '<td class="a-right movewishlist">';
	                        	    table+= '<span class="cart-price">';
	                        	    table+= '<span class="price">$'+value.total+'</span>';                            
	                        	    table+= '</span>';
	                        	    table+= '</td>';
	                        	    table+= '<td class="a-center last">';
	                        		table+='<input type="hidden" value="'+value.id+'" name="product_id" class="">';
	                        	    table+= '<a href="#" title="Remove item" class="button remove-item remove-from-cart-jq-function"><span><span>Remove item</span></span></a></td>';
     	                        	table+='</tr> ';     	                        	
	                        		productcount++;
	                        	});
	                        		                        	
	                        	table+='</tbody></table></fieldset>';
	                        	
	                        	Totaltable+='<colgroup><col>';
	                            Totaltable+='<col width="1">';
	                            Totaltable+='</colgroup><tfoot>';
	                            Totaltable+='<tr>';
	                            Totaltable+='<td style="" class="a-left" colspan="1"><strong>Grand Total</strong></td>';
	                            Totaltable+='<td style="" class="a-right"><strong><span class="price">$'+response.result.result.total.grand_total+'</span></strong></td>';    
	                        	Totaltable+='</tr>';
	                            Totaltable+='</tfoot>';
	                            Totaltable+='<tbody>';
	                            Totaltable+='<tr>';
	                            Totaltable+='<td style="" class="a-left" colspan="1"> Subtotal</td>';
	                            Totaltable+='<td style="" class="a-right"><span class="price">$'+response.result.result.total.sub_total+'</span></td>';
	                        	Totaltable+='</tr>';
	                        	Totaltable+='<tr>';
	                            Totaltable+='<td style="" class="a-left" colspan="1">  Tax    </td>';
	                            Totaltable+='<td style="" class="a-right"> <span class="price">$'+response.result.result.total.tax+'</span></td>';
	                            Totaltable+='</tr>';
	                            Totaltable+='<tr>';
	                            Totaltable+='<td style="" class="a-left" colspan="1">     Discount    </td>';
	                            Totaltable+='<td style="" class="a-right"><span class="price">$'+response.result.result.total.discount+'</span>    </td>';
	                            Totaltable+='</tr>';
	                            Totaltable+='<tr>';
	                            Totaltable+='<td style="" class="a-left" colspan="1">        Counpon Value    </td>';
	                            Totaltable+='<td style="" class="a-right"><span class="price">$'+response.result.result.total.counpon_value+'</span>    </td>';
	                            Totaltable+='</tr>';
	                            Totaltable+='</tbody>';
	                            if(Object.keys(response.result.result.product_list).length>0){
	                        	document.getElementById("get-checkot-table-form").innerHTML=table;
	                            }else{
	                            	document.getElementById("get-checkot-table-form").innerHTML="nothing found";
	                            }
	                        	document.getElementById("shopping-cart-totals-table").innerHTML=Totaltable;
	                        	
	                        }   
							//alert(list);
							
							
	                        }
	                         
	                        jQuery.alert(response.message);
	                        },
		    	         
		    	         
		    	        error: function (xhr, status) { 
		    	        	//err = eval("(" + xhr.responseText + ")");
		    	        	//jQuery("div#err_3").append("<p>Something went wrong: "+err.message+"</p>");
		    	        	jQuery.alert("Something went wrong: "+JSON.stringify(xhr));
		    	        }    
		    	      }); 
		        },
		        cancel: function () {
		        	//jQuery.alert('CANCEL');
		        	return;
		        }
		    }
		});
		
		
		
		
		
		
		
		});
	
});
//https://craftpip.github.io/jquery-confirm/#ajaxloading