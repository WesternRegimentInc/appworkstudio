<?php 
function comilla_movers_custom_css(){
	global $comilla;
	
	if(!is_admin()) :
	?>

  
	<?php 
	
		$comilla_menu_text_color						 = '';
		$comilla_menu_text_hover_acive_color						 = '';
		$comilla_sticky_menu_bg_color						 = '';
		$comilla_sticky_menu_text_color						 = '';
		$comilla_sticky_menu_text_hover_acive_color						 = '';
		$comilla_footer_bg_color						 = '';
		$comilla_footer_bottom_bg_color						 = '';
		$comilla_footer_text_color						 = '';
		$comilla_footer_link_color						 = '';
		$comilla_theme_color						 = '';
		$comilla_css_editor						 = '';
		

		if ( isset( $comilla['comilla_menu_text_color'] ) ) {
			$comilla_menu_text_color = esc_attr($comilla['comilla_menu_text_color']);
		}		
		if ( isset( $comilla['comilla_menu_text_hover_acive_color'] ) ) {
			$comilla_menu_text_hover_acive_color = esc_attr($comilla['comilla_menu_text_hover_acive_color']);
		}			
		if ( isset( $comilla['comilla_sticky_menu_bg_color'] ) ) {
			$comilla_sticky_menu_bg_color = esc_attr($comilla['comilla_sticky_menu_bg_color']);
		}		
		if ( isset( $comilla['comilla_sticky_menu_text_color'] ) ) {
			$comilla_sticky_menu_text_color = esc_attr($comilla['comilla_sticky_menu_text_color']);
		}			
		if ( isset( $comilla['comilla_sticky_menu_text_hover_acive_color'] ) ) {
			$comilla_sticky_menu_text_hover_acive_color = esc_attr($comilla['comilla_sticky_menu_text_hover_acive_color']);
		}	
	
		if ( isset( $comilla['comilla_footer_bg_color'] ) ) {
			$comilla_footer_bg_color = esc_attr($comilla['comilla_footer_bg_color']);
		}			
		
		if ( isset( $comilla['comilla_footer_text_color'] ) ) {
			$comilla_footer_text_color = esc_attr($comilla['comilla_footer_text_color']);
		}			

		if ( isset( $comilla['comilla_footer_link_color'] ) ) {
			$comilla_footer_link_color = esc_attr($comilla['comilla_footer_link_color']);
		}			
		if ( isset( $comilla['comilla_theme_color'] ) ) {
			$comilla_theme_color = esc_attr($comilla['comilla_theme_color']);
		}	
		if ( isset( $comilla['comilla_css_editor'] ) ) {
			$comilla_css_editor = esc_attr($comilla['comilla_css_editor']);
		}
	
	
	wp_enqueue_style( 'comilla-custom-css', get_template_directory_uri() . '/assets/css/custom-style.css' );
	
	//add custom css
	$comilla_custom_css = "

		.menu-top li a {
			color: {$comilla_menu_text_color}!important;
		}		
		
		.menu-top li a:hover, #nav li.current a {
			color: {$comilla_menu_text_hover_acive_color}!important;
		}		
		
		.navbar-default.menu-shrink {
			background: {$comilla_sticky_menu_bg_color};
		}		
		.navbar-default.menu-shrink li a {
			color: {$comilla_sticky_menu_text_color}!important;
		}	
		.navbar-default.menu-shrink li a:hover, 
		.navbar-default.menu-shrink #nav li.current a{
			color: {$comilla_sticky_menu_text_hover_acive_color} !important;
		}		
		
		.footer{
			background: {$comilla_footer_bg_color};
		}		
		.footer_copyright{
			color: {$comilla_footer_text_color};
		}		
		.footer_copyright a{
			color: {$comilla_footer_link_color};
		}		
		
		.section-title span,
		.buy_now,
		.btn-portfolio-bg,
		.testimonials .flex-direction-nav a,
		.partner-logo,
		.contact,
		.woocommerce span.onsale,
		.add_to_cat_btn button, 
		.woocommerce a.added_to_cart, 
		.continue-shopping.button, 
		.button.empty-cart, 
		.button.update, 
		.button.apply-coupon, 
		.checkout-button.button.alt.wc-forward, 
		#place_order, 
		.form-row.form-row-last .button, 
		.woocommerce .widget_price_filter .price_slider_amount .button, 
		.shipping-calculator-form .button, form.login .button, 
		form.lost_reset_password .button, 
		#review_form_wrapper #submit,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, 
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range{
			background: {$comilla_theme_color}!important;
		}		
		.topcontrol,
		.woocommerce div.product form.cart .button,
		.woocommerce .product-new,
		.btn-home-bg{
			background: {$comilla_theme_color};
		}			
		.single_service i,
		.our_work_menu ul li:hover, .our_work_menu ul li.active,
		.testimonials .flexslider .testi-slider-item h6,
		.single-address i,
		.single-product-content .price,
		.tab-bar-inner .nav-tabs > li.active > a, 
		.tab-bar-inner .nav-tabs > li.active > a:focus, 
		.tab-bar-inner .nav-tabs > li.active > a:hover,
		.button_group a:hover,
		.button_group #com_ttl_cng:hover,
		.button.yith-wcqv-button:hover,
		.woocommerce div.product p.price, 
		.woocommerce div.product span.price,
		.about_project_details a,
		.sing_link_img a{
			color: {$comilla_theme_color}!important;
		}		
				
		.our_work_menu ul li:hover, .our_work_menu ul li.active,
		.testimonials .flexslider .testi-slider-item img,
		.btn-home-bg
		{
			border-color: {$comilla_theme_color};
		}

		{$comilla_css_editor};
	";
	
	//Add the above custom CSS via wp_add_inline_style
	wp_add_inline_style( 'comilla-custom-css', $comilla_custom_css ); //Pass the variable into the main style sheet ID
	
	
  endif;
}

add_action( 'wp_enqueue_scripts', 'comilla_movers_custom_css'  ) ;


