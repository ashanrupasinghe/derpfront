jQuery(document).ready(function () {
	
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
			current_fs = jQuery('#checkout-step-billing');
			next_fs = jQuery('#checkout-step-shipping');
			current_collored = jQuery("#opc-billing");
			next_collored = jQuery("#opc-shipping");
			if(jQuery("#address_id").val()!==""){
				var address_id=jQuery("#address_id").val();
				alert(address_id);
				jQuery("#billing-please-wait").show();
				jQuery.ajax({
					type: 'post',
                    url: 'http://localhost/d2dfront/cart/updateAddress',
                    dataType: 'json',
                    data: {
                    	address_id: address_id                        
                    }, 
			        success: function(response) { 
			          jQuery("#billing-please-wait").hide();
			          alert(JSON.stringify(response)); 
			        }, 
			        error: function (xhr, status) {  
			        	jQuery("#billing-please-wait").hide();			          
			          alert('Unknown error ' + JSON.stringify(xhr)); 
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
			          jQuery("#billing-please-wait").hide();
			          alert(JSON.stringify(response)); 
			        }, 
			        error: function (xhr, status) {  
			        	jQuery("#billing-please-wait").hide();			          
			          alert('Unknown error ' + JSON.stringify(xhr)); 
			        }    
			      });  
			}
			
			
			
			
		}else if(jQuery('#checkout-step-shipping').is(":visible")){
			current_fs = jQuery('#checkout-step-shipping');
			next_fs = jQuery('#checkout-step-review');
			current_collored = jQuery("#opc-shipping");
			next_collored = jQuery("#opc-review");
			jQuery("#shipping-please-wait").show();
						
		}
		
		next_fs.show(); 
		current_fs.hide();
		current_collored.removeClass("active");
		next_collored.addClass("active");
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
	
});