<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * AWP Plugin Customizer Class
 *
 * @package awp-companion
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'AWP_Formula_Customizer' ) ) :

	// formula Customizer class
	class AWP_Formula_Customizer {
		public function AWP_Formula_Customizer_settings() {
			//Diffrent Themes
			$activate_theme_data = wp_get_theme(); // getting current theme data
            $activate_theme = $activate_theme_data->name;
			
           	require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-slider-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-portfolio-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-service-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-testimonial-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-funfact-customizer-settings.php';
		    require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-cta-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-blog-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-team-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-client-customizer-settings.php';
			require awp_companion_plugin_dir . 'inc/formula/customizer/frontpage-sections/awp-companion-woocommerce-customizer-settings.php';
			
		}
	}
endif;

$customizer_settings = new AWP_Formula_Customizer();

$customizer_settings->AWP_Formula_Customizer_settings();