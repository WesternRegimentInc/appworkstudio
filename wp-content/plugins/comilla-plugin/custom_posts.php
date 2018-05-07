<?php

if ( ! function_exists('comilla_services') ) {

// Register Custom Post Type
function comilla_services() {

	$labels = array(
		'name'                  => esc_html_x( 'Services', 'Post Type General Name', 'comilla' ),
		'singular_name'         => esc_html_x( 'Service', 'Post Type Singular Name', 'comilla' ),
		'menu_name'             => esc_html__( 'Services', 'comilla' ),
		'name_admin_bar'        => esc_html__( 'Services', 'comilla' ),
		'archives'              => esc_html__( 'Item Archives', 'comilla' ),
		'attributes'            => esc_html__( 'Item Attributes', 'comilla' ),
		'parent_item_colon'     => esc_html__( 'Parent Item:', 'comilla' ),
		'all_items'             => esc_html__( 'All Items', 'comilla' ),
		'add_new_item'          => esc_html__( 'Add New Item', 'comilla' ),
		'add_new'               => esc_html__( 'Add New', 'comilla' ),
		'new_item'              => esc_html__( 'New Item', 'comilla' ),
		'edit_item'             => esc_html__( 'Edit Item', 'comilla' ),
		'update_item'           => esc_html__( 'Update Item', 'comilla' ),
		'view_item'             => esc_html__( 'View Item', 'comilla' ),
		'view_items'            => esc_html__( 'View Items', 'comilla' ),
		'search_items'          => esc_html__( 'Search Item', 'comilla' ),
		'not_found'             => esc_html__( 'Not found', 'comilla' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'comilla' ),
		'featured_image'        => esc_html__( 'Featured Image', 'comilla' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'comilla' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'comilla' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'comilla' ),
		'insert_into_item'      => esc_html__( 'Insert into item', 'comilla' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'comilla' ),
		'items_list'            => esc_html__( 'Items list', 'comilla' ),
		'items_list_navigation' => esc_html__( 'Items list navigation', 'comilla' ),
		'filter_items_list'     => esc_html__( 'Filter items list', 'comilla' ),
	);
	$args = array(
		'label'                 => esc_html__( 'Post Type', 'comilla' ),
		'description'           => esc_html__( 'Post Type Description', 'comilla' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'   => 'dashicons-admin-site',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'comilla_services', 0 );

}

if ( ! function_exists('comilla_portfolios') ) {

// Register Custom Post Type
function comilla_portfolios() {

	$labels = array(
		'name'                  => esc_html_x( 'Portfolios', 'Post Type General Name', 'comilla' ),
		'singular_name'         => esc_html_x( 'Portfolio', 'Post Type Singular Name', 'comilla' ),
		'menu_name'             => esc_html__( 'Portfolios', 'comilla' ),
		'name_admin_bar'        => esc_html__( 'Portfolios', 'comilla' ),
		'archives'              => esc_html__( 'Item Archives', 'comilla' ),
		'attributes'            => esc_html__( 'Item Attributes', 'comilla' ),
		'parent_item_colon'     => esc_html__( 'Parent Item:', 'comilla' ),
		'all_items'             => esc_html__( 'All Items', 'comilla' ),
		'add_new_item'          => esc_html__( 'Add New Item', 'comilla' ),
		'add_new'               => esc_html__( 'Add New', 'comilla' ),
		'new_item'              => esc_html__( 'New Item', 'comilla' ),
		'edit_item'             => esc_html__( 'Edit Item', 'comilla' ),
		'update_item'           => esc_html__( 'Update Item', 'comilla' ),
		'view_item'             => esc_html__( 'View Item', 'comilla' ),
		'view_items'            => esc_html__( 'View Items', 'comilla' ),
		'search_items'          => esc_html__( 'Search Item', 'comilla' ),
		'not_found'             => esc_html__( 'Not found', 'comilla' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'comilla' ),
		'featured_image'        => esc_html__( 'Featured Image', 'comilla' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'comilla' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'comilla' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'comilla' ),
		'insert_into_item'      => esc_html__( 'Insert into item', 'comilla' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'comilla' ),
		'items_list'            => esc_html__( 'Items list', 'comilla' ),
		'items_list_navigation' => esc_html__( 'Items list navigation', 'comilla' ),
		'filter_items_list'     => esc_html__( 'Filter items list', 'comilla' ),
	);
	$args = array(
		'label'                 => esc_html__( 'Post Type', 'comilla' ),
		'description'           => esc_html__( 'Post Type Description', 'comilla' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'port_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'   => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'comilla_portfolios', 0 );

}
if ( ! function_exists( 'comilla_portfolios_cat' ) ) {

// Register Custom Taxonomy
function comilla_portfolios_cat() {

	$labels = array(
		'name'                       => esc_html_x( 'Categories', 'Taxonomy General Name', 'comilla' ),
		'singular_name'              => esc_html_x( 'Category', 'Taxonomy Singular Name', 'comilla' ),
		'menu_name'                  => esc_html__( 'Category', 'comilla' ),
		'all_items'                  => esc_html__( 'All Items', 'comilla' ),
		'parent_item'                => esc_html__( 'Parent Item', 'comilla' ),
		'parent_item_colon'          => esc_html__( 'Parent Item:', 'comilla' ),
		'new_item_name'              => esc_html__( 'New Item Name', 'comilla' ),
		'add_new_item'               => esc_html__( 'Add New Item', 'comilla' ),
		'edit_item'                  => esc_html__( 'Edit Item', 'comilla' ),
		'update_item'                => esc_html__( 'Update Item', 'comilla' ),
		'view_item'                  => esc_html__( 'View Item', 'comilla' ),
		'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'comilla' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove items', 'comilla' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'comilla' ),
		'popular_items'              => esc_html__( 'Popular Items', 'comilla' ),
		'search_items'               => esc_html__( 'Search Items', 'comilla' ),
		'not_found'                  => esc_html__( 'Not Found', 'comilla' ),
		'no_terms'                   => esc_html__( 'No items', 'comilla' ),
		'items_list'                 => esc_html__( 'Items list', 'comilla' ),
		'items_list_navigation'      => esc_html__( 'Items list navigation', 'comilla' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'port_cat', array( 'portfolio' ), $args );

}
add_action( 'init', 'comilla_portfolios_cat', 0 );

}

if ( ! function_exists('comilla_testimonials') ) {

// Register Custom Post Type
function comilla_testimonials() {

	$labels = array(
		'name'                  => esc_html_x( 'Testimonials', 'Post Type General Name', 'comilla' ),
		'singular_name'         => esc_html_x( 'Testimonial', 'Post Type Singular Name', 'comilla' ),
		'menu_name'             => esc_html__( 'Testimonials', 'comilla' ),
		'name_admin_bar'        => esc_html__( 'Testimonials', 'comilla' ),
		'archives'              => esc_html__( 'Item Archives', 'comilla' ),
		'attributes'            => esc_html__( 'Item Attributes', 'comilla' ),
		'parent_item_colon'     => esc_html__( 'Parent Item:', 'comilla' ),
		'all_items'             => esc_html__( 'All Items', 'comilla' ),
		'add_new_item'          => esc_html__( 'Add New Item', 'comilla' ),
		'add_new'               => esc_html__( 'Add New', 'comilla' ),
		'new_item'              => esc_html__( 'New Item', 'comilla' ),
		'edit_item'             => esc_html__( 'Edit Item', 'comilla' ),
		'update_item'           => esc_html__( 'Update Item', 'comilla' ),
		'view_item'             => esc_html__( 'View Item', 'comilla' ),
		'view_items'            => esc_html__( 'View Items', 'comilla' ),
		'search_items'          => esc_html__( 'Search Item', 'comilla' ),
		'not_found'             => esc_html__( 'Not found', 'comilla' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'comilla' ),
		'featured_image'        => esc_html__( 'Featured Image', 'comilla' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'comilla' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'comilla' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'comilla' ),
		'insert_into_item'      => esc_html__( 'Insert into item', 'comilla' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'comilla' ),
		'items_list'            => esc_html__( 'Items list', 'comilla' ),
		'items_list_navigation' => esc_html__( 'Items list navigation', 'comilla' ),
		'filter_items_list'     => esc_html__( 'Filter items list', 'comilla' ),
	);
	$args = array(
		'label'                 => esc_html__( 'Testimonial', 'comilla' ),
		'description'           => esc_html__( 'Post Type Description', 'comilla' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'   => 'dashicons-nametag',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'comilla_testimonials', 0 );

}


if ( ! function_exists('comilla_team') ) {

// Register Custom Post Type
function comilla_team() {

	$labels = array(
		'name'                  => esc_html_x( 'Team', 'Post Type General Name', 'comilla' ),
		'singular_name'         => esc_html_x( 'Team', 'Post Type Singular Name', 'comilla' ),
		'menu_name'             => esc_html__( 'Team', 'comilla' ),
		'name_admin_bar'        => esc_html__( 'Team', 'comilla' ),
		'archives'              => esc_html__( 'Item Archives', 'comilla' ),
		'attributes'            => esc_html__( 'Item Attributes', 'comilla' ),
		'parent_item_colon'     => esc_html__( 'Parent Item:', 'comilla' ),
		'all_items'             => esc_html__( 'All Items', 'comilla' ),
		'add_new_item'          => esc_html__( 'Add New Item', 'comilla' ),
		'add_new'               => esc_html__( 'Add New', 'comilla' ),
		'new_item'              => esc_html__( 'New Item', 'comilla' ),
		'edit_item'             => esc_html__( 'Edit Item', 'comilla' ),
		'update_item'           => esc_html__( 'Update Item', 'comilla' ),
		'view_item'             => esc_html__( 'View Item', 'comilla' ),
		'view_items'            => esc_html__( 'View Items', 'comilla' ),
		'search_items'          => esc_html__( 'Search Item', 'comilla' ),
		'not_found'             => esc_html__( 'Not found', 'comilla' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'comilla' ),
		'featured_image'        => esc_html__( 'Featured Image', 'comilla' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'comilla' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'comilla' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'comilla' ),
		'insert_into_item'      => esc_html__( 'Insert into item', 'comilla' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'comilla' ),
		'items_list'            => esc_html__( 'Items list', 'comilla' ),
		'items_list_navigation' => esc_html__( 'Items list navigation', 'comilla' ),
		'filter_items_list'     => esc_html__( 'Filter items list', 'comilla' ),
	);
	$args = array(
		'label'                 => esc_html__( 'Post Type', 'comilla' ),
		'description'           => esc_html__( 'Post Type Description', 'comilla' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'taxonomies'            => array( ''),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'   => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'comilla_team', 0 );

}

if ( ! function_exists('comilla_partner') ) {

// Register Custom Post Type
function comilla_partner() {

	$labels = array(
		'name'                  => esc_html_x( 'Partners', 'Post Type General Name', 'comilla' ),
		'singular_name'         => esc_html_x( 'Partner', 'Post Type Singular Name', 'comilla' ),
		'menu_name'             => esc_html__( 'Partner', 'comilla' ),
		'name_admin_bar'        => esc_html__( 'Partner', 'comilla' ),
		'archives'              => esc_html__( 'Item Archives', 'comilla' ),
		'attributes'            => esc_html__( 'Item Attributes', 'comilla' ),
		'parent_item_colon'     => esc_html__( 'Parent Item:', 'comilla' ),
		'all_items'             => esc_html__( 'All Items', 'comilla' ),
		'add_new_item'          => esc_html__( 'Add New Item', 'comilla' ),
		'add_new'               => esc_html__( 'Add New', 'comilla' ),
		'new_item'              => esc_html__( 'New Item', 'comilla' ),
		'edit_item'             => esc_html__( 'Edit Item', 'comilla' ),
		'update_item'           => esc_html__( 'Update Item', 'comilla' ),
		'view_item'             => esc_html__( 'View Item', 'comilla' ),
		'view_items'            => esc_html__( 'View Items', 'comilla' ),
		'search_items'          => esc_html__( 'Search Item', 'comilla' ),
		'not_found'             => esc_html__( 'Not found', 'comilla' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'comilla' ),
		'featured_image'        => esc_html__( 'Featured Image', 'comilla' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'comilla' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'comilla' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'comilla' ),
		'insert_into_item'      => esc_html__( 'Insert into item', 'comilla' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'comilla' ),
		'items_list'            => esc_html__( 'Items list', 'comilla' ),
		'items_list_navigation' => esc_html__( 'Items list navigation', 'comilla' ),
		'filter_items_list'     => esc_html__( 'Filter items list', 'comilla' ),
	);
	$args = array(
		'label'                 => esc_html__( 'Post Type', 'comilla' ),
		'description'           => esc_html__( 'Post Type Description', 'comilla' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'   => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'partner', $args );

}
add_action( 'init', 'comilla_partner', 0 );

}