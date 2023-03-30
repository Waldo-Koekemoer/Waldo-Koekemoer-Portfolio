<?php
/**
 * Oskar functions and definitions
 *
 * @package Oskar
 */
define( 'OSKAR_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'OSKAR_TEMPLATE_DIR', get_template_directory() );
define( 'OSKAR_TEMPLATE_DIR_URI', get_template_directory_uri() );

function oskar_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'oskar', OSKAR_TEMPLATE_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'oskar' ),
		'footer' => esc_html__( 'Footer Menu', 'oskar' ),
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

	// Enable support for post formats
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat',
	) );

	// Set up the WordPress core custom background feature
	add_theme_support( 'custom-background', apply_filters( 'oskar_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width'		=> '',
		'height'	=> '',
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Enable support for widgets selective refresh
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Support for block editor
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-line-height' );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'custom-units' );
	add_theme_support( 'editor-color-palette', oskar_custom_color_palette() );
	add_theme_support( 'editor-gradient-presets', oskar_custom_color_gradients() );
	add_theme_support( 'editor-font-sizes', oskar_custom_font_sizes() );

	// Support for WooCommerce
	add_theme_support( 'woocommerce', array(
		'product_grid' => array(
			'min_columns' => 2,
			'max_columns' => 8,
		),
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// https://jetpack.com/support/infinite-scroll/
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer' => false,
	) );

}
add_action( 'after_setup_theme', 'oskar_setup' );

// Set up the WordPress core custom header feature
function oskar_custom_header_setup() {
	register_default_headers( array(
		'fashion' => array(
			'url'           => '%s/images/header-image.jpg',
			'thumbnail_url' => '%s/images/header-image-th.jpg',
			'description'   => esc_html__( 'Mountain', 'oskar' ),
		),
		'mountains' => array(
			'url'           => '%s/images/header-image-2.jpg',
			'thumbnail_url' => '%s/images/header-image-2-th.jpg',
			'description'   => esc_html__( 'Beach', 'oskar' ),
		),
	) );

	add_theme_support( 'custom-header', apply_filters( 'oskar_custom_header_args', array(
		'default-image'			=> OSKAR_TEMPLATE_DIR_URI.'/images/header-image.jpg',
		'default-text-color'	=> 'ffffff',
		'header-text'			=> true,
		'width'					=> '1920',
		'height'				=> '500',
		'flex-height'			=> true,
		'flex-width'			=> true,
		'wp-head-callback'		=> '',
	) ) );
}
add_action( 'after_setup_theme', 'oskar_custom_header_setup' );

// Enables the Excerpt meta box in Page edit screen
function oskar_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'oskar_add_excerpt_support_for_pages' );

