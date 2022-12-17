<?php
/*
  Plugin Name: floatig bar
  Plugin URI: https://github.com/jayoti-pr/wordpress-floating-bar-plugin
  Description: flaoting bar for wordpress
  Version: 1.0
  Author: Jayoti Prakash
  License: GPLv2 or later
  Text Domain: jaytoi
*/
if (file_exists(dirname(__FILE__).'/vendor/autoload.php')){
require_once dirname(__FILE__).'/vendor/autoload.php';
}
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
 Inc\Base\Activate::activate();
}
function deactivate()
{
Inc\Base\Deactivate::deactivate();
}
register_activation_hook(__FILE__,'activate');
register_deactivation_hook(__FILE__,'deactivate');
?>