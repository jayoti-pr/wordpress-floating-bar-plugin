jQuery(document).on("click",".ajax_click",function(){
jQuery.ajax({                                  
		url: ajax_object.ajaxurl1,
	    type: 'POST',
	    //dataType: 'html',
	   data: {
            action: "register_user_front_end",
            agree : 1,
            new_user_last_name : "pr",
            new_user_email : "jp@gmail.com",            
          },
		
	   success: function(results){            
          	jQuery('.ajax_click').closest(".fixedbar").hide('slow',function(){

					jQuery('.ajax_click').closest(".fixedbar").remove()
				});
		 

          },
          error: function(results) {

          }

	});
        });
		
		//
		 function boxtothetop() {
        var windowTop = $(window)
          .scrollTop();
        var top = $('#boxHere')
          .offset()
          .top;
        if(windowTop > top) {
          $('#boxThis')
            .addClass('box');
          $('#boxHere')
            .height($('#boxThis')
              .outerHeight());
        } else {
          $('#boxThis')
            .removeClass('box');
          $('#boxHere')
            .height(0);
        }
      }
      $(function() {
        $(window)
          .scroll(boxtothetop);
        boxtothetop();
      });