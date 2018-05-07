<?php 
/**
 * comilla functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package comilla
 */



/**
 * remove woocommerce action
 */
add_action( 'woocommerce_single_product_summary' ,'woocommerce_template_single_price',21 );
add_action( 'woocommerce_before_shop_loop_order', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_after_shop_loop_addtocart','woocommerce_template_loop_add_to_cart',10 );

/**
 * Get current users preference
 * @return int
 */
function comilla_prodcut_per_page(){

    global $woocommerce;

    $default = 12;
    $count = $default;
    $options = comilla_prodcut_per_page_options();

    // capture form data and store in session
    if(isset($_POST['comilla-woocommerce-products-per-page'])){

        // set products per page from dropdown
        $products_max = intval($_POST['comilla-woocommerce-products-per-page']);
        if($products_max != 0 && $products_max >= -1){

        	if(is_user_logged_in()){

        		$user_id = get_current_user_id();
		    	$limit = get_user_meta( $user_id, '_product_per_page', true );

		    	if(!$limit){
		    		add_user_meta( $user_id, '_product_per_page', $products_max);
		    	}else{
		    		update_user_meta( $user_id, '_product_per_page', $products_max, $limit);
		    	}
        	}
            $woocommerce->session->comilla_product_per_page = $products_max;
            return $products_max;
        }
    }

    // load product limit from user meta
    if(is_user_logged_in() && !isset($woocommerce->session->comilla_product_per_page)){

        $user_id = get_current_user_id();
        $limit = get_user_meta( $user_id, '_product_per_page', true );

        if(array_key_exists($limit, $options)){
            $woocommerce->session->comilla_product_per_page = $limit;
            return $limit;
        }
    }

    // load product limit from session
    if(isset($woocommerce->session->comilla_product_per_page)){

        // set products per page from woo session
        $products_max = intval($woocommerce->session->comilla_product_per_page);
        if($products_max != 0 && $products_max >= -1){
            return $products_max;
        }
    }

    return $count;
}
add_filter('loop_shop_per_page','comilla_prodcut_per_page');

/**
 * Fetch list of avaliable options
 * @return array
 */
function comilla_prodcut_per_page_options(){
	$options = apply_filters( 'comilla_prodcut_per_page', array(
		4 => esc_html__('4', 'comilla'),
		8 => esc_html__('8', 'comilla'),
		12 => esc_html__('12', 'comilla'),
		24 => esc_html__('24', 'comilla'),
		48 => esc_html__('48', 'comilla'),
		96 => esc_html__('96', 'comilla')
    ));

	return $options;
}


/**
 * Display dropdown form to change amount of products displayed
 * @return void
 */
function comilla_woocommerce_products_per_page(){
    $options = comilla_prodcut_per_page_options();
    $current_value = comilla_prodcut_per_page();
    ?>
    <div class="limiter">
    	<label><?php esc_html_e('Show','comilla'); ?></label>
        <form action="" method="POST" class="woocommerce-products-per-page">
            <select name="comilla-woocommerce-products-per-page" onchange="this.form.submit()">
            <?php foreach($options as $value => $name): ?>
                <option value="<?php echo esc_attr($value); ?>" <?php selected($value, $current_value); ?>><?php echo esc_html($name); ?></option>
            <?php endforeach; ?>
            </select>
        </form>
        <div class="w_post_per"><?php esc_html_e('per page','comilla'); ?></div>
    </div>
    <?php
}
add_action('woocommerce_before_shop_loop', 'comilla_woocommerce_products_per_page', 25);

// change woocommerce sorting text
function comilla_woocommerce_catalog_orderby( $orderby ) {
    $orderby = str_replace("Default sorting", "Default", $orderby);
    $orderby = str_replace("Sort by popularity", "Popularity", $orderby);
    $orderby = str_replace("Sort by average rating", "Average Rating", $orderby);
    $orderby = str_replace("Sort by newness", "Newness", $orderby);
    $orderby = str_replace("Sort by price: low to high", "Price: low to high", $orderby);
    $orderby = str_replace("Sort by price: high to low", "Price: high to low", $orderby);
	return $orderby;
}
add_filter( "woocommerce_default_catalog_orderby_options", "comilla_woocommerce_catalog_orderby", 20 );
add_filter( "woocommerce_catalog_orderby", "comilla_woocommerce_catalog_orderby", 20 );


// check for empty-cart get param to clear the cart
add_action( 'init', 'comilla_woocommerce_clear_cart_url' );
function comilla_woocommerce_clear_cart_url() {
  global $woocommerce;
	if ( isset( $_GET['empty-cart'] ) ) {
		$woocommerce->cart->empty_cart(); 
	}
}

// woocommerce min cart
function comilla_woocommere_min_cart(){
	global $woocommerce;
?>
	<div class="header-cart">
		<ul>
			<li>
				<a href="<?php echo esc_url( home_url('/') ); ?>cart/">
					<i class="fa fa-shopping-cart"></i>
					<span class="my-cart"><?php esc_html_e('My cart','comilla'); ?> </span>
					<span class="badge"><?php if ( class_exists( 'WooCommerce' ) ) { echo $woocommerce->cart->cart_contents_count; }else{ echo '0'; } ?></span>
				</a>
				<ul>						
					<li>
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<?php
						if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) : 
						foreach ( $woocommerce->cart->cart_contents as $cart_item_key => $cart_item ) :
							$_product = $cart_item['data'];
						if ( $_product->exists() && $cart_item['quantity'] > 0 ) : ?>
							<div class="cart-list cart-list-two">
								<div class="cart-list-item">
									<div class="cart-list-img">
										<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
										<?php echo $_product->get_image(); ?></a>
									</div>
									<div class="cart-content">
										<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>"><?php echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product);?></a>
										<p><?php echo $cart_item['quantity']; ?> <?php echo esc_html__('x', 'comilla');?> <span><?php echo woocommerce_price($_product->get_price());?></span></p>
									</div>
									<div class="cart-button">
										<a href="<?php echo esc_url( home_url('/').'wp-admin/post.php?post='.$cart_item['product_id'].'&action=edit'); ?>"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) );?>"><i class="fa fa-times"></i></a>
									</div>
								</div>
							</div>
						<?php endif;
						endforeach; ?>
							<?php else : ?>
								<p><?php esc_html_e( 'No products in the cart.', 'comilla' ); ?></p>
							<?php endif; 
						if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) {?>
							<div class="cart-subtotal">
								<p><?php esc_html_e('Subtotal','comilla'); ?>: <span><?php echo $woocommerce->cart->get_cart_total();?></span></p>
							</div>
							<div class="cart-action">
								<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><span><?php esc_html_e('checkout','comilla'); ?></span> <i class="fa fa-long-arrow-right"></i></a>
							</div>
						<?php } ?>
					<?php else: ?>
						<p><?php esc_html_e( 'No products in the cart.', 'comilla' ); ?></p>
					<?php endif; ?>	
					</li>				
				</ul>
			</li>
		</ul>
	</div>
	<?php

}



