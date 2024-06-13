<?php
/** 

* Plugin Name: My Plugin
* Description: This is a test plugin
* Version: 1.1.0
* AUthor: Pathik Patel
* Author URI: https://www.flipkart.com/


*/
if(!defined('ABSPATH')){
    header("Location: /customeplgin");
    die("can't Access");
}

function my_plugin_activation()
{
  //
}
register_activation_hook(__FILE__, 'my_plugin_activation');

function my_plugin_deactivation()
{
    //
}
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

function my_sc_fun(){
    return 'Function Call';
}
add_shortcode('my-sc','my_sc_fun')


?>