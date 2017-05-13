jQuery(document).ready(function () {
	
	if(jQuery("#billing-address-select").val()===""){        	
    	jQuery("#billing-new-address-form").css("display", "block");
        
    }	
	jQuery("#billing-address-select").change(function(){
        if(jQuery("#billing-address-select").val()===""){        	
        	jQuery("#billing-new-address-form").css("display", "block");
            
        }else{
        	jQuery("#billing-new-address-form").css("display", "none");
        }
        
    });
	
//
	jQuery(".continue").click(function(){
		if (jQuery('#checkout-step-billing').is(":visible")){
			current_fs = jQuery('#checkout-step-billing');
			next_fs = jQuery('#checkout-step-shipping');
			current_collored = jQuery("#opc-billing");
			next_collored = jQuery("#opc-shipping");
			
		}else if(jQuery('#checkout-step-shipping').is(":visible")){
			current_fs = jQuery('#checkout-step-shipping');
			next_fs = jQuery('#checkout-step-shipping_method');
			current_collored = jQuery("#opc-shipping");
			next_collored = jQuery("#opc-shipping_method");
			
		}else if(jQuery('#checkout-step-shipping_method').is(":visible")){
			current_fs = jQuery('#checkout-step-shipping_method');
			next_fs = jQuery('#checkout-step-payment');
			current_collored = jQuery("#opc-shipping_method");
			next_collored = jQuery("#opc-payment");
			
		}else if(jQuery('#checkout-step-payment').is(":visible")){
			current_fs = jQuery('#checkout-step-payment');
			next_fs = jQuery('#checkout-step-review');
			current_collored = jQuery("#opc-payment");
			next_collored = jQuery("#opc-review");
			
		}
		
		next_fs.show(); 
		current_fs.hide();
		current_collored.removeClass("active");
		next_collored.addClass("active");
	});
	
	jQuery(".back").click(function(){
		if (jQuery('#checkout-step-review').is(":visible")){
			current_fs = jQuery('#checkout-step-review');
			back_fs = jQuery('#checkout-step-payment');
			current_collored = jQuery("#opc-review");
			next_collored = jQuery("#opc-payment");
			
		}else if(jQuery('#checkout-step-payment').is(":visible")){
			current_fs = jQuery('#checkout-step-payment');
			back_fs = jQuery('#checkout-step-shipping_method');
			current_collored = jQuery("#opc-payment");
			next_collored = jQuery("#opc-shipping_method");
			
		}else if(jQuery('#checkout-step-shipping_method').is(":visible")){
			current_fs = jQuery('#checkout-step-shipping_method');
			back_fs = jQuery('#checkout-step-shipping');
			current_collored = jQuery("#opc-shipping_method");
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