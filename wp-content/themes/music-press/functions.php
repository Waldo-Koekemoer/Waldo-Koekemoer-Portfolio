<?php 
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( ! function_exists( 'music_press__setup' ) ) :
/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function music_press__setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'music-press', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * WooCommerce Support
		 */		
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		
		/*
		 * Gutenberg Support
		 */
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );		
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		
		add_action('init', function() {
		
			register_block_style('core/cover', [
				'name' => 'my-cover-100',
				'label' => __('Cover height 100px', 'music-press'),
				'inline_style' => '.is-style-my-cover-100 { min-height: 100px;}',
			]);
			register_block_style('core/cover', [
				'name' => 'my-cover-200',
				'label' => __('Cover height 200px', 'music-press'),
				'inline_style' => '.is-style-my-cover-200 { min-height: 200px;}',
			]);
			register_block_style('core/cover', [
				'name' => 'my-cover-300',
				'label' => __('Cover height 300px', 'music-press'),
				'inline_style' => '.is-style-my-cover-300 { min-height: 300px;}',
			]);
			register_block_style('core/cover', [
				'name' => 'my-cover-400',
				'label' => __('Cover height 400px', 'music-press'),
				'inline_style' => '.is-style-my-cover-400 { min-height: 400px;}',
			]);
			register_block_style('core/cover', [
				'name' => 'my-cover-500',
				'label' => __('Cover height 500px', 'music-press'),
				'inline_style' => '.is-style-my-cover-500 { min-height: 500px;}',
			]);			
			register_block_style(
			'core/paragraph',
				 array(
					'name'  => 'prefix-rounded-corners-5',
					'label' => __( 'Rounded corners (Requires background color). Border radius 5px', 'music-press' ),
					'inline_style' => '.is-style-prefix-rounded-corners-5 {  
						border-radius: 5px;
					}',
				)

			);	
			register_block_style(
			'core/paragraph',
				 array(
					'name'  => 'prefix-rounded-corners-10',
					'label' => __( 'Rounded corners (Requires background color). Border radius 10px', 'music-press' ),
					'inline_style' => '.is-style-prefix-rounded-corners-10 {  
						border-radius: 10px;
					}',
				)

			);				
			
		});		
		
		
		
		// This theme uses wp_nav_menu() in one location.
		add_theme_support( 'nav-menus' );
		register_nav_menu('primary', esc_html__( 'Primary', 'music-press' ) );
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
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'music_press__custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => esc_html(get_theme_mod( 'logo_width' ) ),
			'width'       => 350,
			'flex-width'  => true,
			'flex-height' => false,
		) );
		register_default_headers( array(
			'img1' => array(
				'url'           => get_template_directory_uri() . '/images/header.jpg',
				'thumbnail_url' => get_template_directory_uri() . '/images/header.jpg',
				'description'   => esc_html__( 'Default Image 1', 'music-press' )
			)
		));		
	}
endif;
add_action( 'after_setup_theme', 'music_press__setup' );

