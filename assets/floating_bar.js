jQuery(document).on("click",".ajax_click",function(){
jQuery.ajax({                                  
		url: ajax_object.ajaxurl1,
	    type: 'POST',
	    //dataType: 'html',
	   data: {
            action: "register_user_front_end",
            agree : 1,           
          },
		
	   success: function(results){            
          	jQuery('.ajax_click').closest(".floating_bar_fixed").hide('slow',function(){

					jQuery('.ajax_click').closest(".floating_bar_fixed").remove();
					jQuery( 'html' ).removeAttr("style");
				});
		 

          },
          error: function(results) {

          }

	});
        });
jQuery(document).on("click",".ajax_click1",function(){
 window.location.href = jQuery('.ajax_click1').attr('data-link');
});		
		
		//
		