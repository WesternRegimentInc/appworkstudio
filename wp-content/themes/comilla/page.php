<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Comilla
 */

get_header(); 
comilla_single_post_banner();
$comilla_page_layout_opt = get_post_meta(get_the_ID(), '_comilla_page_select_option', true);
?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
			<?php if($comilla_page_layout_opt == 2) { ?>
			
				<div class="col-sm-4">
					<?php get_sidebar();?>
				</div>
				
				<div class="col-sm-8">	
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
			
				</div>
				
				<?php }elseif($comilla_page_layout_opt == 3){ ?>
					<div class="col-sm-12">	
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
				
					</div>				
				<?php }else{ ?>
					<div class="col-sm-8">	
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
				
					</div>
					
					<div class="col-sm-4">
						<?php get_sidebar();?>
					</div>				
				<?php } ?>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
