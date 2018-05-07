<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

?>

<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="availability ">Availability: <span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span></p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );

?>
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
<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<div class="addtocart">
	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	 	<?php
	 		if ( ! $product->is_sold_individually() ) {
	 			woocommerce_quantity_input( array(
	 				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
	 				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
	 			) );
	 		}
	 	?>

	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	 	<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>
</div>
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
