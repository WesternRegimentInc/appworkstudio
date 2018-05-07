<?php
/**
 * Comilla functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Comilla
 */

if ( ! function_exists( 'comilla_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function comilla_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Comilla, use a find and replace
	 * to change 'comilla' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'comilla', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// Custom Logo
	add_theme_support( 'custom-logo' );
	
	/*
	 * Set woocommerce support  
	 * 
	 */
	add_theme_support( 'woocommerce' );	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'comilla_port_img', 1200,800, true );
	add_image_size( 'comilla_testi_img', 200,200, true );
	add_image_size( 'comilla_team_img', 870,984, true );
	add_image_size( 'comilla_partner_img', 175,50, true );
	add_image_size( 'comilla_image_840_430', 840,430, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'comilla' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	add_theme_support( 'post-formats', array(
		'audio',
		'video',
	) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'comilla_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_editor_style( array( 'assets/css/editor-style.css', comilla_fonts_url() ) );
}
endif;
add_action( 'after_setup_theme', 'comilla_setup' );

/**
 * register google fonts
 */
function comilla_fonts_url() {
	$fonts_url = '';
	
	/* Translators: If there are characters in your language that are not
	* supported by Source Sans Pro, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$cousine = _x( 'on', 'Cousine font: on or off', 'comilla' );

	/* Translators: If there are characters in your language that are not
	* supported by Lato, translate this to 'off'. Do not translate
	* into your own language.
	*/
	
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'comilla' );
	
	if ( 'off' !== $cousine || 'off' !== $montserrat ) {
	$font_families = array();
	 
	if ( 'off' !== $cousine ) {
	$font_families[] = 'Cousine:400,700';
	}
	 
	
	if ( 'off' !== $montserrat ) {
	$font_families[] = 'Montserrat:400,700';
	}
	 
	$query_args = array(
	'family' => urlencode( implode( '|', $font_families ) ),
	'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );	
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function comilla_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'comilla_content_width', 640 );
}
add_action( 'after_setup_theme', 'comilla_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function comilla_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'comilla' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'comilla' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'comilla' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'comilla' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'comilla_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function comilla_scripts() {
	//google font
	wp_enqueue_style( 'comilla-google-fonts', comilla_fonts_url(), array(), null );	
	wp_enqueue_style('bootstrap', get_template_directory_uri() .  '/assets/bootstrap/css/bootstrap.css');
	wp_enqueue_style('font-awesome.min', get_template_directory_uri() .  '/assets/fonts/font-awesome.css');
	wp_enqueue_style('venobox', get_template_directory_uri() .  '/assets/venobox/css/venobox.css');
	wp_enqueue_style('owl.carousel', get_template_directory_uri() .  '/assets/owlcarousel/css/owl.carousel.css');
	wp_enqueue_style('owl.theme', get_template_directory_uri() .  '/assets/owlcarousel/css/owl.theme.css');
	wp_enqueue_style('animate', get_template_directory_uri() .  '/assets/css/animate.css');
	wp_enqueue_style('flexslider', get_template_directory_uri() .  '/assets/css/flexslider.css');
	wp_enqueue_style('comilla-main-style', get_template_directory_uri() .  '/assets/css/style.css');
	
	wp_enqueue_style( 'comilla-style', get_stylesheet_uri() );

	// Load JS Files
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2' );	
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' ); 	
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', array(), '1.4.2' );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' ); 	

	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'venobox', get_template_directory_uri() . '/assets/venobox/js/venobox.min.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'jquery.nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'jquery.mixitup', get_template_directory_uri() . '/assets/js/jquery.mixitup.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'jquery.flexslider-min', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/assets/owlcarousel/js/owl.carousel.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'scrolltopcontrol', get_template_directory_uri() . '/assets/js/scrolltopcontrol.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'wow.min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '2146', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '2146', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'comilla_scripts' );

function comilla_main_menu() {
		wp_nav_menu( array(
		'theme_location'    => 'primary',
		'depth'             => 5,
		'container'         => false,
		'menu_class'        => 'nav navbar-nav navbar-right',
		'fallback_cb'       => 'comilla_navwalker::fallback',
		
		)
	); 	
}

function comilla_wp_kses($val){
	return wp_kses($val, array(
	
	'p' => array(),
	'span' => array(),
	'div' => array(),
	'strong' => array(),
	'b' => array(),
	'br' => array(),
	'h1' => array(),
	'h2' => array(),
	'h3' => array(),
	'h4' => array(),
	'h5' => array(),
	'h6' => array(),
	'a'=> array('href' => array(),'target' => array()),
	'iframe'=> array('src' => array(),'height' => array(),'width' => array()),
	
	), '');
}


// modify search widget
function comilla_my_search_form( $form ) {
	$form = '
		<div class="form-group search-input">
			<div class="search_form">
				<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
				<input type="text" value="' . esc_attr(get_search_query()) . '" name="s" id="s" class="form-control search_field" placeholder="' . esc_attr__('Search...' , 'comilla') .'">
				</form>
			</div>
		</div>
        ';
	return $form;
}
add_filter( 'get_search_form', 'comilla_my_search_form' );

// comment list modify

function comilla_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<div class="single_comment">
		<div class="media">
			<div class="comment_avatar">
				<?php echo get_avatar( $comment, 70 ); ?>
			</div>

			<div class="media-body text-left comment_single">
				
				<h5 class="media-heading"><?php comment_author_link() ?> <span><?php echo esc_html(get_comment_date('F j, Y')); ?> <?php echo esc_html(get_comment_date('g:i')); ?></span> <div class="creply_link"><i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div></h5>
				<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e('Your comment is awaiting moderation.','comilla'); ?></em></p>
				<?php endif; ?>
				 <?php comment_text(); ?>							
			</div>
		</div>
	</div>				
</li>


<?php } 

// comment box title change
add_filter( 'comment_form_defaults', 'comilla_remove_comment_form_allowed_tags' );
function comilla_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	$defaults['comment_notes_before'] = '';
	return $defaults;

}

function comilla_comment_reform ($arg) {

$arg['title_reply'] = esc_html__('Write your comment Here','comilla');
$arg['comment_field'] = '<div class="row"><div class="form-group col-md-12"><textarea id="comment" class="comment_field form-control" name="comment" cols="77" rows="3" placeholder="'. esc_html__("Write your Comment", "comilla").'" aria-required="true"></textarea></div></div>';


return $arg;

}
add_filter('comment_form_defaults','comilla_comment_reform');

// comment form modify

function comilla_modify_comment_form_fields($fields){
	$commenter = wp_get_current_commenter();
	$req	   = get_option( 'require_name_email' );

	$fields['author'] = '<div class="row"><div class="form-group col-md-4"><input type="text" name="author" id="author" value="'. esc_attr( $commenter['comment_author'] ) .'" placeholder="'. esc_attr__("Your Name *", "comilla").'" size="22" tabindex="1"'. ( $req ? 'aria-required="true"' : '' ).' class="input-name form-control" /></div>';

	$fields['email'] = '<div class="form-group col-md-4"><input type="text" name="email" id="email" value="'. esc_attr( $commenter['comment_author_email'] ) .'" placeholder="'.esc_attr__("Your Email *", "comilla").'" size="22" tabindex="2"'. ( $req ? 'aria-required="true"' : '' ).' class="input-email form-control"  /></div>';
	
	$fields['url'] = '<div class="form-group col-md-4"><input type="text" name="url" id="url" value="'. esc_attr( $commenter['comment_author_url'] ) .'" placeholder="'. esc_attr__("Website", "comilla").'" size="22" tabindex="2"'. ( $req ? 'aria-required="false"' : '' ).' class="input-url form-control"  /></div></div>';

	return $fields;
}
add_filter('comment_form_default_fields','comilla_modify_comment_form_fields');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/navwalker.php';
require get_template_directory() . '/inc/comilla_metabox.php';
require get_template_directory() . '/inc/custom_functions.php';
require get_template_directory() . '/inc/admin/comilla-options.php';
require get_template_directory() . '/inc/admin/custom_css.php';
require get_template_directory() . '/inc/plugin-activator.php';
require get_template_directory() . '/inc/required-plugin.php';
require get_template_directory() . '/inc/comilla-wc-function.php';
/*---------------------------------------------
 Initialising Visual shortcode editor
----------------------------------------------*/ 
if (class_exists('WPBakeryVisualComposerAbstract')) {
 function comilla_requireVcExtend(){
  include_once( get_template_directory().'/vc_extend/extend_vc.php');  
 }
 add_action('init', 'comilla_requireVcExtend',2);
}