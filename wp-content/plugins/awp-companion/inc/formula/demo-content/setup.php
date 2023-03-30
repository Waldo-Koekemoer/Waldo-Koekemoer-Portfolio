<?php
/**
 * @package formula Starter Sites
 * @since 1.0
 */


/**
 * Set import files
 */
if ( ! function_exists( 'formula_starter_sites_import_files' ) ) {

	function formula_starter_sites_import_files() {

		// Demos url
		$demo_url = awp_companion_plugin_url;

		return array(
			array(
				'import_file_name'           => esc_html__( 'Formula Original', 'formula' ),
				'categories'                 => array( 'Free Demos' ),
				'import_file_url'            => $demo_url . '/inc/formula/demo-content/formula/formula-content.xml',
				'import_widget_file_url'     => $demo_url . '/inc/formula/demo-content/formula/formula-widgets.wie',
				'import_customizer_file_url' => $demo_url . '/inc/formula/demo-content/formula/formula-customizer.dat',
				'preview_url'                => 'https://awplife.com/demo/formula/',
				'import_preview_image_url'   => $demo_url . '/inc/formula/demo-content/formula/thumb.png',
			),
			array(
				'import_file_name'           => esc_html__( 'Formula Dark', 'formula' ),
				'categories'                 => array( 'Free Demos' ),
				'import_file_url'            => $demo_url . '/inc/formula/demo-content/formula-dark/formula-dark-content.xml',
				'import_widget_file_url'     => $demo_url . '/inc/formula/demo-content/formula-dark/formula-dark-widgets.wie',
				'import_customizer_file_url' => $demo_url . '/inc/formula/demo-content/formula-dark/formula-dark-customizer.dat',
				'preview_url'                => 'https://awplife.com/demo/formula-dark/',
				'import_preview_image_url'   => $demo_url . '/inc/formula/demo-content/formula-dark/thumb.png',
			),

			array(
				'import_file_name'           => esc_html__( 'Formula Light', 'formula' ),
				'categories'                 => array( 'Free Demos' ),
				'import_file_url'            => $demo_url . '/inc/formula/demo-content/formula-light/formula-light-content.xml',
				'import_widget_file_url'     => $demo_url . '/inc/formula/demo-content/formula-light/formula-light-widgets.wie',
				'import_customizer_file_url' => $demo_url . '/inc/formula/demo-content/formula-light/formula-light-customizer.dat',
				'preview_url'                => 'https://awplife.com/demo/formula-light/',
				'import_preview_image_url'   => $demo_url . '/inc/formula/demo-content/formula-light/thumb.png',
			),

			array(
				'import_file_name'           => esc_html__( 'Flora Formula', 'formula' ),
				'categories'                 => array( 'Free Demos' ),
				'import_file_url'            => $demo_url . '/inc/formula/demo-content/flora/flora-content.xml',
				'import_widget_file_url'     => $demo_url . '/inc/formula/demo-content/flora/flora-widgets.wie',
				'import_customizer_file_url' => $demo_url . '/inc/formula/demo-content/flora/flora-customizer.dat',
				'preview_url'                => 'https://awplife.com/demo/flora-formula/',
				'import_preview_image_url'   => $demo_url . '/inc/formula/demo-content/flora/thumb.png',
			),
			array(
				'import_file_name'           => esc_html__( 'Business Formula', 'formula' ),
				'categories'                 => array( 'Free Demos' ),
				'import_file_url'            => $demo_url . '/inc/formula/demo-content/business/business-content.xml',
				'import_widget_file_url'     => $demo_url . '/inc/formula/demo-content/business/business-widgets.wie',
				'import_customizer_file_url' => $demo_url . '/inc/formula/demo-content/business/business-customizer.dat',
				'preview_url'                => 'https://awplife.com/demo/business-formula/',
				'import_preview_image_url'   => $demo_url . '/inc/formula/demo-content/business/thumb.png',
			),
			array(
				'import_file_name'           => esc_html__( 'Education Formula', 'formula' ),
				'categories'                 => array( 'Free Demos' ),
				'import_file_url'            => $demo_url . '/inc/formula/demo-content/education/education-content.xml',
				'import_widget_file_url'     => $demo_url . '/inc/formula/demo-content/education/education-widgets.wie',
				'import_customizer_file_url' => $demo_url . '/inc/formula/demo-content/education/education-customizer.dat',
				'preview_url'                => 'https://awplife.com/demo/education-formula/',
				'import_preview_image_url'   => $demo_url . '/inc/formula/demo-content/education/thumb.png',
			),
			array(
				'import_file_name'         => esc_html__( 'Medical Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/medical-formula-pro/',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/medical-pro.png',
			),
			array(
				'import_file_name'         => esc_html__( 'Petcare Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/petcare-formula-pro/',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/petcare-pro.png',
			),
			array(
				'import_file_name'         => esc_html__( 'Nature Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/nature-formula-pro',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/nature-pro.png',
			),
			array(
				'import_file_name'         => esc_html__( 'Fashion Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/fashion-formula-pro/',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/fashion-pro.png',
			),	
			array(
				'import_file_name'         => esc_html__( 'Furniture Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/furniture-formula-pro/',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/furniture-pro.png',
			),						
			array(
				'import_file_name'         => esc_html__( 'Food Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/food-formula-pro/',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/food-pro.png',
			),
			array(
				'import_file_name'         => esc_html__( 'NGO Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/ngo-formula-pro',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/ngo-pro.png',
			),
			array(
				'import_file_name'         => esc_html__( 'Photography Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/photography-formula-pro',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/photography-pro.png',
			),
			array(
				'import_file_name'         => esc_html__( 'Yoga Formula Pro', 'formula' ),
				'categories'               => array( 'Premium Demos' ),
				'preview_url'              => 'https://awplife.com/demo/yoga-formula-pro/',
				'import_preview_image_url' => $demo_url . '/inc/formula/demo-content/premium/yoga-pro.png',
			),

		);
	}
}
add_filter( 'pt-ocdi/import_files', 'formula_starter_sites_import_files' );

/**
 * Define actions that happen after import
 *//*
if ( !function_exists( 'formula_starter_sites_after_import_mods' ) ) {

	function formula_starter_sites_after_import_mods() {

		//Assign the menu
		$main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);

		//Asign the static front page and the blog page
		$front_page = get_page_by_title( 'Home' );
		$blog_page  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page -> ID );
		update_option( 'page_for_posts', $blog_page -> ID );

	}

}
add_action( 'pt-ocdi/after_import', 'formula_starter_sites_after_import_mods' );
 */
// Custom CSS for OCDI plugin
function formula_starter_sites_ocdi_css() { ?>
	<style >
		.ocdi__gl-item:nth-child(n+7) .ocdi__gl-item-buttons .button-primary, .ocdi .ocdi__theme-about, .ocdi__intro-text {
		  display: none;
		}
		.ocdi__gl-item-image-container::after {
			padding-top: 75% !important;
		}
		/*@media (min-width: 1120px) {
			.ocdi__gl-item:nth-child(n+5) {
				flex: 0 0 calc(33% - 150px) !important; 
			}
		}
		
		.ocdi__gl-item:nth-child(n+5) .ocdi__gl-item-image-container {
			height: 365px;
		}*/
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'formula_starter_sites_ocdi_css' );

// Change the "One Click Demo Import" name from "Starter Sites" in Appearance menu.
function formula_starter_sites_ocdi_plugin_page_setup( $default_settings ) {

	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Formula One Click Demo Import', 'formula' );
	$default_settings['menu_title']  = esc_html__( 'Formula Starter Sites', 'formula' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'one-click-demo-import';

	return $default_settings;

}
add_filter( 'ocdi/plugin_page_setup', 'formula_starter_sites_ocdi_plugin_page_setup' );

// Register required plugins for the demo's.
function formula_starter_sites_register_plugins( $plugins ) {

	// List of plugins used by all theme demos.
	$theme_plugins = array(
		array(
			'name'     => 'A WP Life Themes Companion',
			'slug'     => 'awp-companion',
			'required' => true,
		),
		array(
			'name'     => 'Animated Live Wall',
			'slug'     => 'animated-live-wall',
			'required' => true,
		),
		array(
			'name'     => 'WPForms',
			'slug'     => 'wpforms-lite',
			'required' => true,
		),
		array(
			'name'     => 'ABC Pricing Table',
			'slug'     => 'abc-pricing-table',
			'required' => true,
		),
		array(
			'name'     => 'Portfolio Filter Gallery',
			'slug'     => 'portfolio-filter-gallery',
			'required' => true,
		),
	);

	return array_merge( $plugins, $theme_plugins );

}
add_filter( 'ocdi/register_plugins', 'formula_starter_sites_register_plugins' );

/**
* Remove branding
*/
// add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
