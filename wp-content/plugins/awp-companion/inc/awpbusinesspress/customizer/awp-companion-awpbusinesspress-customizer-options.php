<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Extend customizer section.
 *
 * @package awpbusinesspress
 *
 * @see     WP_Customize_Section
 * @access  public
 */

function awp_awpbusinesspress_frontpage_sections_settings( $wp_customize ) {

	$activate_theme_data = wp_get_theme(); // getting current theme data
	$activate_theme      = $activate_theme_data->name;

	$active_callback = isset( $array['active_callback'] ) ? $array['active_callback'] : null;

	/* Frontpage panel */
	$wp_customize->add_panel(
		'awpbusinesspress_frontpage_settings',
		array(
			'priority'   => 25,
			'capability' => 'edit_theme_options',
			'title'      => __( 'Frontpage Sections', 'awp-companion' ),
		)
	);

	/* Slider Settings */
	$wp_customize->add_section(
		'awpbusinesspress_main_theme_slider',
		array(
			'title'    => __( 'Slider Settings', 'awp-companion' ),
			'panel'    => 'awpbusinesspress_frontpage_settings',
			'priority' => 2,
		)
	);

	if ( class_exists( 'awpbusinesspress_Repeater' ) ) {
		$wp_customize->add_setting( 'awpbusinesspress_main_slider_content', array() );
		$wp_customize->add_control(
			new awpbusinesspress_Repeater(
				$wp_customize,
				'awpbusinesspress_main_slider_content',
				array(
					'label'                                => esc_html__( 'Slider Items Content', 'awp-companion' ),
					'section'                              => 'awpbusinesspress_main_theme_slider',
					'add_field_label'                      => esc_html__( 'Add new slide', 'awp-companion' ),
					'item_name'                            => esc_html__( 'Slide Item', 'awp-companion' ),
					'customizer_repeater_image_control'    => true,
					'customizer_repeater_title_control'    => true,
					'customizer_repeater_text_control'     => true,
					'customizer_repeater_button_text_control' => true,
					'customizer_repeater_link_control'     => true,
					'customizer_repeater_checkbox_control' => true,
				)
			)
		);
	}

		/* Theme Info Settings */
		$wp_customize->add_section(
			'awpbusinesspress_theme_top_info',
			array(
				'title'    => __( 'Theme Info Settings', 'awp-companion' ),
				'panel'    => 'awpbusinesspress_frontpage_settings',
				'priority' => 3,
			)
		);

	if ( class_exists( 'awpbusinesspress_Repeater' ) ) {
		$wp_customize->add_setting( 'awpbusinesspress_top_info_content', array() );
		$wp_customize->add_control(
			new awpbusinesspress_Repeater(
				$wp_customize,
				'awpbusinesspress_top_info_content',
				array(
					'label'                                => esc_html__( 'Info Items Content', 'awp-companion' ),
					'section'                              => 'awpbusinesspress_theme_top_info',
					'priority'                             => 10,
					'add_field_label'                      => esc_html__( 'Add New Info', 'awp-companion' ),
					'item_name'                            => esc_html__( 'Info Item', 'awp-companion' ),
					'customizer_repeater_icon_control'     => true,
					'customizer_repeater_title_control'    => true,
					'customizer_repeater_text_control'     => true,
					'customizer_repeater_link_control'     => true,
					'customizer_repeater_checkbox_control' => true,
				)
			)
		);
	}
	// }

	/* Service Settings */
	$wp_customize->add_section(
		'awpbusinesspress_theme_service',
		array(
			'title'    => __( 'Service Settings', 'awp-companion' ),
			'panel'    => 'awpbusinesspress_frontpage_settings',
			'priority' => 4,
		)
	);

	if ( class_exists( 'awpbusinesspress_Repeater' ) ) {
		$wp_customize->add_setting( 'awpbusinesspress_service_content', array() );
		$wp_customize->add_control(
			new awpbusinesspress_Repeater(
				$wp_customize,
				'awpbusinesspress_service_content',
				array(
					'label'                                => esc_html__( 'Service Items Content', 'awp-companion' ),
					'section'                              => 'awpbusinesspress_theme_service',
					'priority'                             => 10,
					'add_field_label'                      => esc_html__( 'Add new service', 'awp-companion' ),
					'item_name'                            => esc_html__( 'Service Item', 'awp-companion' ),
					'customizer_repeater_image_control'    => true,
					'customizer_repeater_icon_control'     => true,
					'customizer_repeater_title_control'    => true,
					'customizer_repeater_text_control'     => true,
					'customizer_repeater_link_control'     => true,
					'customizer_repeater_checkbox_control' => true,
				)
			)
		);
	}

	/* Funfact Settings */
	if ( 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
		$wp_customize->add_section(
			'awpbusinesspress_theme_funfact',
			array(
				'title'    => __( 'Funfact Settings', 'awpbusinesspress' ),
				'panel'    => 'awpbusinesspress_frontpage_settings',
				'priority' => 5,
			)
		);

		if ( class_exists( 'awpbusinesspress_Repeater' ) ) {
			$wp_customize->add_setting( 'awpbusinesspress_funfact_content', array() );
			$wp_customize->add_control(
				new awpbusinesspress_Repeater(
					$wp_customize,
					'awpbusinesspress_funfact_content',
					array(
						'label'                            => esc_html__( 'Funfact Items Content', 'awpbusinesspress' ),
						'section'                          => 'awpbusinesspress_theme_funfact',
						'add_field_label'                  => esc_html__( 'Add new Funfact', 'awpbusinesspress' ),
						'item_name'                        => esc_html__( 'Funfact Item', 'awpbusinesspress' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_icon_control' => true,
					)
				)
			);
		}

		if ( 'Hospital Health Care' == $activate_theme ) {
			$funfact_bg_image = 'hh-bg';
		} else {
			$funfact_bg_image = 'home-bg';
		}

		// Funfact Background Image.
		$wp_customize->add_setting(
			'awpbusinesspress_funfact_background',
			array(
				'default'           => awp_companion_plugin_url . "/inc/awpbusinesspress/img/funfact/$funfact_bg_image.jpg",
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'awpbusinesspress_funfact_background',
				array(
					'label'    => __( 'Background Image', 'wpbusinesspress' ),
					'section'  => 'awpbusinesspress_theme_funfact',
					'settings' => 'awpbusinesspress_funfact_background',
					'priority' => 25,
				)
			)
		);
		// Funfact Homepage 2 background Image End.
	}

	/* Team Settings  */
	if ( 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
		$wp_customize->add_section(
			'awpbusinesspress_theme_team',
			array(
				'title'    => __( 'Team Settings', 'awpbusinesspress' ),
				'panel'    => 'awpbusinesspress_frontpage_settings',
				'priority' => 6,
			)
		);

		if ( class_exists( 'awpbusinesspress_Repeater' ) ) {
			$wp_customize->add_setting( 'awpbusinesspress_team_content', array() );
			$wp_customize->add_control(
				new awpbusinesspress_Repeater(
					$wp_customize,
					'awpbusinesspress_team_content',
					array(
						'label'                            => esc_html__( 'Team Items Content', 'awpbusinesspress' ),
						'section'                          => 'awpbusinesspress_theme_team',
						'add_field_label'                  => esc_html__( 'Add new Team', 'awpbusinesspress' ),
						'item_name'                        => esc_html__( 'Team Item', 'awpbusinesspress' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_checkbox_control' => true,
						'customizer_repeater_designation_control' => true,
						'customizer_repeater_repeater_control' => true,
					)
				)
			);
		}
	}

	/* Testimonial Settings */
	$wp_customize->add_section(
		'awpbusinesspress_theme_testimonial',
		array(
			'title'    => __( 'Testimonial Settings', 'awpbusinesspress' ),
			'panel'    => 'awpbusinesspress_frontpage_settings',
			'priority' => 7,
		)
	);

	if ( class_exists( 'awpbusinesspress_Repeater' ) ) {
		$wp_customize->add_setting( 'awpbusinesspress_testimonial_content', array() );
		$wp_customize->add_control(
			new awpbusinesspress_Repeater(
				$wp_customize,
				'awpbusinesspress_testimonial_content',
				array(
					'label'                             => esc_html__( 'Testimonial Items Content', 'awp-companion' ),
					'section'                           => 'awpbusinesspress_theme_testimonial',
					'add_field_label'                   => esc_html__( 'Add new testimonial item', 'awp-companion' ),
					'item_name'                         => esc_html__( 'Testimonial Item', 'awp-companion' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_title_control' => true,
					'customizer_repeater_text_control'  => true,
					'customizer_repeater_designation_control' => true,
				)
			)
		);
	}

	if ( 'Coin Market' == $activate_theme || 'Business Campaign' == $activate_theme ) {
		// Testimonial Background Image.
		$wp_customize->add_setting(
			'awpbusinesspress_testimonial_background',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-coin-bg.jpg',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'awpbusinesspress_testimonial_background',
				array(
					'label'    => esc_html__( 'Background Image', 'awp-companion' ),
					'section'  => 'awpbusinesspress_theme_testimonial',
					'settings' => 'awpbusinesspress_testimonial_background',
					'priority' => 15,
				)
			)
		);
	}

	if ( 'Hospital Health Care' == $activate_theme ) {
		// Testimonial Background Image.
		$wp_customize->add_setting(
			'awpbusinesspress_testimonial_background',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-hospital-bg.jpg',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'awpbusinesspress_testimonial_background',
				array(
					'label'    => esc_html__( 'Background Image', 'awp-companion' ),
					'section'  => 'awpbusinesspress_theme_testimonial',
					'settings' => 'awpbusinesspress_testimonial_background',
					'priority' => 15,
				)
			)
		);
	}

	if ( 'Home Interior' == $activate_theme ) {
		// Testimonial Background Image.
		$wp_customize->add_setting(
			'awpbusinesspress_testimonial_background',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-home-bg.jpg',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'awpbusinesspress_testimonial_background',
				array(
					'label'    => esc_html__( 'Background Image', 'awp-companion' ),
					'section'  => 'awpbusinesspress_theme_testimonial',
					'settings' => 'awpbusinesspress_testimonial_background',
					'priority' => 15,
				)
			)
		);
	}

	/* CallOut Settings  */
	$wp_customize->add_section(
		'awpbusinesspress_theme_cta',
		array(
			'title'    => __( 'CallOut Settings', 'awp-companion' ),
			'panel'    => 'awpbusinesspress_frontpage_settings',
			'priority' => 10,
		)
	);
		// Parent Theme Callout Image.
	if ( 'AwpBusinessPress' == $activate_theme ) {
		// CallOut Background Image.
		$wp_customize->add_setting(
			'awpbusinesspress_cta_background_image',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => awp_companion_plugin_url . '/inc/awpbusinesspress/img/callout/callout-bg.jpg',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'awpbusinesspress_cta_background_image',
				array(
					'label'    => esc_html__( 'Background Image', 'awp-companion' ),
					'section'  => 'awpbusinesspress_theme_cta',
					'settings' => 'awpbusinesspress_cta_background_image',
					'priority' => 15,
				)
			)
		);
	}

	if ( 'Coin Market' == $activate_theme || 'Home Interior' == $activate_theme ) {
		// CallOut Background Image.
		$wp_customize->add_setting(
			'awpbusinesspress_coin_cta_background_image',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => awp_companion_plugin_url . '/inc/awpbusinesspress/img/callout/coin-callout-bg.jpg',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'awpbusinesspress_coin_cta_background_image',
				array(
					'label'    => esc_html__( 'Background Image', 'awp-companion' ),
					'section'  => 'awpbusinesspress_theme_cta',
					'settings' => 'awpbusinesspress_coin_cta_background_image',
					'priority' => 15,
				)
			)
		);
	}

	if ( 'Hospital Health Care' == $activate_theme ) {
		// CallOut Background Image.
		$wp_customize->add_setting(
			'awpbusinesspress_hh_care_cta_background_image',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => awp_companion_plugin_url . '/inc/awpbusinesspress/img/callout/hospital-callout-bg.jpg',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'awpbusinesspress_hh_care_cta_background_image',
				array(
					'label'    => esc_html__( 'Background Image', 'awp-companion' ),
					'section'  => 'awpbusinesspress_theme_cta',
					'settings' => 'awpbusinesspress_hh_care_cta_background_image',
					'priority' => 15,
				)
			)
		);
	}
	if ( 'Business Campaign' == $activate_theme ) {
		// CallOut Background Image.
		$wp_customize->add_setting(
			'awpbusinesspress_bc_cta_background_image',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => awp_companion_plugin_url . '/inc/awpbusinesspress/img/callout/campaign-callout-bg.jpg',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'awpbusinesspress_bc_cta_background_image',
				array(
					'label'    => esc_html__( 'Background Image', 'awp-companion' ),
					'section'  => 'awpbusinesspress_theme_cta',
					'settings' => 'awpbusinesspress_bc_cta_background_image',
					'priority' => 15,
				)
			)
		);
	}

	/* Blog Settings*/
	$wp_customize->add_section(
		'awpbusinesspress_theme_blog',
		array(
			'title'    => __( 'Blog Settings', 'awp-companion' ),
			'panel'    => 'awpbusinesspress_frontpage_settings',
			'priority' => 8,
		)
	);

		$wp_customize->add_setting( 'awpbusinesspress_theme_blog_category', array( 'capability' => 'edit_theme_options' ) );
		$wp_customize->add_control(
			new awpbusinesspress_Customize_Category_Control(
				$wp_customize,
				'awpbusinesspress_theme_blog_category',
				array(
					'label'             => __( 'Choose Blog Category', 'awp-companion' ),
					'section'           => 'awpbusinesspress_theme_blog',
					'settings'          => 'awpbusinesspress_theme_blog_category',
					'sanitize_callback' => 'sanitize_text_field',
				)
			)
		);

	/* Client Settings */
	$wp_customize->add_section(
		'awpbusinesspress_theme_client',
		array(
			'title'    => __( 'Client Settings', 'awpbusinesspress' ),
			'panel'    => 'awpbusinesspress_frontpage_settings',
			'priority' => 25,
		)
	);

	if ( class_exists( 'awpbusinesspress_Repeater' ) ) {
		$wp_customize->add_setting( 'awpbusinesspress_client_content', array() );
		$wp_customize->add_control(
			new awpbusinesspress_Repeater(
				$wp_customize,
				'awpbusinesspress_client_content',
				array(
					'label'                                => esc_html__( 'Client Items Content', 'awpbusinesspress' ),
					'section'                              => 'awpbusinesspress_theme_client',
					'add_field_label'                      => esc_html__( 'Add New Client item', 'awpbusinesspress' ),
					'item_name'                            => esc_html__( 'Client Item', 'awpbusinesspress' ),
					'customizer_repeater_link_control'     => true,
					'customizer_repeater_image_control'    => true,
					'customizer_repeater_checkbox_control' => true,
				)
			)
		);
	}

}
add_action( 'customize_register', 'awp_awpbusinesspress_frontpage_sections_settings' );


