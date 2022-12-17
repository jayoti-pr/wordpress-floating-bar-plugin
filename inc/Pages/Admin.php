<?php
/*
@package floating_bar
*/
namespace Inc\Pages;
use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController{
public $settings;
public function  __construct()
{
 $this->settings= new SettingsApi();
}
public  function register(){
$pages=[[
 'page_title'=>'floating_bar',
 'menu_title'=>'floating_bar', 
 'capability'=>'manage_options',
 'menu_slug'=>'floating-bar',
 'callback'=>//$this->settings->floating_bar_create_admin_page(),
 array( $this, 'floating_bar_create_admin_page' ),
 //function(){echo'<h1>settingd|</h1>.';},//array($this,'admijn_settings')
 'icon_url'=>'',
 'position'=>110
]];
$this->settings->Addpages($pages)->register();
$this->settings->add_floating_bar_option();
}
public function floating_bar_create_admin_page() {
		$this->floating_bar_options = get_option( 'floating_bar_option_name' ); ?>

		<div class="wrap">
			<h2>floating_bar</h2>
			<p>BAR SETTINGS</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
						settings_fields( 'floating_bar_option_group' );
					do_settings_sections( 'floating-bar-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }
}
?>