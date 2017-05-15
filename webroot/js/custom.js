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
    	jQuery("#address_id").css("display", "block");
        
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
                    url: 'http://localhost/d2dfront/cart/updateAddress',
                    dataType: 'json',
                    data: {
                    	address_id: address_id                        
                    }, 
			        success: function(response) { 
			        	jQuery(".back").show();
			          jQuery("#billing-please-wait").hide();
			          alert(JSON.stringify(response.result));	
			          var address_list=addressDropdown(response.result);
			          alert(address_list);
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
                    url: 'http://localhost/d2dfront/cart/addAddress',
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
			          alert(JSON.stringify(response));
			          var address_list=addressDropdown(response.result);
			          alert(address_list);
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
                url: 'http://localhost/d2dfront/cart/updateDeliveryTime',
                dataType: 'json',
                data: {
                	delivery_date: delivery_date, 
                	delivery_time:delivery_time
                }, 
		        success: function(response) { 
		          jQuery(".back").show();	
		          jQuery("#billing-please-wait").hide();
		          /*alert(JSON.stringify(response)); */
		          next_fs.show(); 
		  		  current_fs.hide();
		  		  current_collored.removeClass("active");
		  		  next_collored.addClass("active");
		        }, 
		        error: function (xhr, status) {  
		        	var err = eval("(" + xhr.responseText + ")");
		        	jQuery("#billing-please-wait").hide();	
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
                url: 'http://localhost/d2dfront/cart/completeCheckout',
                dataType: 'json',                 
		        success: function(response) { 
		          jQuery("#review-please-wait").hide();		     
		          document.getElementById("cart-sidebar").innerHTML="";
		          document.getElementById("total_items").value = 0;
		          jQuery("div#err_3").append("<p style='color:green;'>Checkout compleated</p>");
		          setTimeout(function(){// wait for 5 secs(2)
		        	  location.href = 'http://localhost/d2dfront/user/dashboard';
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
	
});