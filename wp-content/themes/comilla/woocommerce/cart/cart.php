<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>
<div class="chart-item table-responsive ">
<table class="shop_table shop_table_responsive cart table" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove"><?php esc_html_e('Remove','comilla'); ?></th>
			<th class="product-thumbnail"><?php esc_html_e('Images','comilla'); ?></th>
			<th class="product-name"><?php esc_html_e( 'Product Name', 'comilla' ); ?></th>
			<th class="product-price"><?php esc_html_e( 'Unit Price', 'comilla' ); ?></th>
			<th class="product-quantity"><?php esc_html_e( 'Quantity', 'comilla' ); ?></th>
			<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'comilla' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					<td class="product-remove">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">x</a>',
								esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
								esc_html__( 'Remove this item', 'comilla' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
					</td>

					<td class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $_product->is_visible() ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
							}
						?>
					</td>

					<td class="product-name" data-title="<?php esc_html_e( 'Product', 'comilla' ); ?>">
						<?php
							if ( ! $_product->is_visible() ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
							}

							// Meta data
							//echo WC()->cart->get_item_data( $cart_item );

							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'comilla' ) . '</p>';
							}
						?>
					</td>

					<td class="product-price" data-title="<?php esc_html_e( 'Price', 'comilla' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</td>

					<td class="product-quantity" data-title="<?php esc_html_e( 'Quantity', 'comilla' ); ?>">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0'
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
						?>
					</td>

					<td class="product-subtotal" data-title="<?php esc_html_e( 'Total', 'comilla' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<tr>
			<td colspan="6" class="actions">
				<a href="<?php echo esc_url( home_url('/')); ?>shop/" class="continue-shopping button"><?php esc_html_e('Continue Shopping','comilla'); ?></a>
				<input type="submit" class="button update" name="update_cart" value="<?php esc_attr_e( 'Update Shopping Cart', 'comilla' ); ?>" />

				<a class="button empty-cart" href="<?php global $woocommerce; echo $woocommerce->cart->get_cart_url(); ?>?empty-cart"><?php esc_html_e( 'Clear Shopping Cart', 'comilla' ); ?></a>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			</td>
		</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
</div>
<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>



	<div class="row">
		<div class="cart-shopping-area fix">
			<div class="col-md-4 col-sm-12">
				<div class="calculate-shipping chart-all fix">
					<h4 class="c_title"><?php esc_html_e('Estimate Shipping and Tax','comilla'); ?></h4>
					<p><?php esc_html_e('Enter your destination to get a shipping estimate.','comilla'); ?></p>

					<?php do_action( 'woocommerce_before_shipping_calculator' ); ?>

					<form class="woocommerce-shipping-calculator" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

						<p><a href="#" class="shipping-calculator-button"><?php esc_html_e( 'Calculate Shipping', 'comilla' ); ?></a></p>

						<section class="shipping-calculator-form" style="display:none;">

							<p class="form-row form-row-wide" id="calc_shipping_country_field">
								<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
									<option value=""><?php esc_html_e( 'Select a country&hellip;', 'comilla' ); ?></option>
									<?php
										foreach( WC()->countries->get_shipping_countries() as $key => $value )
											echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
									?>
								</select>
							</p>

							<p class="form-row form-row-wide" id="calc_shipping_state_field">
								<?php
									$current_cc = WC()->customer->get_shipping_country();
									$current_r  = WC()->customer->get_shipping_state();
									$states     = WC()->countries->get_states( $current_cc );

									// Hidden Input
									if ( is_array( $states ) && empty( $states ) ) {

										?><input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / county', 'comilla' ); ?>" /><?php

									// Dropdown Input
									} elseif ( is_array( $states ) ) {

										?><span>
											<select name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / county', 'comilla' ); ?>">
												<option value=""><?php esc_html_e( 'Select a state&hellip;', 'comilla' ); ?></option>
												<?php
													foreach ( $states as $ckey => $cvalue )
														echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . esc_html( $cvalue )  .'</option>';
												?>
											</select>
										</span><?php

									// Standard Input
									} else {

										?><input type="text" class="input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php esc_attr_e( 'State / county', 'comilla' ); ?>" name="calc_shipping_state" id="calc_shipping_state" /><?php

									}
								?>
							</p>

							<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', false ) ) : ?>

								<p class="form-row form-row-wide" id="calc_shipping_city_field">
									<input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<?php esc_attr_e( 'City', 'comilla' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
								</p>

							<?php endif; ?>

							<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>

								<p class="form-row form-row-wide" id="calc_shipping_postcode_field">
									<input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<?php esc_attr_e( 'Postcode / ZIP', 'comilla' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
								</p>

							<?php endif; ?>

							<p><button type="submit" name="calc_shipping" value="1" class="button"><?php esc_html_e( 'Update Totals', 'comilla' ); ?></button></p>

							<?php wp_nonce_field( 'woocommerce-cart' ); ?>
						</section>
					</form>

					<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>

				</div>
			</div>
			
			<div class="col-md-4 col-sm-12">
				<div class="chart-all cart_cupon fix">
					<h4 class="c_title"><?php esc_html_e( 'Discount Codes', 'comilla' ); ?></h4>
					<p><?php esc_html_e( 'Enter your coupon code if you have one.', 'comilla' ); ?></p>
					<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
						<?php if ( wc_coupons_enabled() ) { ?>
							<div class="coupon">
	 							<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" /> 
	 							<hr>
	 							<input type="submit" class="button apply-coupon" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'comilla' ); ?>" />
								<?php do_action( 'woocommerce_cart_coupon' ); ?>
							</div>
						<?php } ?>
					</form>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="shopping-summary chart-all fix">
					<?php do_action( 'woocommerce_cart_collaterals' ); ?>
				</div>
			</div>
		</div><!-- End Cart Shoping Area -->
	</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
