<?php
/*
  Plugin Name: floatig bar
  Plugin URI: https://akismet.com/
  Description: flaoting bar for wordpress
  Version: 1.0
  Author: Jayoti Prakash
  License: GPLv2 or later
  Text Domain: jaytoi
*/
if (file_exists(dirname(__FILE__).'/vendor/autoload.php')){
require_once dirname(__FILE__).'/vendor/autoload.php';
}
use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Init;
defined('ABSPATH')or die('cannot accessthis location');

 define('PLUGIN_PATH',plugin_dir_path(__FILE__));
define('PLUGIN_URL',plugin_dir_url(__FILE__));

define('PLUGIN',plugin_basename(__FILE__)); 
if(class_exists('Inc\\Init'))
{
 Inc\Init::register_services();
}
function activate()
{
 Activate::activate();
}
function deactivate()
{
Deactivate::deactivate();
}
register_activation_hook(__FILE__,'activate');
register_deactivation_hook(__FILE__,'deactivate');
  

  
/* add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts');
function callback_for_setting_up_scripts() 
{
     
     wp_register_script( 'custom_jquery',PLUGIN_URL.'assets/custom-jquery.js', array('jquery'), '2.5.1' );
     wp_enqueue_script('custom_jquery');
	 wp_localize_script( 
    'custom_jquery', 
    'ajax_object', 
     array( 'ajaxurl1' => admin_url( 'admin-ajax.php' ) ) 
     );
}

/////////
 add_action('wp_ajax_register_user_front_end', 'register_user_front_end', 0);
add_action('wp_ajax_nopriv_register_user_front_end', 'register_user_front_end');
function register_user_front_end() {}
 */
 
?>