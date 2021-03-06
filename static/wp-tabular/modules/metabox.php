<?php
/* Define the custom box */



// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'myplugin_add_custom_box', 1 );

/* Do something with the data entered */


/* Adds a box to the main column on the Post and Page edit screens */
function wptb_add_custom_box() {
    add_meta_box( 'wp-tabular-feature-options', __( 'Packages/Features', 'wppt' ), 'wptb_individual_features', 'wp-tabular', 'normal','core' );
    add_meta_box( 'wp-table-op', __( 'My Other Plugins', 'wppt' ), 'wpwt_plugins', 'wp-tabular', 'side','core' );
   
}

function wpwt_plugins( $post ) {
    ?>
    <a href="http://wpeden.com/" style="width:97%;overflow:hidden;margin:5px;background: #fafafa;border: 1px solid #ccc;display: block;float: left;text-align: center;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;" ><h3 style="margin: 0px;background: #ccc;-webkit-border-top-left-radius: 5px;-webkit-border-top-right-radius: 5px;-moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px;padding:5px;text-decoration: none;color:#333">WordPress Themes & Plugins Collection</h3><img src="http://wpeden.com/wp-content/themes/wp-eden/img/logo.png" /></a>
   <a href="http://www.wpdownloadmanager.com/" style="width:97%;overflow:hidden;margin:5px;background: #fafafa;border: 1px solid #ccc;display: block;float: left;text-align: center;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;" ><h3 style="margin: 0px;background: #ccc;-webkit-border-top-left-radius: 5px;-webkit-border-top-right-radius: 5px;-moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px;padding:5px;text-decoration: none;color:#333">WordPress Download Manager Pro</h3><img src="http://www.wpdownloadmanager.com/wp-content/themes/wpdm/images/icon.png" /></a>
   <a href="http://www.wpmarketplaceplugin.com/" style="width:97%;overflow:hidden;margin:5px;background: #fafafa;border: 1px solid #ccc;display: block;float: left;text-align: center;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;" ><h3 style="margin: 0px;background: #ccc;-webkit-border-top-left-radius: 5px;-webkit-border-top-right-radius: 5px;-moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px;padding:5px;text-decoration: none;color:#333">WordPress Marketplace Plugin</h3><img vspace="12" src="http://wpmarketplaceplugin.com/wp-content/uploads/2011/06/logo2.png" /></a>
   <div style="clear: both;"></div>
    <?php
}


function wptb_individual_features( $post ) {
    global $wptabular_plugin;     
    include($wptabular_plugin->plugin_dir."/tpls/metabox-feature-options.php");
}

function wptb_save_pricing_table( $post_id ) {
     
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( !current_user_can( 'edit_post', $post_id ) ) return;

     
    if($_POST['features'])
    update_post_meta($post_id,'pricing_table_for_post',$_POST['features']);
    if($_POST['features']){
    update_post_meta($post_id,'pricing_table_opt',$_POST['features']);
    update_post_meta($post_id,'pricing_table_opt_feature',$_POST['featured']);
    update_post_meta($post_id,'pricing_table_opt_feature_name',$_POST['feature_name']);
    update_post_meta($post_id,'pricing_table_opt_package_name',$_POST['package_name']); 
    }
  
}

 
add_action( 'add_meta_boxes', 'wptb_add_custom_box');
add_action( 'save_post', 'wptb_save_pricing_table' );  