<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package comilla
 */

$categories_list = get_the_category_list( esc_html__( ', ', 'comilla' ) );
$tags_list = get_the_tag_list( '', esc_html__( ', ', 'comilla' ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single_post_blog">
	<?php if(is_single()){ ?>
		<div class="text-center">
			<?php the_post_thumbnail('comilla_image_840_430', array('class' => 'img-responsive post_image')); ?>
		</div>
		<?php }else{ ?>
		<div class="text-center">	
			<a href="<?php the_permalink();?>" class="single_post_link">
				<?php the_post_thumbnail('comilla_image_840_430', array('class' => 'img-responsive post_image')); ?>
			</a>
		</div>	
		<?php }?>
		
		<header class="entry-header">
			<?php
			if ( is_single() ) :
				
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif; ?>

			
		</header><!-- .entry-header -->
		
		<div class="entry_meta">
			<i class="fa fa-calendar"></i> <?php echo esc_html(get_the_time('F d, Y')); esc_html_e(' - ', 'comilla');?> <i class="fa fa-comments"></i> <?php comments_popup_link( '0 comments', '1 comment', '% comments', 'comments-link', '0'); esc_html_e(' - ' , 'comilla'); if($categories_list){ ?>
			<i class="fa fa-folder-open-o"></i> <?php echo comilla_wp_kses($categories_list); } if($tags_list){ esc_html_e(' - ' , 'comilla'); ?> <i class="fa fa-tags"></i> <?php echo comilla_wp_kses($tags_list); }?>
			
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