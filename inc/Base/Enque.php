<?php 
/*
@package floating_bar
*/
namespace Inc\Base;

class Enque{

public function register()
{
add_action("admin_enqueue_scripts",array($this,'enque'));
add_action("wp_enqueue_scripts",array($this,'enqueIscript'));
add_action("init",array($this,'registerSession'));
add_action('wp_ajax_register_user_front_end',array($this,'register_user_front_end') );
add_action('wp_ajax_nopriv_register_user_front_end',array($this,'register_user_front_end') );
}
public function register_user_front_end() {
	if(isset($_POST['agree']) and $_POST['agree'])
	{
	$_SESSION['agree']=true;
	}
	die();
}
public function registerSession()
{
   if ( ! session_id() ) {
        session_start();
    }
}
public function enque($hook_suffix )
{
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'admin_script', PLUGIN_URL.'assets/admin_script.js',  array( 'wp-color-picker' ), false, true  );
}
public function enqueIscript()
{

	wp_enqueue_style('mystyle',PLUGIN_URL.'/assets/floating_bar.css');
	wp_register_script( 'floating_bar',PLUGIN_URL.'assets/floating_bar.js', array('jquery'), '2.5.1' );
     wp_enqueue_script('floating_bar');
	 wp_localize_script( 
    'floating_bar', 
    'ajax_object', 
     array( 'ajaxurl1' => admin_url( 'admin-ajax.php' ) ) 
     );
}
}
?>