<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}	
add_action( 'customize_register', 'music_press_color_scheme_customize' );
function music_press_color_scheme_customize( $wp_customize ) {

		$wp_customize->add_section( 'seos_color_scheme' , array(
			'title'       => __( 'Color Scheme', 'music-press' ),
			'priority'    => 25,
		) );
   	    $wp_customize->add_setting( 'color_scheme', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_scheme', array(
			'label'    => __( 'Color Scheme', 'music-press' ),
			'priority' => 14,
			'section'  => 'seos_color_scheme',
			'settings' => 'color_scheme',
		) ) );
		
   	    $wp_customize->add_setting( 'color_scheme_hover', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_scheme_hover', array(
			'label'    => __( 'Hover Color', 'music-press' ),
			'priority' => 14,
			'section'  => 'seos_color_scheme',
			'settings' => 'color_scheme_hover',
		) ) );		
}

add_action( 'wp_enqueue_scripts', 'music_press_color_scheme' );	
function music_press_color_scheme() {
        $seos_color_scheme = esc_html(get_theme_mod( 'color_scheme' ) );
        $color_scheme_hover = esc_html(get_theme_mod( 'color_scheme_hover' ) );

		if( $seos_color_scheme ) {
		$color_scheme = 
		"
		body .lt-container::after {
		     border: 4px solid {$seos_color_scheme};
		}
		.testimonials-cont .t-slide img {
		    border-bottom: 5px solid {$seos_color_scheme} !important;		
		}	
		.testimonials-cont .t-name{
		    border-bottom: 2px solid {$seos_color_scheme} !important;		
		}
		body .dark-mode-button-inner-left:after {
		    border: 2px solid {$seos_color_scheme} !important;		
		}
		
		body .lt-border, body .lt-border  {
		    border-top: 4px solid {$seos_color_scheme} !important;
		}
		body .dark-mode-button .dark-mode-button-inner-left:before {
		background: {$seos_color_scheme};
		}
		
		body .lt-timeline::after, .testimonials-cont .dashicons-format-quote {
		    background-color: {$seos_color_scheme} !important;
		}
		body .container-slider .seos-border1 {border-top: 4px solid {$seos_color_scheme};}
		body .container-slider .seos-border {border-top: 2px solid {$seos_color_scheme};}
		.pagination a, .pagination span, .myButt, .wp-block-search .wp-block-search__button, .h-button-1, .h-button-2, button, input[type='button'], input[type='reset'], input[type='submit'] {background: {$seos_color_scheme};}";
		"a {color: {$seos_color_scheme};}";
		
		} else {
		    $color_scheme ="";
		}

		if( $color_scheme_hover ) {
		$scheme_hover = 
		".dark-mode .container-slider .autoplay1 .sca-slide h3 a:hover, body .container-slider .autoplay1 h3 a:hover, body #main-left .open-arrow:hover .fa-sort-down, body #main-left .fa-sort-down:hover, body .s-search-top-mobile .dashicons-search:hover, body .s-search-top .dashicons-search:hover, .site-info a:hover, body .container-slider .autoplay1 h3 a:hover, #secondary ul li a:hover, body h2 a:hover, body a:hover {color: {$color_scheme_hover};}".
		".h-button-1:hover, .h-button-2:hover, .wp-block-search .wp-block-search__button:hover, button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover, .myButt:before{background: {$color_scheme_hover};}";
		} else {
		    $scheme_hover ="";
		}

        wp_add_inline_style( 'custom-style-css', 
		$color_scheme.$scheme_hover
		);
}