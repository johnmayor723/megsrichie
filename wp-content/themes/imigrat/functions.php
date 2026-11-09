<?php

require_once get_template_directory() . '/includes/loader.php';
require_once get_template_directory() . '/includes/loader.php';
require_once get_template_directory() . '/inc/template-functions.php';

add_action( 'after_setup_theme', 'imigrat_setup_theme' );
add_action( 'after_setup_theme', 'imigrat_load_default_hooks' );


function imigrat_setup_theme() {

	load_theme_textdomain( 'imigrat', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'woocommerce' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	/*---------- Register image sizes ----------*/

	//Register image sizes
	add_image_size( 'imigrat_1170x450', 1170, 450, true ); //'imigrat_1170x450 Blog Classic'
	add_image_size( 'imigrat_311x370', 311, 370, true );//'imigrat_311x370 Visa Carosuel '
	add_image_size( 'imigrat_530x420', 530, 420, true );//'imigrat_530x420 Blog Grid '
	add_image_size( 'imigrat_157x157', 157, 157, true );//'imigrat_157x157 Testimonials '
	add_image_size( 'imigrat_105x90', 105, 90, true );//'imigrat_105x90 Testimonials '
	add_image_size( 'imigrat_48x48', 48, 48, true );//'imigrat_48x48 services '
	add_image_size( 'imigrat_365x452', 365, 452, true );//'imigrat_365x452 services carousel '
	add_image_size( 'imigrat_44x44', 44, 44, true );//'imigrat_44x44 Testimonial '
	add_image_size( 'imigrat_418x314', 418, 414, true );//'imigrat_418x314 visa
	add_image_size( 'imigrat_370x270', 370, 270, true );//'imigrat_370x270 Jobs Grid
	add_image_size( 'imigrat_418x600', 418, 600, true );//'imigrat_418x600 portfolio
	add_image_size( 'imigrat_418x536', 418, 536, true );//'imigrat_418x536 portfolio
	add_image_size( 'imigrat_418x450', 418, 450, true );//'imigrat_418x450 portfolio
	add_image_size( 'imigrat_418x356', 418, 356, true );//'imigrat_418x356 portfolio
	add_image_size( 'imigrat_81x81', 81, 81, true );//'imigrat_81x81 Popular Post Widget
	add_image_size( 'imigrat_115x78', 115, 78, true );//'imigrat_115x78 Recent Post Widget


		//'imigrat_1170x450 Blog Classic'

	/*---------- Register image sizes ends ----------*/



	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'imigrat' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'imigrat_admin_init', 2000000 );
	remove_theme_support( 'widgets-block-editor' );
}

