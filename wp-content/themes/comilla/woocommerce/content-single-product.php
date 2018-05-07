<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('single-product-detaisl-area'); ?>>
	<!-- Single Product View Area -->
	<div class="product-view-area">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12 single-procuct-left">
					<div class="single-procuct-view">
						<?php
							/**
							 * woocommerce_before_single_product_summary hook.
							 *
							 * @hooked woocommerce_show_product_sale_flash - 10
							 * @hooked woocommerce_show_product_images - 20
							 */
							do_action( 'woocommerce_before_single_product_summary' );
						?>
					</div>
				</div>
				<div class="col-md-7 col-xs-12">
					<div class="single-product-content-view">
						<?php 
							/**
							 * woocommerce_single_product_summary hook.
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_rating - 10
							 * @hooked woocommerce_template_single_price - 10
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked woocommerce_template_single_add_to_cart - 30
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 */
							do_action( 'woocommerce_single_product_summary' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="single-product-description">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="product-description-tab">
						<!-- tab bar -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#product-des" data-toggle="tab"><?php esc_html_e('Product Description','comilla'); ?></a></li>
							<li><a href="#product-rev" data-toggle="tab"><?php esc_html_e('Reviews','comilla'); ?></a></li>
							<li><a href="#product-tag" data-toggle="tab"><?php esc_html_e('Additional Information','comilla'); ?></a></li>
						</ul>
						<!-- Tab Content -->
						<div class="tab-content">
							<div class="tab-pane active" id="product-des">
								<?php wc_get_template( 'single-product/tabs/description.php' ); ?>
							</div>
							<div class="tab-pane" id="product-rev">
								<?php wc_get_template( 'single-product-reviews.php' ); ?>
							</div>
							<div class="tab-pane" id="product-tag">
								<?php wc_get_template( 'single-product/tabs/additional-information.php' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Upsell Product area area -->


	<?php 
	$comilla_related = $product->get_related( $posts_per_page );
	$comilla_args2 = apply_filters( 'woocommerce_related_products_args', array(
		'post_type'            => 'product',
		'ignore_sticky_posts'  => 1,
		'no_found_rows'        => 1,
		'posts_per_page'       => 4,
		'post__in'             => $comilla_related,
		'post__not_in'         => array( $product->id )
	) );
	 $comilla_relatd = new WP_Query( $comilla_args2 );
	 if ( $comilla_relatd->have_posts() ) :  ?>
		<div class="related-product-area">
			<div class="container">
				<div class="row">
					<!-- Brand Product Column -->
					<div class="col-md-12">
						<div class="brand-products c-carousel-button">
							<div class="row">
								<div class="col-md-12">
									<div class="products-head">
										<div class="products-head-title">
											<h2><?php esc_html_e('Related Products','comilla'); ?></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<!-- Single Product Carousel-->
								<div id="single-product-related" class="">

									<?php while ( $comilla_relatd->have_posts() ) : $comilla_relatd->the_post(); ?>

										<!-- Start Single Product Column-->
										<div class="col-md-3">
											<div class="single-product">
												<div class="single-product-img">
													<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail('comilla-upsel-related', array('class' => 'primary-img')); ?>
													</a>
													<?php if ( $product->is_on_sale() ) : ?>
														<div class="product-status">
															<span class="product-new"><?php esc_html_e('New','comilla'); ?></span>
														</div>
													<?php endif; ?>
												</div>
												<div class="single-product-content another-content another-content-2">
													<div class="ratings">
														<div class="rating-box">
															<?php wc_get_template( 'single-product/rating.php' ); ?>
														</div>
													</div>
													<div class="product-content-head">
														<h2 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
														<p class="product-price"><?php wc_get_template( 'single-product/price.php' ); ?></p>
													</div>
												</div>
											</div>
										</div><!-- End Single Product Column -->

									<?php endwhile; ?>

								</div><!-- End Single Product Carousel -->
							</div>
						</div>
					</div><!-- End Brand Products Column -->
				</div>
			</div>
		</div><!-- End Related Product area -->
	<?php endif;  ?>
</div><!-- #product-<?php the_ID(); ?> -->


<?php do_action( 'woocommerce_after_single_product' ); ?>
