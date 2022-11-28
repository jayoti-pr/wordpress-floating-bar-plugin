
jQuery(document).on("click",".ajax_click",function(){
jQuery.ajax({                                  
		url: ajax_object.ajaxurl1,
	    type: 'POST',
	    dataType: 'html',
	   data: {
            action: "register_user_front_end",
            agree : 'TRUE',
             },
		
	   success: function(data){  
			console.log('hide bar');
          //$target.hide('slow', function(){ $target.remove(); });
		  
				jQuery('.ajax_click').closest(".fixedbar").hide('slow',function(){

					jQuery('.ajax_click').closest(".fixedbar").remove()
				});
				

          },
          error: function(results) {

          }

	});
        });