<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<div class="add-to-box add-to-box2">
	<div class="actions-inner">
		<ul class="add-to-links">
			<li><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
			<li><?php echo do_shortcode('[yith_compare_button]');  ?></li>
			<li class="email-friend" title="Share on Facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i> </a></li>
			<li class="email-friend" title="Share on Twitter"><a href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i> </a></li>
			<li class="email-friend" title="Share on Pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>"><i class="fa fa-pinterest"></i> </a></li>
			<li class="email-friend" title="Share on Google Plus"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i> </a></li>
			<li class="email-friend" title="Share on Linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i> </a></li>
		</ul>
	</div>
</div>
<div class="add-to-box add-to-box2">
	<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $available_variations ) ) ?>">
		<?php do_action( 'woocommerce_before_variations_form' ); ?>

		<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
			<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'comilla' ); ?></p>
		<?php else : ?>
			<table class="variations" cellspacing="0">
				<tbody>
					<?php foreach ( $attributes as $attribute_name => $options ) : ?>
						<tr>
							<td class="label clrsz"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?> <sup>*</sup></label></td>
						</tr><tr>
							<td class="value">
								<?php
									$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) : $product->get_variation_default_attribute( $attribute_name );
									wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product ) );
									//wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
									//echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' .esc_html_e( 'Clear', 'comilla' ) . '</a>' ) : '';
								?>
							</td>
						</tr>
			        <?php endforeach;?>
				</tbody>
			</table>

			<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

			<div class="single_variation_wrap">
				<?php
					/**
					 * woocommerce_before_single_variation Hook.
					 */
					do_action( 'woocommerce_before_single_variation' );
					
					/**
					 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
					 * @since 2.4.0
					 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
					 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
					 */
					do_action( 'woocommerce_single_variation' );

					/**
					 * woocommerce_after_single_variation Hook.
					 */
					do_action( 'woocommerce_after_single_variation' );
				?>
			</div>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_after_variations_form' ); ?>
	</form>
</div>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>