// Register widget area
function oskar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Slider/Hero Section', 'oskar' ),
		'id'            => 'oskar-homepage-large-area',
		'description'   => esc_html__( 'The large image/hero/slider area below the masthead on the homepage. Add more than one Cover block to automatically create a slider.', 'oskar' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="hero-widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'oskar' ),
		'id'            => 'oskar-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Sidebar', 'oskar' ),
		'id'            => 'oskar-sidebar-homepage',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="page-sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'oskar' ),
		'id'            => 'oskar-sidebar-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="page-sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'oskar' ),
		'id'            => 'oskar-sidebar-shop',
		'description'   => esc_html__( 'Requires WooCommerce plugin.', 'oskar' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="shop-sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Filters', 'oskar' ),
		'id'            => 'oskar-sidebar-shop-filters',
		'description'   => esc_html__( 'Horizontal widget area for product archives. Requires WooCommerce plugin.', 'oskar' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="shop-filters-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar', 'oskar' ),
		'id'            => 'oskar-top-bar',
		'description'   => esc_html__( 'Add your own content above the header.', 'oskar' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="top-bar-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Offers Bar', 'oskar' ),
		'id'            => 'oskar-offers-bar',
		'description'   => esc_html__( 'Add your own content below the site masthead.', 'oskar' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="offers-bar-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Footer', 'oskar' ),
		'description'   => esc_html__( 'Full width area above the footer columns.', 'oskar' ),
		'id'            => 'oskar-above-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="above-footer-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'oskar' ),
		'id'            => 'oskar-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'oskar' ),
		'id'            => 'oskar-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'oskar' ),
		'id'            => 'oskar-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'oskar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oskar_scripts() {
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'jquery-bxslider', OSKAR_TEMPLATE_DIR_URI . '/assets/js/jquery.bxslider.js', array( 'jquery' ), '4.1.2', true );
	wp_enqueue_script( 'oskar-custom', OSKAR_TEMPLATE_DIR_URI . '/assets/js/custom.js', array( 'jquery' ), OSKAR_VERSION, true );
	wp_enqueue_script( 'oskar-skip-link-focus-fix', OSKAR_TEMPLATE_DIR_URI . '/assets/js/skip-link-focus-fix.js', array(), OSKAR_VERSION, true );
	wp_enqueue_style( 'oskar-fonts', oskar_fonts_url(), array(), null );
	wp_enqueue_style( 'oskar-fontawesome', OSKAR_TEMPLATE_DIR_URI . '/assets/fontawesome/css/all.min.css', '', OSKAR_VERSION );
	wp_enqueue_style( 'oskar-bx-slider', OSKAR_TEMPLATE_DIR_URI . '/assets/css/bx-slider.css', '', OSKAR_VERSION );
	wp_enqueue_style( 'oskar-style', get_stylesheet_uri(), '', OSKAR_VERSION );
	wp_add_inline_style( 'oskar-style', oskar_dynamic_style() );

	wp_enqueue_style( 'oskar-style-tablet', OSKAR_TEMPLATE_DIR_URI . '/assets/css/style-tablet.css', '', OSKAR_VERSION, oskar_breakpoint( 'tablet' ) );
	wp_enqueue_style( 'oskar-style-mobile', OSKAR_TEMPLATE_DIR_URI . '/assets/css/style-mobile.css', '', OSKAR_VERSION, oskar_breakpoint( 'mobile' ) );
	wp_enqueue_style( 'oskar-style-small', OSKAR_TEMPLATE_DIR_URI . '/assets/css/style-small.css', '', OSKAR_VERSION, oskar_breakpoint( 'small' ) );
	
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'oskar-wc-style', OSKAR_TEMPLATE_DIR_URI . '/assets/css/woocommerce.css', array( 'oskar-style' ), OSKAR_VERSION );
		wp_add_inline_style( 'oskar-wc-style', oskar_dynamic_style_wc() );
		wp_enqueue_style( 'oskar-wc-style-mobile', OSKAR_TEMPLATE_DIR_URI . '/assets/css/woocommerce-mobile.css', '', OSKAR_VERSION, oskar_breakpoint( 'mobile' ) );
		wp_enqueue_style( 'oskar-wc-style-small', OSKAR_TEMPLATE_DIR_URI . '/assets/css/woocommerce-small.css', '', OSKAR_VERSION, oskar_breakpoint( 'small' ) );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_customize_preview() ) {
		wp_enqueue_style( 'oskar-customize-preview', OSKAR_TEMPLATE_DIR_URI . '/assets/css/customize-preview.css', '', OSKAR_VERSION );
	}

}
add_action( 'wp_enqueue_scripts', 'oskar_scripts' );

/**
 * Enqueue scripts and styles for Block Editor.
 */
function oskar_enqueue_gutenberg_block_editor_assets() {

	wp_enqueue_style( 'oskar-block-editor-fonts', oskar_fonts_url(), array(), null );
	wp_enqueue_style( 'oskar-block-editor-style', OSKAR_TEMPLATE_DIR_URI . '/assets/css/block-editor-style.css', '', OSKAR_VERSION );
	wp_add_inline_style( 'oskar-block-editor-style', oskar_block_editor_dynamic_style() );
	
	wp_enqueue_style( 'oskar-block-editor-style-small', OSKAR_TEMPLATE_DIR_URI . '/assets/css/block-editor-style-small.css', '', OSKAR_VERSION, oskar_breakpoint( 'small' ) );
	wp_enqueue_style( 'oskar-block-editor-style-mobile', OSKAR_TEMPLATE_DIR_URI . '/assets/css/block-editor-style-mobile.css', '', OSKAR_VERSION, oskar_breakpoint( 'mobile' ) );

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'oskar-block-editor-wc', OSKAR_TEMPLATE_DIR_URI . '/assets/css/block-editor-woocommerce.css', array( 'oskar-style' ), OSKAR_VERSION );
		wp_enqueue_style( 'oskar-block-editor-wc', OSKAR_TEMPLATE_DIR_URI . '/assets/css/block-editor-woocommerce-small.css', '', OSKAR_VERSION, oskar_breakpoint( 'small' ) );
		wp_enqueue_style( 'oskar-block-editor-wc', OSKAR_TEMPLATE_DIR_URI . '/assets/css/block-editor-woocommerce-mobile.css', '', OSKAR_VERSION, oskar_breakpoint( 'mobile' ) );
	}

}
add_action( 'enqueue_block_editor_assets', 'oskar_enqueue_gutenberg_block_editor_assets' );

/**
 * Template tags.
 */
require OSKAR_TEMPLATE_DIR . '/inc/template-tags.php';

/**
 * Custom functions.
 */
require OSKAR_TEMPLATE_DIR . '/inc/general.php';
require OSKAR_TEMPLATE_DIR . '/inc/colors.php';
require OSKAR_TEMPLATE_DIR . '/inc/typography.php';
require OSKAR_TEMPLATE_DIR . '/inc/style-output.php';
require OSKAR_TEMPLATE_DIR . '/inc/header-title.php';
require OSKAR_TEMPLATE_DIR . '/inc/icons.php';
require OSKAR_TEMPLATE_DIR . '/inc/woocommerce.php';

/**
 * Customizer.
 */
require OSKAR_TEMPLATE_DIR . '/inc/customizer/customize.php';

/**
 * Theme page.
 */
require OSKAR_TEMPLATE_DIR . '/inc/theme-help.php';
