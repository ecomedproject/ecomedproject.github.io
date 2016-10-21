<?php 
get_header(); 
get_sidebar();
?>

<div id="main">

	<h2 class="entrytitle">Search Results</h2>
	
	<?php
		//OptionTree Stuff
		if ( function_exists( 'get_option_tree') ) {
			$theme_options = get_option('option_tree');
			$crumbs = get_option_tree('crumbs_on_off',$theme_options);
		}
		if ($crumbs && function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
		?>

	<div class="listing">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
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

	<?php else : ?>
		<p>Sorry, but you are looking for something that isn't here.</p>
	<?php endif; ?>
	
	</div><!--end listing-->
	
</div><!--end main-->

<?php get_footer(); ?>