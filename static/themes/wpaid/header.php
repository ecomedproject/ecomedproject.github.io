<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" /> 

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/scripts/prettyPhoto.css" type="text/css" media="screen" />-->

<?php
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$linkColor = get_option_tree('link_color',$theme_options);
	$linkHoverColor = get_option_tree('link_hover_color',$theme_options);
	$bannerTop = get_option_tree('banner_top',$theme_options);
	$bannerBottom = get_option_tree('banner_bottom',$theme_options);
	$logo = get_option_tree('logo',$theme_options); 
	$map = get_option_tree('map',$theme_options); 
	$tagline = get_option_tree('tagline',$theme_options); 
	$css = get_option_tree('css',$theme_options);
	$alertOnOff = get_option_tree('alert_on_off',$theme_options);
	$alertContent = get_option_tree('alert_content',$theme_options);
	$layout = get_option_tree('layout',$theme_options);
	$twoColumn = get_option_tree('two_column',$theme_options);
} 
?>

<style type="text/css">
	a,
	#footerDrop li.action a {color: <?php echo $linkColor; ?>;}

	a:hover {color: <?php echo $linkHoverColor; ?>;}
	
	#menuContainer {
		background: <?php echo $bannerBottom; ?>;
		background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $bannerTop; ?>), to(<?php echo $bannerBottom; ?>));
		background: -moz-linear-gradient(top, <?php echo $bannerTop; ?>,  <?php echo $bannerBottom; ?>);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $bannerTop; ?>', endColorstr='<?php echo $bannerBottom; ?>');
	}
	<?php if ($map){ ?> 
	#mapBox,
	.pxs_bg .pxs_bg1 {background:transparent url(<?php bloginfo('template_url');?>/images/map.png) repeat-x center center;}
	<?php } ?>
	
	<?php if ($css){ echo $css; }?>
</style>

<?php 
wp_deregister_script('jquery');
wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"), false, '');
wp_enqueue_script('jquery');
wp_head(); 
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
?>

<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->

</head>

<body <?php body_class();?>>

<div id="headerContainer">
	
	<div id="header">
	
		<a id="logo" href="<?php bloginfo('url')?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" /></a><!--end logo-->    
		
		<?php if($tagline) { echo '<h1 id="description">'.get_bloginfo('description').'</h1>'; } ?>
	
		<?php get_template_part('searchform');?>
	
	</div><!--end header-->
</div><!--end headerContainer-->	

<?php if(is_front_page()){ get_template_part('slider'); } else { get_template_part('menu');}?>

<div id="contentContainer">
	<div id="content" class="<?php if($layout){echo $layout;} else { echo "middle"; } if($twoColumn){echo " twoColumn";} ?>">
	
	<?php if($alertOnOff){ ?>
	<div id="alert">
		<a id="closeAlert" href="#">X</a>
		<div id="ex"><img src="<?php bloginfo('template_url');?>/images/!.png" alt="!" /></div>
		<p><?php echo $alertContent; ?></p>
	</div>
	<?php } ?>