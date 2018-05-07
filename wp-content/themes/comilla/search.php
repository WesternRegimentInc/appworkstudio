<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Comilla
 */

get_header(); 
comilla_search_banner();
?>
	
	<section id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">	
		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
	</section><!-- #primary -->

<?php

get_footer();
