<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @package	awp-companion
 */

//Diffrent Themes
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme = $activate_theme_data->name; 

// Customizer Sections
require awp_companion_plugin_dir . 'inc/formula/customizer/awp-companion-formula-customizer.php';
if ( 'Metaverse' == $activate_theme ) {
	require awp_companion_plugin_dir . 'inc/formula/customizer/awp-companion-metaverse-customizer-options.php';
} else {
	require awp_companion_plugin_dir . 'inc/formula/customizer/awp-companion-formula-customizer-options.php';
}
require awp_companion_plugin_dir . 'inc/formula/customizer/awp-companion-formula-customizer-default.php';


// Frontpage Sections
if ( ! function_exists( 'awp_formula_frontpage_sections' ) ) :
	function awp_formula_frontpage_sections(){
		//Diffrent Themes
		$activate_theme_data = wp_get_theme(); // getting current theme data
		$activate_theme = $activate_theme_data->name; 

		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-slider.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-portfolio.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-service.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-testimonial.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-funfact.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-blog.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-team.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-wooproduct.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-callout.php';
		require awp_companion_plugin_dir . 'inc/formula/front-page/awp-companion-formula-sponsors.php';
	}
	add_action( 'awp_formula_frontpage', 'awp_formula_frontpage_sections' );
endif;