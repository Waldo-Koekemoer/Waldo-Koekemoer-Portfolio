<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @package awp-companion
 */

// Customizer Sections.
require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/awp-companion-awpbusinesspress-customizer.php';
require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/awp-companion-awpbusinesspress-customizer-options.php';
require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/awp-companion-awpbusinesspress-customizer-default.php';

// Frontpage Sections.
if ( ! function_exists( 'awp_awpbusinesspress_frontpage_sections' ) ) :
	function awp_awpbusinesspress_frontpage_sections() {
		// Diffrent Themes.
		$activate_theme_data = wp_get_theme(); // getting current theme data.
		$activate_theme      = $activate_theme_data->name;

		require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-slider.php';
		require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-top-info.php';
		require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-service.php';
		// Child Theme.
		if ( 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
			require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-funfact.php';
			require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-team.php';
		}
		require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-testimonial.php';
		require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-blog.php';
		require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-callout.php';
		require awp_companion_plugin_dir . 'inc/awpbusinesspress/front-page/awp-companion-awpbusinesspress-sponsors.php';
	}
	add_action( 'awp_awpbusinesspress_frontpage', 'awp_awpbusinesspress_frontpage_sections' );
endif;