function wpdocs_theme_add_editor_styles() {
		add_editor_style( 'editor-styles.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function music_press__content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'music_press__content_width', 640 );
}
add_action( 'after_setup_theme', 'music_press__content_width', 0 );
/**
 * Register widget area.
 */
function music_press__widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'music-press' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'music-press' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'music-press' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'music-press' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'music-press' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'music-press' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'music_press__widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function music_press__scripts() {	
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'music_press-menu', get_template_directory_uri() . '/js/menu.js', array(), '', true );	
	wp_enqueue_style( 'custom-style-css', get_stylesheet_uri() );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'music_press-animate-css', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'music_press-form-css', get_template_directory_uri() . '/css/form-styles.css' );
	wp_enqueue_style( 'music_press-font-awesome', get_template_directory_uri() . '/css/font-awesome.css',  array(), '', false);
    wp_enqueue_style( 'music_press-font-awesome-v4-shims',get_template_directory_uri() . '/css/v4-shims.css', array(),'',false );
    wp_enqueue_style( 'music_press-font-awesome-v5-font-face', get_template_directory_uri() . '/css/v5-font-face.css', array(),'', false );
    wp_enqueue_style( 'music_press-font-awesome-v4-font-face', get_template_directory_uri() . '/css/v4-font-face.css', array(), '', false );	
	wp_enqueue_style( 'music_press-font-woo-css', get_template_directory_uri() . '/include/woocommerce/woo-css.css', array(), '4.7.0'  );
	wp_enqueue_style( 'music_press-font-oswald', get_template_directory_uri() . '/css/oswald.css' );
	wp_enqueue_script( 'music_press-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'music_press-mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array(), '', false );
	wp_enqueue_script( 'music_press-viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array(), '', true );
	wp_enqueue_script( 'music_press-top', get_template_directory_uri() . '/js/to-top.js', array(), '', true );
	wp_enqueue_style( 'music_press-back-top-css', get_template_directory_uri() . '/include/back-to-top/style.css' );
	wp_enqueue_script( 'music_press-search-top-main-js', get_template_directory_uri() . '/include/back-to-top/main.js', array(), '', true );	
	wp_enqueue_script( 'music_press-search-top-util-js', get_template_directory_uri() . '/include/back-to-top/util.js', array(), '', true );		
	wp_enqueue_script( 'music_press-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'music_press-menu', 'menuObject',
		array( 
			'menu_position_abs' => esc_html( get_theme_mod( 'menu_position_absolute' ) )
		)
	);
	
}
add_action( 'wp_enqueue_scripts', 'music_press__scripts' );

function music_press_admin_scripts() {
	wp_enqueue_style( 'style-admin-css', get_template_directory_uri() . '/css/admin.css' );	
}
add_action( 'admin_enqueue_scripts', 'music_press_admin_scripts' );

/**
 * Includes
 */
//require_once get_template_directory() . '/include/classes/class-inline-styles.php';

require_once get_template_directory() . '/include/content-customizer.php';
require_once get_template_directory() . '/include/custom-header.php';
require_once get_template_directory() . '/include/template-tags.php';
require_once get_template_directory() . '/include/customizer.php';
require_once get_template_directory() . '/include/header-top.php';
require_once get_template_directory() . '/include/read-more-button.php';
require_once get_template_directory() . '/include/animations.php';
require_once get_template_directory() . '/include/menu-options.php';
require_once get_template_directory() . '/include/post-options.php';
require_once get_template_directory() . '/include/color-scheme.php';
require_once get_template_directory() . '/include/back-to-top/back-to-top-button.php';
require_once get_template_directory() . '/include/customize-pro/class-customize.php';
require_once get_template_directory() . '/include/header-buttons.php';
require_once get_template_directory() . '/include/pro/pro.php';
require_once get_template_directory() . '/include/footer-options.php';
require_once get_template_directory() . '/include/patterns.php';
require_once get_template_directory() . '/include/range/range-class.php';
require_once get_template_directory() . '/include/typography.php';
require_once get_template_directory() . '/include/dark-mode/dark-mode.php';
require_once get_template_directory() . '/include/letters/anime.php';
require_once get_template_directory() . '/js/viewportchecker.php';
require_once get_template_directory() . '/include/sidebar-position.php';
require_once get_template_directory() . '/include/search-query.php';
require_once get_template_directory() . '/include/social.php';
require_once get_template_directory() . '/include/categories-options.php';

if ( class_exists( 'WooCommerce' ) ) {
    require_once get_template_directory() . '/include/woocommerce/cart.php';
    require_once get_template_directory() . '/include/woocommerce/woo-functions.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require_once get_template_directory() . '/include/jetpack.php';
}
/**
 * Adds custom classes to the array of body classes.
 */
