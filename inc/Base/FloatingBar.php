<?php 
namespace Inc\Base;
session_start();
class FloatingBar{

public function register()
{
if(! isset($_SESSION['agree']))
add_action("wp_head",array($this,'prefix_footer_code'));
}
public function prefix_footer_code()
{
 ?>
 
<div class="fixedbar">
<div class="boxfloat">
 
<ul id="tips">
<button class="btn btn-primary ajax_click">Yes to offer</button>
<button class="btn btn-primary ajax_click">No</button>
<?php echo admin_url('admin-ajax.php'); ?>
</ul>
 
</div>
</div>
<?php

}
}
?>