<?php 

namespace Inc;
final class Init{

public static function get_services()
{
$floating_bar_options = get_option( 'floating_bar_option_name' );
 if(!isset($floating_bar_options['enable_0']))
{
 return array(
  Pages\Admin::class,
  Base\Enque::class,
  Base\SettingLinks::class
 
 );
 }
else
{
 return array(
  Pages\Admin::class,
  Base\SettingLinks::class,
  Base\Enque::class,
  Base\FloatingBar::class, 
 );
 } 
}
static function register_services()
 {
 foreach(self::get_services() as $class )
 {
   $service=self::instantiate($class);
   if(method_exists($service,'register'))
   {
   $service->register();
   }
 }
 }
 private static function instantiate($class)
 {
   $service= new $class();
  return  $service;
 }
}
?>