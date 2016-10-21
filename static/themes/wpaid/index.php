<?php 
get_header(); 
get_sidebar();

//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
	$homeCategory = get_option_tree('home_category',$theme_options); 
	$homeNumber = get_option_tree('home_number',$theme_options); 
}
?>

<div id="main">

<h2 class="entrytitle"><?php echo get_cat_name( $homeCategory ) ?></h2>

<div class="listing">

	<?php
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	$wp_query->query('cat='. $homeCategory .'&showposts='. $homeNumber .'&paged='. $paged .'');
	while ($wp_query->have_posts()) : $wp_query->the_post(); 
	?>
	
		<div <?php post_class(); ?>>
			<?php if (has_post_thumbnail()) { ?>
				<a class="blogThumb" href="<?php the_permalink() ?>"><?php the_post_thumbnail('blog', array('title' => "")); ?></a>
				<div class="postTitle">
			<?php } else { ?>
				<div class="postTitle noImage">
			<?php } ?>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<div class="metaInfo"><?php the_time('F j, Y') ?>&nbsp; / &nbsp;<?php comments_popup_link('No Comments &rsaquo;&rsaquo;', '1 Comment &rsaquo;&rsaquo;', '% Comments &rsaquo;&rsaquo;'); ?></div>
				</div><!--end title-->
		</div><!--end post-->

		<?php endwhile; ?>

		<?php get_template_part("navigation"); ?>

	<?php $wp_query = null; $wp_query = $temp;?>
	
	</div><!--end listing-->

</div><!--end main-->

<?php get_footer(); ?>