function AWP_awpbusinesspress_Customizer_selective_refresh_settings( $wp_customize ) {

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	// Diffrent Themes.
	$activate_theme_data = wp_get_theme(); // getting current theme data.
	$activate_theme      = $activate_theme_data->name;

	if ( 'AwpBusinessPress' == $activate_theme || 'Coin Market' == $activate_theme ) {
		$servicetitle       = 'Our Services';
		$servicedescription = 'We provide the worlds best consulting related services to growth your business.';
	}
	if ( 'Hospital Health Care' == $activate_theme ) {
		$servicetitle       = 'Our Services';
		$servicedescription = 'We provide the worlds best Treatment for our Patients.';
	}
	if ( 'Home Interior' == $activate_theme ) {
		$servicetitle       = 'OUR SERVICES';
		$servicedescription = 'We provide the worlds best Home Designs for our Clients.';
	}
	if ( 'Business Campaign' == $activate_theme ) {
		$servicetitle       = 'Service We Provide';
		$servicedescription = 'Our Latest Services';
	}

	// Service.
	$wp_customize->add_setting(
		'awpbusinesspress_service_area_title',
		array(
			'default'           => __( '' . $servicetitle . '', 'awp-companion' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_service_area_title',
		array(
			'label'    => esc_html__( 'Section Title', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_service',
			'priority' => 4,
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'awpbusinesspress_service_area_des',
		array(
			'default'           => __( '' . $servicedescription . '', 'awp-companion' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_service_area_des',
		array(
			'label'    => esc_html__( 'Section Description', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_service',
			'priority' => 5,
			'type'     => 'textarea',
		)
	);

	// Testimonial.
	$wp_customize->add_setting(
		'awpbusinesspress_testimonial_area_title',
		array(
			'default'           => __( 'Testimonials', 'awp-companion' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_testimonial_area_title',
		array(
			'label'    => esc_html__( 'Section Title', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_testimonial',
			'priority' => 4,
			'type'     => 'text',
		)
	);
	$wp_customize->add_setting(
		'awpbusinesspress_testimonial_area_des',
		array(
			'default'           => __( 'What our customers are saying about us after using our products.', 'awp-companion' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_testimonial_area_des',
		array(
			'label'    => esc_html__( 'Section Description', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_testimonial',
			'priority' => 5,
			'type'     => 'textarea',
		)
	);

	// Blog.
	$wp_customize->add_setting(
		'awpbusinesspress_blog_area_title',
		array(
			'default'           => __( 'Latest News', 'awp-companion' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_blog_area_title',
		array(
			'label'    => esc_html__( 'Section Title', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_blog',
			'priority' => 4,
			'type'     => 'text',
		)
	);
	$wp_customize->add_setting(
		'awpbusinesspress_blog_area_des',
		array(
			'default'           => __( 'Stay updated with the latest news by reading our articles written by content writers in the industry.', 'awp-companion' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_blog_area_des',
		array(
			'label'    => esc_html__( 'Section Description', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_blog',
			'priority' => 5,
			'type'     => 'textarea',
		)
	);

	// CallOut.
	$wp_customize->add_setting(
		'awpbusinesspress_cta_area_subtitle',
		array(
			'default'           => '+215 2153.2159',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_cta_area_subtitle',
		array(
			'label'    => esc_html__( 'Title', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_cta',
			'priority' => 5,
			'type'     => 'text',
		)
	);
	$wp_customize->add_setting(
		'awpbusinesspress_cta_area_des',
		array(
			'default'           => 'Contact Our Agent For Any kind off Business Help (24/7 Available)',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_cta_area_des',
		array(
			'label'    => esc_html__( 'Description', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_cta',
			'priority' => 6,
			'type'     => 'textarea',
		)
	);
	$wp_customize->add_setting(
		'awpbusinesspress_cta_button_text',
		array(
			'default'           => 'Contact Us',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'awpbusinesspress_cta_button_text',
		array(
			'label'    => esc_html__( 'Button Text', 'awp-companion' ),
			'section'  => 'awpbusinesspress_theme_cta',
			'priority' => 10,
			'type'     => 'text',
		)
	);

	if ( 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
		// Team Title.
		$wp_customize->add_setting(
			'awpbusinesspress_team_area_title',
			array(
				'default'           => 'Best Team Available',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => $selective_refresh,
			)
		);
		$wp_customize->add_control(
			'awpbusinesspress_team_area_title',
			array(
				'label'    => esc_html__( 'Title', 'awpbusinesspress' ),
				'section'  => 'awpbusinesspress_theme_team',
				'priority' => 5,
				'type'     => 'text',
			)
		);
		// Team Description.
		$wp_customize->add_setting(
			'awpbusinesspress_team_area_des',
			array(
				'default'           => 'Add Your Team Members Here',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => $selective_refresh,
			)
		);
		$wp_customize->add_control(
			'awpbusinesspress_team_area_des',
			array(
				'label'    => esc_html__( 'Description', 'awpbusinesspress' ),
				'section'  => 'awpbusinesspress_theme_team',
				'priority' => 6,
				'type'     => 'textarea',
			)
		);
	}
}
add_action( 'customize_register', 'AWP_awpbusinesspress_Customizer_selective_refresh_settings' );