// product item count with ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'comilla_woocommerce_header_add_to_cart_fragment' );
function comilla_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
	ob_start();
	?>
	<div class="header-cart">
		<ul>
			<li>
				<a href="<?php echo esc_url( home_url('/') ); ?>cart/">
					<i class="fa fa-shopping-cart"></i>
					<span class="my-cart"><?php esc_html_e('My cart','comilla'); ?> </span>
					<span class="badge"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span>
				</a>
				<ul>							
					<li>
						<?php
						if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) : foreach ( $woocommerce->cart->cart_contents as $cart_item_key => $cart_item ) :
							$_product = $cart_item['data'];
						if ( $_product->exists() && $cart_item['quantity'] > 0 ) : ?>
							<div class="cart-list cart-list-two">
								<div class="cart-list-item">
									<div class="cart-list-img">
										<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
											<?php echo esc_url($_product->get_image()); ?>
										</a>
									</div>
									<div class="cart-content">
										<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>"><?php echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product);?></a>
										<p><?php echo $cart_item['quantity']; ?> <?php echo esc_html__('x', 'comilla');?> <span><?php echo woocommerce_price($_product->get_price());?></span></p>
									</div>
									<div class="cart-button">
										<a href="<?php echo esc_url( home_url('/').'wp-admin/post.php?post='.$cart_item['product_id'].'&action=edit'); ?>"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) );?>"><i class="fa fa-times"></i></a>
									</div>
								</div>
							</div>
						<?php endif; endforeach; ?>
						<?php else : ?>
							<p><?php esc_html_e( 'No products in the cart.', 'comilla' ); ?></p>
						<?php endif; 

						if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) {?>
							<div class="cart-subtotal">
								<p><?php esc_html_e('Subtotal','comilla'); ?>: <span><?php echo $woocommerce->cart->get_cart_total();?></span></p>
							</div>
							<div class="cart-action">
								<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><span><?php esc_html_e('checkout','comilla'); ?></span> <i class="fa fa-long-arrow-right"></i></a>
							</div>
						<?php } ?>
					</li>					
				</ul>
			</li>
		</ul>
	</div>
	<?php
	$fragments['div.header-cart'] = ob_get_clean();
	return $fragments;
}




if ( ! function_exists( 'wc_dropdown_variation_attribute_options' ) ) {
	function wc_dropdown_variation_attribute_options( $args = array() ) {
		$args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
			'options'          => false,
			'attribute'        => false,
			'product'          => false,
			'selected' 	       => false,
			'name'             => '',
			'id'               => '',
			'class'            => '',
			'show_option_none' => __( '--Please Select--', 'comilla' )
		) );
		$options   = $args['options'];
		$product   = $args['product'];
		$attribute = $args['attribute'];
		$name      = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
		$id        = $args['id'] ? $args['id'] : sanitize_title( $attribute );
		$class     = $args['class'];
		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}
		$html = '<div class="product-select">';
		$html .= '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '">';
		if ( $args['show_option_none'] ) {
			$html .= '<option value="">' . esc_html( $args['show_option_none'] ) . '</option>';
		}
		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				$terms = wc_get_product_terms( $product->id, $attribute, array( 'fields' => 'all' ) );
				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						$html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
					$html .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
				}
			}
		}
		$html .= '</select>';
		$html .= '</div>';
		echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args );
	}
}


