<div class="clear"></div>
</div><!--end content-->
</div><!--end contentContainer-->

<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
	$carouselCategory = get_option_tree('carousel_category',$theme_options); 
	$carouselNumber = get_option_tree('carousel_number',$theme_options); 
	$carouselOnOff = get_option_tree('carousel_on_off',$theme_options);
	$backTop = get_option_tree('back_top',$theme_options);
	$speed = get_option_tree('speed',$theme_options);
}

if($carouselOnOff){?>
<div id="carouselContainer">
<h2 id="sponsorsTitle"><?php echo get_cat_name( $carouselCategory ) ?></h2>
<ul id="carousel">
	<?php $showPostsInCategory = new WP_Query(); $showPostsInCategory->query('cat='. $carouselCategory .'&showposts='. $carouselNumber .'');
	if ($showPostsInCategory->have_posts()) : while ($showPostsInCategory->have_posts()) : $showPostsInCategory->the_post();?>
		<li>
			<?php $data = get_post_meta( $post->ID, 'key', true ); ?>
			<a href="<?php  if ($data[ 'custom_link' ]) { echo $data[ 'custom_link' ];} else { the_permalink(); } ?>">
				<?php the_post_thumbnail('sponsor', array('title' => "")); ?>
			</a>
		</li>
	<?php endwhile; endif; ?>
</ul><!--end carousel-->
</div><!--end carouselContainer-->
<?php } ?>

<div id="footerContainer">
<div id="footer">  
	
	<?php wp_nav_menu(array('theme_location' => 'footer', 'container_id' => 'footerMenu', 'menu_id' => 'footerDrop', 'depth' => '1')); ?>
	
	<div id="copyright">
	&copy; <?php echo date("Y "); bloginfo('name'); ?>. The EcoMed Project, established in 2007, is a not-for-profit organization by affiliation with the Watoto Charitable Trust, an IRS approved, 501(c)3 organization.
	</div>
	
	<?php if($backTop) { echo '<a href="#" id="backToTop">TOP</a>'; }?>

</div><!--end footer-->
</div><!--end footerContainer-->

<script src="<?php bloginfo('template_url'); ?>/scripts/scripts.js"></script>
<script>
jQuery.noConflict(); jQuery(document).ready(function(){
	molitorscripts();
	
	//SLIDER
	jQuery('#pxs_container').parallaxSlider({auto:<?php echo $speed;?>});
});
</script>
<?php wp_footer(); ?>

</body>
</html>