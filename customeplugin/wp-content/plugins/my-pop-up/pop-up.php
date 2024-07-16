<?php
/** 
 * Plugin Name: Pop ups
 * Description: Display different popups for different seasons.
 * version: 1.0  
 * Author: Taxal Patel
 * Author URI: https://author.com  
*/
if(!defined('ABSPATH')){
    die();
}

/**
 * Enqueue Scripts
 */

 function popup_scripts(){

    $src_js = plugin_dir_url(__FILE__).'assets/pop-up.js';
    $ver_js = filemtime(plugin_dir_path(__FILE__).'assets/pop-up.js');
    
    $src_css = plugin_dir_url(__FILE__).'assets/pop-up.css';
    $ver_css = filemtime(plugin_dir_path(__FILE__).'assets/pop-up.css');

    wp_enqueue_script('popup-js', $src_js, array('jquery'), $ver_js, true );
    wp_enqueue_style('popup-style', $src_css, '', $ver_css);

 }
 add_action('wp_enqueue_scripts','popup_scripts');
 
 /**
  * Add admin page under settings
  */
 
  function popup_menu_page(){
    include 'admin-page.php';
  }

  function popup_admin_page(){
     add_submenu_page('options-general.php', 'Pop-up', 'Pop-up', 'manage_options','pop-up-menu-page','popup_menu_page');
  }
  add_action('admin_menu','popup_admin_page');

  /**
   * Show the plugin on front-end
   */
 
   function show_popup(){
    ?>
    <div class="popup-wrapper">
        <i class="close">&times;</i>
        <img src="<?php echo plugin_dir_url(__FILE__).'assets/img/'.get_option('pop-up-image','diwali.jpg'); ?>" 
        alt="Popup" width="400">
    </div>
    <?php

}
    add_action('wp_head','show_popup');
 
 
 