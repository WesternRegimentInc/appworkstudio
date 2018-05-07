<?php
/**
 * Template Name: VC Template
 *
 * 
 * @package comilla
 */

get_header(); 


?>

		<div id="vc_page_template">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; // End of the loop. ?>
		</div><!-- #main -->

<?php get_footer(); ?>
