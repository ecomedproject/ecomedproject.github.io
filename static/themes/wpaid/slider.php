<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
	$sliderCategory = get_option_tree('slider_category',$theme_options); 
	$sliderNumber = get_option_tree('slider_number',$theme_options); 
}
?>

<div id="menuContainer">

	<div id="pxs_container" class="pxs_container">
			<div class="pxs_bg">
				<div class="pxs_bg1"></div>
			</div>
			<div class="pxs_slider_wrapper">
				<ul class="pxs_slider">
					<?php $showPostsInCategory = new WP_Query(); $showPostsInCategory->query('cat='. $sliderCategory .'&showposts='. $sliderNumber .'');  ?>
					<?php if ($showPostsInCategory->have_posts()) :?>
					<?php while ($showPostsInCategory->have_posts()) : $showPostsInCategory->the_post(); ?>
						<?php $data = get_post_meta( $post->ID, 'key', true ); ?>
						<li><a href="<?php  if ($data[ 'custom_link' ]) { echo $data[ 'custom_link' ];} else { the_permalink(); } ?>"><?php the_post_thumbnail('slider', array('title' => "")); ?></a></li>
					<?php endwhile; endif; ?>
				</ul>
				<ul class="pxs_thumbnails"></ul>
				<div class="pxs_navigation">
					<span class="pxs_next"></span>
					<span class="pxs_prev"></span>
				</div>
			</div>
		</div>


	<div id="menuBox">
		<?php wp_nav_menu(array('theme_location' => 'main', 'container_id' => 'navigation', 'menu_id' => 'dropmenu')); ?>
	</div><!--end menuBox-->

</div><!--end menuContainer-->