<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); 
comilla_shop_archive_banner();
?>

		<div class="shop-product-area">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="shop-product-right">
							<div class="product-tab-area">
								<!-- Tab Bar -->
								<div class="tab-bar">
									<div class="tab-bar-inner">
										<ul class="nav nav-tabs" role="tablist">
											<li class="active"><a href="#shop-product" data-toggle="tab"><i class="fa fa-th-large"></i><?php esc_html_e('Grid','comilla'); ?></a></li>
											<li><a href="#shop-list" data-toggle="tab"><i class="fa fa-th-list"></i><?php esc_html_e('List','comilla'); ?></a></li>
										</ul>
									</div>
									<div class="toolbar">
										<div class="sorter">
											<div class="sort-by">
												<label><?php esc_html_e('Sort By','comilla'); ?></label>
												<?php do_action( 'woocommerce_before_shop_loop_order' ); ?>
											</div>
										</div>
										<div class="pager-list">
											<?php comilla_woocommerce_products_per_page(); ?>
										</div>
									</div>
								</div><!-- End Tab Bar -->
								<div class="tab-content">
									<div class="tab-pane active" id="shop-product">
										<div class="row">
											<!-- Start Single Product Column -->
											<?php if ( have_posts() ) : ?>
												<?php woocommerce_product_loop_start(); ?>
													<?php woocommerce_product_subcategories(); ?>
													<?php while ( have_posts() ) : the_post(); ?>
														<?php wc_get_template_part( 'content', 'product-grid' ); ?>
													<?php endwhile; // end of the loop. ?>
												<?php woocommerce_product_loop_end(); ?>
											<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
												<?php wc_get_template( 'loop/no-products-found.php' ); ?>
											<?php endif; ?><!-- End Single Product Column -->
										</div>
									</div>
									<div class="tab-pane" id="shop-list">
										<!-- Single Shop -->
										<?php if ( have_posts() ) : ?>
											<?php woocommerce_product_loop_start(); ?>
												<?php woocommerce_product_subcategories(); ?>
												<?php while ( have_posts() ) : the_post(); ?>
													<?php wc_get_template_part( 'content', 'product-list' ); ?>
												<?php endwhile; // end of the loop. ?>
											<?php woocommerce_product_loop_end(); ?>
										<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
											<?php wc_get_template( 'loop/no-products-found.php' ); ?>
										<?php endif; ?><!-- End Single Shop -->
									</div>
								</div><!-- End Tab Content -->								
								<div class="tab-bar">
									<div class="toolbar">
										<div class="sorter">
											<div class="sort-by">
												<label><?php esc_html_e('Sort By','comilla'); ?></label>
												<?php do_action( 'woocommerce_before_shop_loop_order' ); ?>
											</div>
										</div>
										<div class="pages">
											<strong><?php esc_html_e('Page','comilla'); ?>:</strong>
											<?php do_action( 'woocommerce_after_shop_loop' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-12">
						<div class="shop-product-left">
							<?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							<?php endif; ?>
						</div>
					</div>					
				</div>
			</div>
		</div>
<?php get_footer( 'shop' ); ?>
