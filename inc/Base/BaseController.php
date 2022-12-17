<?php
/*
@package floating_bar
*/
namespace Inc\Base;

class BaseController
{
 public $plugin_path;
 public $plugin_url;
 public $plugin;
 public function __construct ()
 {
   $plugin_path=plugin_dir_path(dirname(__FILE__,2));
   $plugin_url=plugin_dir_url(dirname(__FILE__,2));
   $plugin=plugin_basename(dirname(__FILE__,3));
   
 }
}
?>