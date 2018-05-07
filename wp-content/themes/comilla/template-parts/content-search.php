<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Comilla
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single_post_blog">
		<header class="entry-header">
			<?php
			if ( is_single() ) :
				
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif; ?>

			
		</header><!-- .entry-header -->
		
		<div class="entry_meta">
			<i class="fa fa-calendar"></i> <?php echo esc_html(get_the_time('F d, Y')); ?>
			
		</div>
		
		<div class="entry-content">
			<?php
			if(!is_single()){
				the_excerpt();
			}else{
				the_content();
			}
				
			if(!is_single()){ ?>
				<a class="btn-portfolio-bg" href="<?php the_permalink();?>"><?php esc_html_e('Read More' , 'comilla');?> </a>
		<?php	}
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'comilla' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->