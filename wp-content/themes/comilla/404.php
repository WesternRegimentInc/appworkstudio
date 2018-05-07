<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Comilla
 */

get_header(); 
comilla_404_banner();
?>

	<div id="primary" class="content-area">
			<div class="container">
        <div class="col-sm-8 center-block text-center">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'comilla' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'comilla' ); ?></p>

					<?php
						get_search_form();
		
					?>


				</div><!-- .page-content -->
			</section><!-- .error-404 -->
       	</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
