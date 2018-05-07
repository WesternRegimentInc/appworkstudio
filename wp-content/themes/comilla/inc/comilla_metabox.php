<?php


add_action( 'cmb2_init', 'comilla_metabox_options' );

function comilla_metabox_options(){
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_comilla_';


	// Page Options	


	$cmb2_page_options = new_cmb2_box( array(
		'id'           => $prefix . 'page_option',
		'title'        => esc_html__( 'Page Options', 'comilla' ),
		'object_types' => array( 'page'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_page_options->add_field( array(
	    'id'               => $prefix .'page_select_option',
	    'desc'             => esc_html__( 'select here ','comilla' ),
		 'type'             => 'select',
			'options'          => array(
				'1' => esc_html__( 'Right Sidebar', 'comilla' ),
				'2' => esc_html__( 'Left Sidebar', 'comilla' ),
				'3' => esc_html__( 'Full Width', 'comilla' ),
			),		 
	) );
	
	$cmb2_post_1_options = new_cmb2_box( array(
		'id'           => $prefix . 'p1banner_option',
		'title'        => esc_html__( 'Upload Banner Image', 'comilla' ),
		'object_types' => array( 'page' , 'post', 'portfolios'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_post_1_options->add_field( array(
	    'id'               => $prefix .'upload_banner_image',
	    'desc'             => esc_html__( 'Please upload banner image here ','comilla' ),
		 'type'             => 'file',
	) );	

	//Post Options	
	$cmb2_service_options = new_cmb2_box( array(
		'id'           => $prefix . 'service_option',
		'title'        => esc_html__( 'Service Options', 'comilla' ),
		'object_types' => array( 'service'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );	


	$cmb2_service_options->add_field( array(
	    'name'             => esc_html__('Icon' , 'comilla'),
	    'id'               => $prefix .'serv_icon',
		'desc'    => esc_html__('enter icon name here like - fa fa-keyboard-o' , 'comilla'),
	    'type'    => 'text',
	    'default'    => 'fa fa-keyboard-o',
	) );	
	
	//Post Options	
	$cmb2_post_options = new_cmb2_box( array(
		'id'           => $prefix . 'posts_option',
		'title'        => esc_html__( 'Post Options', 'comilla' ),
		'object_types' => array( 'post'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );		
	
	$cmb2_post_options->add_field( array(
	    'name'             => esc_html__('Audio / Video Post Embed Code ' , 'comilla'),
	    'id'               => $prefix .'vid_post_title',
	    'type'    => 'title',
	) );		
	
	$cmb2_post_options->add_field( array(
	    'name'             => esc_html__('Embed Code' , 'comilla'),
	    'id'               => $prefix .'embed_code',
		'desc'    => esc_html__('enter embed code here' , 'comilla'),
	    'type'    => 'textarea_code',
	) );		
	

	$cmb2_pricing = new_cmb2_box( array(
		'id'           => $prefix . 'client_options',
		'title'        => esc_html__( 'Pricing Info', 'comilla' ),
		'object_types' => array( 'pricing'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_pricing->add_field( array(
		'name'             => esc_html__('Feature Pricing' , 'comilla'),
		'id'               => $prefix .'pricing_feature_item',
		'desc'             => esc_html__( 'write text here','comilla' ),
		'type'             => 'checkbox',
		'default'    => '0',
	) );	
	
	$cmb2_pricing->add_field( array(
		'name'             => esc_html__('Pricing Term' , 'comilla'),
		'id'               => $prefix .'pricing_term',
		'desc'             => esc_html__( 'write text here','comilla' ),
		'type'             => 'text',
		'default'    => 'For freelancers',
	) );		
	
	$cmb2_pricing->add_field( array(
		'name'             => esc_html__('Pricing Currency' , 'comilla'),
		'id'               => $prefix .'pricing_currency',
		'desc'             => esc_html__( 'write text here','comilla' ),
		'type'             => 'text',
		'default'    => '$',
	) );			
	
	$cmb2_pricing->add_field( array(
		'name'             => esc_html__('Pricing Amount' , 'comilla'),
		'id'               => $prefix .'pricing_amount',
		'desc'             => esc_html__( 'write text here','comilla' ),
		'type'             => 'text',
		'default'    => '20',
	) );	
	
	$cmb2_pricing->add_field( array(
		'name'             => esc_html__('Pricing Period' , 'comilla'),
		'id'               => $prefix .'pricing_period',
		'desc'             => esc_html__( 'write text here','comilla' ),
		'type'             => 'text',
		'default'    => 'month',
	) );		
	$pricing_group_field_id = $cmb2_pricing->add_field( array(
		'id'          => $prefix .'prcing_group_field_opt',
		'type'        => 'group',
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => esc_html__( 'Feature {#}', 'comilla' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add New Feature', 'comilla' ),
			'remove_button' => esc_html__( 'Remove Feature', 'comilla' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb2_pricing->add_group_field( $pricing_group_field_id, array(
		'name' => esc_html__('Single Feature' , 'comilla'),
		'id'   => $prefix .'single_feature',
		'type' => 'text',
		'default' => '10 presentations/month',
		'description' => esc_html__('write text here' , 'comilla'),
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb2_pricing->add_field( array(
		'name'             => esc_html__('Button Text' , 'comilla'),
		'id'               => $prefix .'pricing_btn_text',
		'desc'             => esc_html__( 'write text here','comilla' ),
		'type'             => 'text',
		'default'    => 'Choose plan',
	) );		
	$cmb2_pricing->add_field( array(
		'name'             => esc_html__('Button Link' , 'comilla'),
		'id'               => $prefix .'pricing_btn_link',
		'desc'             => esc_html__( 'write text here','comilla' ),
		'type'             => 'text',
		'default'    => '#',
	) );		
	$cmb2_team = new_cmb2_box( array(
		'id'           => $prefix . 'team_mem_options',
		'title'        => esc_html__( 'Team Member Info', 'comilla' ),
		'object_types' => array('team'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	
	$cmb2_team->add_field( array(
	    'name'             => esc_html__('Designation' , 'comilla'),
	    'id'               => $prefix .'team_designation',
	    'desc'             => esc_html__( 'write designation here','comilla' ),
		'type'       => 'text',
		'default'       => 'Web Developer',
	) );		
		
	
	$teamgroup_field_id = $cmb2_team->add_field( array(
		'id'          => $prefix .'team_group_field_opt',
		'type'        => 'group',
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => esc_html__( 'Social Media link {#}', 'comilla' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add New Link', 'comilla' ),
			'remove_button' => esc_html__( 'Remove Link', 'comilla' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb2_team->add_group_field( $teamgroup_field_id, array(
		'name' => esc_html__('Social Media Icon' , 'comilla'),
		'id'   => $prefix .'team_sm_icon',
		'type' => 'text',
		'default' => 'fa fa-facebook',
		'description' => esc_html__('enter social media icon here. get all icon visit - http://fortawesome.github.io/Font-Awesome/icons/' , 'comilla'),
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb2_team->add_group_field( $teamgroup_field_id, array(
		'name' => esc_html__('Social Media Url' , 'comilla'),
		'description' => esc_html__( 'enter social url','comilla' ),		
		'id'   => $prefix .'team_sm_link',
		'type' => 'text',
		'default' => '#',
	) );		
	
	$cmb2_team->add_group_field( $teamgroup_field_id, array(
		'name' => esc_html__('Social Media Hover Background Color' , 'comilla'),
		'description' => esc_html__( 'choice color here','comilla' ),		
		'id'   => $prefix .'team_sm_hbg_color',
		'type' => 'colorpicker',
	) );	
		
	
	$cmb2_portfolios = new_cmb2_box( array(
		'id'           => $prefix . 'portfolios_options',
		'title'        => esc_html__( 'Portfolios Info', 'comilla' ),
		'object_types' => array( 'portfolio'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb2_portfolios->add_field( array(
	    'name'             => esc_html__('Client Label' , 'comilla'),
	    'id'               => $prefix .'port_client_label',
	    'desc'             => esc_html__( 'write client Label here','comilla' ),
		'type'             => 'text',
		'default'    => 'Client',
	) );		
	
	$cmb2_portfolios->add_field( array(
	    'name'             => esc_html__('Client Name' , 'comilla'),
	    'id'               => $prefix .'port_client_name',
	    'desc'             => esc_html__( 'write client name here','comilla' ),
		'type'             => 'text',
		'default'    => 'Themeforest',
	) );	
	
	$cmb2_portfolios->add_field( array(
	    'name'             => esc_html__('Date Label' , 'comilla'),
	    'id'               => $prefix .'port_date_label',
	    'desc'             => esc_html__( 'write date Label here','comilla' ),
		'type'             => 'text',
		'default'    => 'Project Date',
	) );		
	
	$cmb2_portfolios->add_field( array(
	    'name'             => esc_html__('Date' , 'comilla'),
	    'id'               => $prefix .'port_date',
	    'desc'             => esc_html__( 'write Date here','comilla' ),
		'type'             => 'text',
		'default'    => 'February 18, 2016',
	) );		
	
	$cmb2_portfolios->add_field( array(
	    'name'             => esc_html__('Project Url Label' , 'comilla'),
	    'id'               => $prefix .'port_project_url_label',
	    'desc'             => esc_html__( 'write date Label here','comilla' ),
		'type'             => 'text',
		'default'    => 'Project Url',
	) );		
	
	$cmb2_portfolios->add_field( array(
	    'name'             => esc_html__('Project Url' , 'comilla'),
	    'id'               => $prefix .'port_pro_url',
	    'desc'             => esc_html__( 'write project url here','comilla' ),
		'type'             => 'text',
		'default'    => 'www.themeforest.net',
	) );	

	//Partner Options	
	$cmb2_partner_options = new_cmb2_box( array(
		'id'           => $prefix . 'partner_option',
		'title'        => esc_html__( 'Partner Options', 'comilla' ),
		'object_types' => array( 'partner'), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		//'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );	


	$cmb2_partner_options->add_field( array(
	    'name'             => esc_html__('Partner Link' , 'comilla'),
	    'id'               => $prefix .'partner_link',
		'desc'    => esc_html__('enter client link here' , 'comilla'),
	    'type'    => 'text',
	    'default'    => '#',
	) );		
}