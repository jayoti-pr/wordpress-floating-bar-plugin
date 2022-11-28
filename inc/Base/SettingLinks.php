<?php
/*
@package jp_reviews
*/
namespace Inc\Base;
use \Inc\Base\BaseController;
class SettingLinks extends BaseController
{
 public function register()
 {
  
 $plugin = PLUGIN; 
  add_filter("plugin_action_links_$plugin",array($this,'setting_links'));
 }
 public function setting_links($links)
 {
echo'setting linkds';
  $setting_link="<a href='/wp-admin/admin.php?page=jp_reviews_settings'>Settings</a>";
  array_push($links,$setting_link);
  return $links;
 }
}
?>