<?php 
get_header(); 
get_sidebar();
?>

<div id="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<h2 class="entrytitle"><?php the_title(); ?></h2>
	
	<?php
		//OptionTree Stuff
		if ( function_exists( 'get_option_tree') ) {
			$theme_options = get_option('option_tree');
			$crumbs = get_option_tree('crumbs_on_off',$theme_options);
		}
		if ($crumbs && function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
		?>
	
		<div class="entry">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>				
		<br />
							
			
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
 
	<div class="clear"></div>
	<?php endwhile; endif; ?>
		
    <div id="commentsection">
	<?php comments_template(); ?>
    </div>

	
</div><!--end main-->

<?php get_footer(); ?>