<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AWP Plugin Customizer Class
 *
 * @package awp-companion
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'AWP_awpbusinesspress_Customizer' ) ) :

	// awpbusinesspress Customizer class.
	class AWP_awpbusinesspress_Customizer {
		public function AWP_awpbusinesspress_Customizer_settings() {
			// Diffrent Themes.
			$activate_theme_data = wp_get_theme(); // getting current theme data.
			$activate_theme      = $activate_theme_data->name;

			require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-slider-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-top-info-customizer-settings.php';

			require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-service-customizer-settings.php';

			// Child Theme.
			if ( 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
				require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-funfact-customizer-settings.php';
				require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-team-customizer-settings.php';
			}

			require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-testimonial-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-cta-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-blog-customizer-settings.php';

			require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/frontpage-sections/awp-companion-awpbusinesspress-client-customizer-settings.php';
		}
	}
endif;

$customizer_settings = new AWP_awpbusinesspress_Customizer();

$customizer_settings->AWP_awpbusinesspress_Customizer_settings();
