<?php 
/*
Plugin Name: WP Tabular
Plugin URI: http://wpeden.com/
Description: WordPress Plugin to creating colorful HTML Tables
Author: Shaon
Version: 1.1.8
Author URI: http://wpeden.com/
*/

//error_reporting(0);
 
include_once("libs/class.plugin.php");
 
$wptabular_plugin = new ahm_plugin('wp-tabular');


$wptdir = str_replace('\\','/',dirname(__FILE__));
 

define('WPTDIR',$wptdir);  

 

function wptb_custom_init() 
{
  $labels = array(
    'name' => _x('WP Tables', 'post type general name'),
    'singular_name' => _x('WP Table', 'post type singular name'),
    'add_new' => _x('Add New', 'wp-tabular'),
    'add_new_item' => __('Add New WP Table'),
    'edit_item' => __('Edit WP Table'),
    'new_item' => __('New WP Table'),
    'all_items' => __('All WP Tables'),
    'view_item' => __('View WP Table'),
    'search_items' => __('Search WP Tables'),
    'not_found' =>  __('No WP Table found'),
    'not_found_in_trash' => __('No WP Tables found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'WP Table'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title'),
    'menu_icon' => plugins_url().'/wp-tabular/images/table.gif'
  ); 
  register_post_type('wp-tabular',$args);
}


function wptb_table($params){
     $pid = $params['id'];      
     $template = $params['template']?$params['template']:'WEb2';
     ob_start();      
     include("table-templates/wp-tabular.php"); 
     $data = ob_get_contents();
     ob_clean();
     $shortcode = get_option("_wptb_shortcode",array());       
     if(is_array($shortcode)){
     foreach($shortcode as $c){
         if(in_array(strtolower(end(explode('.',$c))),array('png','jpg','gif','jpeg')))
         $icons[] = "<img src='$c' />";
         else 
         $icons[] = $c;
     }}
     $code=get_option("_wptb_code");
     
     $data = str_replace($code, $icons,$data);
     return $data;
}

function wptb_help(){
    include("tpls/help.php");
}

function wptb_menu(){    
    add_submenu_page('edit.php?post_type=wp-tabular', 'Settings', 'Settings', 'administrator', 'settings', 'wptb_settings');     
}


function wptb_settings(){
    include("tpls/settings.php");
}
function wptb_save_shortcode(){
    update_option('_wptb_shortcode', $_POST['shortcode']);
    update_option('_wptb_code', $_POST['code']); 
}

 
 if(is_admin()){
     add_action("admin_menu","wptb_menu");
 }

wp_enqueue_script("jquery");
wp_enqueue_script("jquery-form");
 
$wptabular_plugin->load_scripts(); 
$wptabular_plugin->load_styles(); 
$wptabular_plugin->load_modules(); 

register_activation_hook(__FILE__,'wptb_install');
add_action('init', 'wptb_custom_init'); 
add_action('wp_ajax_wptb_save_shortcode', 'wptb_save_shortcode'); 


add_shortcode("ahm-wp-tabular",'wptb_table');
 