/**
 * [imigrat_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function imigrat_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [imigrat_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function imigrat_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'imigrat' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'imigrat' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'imigrat' ),
		'before_widget' => '<div id="%1$s" class="widget imi-blog-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="blog-widget-title">',
		'after_title'   => '</h3>',
	) );

	// shop-sidebar-1
	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Siderbar', 'imigrat' ),
			'id'            => 'shop-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'imigrat' ),
			'before_widget' => '<div id="%1$s" class="widget mt-30 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget__title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'imigrat'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'imigrat'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget imi-footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h3 class="widget-title position-relative">',
		'after_title' => '</h3>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Two', 'imigrat'),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'imigrat'),
		'before_widget'=>'<div class="footer-column col-lg-3 col-md-6 col-sm-12"><div id="%1$s" class="footer-widget imi-2-footer-widget headline-2 pera-content ul-li-block %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Three', 'imigrat'),
		'id' => 'footer-sidebar-3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'imigrat'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget imi-3-footer-widget headline-3 pera-content ul-li-block %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h5 class="widget-title position-relative">',
		'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Four', 'imigrat'),
		'id' => 'footer-sidebar-4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'imigrat'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget imi-4-footer-widget headline-4 pera-content ul-li-block %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h5 class="widget-title position-relative">',
		'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Five', 'imigrat'),
		'id' => 'footer-sidebar-5',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'imigrat'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget imi-5-footer-widget headline-5 pera-content ul-li-block %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h5 class="widget-title position-relative">',
		'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'imigrat'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'imigrat'),
		'before_widget'=>'<div id="%1$s" class="service-widget imi-service-widget headline pera-content %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => esc_html__('Country Widget', 'imigrat'),
		'id' => 'country-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'imigrat'),
		'before_widget'=>'<div id="%1$s" class="country-widget imi_2-service-widget headline pera-content %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => esc_html__('Visa Widget', 'imigrat'),
		'id' => 'visa-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'imigrat'),
		'before_widget'=>'<div id="%1$s" class="service-widget imi-service-widget headline pera-content %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => esc_html__('Jobs Widget', 'imigrat'),
		'id' => 'jobs-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'imigrat'),
		'before_widget'=>'<div id="%1$s" class="service-widget imi-service-widget headline pera-content %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'imigrat' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'imigrat' ),
	  'before_widget'=>'<div id="%1$s" class="widget imi-blog-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h3 class="blog-widget-title">',
	  'after_title' => '</h3>'
	));
	if ( ! is_object( imigrat_WSH() ) ) {
		return;
	}

	$sidebars = imigrat_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( imigrat_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar['sidebar'];
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget imi-blog-widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="blog-widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'imigrat_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function imigrat_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'imigrat' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'imigrat' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'imigrat' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'imigrat' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'imigrat' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );

	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'imigrat' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'imigrat' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'imigrat' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'imigrat' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );

}
add_action( 'after_setup_theme', 'imigrat_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function imigrat_enqueue_scripts() {
	// Color Scheme Code
	$options = imigrat_WSH()->option();

	$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
	$header_option = $options->get( 'header_style_settings' );
	$header = ( $header_meta ) ? $header_meta['0'] : $header_option;

	if( $options->get( 'main_color_scheme' ) ){
		$maincolor = str_replace( '#', '' , $options->get( 'main_color_scheme' ));

	}else{
		$maincolor = str_replace( '#', '' , '#174c97' );
	}
	if( $options->get( 'secondary_color_scheme' ) ){
		$secondcolor = str_replace( '#', '' , $options->get( 'secondary_color_scheme' ));
	}
	else{
		$secondcolor = str_replace( '#', '' , '#fecd1a' );
	}

    //styles
	wp_enqueue_style( 'imigrat-swiper', get_template_directory_uri() . '/assets/css/swiper.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'imigrat-fontawesome-all', get_template_directory_uri() . '/assets/css/fontawesome-all.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'video', get_template_directory_uri() . '/assets/css/video.min.css' );
	wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.css' );
	wp_enqueue_style( 'imigrat-main', get_stylesheet_uri() );
	wp_enqueue_style( 'imigrat-main-style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style( 'imigrat-main-style-2', get_template_directory_uri() . '/assets/css/style-2.css' );
	wp_enqueue_style( 'imigrat-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'imigrat-tut', get_template_directory_uri() . '/assets/css/tut.css' );
	wp_enqueue_style( 'imigrat-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css' );
	if( $options->get( 'rtl_enable' ) || is_rtl() ) {
		wp_enqueue_style( 'imigrat-rtl', get_template_directory_uri() . '/assets/css/imigrat-rtl.css' );
	}

	if ( class_exists('WooCommerce') ) {
		wp_enqueue_style( 'woocommerce-style', get_template_directory_uri() . '/woocommerce/woocommerce.css' );
	}

    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'twin', get_template_directory_uri().'/assets/js/twin.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'imagesloaded-pkgd', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'rbtools', get_template_directory_uri().'/assets/js/rbtools.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jarallax', get_template_directory_uri().'/assets/js/jarallax.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-inputarrow', get_template_directory_uri().'/assets/js/jquery.inputarrow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri().'/assets/js/swiper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri().'/assets/js/jquery.counterup.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'tilt-jquery', get_template_directory_uri().'/assets/js/tilt.jquery.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'touchspin', get_template_directory_uri().'/assets/js/touchspin.js', array(), false, true );
	wp_enqueue_script( 'imigrat-main-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	wp_enqueue_script( 'imigrat-main-script-2', get_template_directory_uri().'/assets/js/script-2.js', array(), false, true );
	wp_enqueue_script( 'imigrat-custom', get_template_directory_uri().'/assets/js/custom.js', array(), false, true );

	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'imigrat_enqueue_scripts' );


/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function imigrat_fonts_url() {

	$fonts_url = '';


		$font_families['Inter'] = 'Inter:300,400,500,600,700';
		$font_families['Roboto'] = 'Roboto:300,400,500,700';
		$font_families['Playfair+Display'] = 'Playfair Display:400,500,600,700';

		$font_families = apply_filters( 'IMIGRAT/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function imigrat_theme_styles() {
    wp_enqueue_style( 'imigrat-theme-fonts', imigrat_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'imigrat_theme_styles' );
add_action( 'admin_enqueue_scripts', 'imigrat_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) imigrat_set function

/**
 * [imigrat_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'imigrat_set' ) ) {
	function imigrat_set( $var, $key, $def = '' ) {

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) imigrat_add_editor_styles function

function imigrat_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'imigrat_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = imigrat_WSH()->option();
if( imigrat_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

/*---------- More functions ends ----------*/

// theme options style
function imigrat_theme_options_style() {

	// enqueue style
	wp_enqueue_style( 'imigrat-theme-options', get_template_directory_uri() . '/assets/css/theme-options.css', array(), '1.0.0' );
	$options = imigrat_WSH()->option();
	$css_output = '';
    $preloader_bg_color = $options->get('preloader_bg_color');
    $preloader_dot_color = $options->get('preloader_dot_color');
    $main_color_scheme = $options->get('main_color_scheme');
	$secondary_color_scheme = $options->get('secondary_color_scheme');

	if(!empty($preloader_bg_color) || !empty($preloader_dot_color)){
        $css_output .= '
        #preloader {
            background-color: '.esc_attr($preloader_bg_color).'
        }
		.dot-spinner {
			--uib-color: '.esc_attr($preloader_dot_color).'
		}
        ';
    }

	if(!empty($main_color_scheme || $secondary_color_scheme)){
        $css_output .= '
        :root {
            --base-color: '.esc_attr($main_color_scheme).';
            --base-color-2: '.esc_attr($secondary_color_scheme).'
        }
        ';
    }

	wp_add_inline_style( 'imigrat-theme-options', $css_output );
}
add_action( 'wp_enqueue_scripts', 'imigrat_theme_options_style' );