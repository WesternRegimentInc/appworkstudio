<?php

	// disable full scren
	vc_add_param( 'vc_row' , array(
	   "type" => "checkbox",
	   "heading" => esc_html__("Enable Container","comilla"),
	   "param_name" => "enable_full_screen",
	"value" => array( esc_html__("Yes", "comilla") => 'yes') ,
	   "description" => ""
	));

	vc_map( 
		array(
			'name' => esc_html__('Service Area', 'comilla'),
			'base' => 'service_area',
			'class' => '',
			'icon' => 'icon-mpc-prod_slider',
			'category' => esc_html__('Comilla Shortcodes', 'comilla'),
			'params' => array(						
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'comilla'),
					'param_name' => 'ser_title',
					'admin_label' => true,
					'value' => 'Our service',
				),					

				array(
					'type' => 'textarea',
					'heading' => esc_html__('Content', 'comilla'),
					'param_name' => 'ser_content',
					'admin_label' => true,
					'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',
				),				
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Number of Post', 'comilla'),
					'param_name' => 'ser_post_number',
					'admin_label' => true,
					'value' => '6',
				),																		
																	
			)
		) 
	); 	
	
	vc_map( 
		array(
			'name' => esc_html__('Buy Now Area', 'comilla'),
			'base' => 'buy_now_area',
			'class' => '',
			'icon' => 'icon-mpc-prod_slider',
			'category' => esc_html__('Comilla Shortcodes', 'comilla'),
			'params' => array(						

				array(
					'type' => 'textarea',
					'heading' => esc_html__('Content', 'comilla'),
					'param_name' => 'button_content',
					'admin_label' => true,
					'value' => 'Want to get start with Comilla?',
				),				
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Button Text', 'comilla'),
					'param_name' => 'button_text',
					'admin_label' => true,
					'value' => 'Contact now',
				),					
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Button Link', 'comilla'),
					'param_name' => 'button_link',
					'admin_label' => true,
					'value' => '#',
				),																		
																	
			)
		) 
	); 			
	
	vc_map( 
		array(
			'name' => esc_html__('Portfolios Area', 'comilla'),
			'base' => 'portfolios_area',
			'class' => '',
			'icon' => 'icon-mpc-prod_slider',
			'category' => esc_html__('Comilla Shortcodes', 'comilla'),
			'params' => array(						

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'comilla'),
					'param_name' => 'port_title',
					'admin_label' => true,
					'value' => 'Latest works',
				),					

				array(
					'type' => 'textarea',
					'heading' => esc_html__('Content', 'comilla'),
					'param_name' => 'port_content',
					'admin_label' => true,
					'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',
				),				
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__('See More Button Text', 'comilla'),
					'param_name' => 'port_button_text',
					'admin_label' => true,
					'value' => 'See More Work',
				),						
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__('See More Button Link', 'comilla'),
					'param_name' => 'port_button_link',
					'admin_label' => true,
					'value' => '#',
				),						
	
			)
		) 
	); 				
	
	
	vc_map( 
		array(
			'name' => esc_html__('Testimonials Area', 'comilla'),
			'base' => 'testimonials_area',
			'class' => '',
			'icon' => 'icon-mpc-prod_slider',
			'category' => esc_html__('Comilla Shortcodes', 'comilla'),
			'params' => array(						

				array(
					'type' => 'attach_image',
					'heading' => esc_html__('Upload Background Image', 'comilla'),
					'param_name' => 'testi_bg_img',
					'admin_label' => true,
				),					
				
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'comilla'),
					'param_name' => 'testi_title',
					'admin_label' => true,
					'value' => 'What clients say',
				),					

				array(
					'type' => 'textarea',
					'heading' => esc_html__('Content', 'comilla'),
					'param_name' => 'testi_content',
					'admin_label' => true,
					'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',
				),				
					
			)
		) 
	); 			

	
	vc_map( 
		array(
			'name' => esc_html__('Team Area', 'comilla'),
			'base' => 'team_area',
			'class' => '',
			'icon' => 'icon-mpc-prod_slider',
			'category' => esc_html__('Comilla Shortcodes', 'comilla'),
			'params' => array(						

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'comilla'),
					'param_name' => 'team_title',
					'admin_label' => true,
					'value' => 'Our lovely team',
				),					

				array(
					'type' => 'textarea',
					'heading' => esc_html__('Content', 'comilla'),
					'param_name' => 'team_content',
					'admin_label' => true,
					'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.',
				),				

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Number of Post', 'comilla'),
					'param_name' => 'team_number_post',
					'admin_label' => true,
					'value' => '4',
				),	
				
			)
		) 
	); 	
	
	
	vc_map( 
		array(
			'name' => esc_html__('Partner Area', 'comilla'),
			'base' => 'partner_area',
			'class' => '',
			'icon' => 'icon-mpc-prod_slider',
			'category' => esc_html__('Comilla Shortcodes', 'comilla'),
			'params' => array(						

			)
		) 
	); 				

	// Parent container
	vc_map( array(
		'name'                    => esc_html__( 'Contact Area' , 'comilla' ),
		'base'                    => 'contact_us_area',
		'icon'                    => 'icon-mpc-prod_slider',
		'as_parent'               => array('only' => 'contact_us_info'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element'         => true,
		'show_settings_on_create' => true,
		'category' => esc_html__('Comilla Shortcodes', 'comilla'),	
		'params'          => array(	
			//BEGIN ADDING PARAMS
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'comilla' ),
				'param_name' => 'contact_title',
				'value' => 'Contact Us'
			),
			//END ADDING PARAMS		
				
			
			//BEGIN ADDING PARAMS
			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Content', 'comilla' ),
				'param_name' => 'contact_content',
				'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru exercit ation Lorem ipsum dolor sit amet.Veniam quis notru exercit.'
			),
			//END ADDING PARAMS							
			
			//BEGIN ADDING PARAMS
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Contact Form7 Shortcode ID', 'comilla' ),
				'param_name' => 'contact_form_shortcode_id',

			),
			//END ADDING PARAMS					
					
		),
		"js_view" => 'VcColumnView'
	) );

	// Nested Element
	vc_map( array(
		'name'            => esc_html__('Contact Info', 'comilla'),
		'base'            => 'contact_us_info',
		'description'     => esc_html__( 'write your contact info here', 'comilla' ),
		'icon'            => 'icon-wpb-row',
		'content_element' => true,
		'as_child'        => array('only' => 'contact_us_area'), // Use only|except attributes to limit parent (separate multiple values with comma)
		'params'          => array(
		
			//BEGIN ADDING PARAMS
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Icon', 'comilla' ),
				'param_name' => 'contact_info_icon',
				'value' => 'fa fa-rocket'

			),
			//END ADDING PARAMS			

			
			//BEGIN ADDING PARAMS
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'comilla' ),
				'param_name' => 'contact_info_title',
				'value' => 'Our Location'

			),
			//END ADDING PARAMS				
			
			//BEGIN ADDING PARAMS
			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Info Text', 'comilla' ),
				'param_name' => 'contact_info_content',
				'value' => '3481 Melrose Place, Beverly Hills <br> CA 90210'

			),
			//END ADDING PARAMS		
	
		),
	) );
	// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
	if(class_exists('WPBakeryShortCodesContainer'))
	{
	   class WPBakeryShortCode_Contact_Us_Area extends WPBakeryShortCodesContainer {
		}
	}
	// Replace Wbc_Inner_Item with your base name from mapping for nested element
	if(class_exists('WPBakeryShortCode'))
	{
	   class WPBakeryShortCode_Contact_Us_Info extends WPBakeryShortCode {
		}
	}		
	
	vc_map( 
		array(
			'name' => esc_html__('Google Map Area', 'comilla'),
			'base' => 'google_map_area',
			'class' => '',
			'icon' => 'icon-mpc-prod_slider',
			'category' => esc_html__('Comilla Shortcodes', 'comilla'),
			'params' => array(						

				array(
					'type' => 'textfield',
					'heading' => esc_html__('API Key', 'comilla'),
					'param_name' => 'map_api_key',
					'admin_label' => true,
					'value' => 'AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU',
				),					

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Latitude', 'comilla'),
					'param_name' => 'map_latitude',
					'admin_label' => true,
					'value' => '40.7127837',
				),				

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Longitude', 'comilla'),
					'param_name' => 'map_longitude',
					'admin_label' => true,
					'value' => '-74.00594130000002',
				),	
				
			)
		) 
	); 	