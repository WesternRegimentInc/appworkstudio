<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
					
<div class="shopping-cost-area <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<div class="shopping-cost">
		<div class="shopping-cost-right">
			<p class="floatleft"><?php esc_html_e( 'Sub Total', 'comilla' ); ?></p>
			<p class="floatright"><?php wc_cart_totals_subtotal_html(); ?></p>
		</div>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<div class="shopping-cost-left">
			<p class="floatleft"><b><?php esc_html_e( 'GRAND TOTAL', 'comilla' ); ?></b></p>
			<p class="floatright"><b><?php wc_cart_totals_order_total_html(); ?></b> </p>
		</div>
		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
			
	</div>
					
	<div class="shiping-cart-button">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>
	<a href="#"><?php esc_html_e( 'Checkout with Multiple Addresses', 'comilla' ); ?></a>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