function music_press__body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'music_press__body_classes' );
function music_press__sidebar_position() {
	if ( ( is_active_sidebar('sidebar-1') ) ) { 
		wp_enqueue_style( 'style-sidebar', get_template_directory_uri() . '/layouts/left-sidebar.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'music_press__sidebar_position' );
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function music_press__pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'music_press__pingback_header' );


/*********************************************************************************************************
* Customizer Styles
**********************************************************************************************************/
function music_press__customize_checkbox_styles( $input ) { ?>
	<style>
		/**
		 * Checkbox Toggle UI
		 */
		#customize-theme-controls input[type="checkbox"] {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			-webkit-tap-highlight-color: transparent;
			width: auto;
			height: auto;
			vertical-align: middle;
			position: relative;
			border: 0;
			outline: 0;
			cursor: pointer;
			background: none;
			box-shadow: none;
		}
		#customize-theme-controls input[type="checkbox"]:focus {
			box-shadow: none;
		}
		#customize-theme-controls input[type="checkbox"]:after {
			content: '';
			font-size: 8px;
			font-weight: 400;
			line-height: 18px;
			text-indent: -14px;
			color: #ffffff;
			width: 36px;
			height: 18px;
			display: inline-block;
			background-color: #064441;
			border-radius: 72px;
			box-shadow: 0 0 12px rgb(0 0 0 / 15%) inset;
		}
		#customize-theme-controls input[type="checkbox"]:before {
			content: '';
			width: 14px;
			height: 14px;
			display: block;
			position: absolute;
			top: 2px;
			left: 2px;
			margin: 0;
			border-radius: 50%;
			background-color: #ffffff;
		}
		#customize-theme-controls input[type="checkbox"]:checked:before {
			left: 20px;
			margin: 0;
			background-color: #ffffff;
		}
		#customize-theme-controls input[type="checkbox"],
		#customize-theme-controls input[type="checkbox"]:before,
		#customize-theme-controls input[type="checkbox"]:after,
		#customize-theme-controls input[type="checkbox"]:checked:before,
		#customize-theme-controls input[type="checkbox"]:checked:after {
			transition: ease .15s;
		}
		#customize-theme-controls input[type="checkbox"]:checked:after {
			content: 'ON';
			background-color: #064441;
		}
		#_customize-input-music_press_shortcode_top_news,
		#_customize-input-music_press__shortcode_top_news {
			display: none;
		}
		
		.control-section-music-press .accordion-section-title a {
			width: 100%;
			padding: 10px;
			margin-top: 10px;
			font-size: 1em !important;
			background: #008989;
		}
		
		body .control-section-music-press .accordion-section-title {
			padding: 20px;	
            font-size: 2em !important;
			font-weight: 900;
		}	
		.control-section-music-press  {
			text-align: center;
			width: 100%;
			display: inline-grid;

		}

	</style>	
	<?php }
	add_action( 'customize_controls_print_styles', 'music_press__customize_checkbox_styles');
	
/**
 * Header Image Animation
 */
function music_press__header_image_zoom () { 
	if (!get_theme_mod('music_press__header_zoom',"")) { 
	?>
		<style>
@-webkit-keyframes header-image {
  0% {
    -webkit-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0);
    -webkit-transform-origin: 50% 16%;
            transform-origin: 50% 16%;
  }
  100% {
    -webkit-transform: scale(1.25) translateY(-15px);
            transform: scale(1.25) translateY(-15px);
    -webkit-transform-origin: top;
            transform-origin: top;
  }
}
@keyframes header-image {
  0% {
    -webkit-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0);
    -webkit-transform-origin: 50% 16%;
            transform-origin: 50% 16%;
  }
  100% {
    -webkit-transform: scale(1.25) translateY(-15px);
            transform: scale(1.25) translateY(-15px);
    -webkit-transform-origin: top;
            transform-origin: top;
  }
}
	</style>
	<?php
	}
}
add_action('wp_head','music_press__header_image_zoom');
/**
 * Header Image - Zoom Animation Speed
 */
function music_press__heade_image_zoom_speed () { ?>
	-webkit-animation: header-image 
	<?php 
	if (get_theme_mod('header_zoom_speed')) { 
		echo esc_attr(get_theme_mod('header_zoom_speed')); 
	} else 
		echo "20";
	?>s ease-out both; 
	animation: header-image
	<?php
	if (get_theme_mod('header_zoom_speed')) {
		echo esc_attr(get_theme_mod('header_zoom_speed')); 
	} else
		echo "20";
	?>s ease-out 0s 1 normal both running;
<?php	
}


/** 
 * Replace empty paragraph tags with <br>.
 */
function music_press_replace_empty_p( $content ) {
    $replace = array( 
        '<p></p>' => '<br>'
    ); 
    return strtr( $content, $replace );
}
add_filter( 'the_content', 'music_press_replace_empty_p' );