function comilla_stock_availability( $html, $availability, $_product ){
    global $post;
    $ccc='';
    $quantity = $_product->get_stock_quantity();
    $availability = $_product->get_availability();
	if($quantity>0){
		$html = '<p class="availability ">Availability: <span class="' . esc_attr( $availability['class'] ). '">' . esc_html( $availability['availability'] ). '</span></p>';
	}else{
		$html = '';
	}

    
    return $html;

}
add_filter( 'woocommerce_stock_html', 'comilla_stock_availability', 10, 3 );



/**
 * compare button modify
 */
if( class_exists( 'YITH_Woocompare_Frontend' ) ) {
class comilla_ComBtn extends YITH_Woocompare_Frontend{

    public function enqueue_scripts() {

        // scripts
        wp_enqueue_script( 'yith-woocompare-main', YITH_WOOCOMPARE_ASSETS_URL . '/js/woocompare.js', array('jquery'), $this->version, true );
        wp_localize_script( 'yith-woocompare-main', 'yith_woocompare', array(
            'ajaxurl'   => WC_AJAX::get_endpoint( "%%endpoint%%" ),
            'actionadd' => $this->action_add,
            'actionremove' => $this->action_remove,
            'actionview' => $this->action_view,
            'added_label' => '',
            'table_title' => esc_html__( 'Product Comparison', 'comilla' ),
            'auto_open' => get_option( 'yith_woocompare_auto_open', 'yes' ),
            'loader'    => YITH_WOOCOMPARE_ASSETS_URL . '/images/loader.gif',
            'button_text' => get_option('yith_woocompare_button_text')
        ));

        // colorbox
        wp_enqueue_style( 'jquery-colorbox', YITH_WOOCOMPARE_ASSETS_URL . '/css/colorbox.css' );
        wp_enqueue_script( 'jquery-colorbox', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.colorbox-min.js', array('jquery'), '1.4.21', true );

        // widget
        if ( is_active_widget( false, false, 'yith-woocompare-widget', true ) && ! is_admin() ) {
            wp_enqueue_style( 'yith-woocompare-widget', YITH_WOOCOMPARE_ASSETS_URL . '/css/widget.css' );
        }
    }

	/**
	 *  Add the link to compare
	 */
	public function add_compare_link( $product_id = false, $args = array() ) {
	    extract( $args );
	    if ( ! $product_id ) {
	        global $product;
	        $product_id = isset( $product->id ) ? $product->id : 0;
	    }
	    // return if product doesn't exist
	    if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
	        return;
	    $is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;
	    if ( ! isset( $button_text ) || $button_text == 'default' ) {
	        $button_text = get_option( 'yith_woocompare_button_text', esc_html__( 'Compare', 'comilla' ) );
	        yit_wpml_register_string( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
	        $button_text = yit_wpml_string_translate( 'Plugins', 'plugin_yit_compare_button_text', $button_text );
	        $button_text = '<i class="fa fa-pie-chart"></i>';
	    }
	    printf( '<a href="%s" class="link-compare %s" id="com_ttl_cng" title="Add to Compare" data-product_id="%d" rel="nofollow">%s</a>', $this->add_product_url( $product_id ), 'compare scom' . ( $is_button == 'button' ? ' button' : '' ), $product_id, $button_text );
	}

    /**
     * Show the html for the shortcode
     */
    public function compare_button_sc( $atts, $content = null ) {
        $atts = shortcode_atts(array(
            'product' => false,
            'type' => 'default',
            'container' => 'yes'
        ), $atts);

        $product_id = 0;
        /**
         * Retrieve the product ID in these steps:
         * - If "product" attribute is not set, get the product ID of current product loop
         * - If "product" contains ID, post slug or post title
         */
        if ( ! $atts['product'] ) {
            global $product;
            $product_id = isset( $product->id ) ? $product->id : 0;
        } else {
            global $wpdb;
            $product = $wpdb->get_row( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE ID = %d OR post_name = %s OR post_title = %s LIMIT 1", $atts['product'], $atts['product'], $atts['product'] ) );
            if ( ! empty( $product ) ) {
                $product_id = $product->ID;
            }
        }
        // if product ID is 0, maybe the product doesn't exists or is wrong.. in this case, doesn't show the button
        if ( empty( $product_id ) ) return;
        ob_start();
        if ( $atts['container'] == 'yes' ) echo '<div class="woocommerce product compare-button">';
        $this->add_compare_link( $product_id, array(
            'button_or_link' => ( $atts['type'] == 'default' ? false : $atts['type'] ),
            'button_text' => empty( $content ) ? 'default' : $content
        ) );
        if ( $atts['container'] == 'yes' ) echo '</div>';
        return ob_get_clean();
    }
}
new comilla_ComBtn();
}