<?php 
/*
@package floating_bar
*/
namespace Inc\Base;
session_start();
class FloatingBar{
private $floating_bar_options;//
public function __construct()
{
$this->floating_bar_options = get_option( 'floating_bar_option_name' );
}
public function register()
{
if(!isset($_SESSION['agree']))
{ 
if($this->floating_bar_options['position_1']=="top")
add_action("wp_head",array($this,'prefix_footer_code'));
else
add_action("wp_footer",array($this,'prefix_footer_code'));
}
}

public function prefix_footer_code()
{
 ?>
 
 <div class="floating_bar_fixed floating-bar-content">
		<div class="floating_bar_fixed-wrap">
			<div class="floating-bar-content">
				<?php echo wpautop(html_entity_decode($this->floating_bar_options['bar_html_2']));?>				
			</div><?php 
					$floating_bar_btn_text =  isset( $this->floating_bar_options['bar_button_text']) ? stripslashes( $this->floating_bar_options['bar_button_text']) : stripslashes("Got it!");
					$bar_button0=( isset( $this->floating_bar_options['button_0'] ) && $this->floating_bar_options['button_0'] === 'button_0' ) ? true : false;
					$bar_button_link= isset( $this->floating_bar_options['bar_button_link'] ) ? esc_url( get_page_link( $this->floating_bar_options['bar_button_link'] ) )  : '#';
					
				?>
				<ul id="tips">
				<?php if($bar_button0){ ?>
				<button class="btn btn-primary ajax_click1"data-link="<?php echo $bar_button_link;?>"><?php echo $floating_bar_btn_text; ?></button>
				<?php } ?>
				<span class="btn btn-primary ajax_click close-button"aria-label="Dismiss alert"   title="Dont show again!" >&times;</span>
				</ul>		
		</div>	
		</div>
	</div>
 
 <script>
 jQuery(document).ready(function($){
        var bcolor="<?php echo $this->floating_bar_options['bar_background_0'];  ?>";
		var position="<?php echo $this->floating_bar_options['position_1'];  ?>";
		var adminBarHeight = 0;
		if ( $("#wpadminbar").length != 0 ){
			var adminBarHeight = $('#wpadminbar').height();
		}		
		var floating_bar_height = adminBarHeight + jQuery( '.floating_bar_fixed' ).outerHeight();
		if(position=='top'){
		jQuery( 'html' ).attr( 'style', 'margin-top: ' + floating_bar_height + 'px !important' );
		jQuery( '.floating_bar_fixed' ).css({   'top' : '0px',    'background-color' : bcolor});
		}
		else{
		jQuery( 'html' ).attr( 'style', 'margin-bottom: ' + floating_bar_height + 'px !important' );
		jQuery( '.floating_bar_fixed' ).css({   'bottom' : '0px',    'background-color' : bcolor});
		}
		//jQuery( '.floating_bar_fixed' ).css("background-color", bcolor);
	  
});		
</script>
<!---div class="fixedbar">
<div class="boxfloat">
 
<ul id="tips">
<button class="btn btn-primary ajax_click">Yes to offer</button>
<button class="btn btn-primary ajax_click">No</button>
</ul>
 
</div>
</div-->

<?php

}
}
?>