<?php

 
 
add_filter('mce_external_plugins', "wptb_tinyplugin_register");
add_filter('mce_buttons', 'wptb_tinyplugin_add_button', 0);
 
function wptb_tinyplugin_add_button($buttons)
{
    array_push($buttons, "separator", "wptb_tinyplugin");
    return $buttons;
}

function wptb_tinyplugin_register($plugin_array)
{
    $url = plugins_url("/wp-tabular/js/ext/editor_plugin.js");

    $plugin_array['wptb_tinyplugin'] = $url;
    return $plugin_array;
}


function wptb_free_tinymce(){
    global $wpdb;
    if($_GET['wptb_action']!='wptb_tinymce_button') return false;
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title>Download Contrller &#187; Insert Package or Category</title>
<style type="text/css">
*{font-family: Tahoma !important; font-size: 9pt; letter-spacing: 1px;}
select,input{padding:5px;font-size: 9pt !important;font-family: Tahoma !important; letter-spacing: 1px;margin:5px;}
.button{
    background: #7abcff; /* old browsers */

background: -moz-linear-gradient(top, #7abcff 0%, #60abf8 44%, #4096ee 100%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7abcff), color-stop(44%,#60abf8), color-stop(100%,#4096ee)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 ); /* ie */
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
border:1px solid #FFF;
color: #FFF;
}
 
.input{
 width: 340px;   
 background: #EDEDED; /* old browsers */

background: -moz-linear-gradient(top, #EDEDED 24%, #fefefe 81%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(24%,#EDEDED), color-stop(81%,#fefefe)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#EDEDED', endColorstr='#fefefe',GradientType=0 ); /* ie */
border:1px solid #aaa; 
color: #000;
}
.button-primary{cursor: pointer;}
fieldset{padding: 10px;}
</style> 
</head>
<body>    <br>

<fieldset><legend>Embed WP Table</legend>
    <select class="button input" id="fl">
    <?php
    query_posts('post_type=wp-tabular&posts_per_page=1000');
    
    while(have_posts()){ the_post();
   // foreach($res as $row){
    ?>
    
    <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
    
    
    <?php    
        
    }
?>
    </select>
    
    Select Template
    
        <select class="button input" id="ptt">
        <option value="Web2">Web2</option>
        <option value="bluedream">BlueDream</option> 
        <option value="template1">Template1</option>
        <option value="tagbox">Tagbox</option>
        <option value="acuity">Acuity</option> 
        <option value="grey">Grey</option> 
             
        <?php
    
/*$directory = "../wp-content/plugins/wp-tabular/table-templates";

$directory_list = opendir($directory);
while (FALSE !== ($file = readdir($directory_list))){
            // if the filepointer is not the current directory
            // or the parent directory
            if($file != '.' && $file != '..'){
                // we build the new path to scan
                $path = $directory.'/'.$file;
                 if(is_dir($path)){
                     echo "<option value='".$file."'>".$file."</option>";
                 }
            }
}*/ 
    ?>
         
        </select>
        
    <input type="submit" id="addtopost" class="button button-primary" name="addtopost" value="Insert into post" />
</fieldset>   <br>
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo home_url('/wp-includes/js/tinymce/tiny_mce_popup.js'); ?>"></script>
                <script type="text/javascript">
                    /* <![CDATA[ */                    
                    jQuery('#addtopost').click(function(){
                    var win = window.dialogArguments || opener || parent || top;                
                    win.send_to_editor('[ahm-wp-tabular id='+jQuery('#fl').val()+' template='+jQuery('#ptt').val()+']');
                    tinyMCEPopup.close();
                    return false;                   
                    });
                    
                    /*
                    jQuery('#addtopostc').click(function(){
                    var win = window.dialogArguments || opener || parent || top;                
                    win.send_to_editor('{wptb_category='+jQuery('#flc').val()+'}');                   
                    tinyMCEPopup.close();
                    return false;                   
                    });  
                    */          
                  
                </script>

</body>    
</html>
    
    <?php
    
    die();
}
 

add_action('init', 'wptb_free_tinymce');

