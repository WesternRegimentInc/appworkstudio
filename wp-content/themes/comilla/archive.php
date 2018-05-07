<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Comilla
 */

get_header(); 
comilla_archive_banner();
?>


	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
				
					<?php
					if ( have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						the_posts_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
		
				</div>
				
				<div class="col-sm-4">
					<?php get_sidebar();?>
				</div>
				
			</div>
		</div>
	</div><!-- #primary -->

<?php

get_footer();
