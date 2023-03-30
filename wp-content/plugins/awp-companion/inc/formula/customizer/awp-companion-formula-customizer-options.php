<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Extend customizer section.
 *
 * @package formula
 *
 * @see     WP_Customize_Section
 * @access  public
 */
 
function awp_formula_frontpage_sections_settings( $wp_customize ){
	
	$active_callback	= isset( $array['active_callback'] ) ? $array['active_callback'] : null;
			
	/* Frontpage panel */
	$wp_customize->add_panel( 'formula_frontpage_settings', array(
		'priority'		=> 8,
		'capability'	=> 'edit_theme_options',
		'title'			=> __('Frontpage Sections', 'formula'),
	) );

	/* Slider Settings */
	$wp_customize->add_section( 'formula_main_theme_slider' , array(
		'title'			=> __('Slider Settings', 'formula'),
		'panel'			=> 'formula_frontpage_settings',
		'priority'		=> 2,
	));

		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_main_slider_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_main_slider_content', array(
				'label'                             => esc_html__( 'Slider Items Content', 'formula' ),
				'section'                           => 'formula_main_theme_slider',
				'add_field_label'                   => esc_html__( 'Add new slide', 'formula' ),
				'item_name'                         => esc_html__( 'Slide Item', 'formula' ),
				'priority'                          => 9,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_subtitle_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_checkbox_control' => true,
				'customizer_repeater_slide_content_format_type' => true,
				'active_callback'	=> 'formula_main_slider_content',
			)));
		}
		// Slider Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/slider-callback.php';

	/* Service Settings */
	$wp_customize->add_section( 'formula_theme_service' , array(
		'title'			=> __('Service Settings', 'formula'),
		'panel'			=> 'formula_frontpage_settings',
		'priority'		=> 4,
	) ); 

		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_service_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_service_content', array(
				'label'                             => esc_html__( 'Service Items Content', 'formula' ),
				'section'                           => 'formula_theme_service',
				'priority'                          => 9,
				'add_field_label'                   => esc_html__( 'Add new service', 'formula' ),
				'item_name'                         => esc_html__( 'Service Item', 'formula' ),
				'customizer_repeater_image_control' => true,
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				'active_callback' => 'formula_service_content',
				) ) );
		}

		// Service Background Image.
			$wp_customize->add_setting( 'formula_service_background', array(
				  'default'				=> awp_companion_plugin_url . 'inc/formula/img/service/service-shape.png',
				  'sanitize_callback' 	=> 'esc_url_raw',
				) );
				
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'formula_service_background', array(
			  'label'			=> __( 'Background Image', 'formula' ),
			  'priority'		=> 12,
			  'section'			=> 'formula_theme_service',
			  'settings'		=> 'formula_service_background',
			  'active_callback'	=> 'formula_service_background',
			) ) );
		// Service background Image End.

		// Service Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/service-callback.php';

	/* Funfact Settings */
	$wp_customize->add_section( 'formula_theme_funfact' , array(
		'title'			=> __('Funfact Settings', 'formula'),
		'panel'			=> 'formula_frontpage_settings',
		'priority'		=> 4,
	));

		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_funfact_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_funfact_content', array(
				'label'                             => esc_html__( 'Funfact Items Content', 'formula' ),
				'section'                           => 'formula_theme_funfact',
				'add_field_label'                   => esc_html__( 'Add new Funfact', 'formula' ),
				'item_name'                         => esc_html__( 'Funfact Item', 'formula' ),
				'priority'                          => 9,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_icon_control'  => true,
				'active_callback' => 'formula_funfact_content',
			)));
		}

		// Funfact Background Image.
		$wp_customize->add_setting( 'formula_funfact_background', array(
			  'default'				=> awp_companion_plugin_url . 'inc/formula/img/funfact-shape.png',
			  'sanitize_callback' 	=> 'esc_url_raw',
			) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'formula_funfact_background', array(
		  'label'			=> __( 'Background Image', 'formula' ),
		 // 'description'		=> __( 'Note: This setting uses only for homepage template 1', 'formula' ),
		  'section'			=> 'formula_theme_funfact',
		  'settings'		=> 'formula_funfact_background',
		  'active_callback'	=> 'formula_funfact_background',
		) ) );

		// Funfact Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/funfact-callback.php';

	/* Portfolio Settings */
	$wp_customize->add_section( 'formula_theme_portfolio' , array(
		'title'		=> __('Portfolio Settings', 'formula'),
		'panel'		=> 'formula_frontpage_settings',
		'priority'	=> 7,
	) ); 

		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_portfolio_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_portfolio_content', array(
				'label'                             => esc_html__( 'Portfolio Items Content', 'formula' ),
				'section'                           => 'formula_theme_portfolio',
				'add_field_label'                   => esc_html__( 'Add New Portfolio', 'formula' ),
				'item_name'                         => esc_html__( 'Portfolio Item', 'formula' ),
				'priority'                          => 9,
				'customizer_repeater_title_control'		=> true,
				'customizer_repeater_subtitle_control'	=> true,
				'customizer_repeater_link_control'		=> true,
				'customizer_repeater_image_control'		=> true,
				'customizer_repeater_checkbox_control'	=> true,
				'active_callback'						=> 'formula_portfolio_content',
			)));
		}

		// Portfolio Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/portfolio-callback.php';

	/* Testimonial Settings */
	$wp_customize->add_section( 'formula_theme_testimonial' , array(
		'title'		=> __('Testimonial Settings', 'formula'),
		'panel'		=> 'formula_frontpage_settings',
		'priority'	=> 9,
	) ); 

		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_testimonial_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_testimonial_content', array(
				'label'                             => esc_html__( 'Testimonial Items Content', 'formula' ),
				'section'                           => 'formula_theme_testimonial',
				'add_field_label'                   => esc_html__( 'Add new testimonial item', 'formula' ),
				'item_name'                         => esc_html__( 'Testimonial Item', 'formula' ),
				'priority'                          => 9,
				'customizer_repeater_title_control'			=> true,
				'customizer_repeater_subtitle_control'		=> true,
				'customizer_repeater_text_control'			=> true,
				'customizer_repeater_image_control'			=> true,
				'customizer_repeater_designation_control'	=> true,
				'active_callback'					=> 'formula_testimonial_content',
			) ) );
		}

		// Testimonial Background Image.
		$wp_customize->add_setting( 'formula_testimonial_background', array(
		  'default' 	=> '',
		  'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'formula_testimonial_background', array(
		  'label'   	 => __( 'Background Image', 'formula' ),
		  'section' 	 => 'formula_theme_testimonial',
		  'settings'	 => 'formula_testimonial_background',
		  'active_callback' => 'formula_testimonial_background',
		) ) );

		// Testimonials Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/testimonial-callback.php';

	/* Blog Settings*/
	$wp_customize->add_section( 'formula_theme_blog' , array(
		'title'		=> __('Blog Settings', 'formula'),
		'panel'		=> 'formula_frontpage_settings',
		'priority'	=> 12,
	) ); 
		//Blog Category.
		$wp_customize->add_setting( 'formula_theme_blog_category',array('capability'     => 'edit_theme_options',) );	
		$wp_customize->add_control( new formula_Customize_Category_Control( $wp_customize, 'formula_theme_blog_category', array(
			'label'		=> __('Choose Blog Category','formula'),
			'section'	=> 'formula_theme_blog',
			'settings'	=> 'formula_theme_blog_category',
			'sanitize_callback'	=> 'sanitize_text_field',
			//'active_callback' => 'formula_theme_blog_category',
		) ) );

		// Blog Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/blog-callback.php';

	/* Team Settings  */
	$wp_customize->add_section( 'formula_theme_team' , array(
		'title'		=> __('Team Settings', 'formula'),
		'panel'		=> 'formula_frontpage_settings',
		'priority'	=> 16,
	) ); 

		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_team_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_team_content', array(
				'label'                             => esc_html__( 'Team Items Content', 'formula' ),
				'section'                           => 'formula_theme_team',
				'add_field_label'                   => esc_html__( 'Add new Team', 'formula' ),
				'item_name'                         => esc_html__( 'Team Item', 'formula' ),
				'priority'                          => 9,
				'customizer_repeater_title_control'	=> true,
				'customizer_repeater_link_control'	=> true,
				'customizer_repeater_image_control'	=> true,
				'customizer_repeater_checkbox_control'	=> true,
				'customizer_repeater_designation_control'	=> true,
				'customizer_repeater_repeater_control'	=> true,	
				'active_callback'					=> 'formula_team_content',
			)));
		}

		// Team Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/team-callback.php';

	/* Cta Settings  */
	$wp_customize->add_section( 'formula_theme_cta' , array(
		'title'		=> __('CallOut Settings', 'formula'),
		'panel'		=> 'formula_frontpage_settings',
		'priority'	=> 20,
	) ); 

		//Cta Background Image.
		$wp_customize->add_setting( 'formula_cta_background_image', array(
		  'sanitize_callback' => 'esc_url_raw',
		  'default' => awp_companion_plugin_url . 'inc/formula/img/callout/callout-bg.jpg',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'formula_cta_background_image', array(
		  'label'    => esc_html__( 'Background Image', 'formula' ),
		  'section'  => 'formula_theme_cta',
		  'settings' => 'formula_cta_background_image',
		  'priority'        => 15,
		  'active_callback' => 'formula_cta_background_image',
		) ) );

		// Cta Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/cta-callback.php';

	/* Client Settings */
	$wp_customize->add_section( 'formula_theme_client' , array(
		'title'		=> __('Client Settings', 'formula'),
		'panel'		=> 'formula_frontpage_settings',
		'priority'	=> 25,
	) ); 

		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_client_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_client_content', array(
				'label'                             => esc_html__( 'Client Items Content', 'formula' ),
				'section'                           => 'formula_theme_client',
				'add_field_label'                   => esc_html__( 'Add new Client item', 'formula' ),
				'item_name'                         => esc_html__( 'Client Item', 'formula' ),
				'priority'                          => 9,
				'customizer_repeater_link_control'	=> true,
				'customizer_repeater_image_control'	=> true,
				'customizer_repeater_checkbox_control'	=> true,
				'active_callback'					=> 'formula_client_content',
			) ) );
		}

		// Client Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/client-callback.php';

	/* Top Info Settings  */
	/* $wp_customize->add_section( 'formula_theme_top_info' , array(
		'title'		=> __('Top Info Settings', 'formula'),
		'panel'		=> 'formula_frontpage_settings',
		'priority'	=> 3,
	) );
	
		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_top_info_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_top_info_content', array(
				'label'                             => esc_html__( 'Info Items Content', 'formula' ),
				'section'                           => 'formula_theme_top_info',
				'priority'                          => 10,
				'add_field_label'                   => esc_html__( 'Add New Info', 'formula' ),
				'item_name'                         => esc_html__( 'Info Item', 'formula' ),
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				//'active_callback' => 'formula_top_info_content',
			) ) );
		}
		 */
	// Top Info Active Callback.
	//	include('frontpage-callback/top-info-callback.php');

	/* Footer Info Settings  */
	/* $wp_customize->add_section( 'formula_theme_footer_info' , array(
		'title'		=> __('Footer info Settings', 'formula'),
		'panel'		=> 'formula_frontpage_settings',
		'priority'	=> 28,
	) );

		if ( class_exists( 'formula_Repeater' ) ) {
			$wp_customize->add_setting( 'formula_footer_info_content', array( ) );
			$wp_customize->add_control( new formula_Repeater( 
			$wp_customize, 'formula_footer_info_content', array(
				'label'                             => esc_html__( 'Info Items Content', 'formula' ),
				'section'                           => 'formula_theme_footer_info',
				'priority'                          => 10,
				'add_field_label'                   => esc_html__( 'Add New Info', 'formula' ),
				'item_name'                         => esc_html__( 'Info Item', 'formula' ),
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				'active_callback' => 'formula_footer_info_content',
			) ) );
		}
	 */
	//  Footer Info Active Callback.
	//	include('frontpage-callback/footer-info-callback.php');

	if ( class_exists( 'WooCommerce' ) ) {
		/* Woocommerce Settings  */
		$wp_customize->add_section( 'formula_theme_woocommerce' , array(
			'title'		=> __('Woocoomerce Settings', 'formula'),
			'panel'		=> 'formula_frontpage_settings',
			'priority'	=> 30,
		) );
		
		// woocommerce Active Callback.
		require awp_companion_plugin_dir . 'inc/formula/frontpage-callback/woocommerce-callback.php';
	}
}
add_action( 'customize_register', 'awp_formula_frontpage_sections_settings' );

function AWP_formula_Customizer_selective_refresh_settings($wp_customize) {
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	
	// Service Title.
	$wp_customize->add_setting( 'formula_service_area_title',array(
		'default'			=> __('What We Do','formula'),
		'sanitize_callback'	=> 'formula_sanitize_text',
		'transport'			=> $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_service_area_title',array(
		'label'			=> esc_html__( 'Section Title', 'formula' ),
		'section'		=> 'formula_theme_service',
		'priority'		=> 4,
		'type'			=> 'text',
		'active_callback'	=> 'formula_service_area_title',
	));	
	// Service Desc.
	$wp_customize->add_setting( 'formula_service_area_des',array(
		'default'			=> __('Services we can help you.','formula'),
		'sanitize_callback'	=> 'formula_sanitize_text',
		'transport'			=> $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_service_area_des',array(
		'label'		=> esc_html__( 'Section Description', 'formula' ),
		'section'	=> 'formula_theme_service',
		'priority'	=> 5,
		'type'		=> 'textarea',
		'active_callback'	=> 'formula_service_area_des',
	));	
	
	// Portflio Title.
	$wp_customize->add_setting( 'formula_project_area_title',array(
		'default'			=> __('Our latest projects','formula'),
		'sanitize_callback'	=> 'formula_sanitize_text',
		'transport'			=> $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_project_area_title',array(
		'label'			=> esc_html__( 'Section Title', 'formula' ),
		'section'		=> 'formula_theme_portfolio',
		'priority'		=> 4,
		'type'			=> 'text',
		'active_callback'	=> 'formula_project_area_title',
	));	
	// Portflio Desc.
	$wp_customize->add_setting( 'formula_project_area_des',array(
		'default'			=> __('Portfolio','formula'),
		'sanitize_callback'	=> 'formula_sanitize_text',
		'transport'			=> $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_project_area_des',array(
		'label'		=> esc_html__( 'Section Description', 'formula' ),
		'section'	=> 'formula_theme_portfolio',
		'priority'	=> 5,
		'type'		=> 'textarea',
		'active_callback'	=> 'formula_project_area_des',
	));	

	// Testimonial Title.
	$wp_customize->add_setting( 'formula_testimonial_area_title',array(
		'default' => __('CUSTOMER FEEDBACKS ABOUT US','formula'),
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_testimonial_area_title',array(
		'label'   => esc_html__( 'Section Title', 'formula' ),
		'section' => 'formula_theme_testimonial',
		'priority'        => 4,
		'type' => 'text',
		'active_callback'	=> 'formula_testimonial_area_title',
	));	
	// Testimonial Desc.
	$wp_customize->add_setting( 'formula_testimonial_area_des',array(
		'default' => __('Happy Customers!','formula'),
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_testimonial_area_des',array(
		'label'   => esc_html__( 'Section Description', 'formula' ),
		'section' => 'formula_theme_testimonial',
		'priority'        => 5,
		'type' => 'textarea',
		'active_callback'	=> 'formula_testimonial_area_des',
	));


	// Blog Title.
	$wp_customize->add_setting( 'formula_blog_area_title',array(
		'default' => __('Latest News','formula'),
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_blog_area_title',array(
		'label'   => esc_html__( 'Section Title', 'formula' ),
		'section' => 'formula_theme_blog',
		'priority'        => 4,
		'type' => 'text',
		'active_callback'	=> 'formula_blog_area_title',
	));
	// Blog Description.
	$wp_customize->add_setting( 'formula_blog_area_des',array(
		'default' => __('Blog','formula'),
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_blog_area_des',array(
		'label'   => esc_html__( 'Section Description', 'formula' ),
		'section' => 'formula_theme_blog',
		'priority'        => 5,
		'type' => 'textarea',
		'active_callback'	=> 'formula_blog_area_des',
	));
	// Blog Button Text.
	$wp_customize->add_setting(	'formula_blog_area_button',array(
		'default'	=> __('Show More','formula'),
		'transport'	=> $selective_refresh,
	));	
	$wp_customize->add_control('formula_blog_area_button',array(
		'label'		=> __('Button Text','formula'),
		'section'	=> 'formula_theme_blog',
		'type'		=> 'text',
		'priority'	=> 20,
		'active_callback'	=> 'formula_blog_area_button',
	));
	// Button Link.
	$wp_customize->add_setting(	'formula_blog_section_button_link',array(
		'default'	=> '',
		'transport'	=> $selective_refresh,
	));	
	$wp_customize->add_control('formula_blog_section_button_link',array(
		'label'		=> __('Button Link','formula'),
		'section'	=> 'formula_theme_blog',
		'type'		=> 'url',
		'priority'	=> 25,
		'active_callback'	=> 'formula_blog_section_button_link',
	));
	
	// Team Title.
	$wp_customize->add_setting( 'formula_team_area_title',array(
		'default' => 'Our Team',
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_team_area_title',array(
		'label'   => esc_html__( 'Title', 'formula' ),
		'section' => 'formula_theme_team',
		'priority'        => 5,
		'type' => 'text',
		'active_callback'	=> 'formula_team_area_title',
	));
	// Team Description.
	$wp_customize->add_setting( 'formula_team_area_des',array(
		'default' => 'Know our expert team agents.',
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_team_area_des',array(
		'label'   => esc_html__( 'Description', 'formula' ),
		'section' => 'formula_theme_team',
		'priority'        => 6,
		'type' => 'textarea',
		'active_callback'	=> 'formula_team_area_des',
	));	
	
	// Sponsors Title.
	$wp_customize->add_setting( 'formula_client_area_title',array(
		'default' => '',
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_client_area_title',array(
		'label'   => esc_html__( 'Title', 'formula' ),
		'section' => 'formula_theme_client',
		'priority'        => 5,
		'type' => 'text',
		'active_callback'	=> 'formula_client_area_title',
	));
	// Sponsors Description.
	$wp_customize->add_setting( 'formula_client_area_desc',array(
		'default' => '',
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_client_area_desc',array(
		'label'   => esc_html__( 'Description', 'formula' ),
		'section' => 'formula_theme_client',
		'priority'        => 6,
		'type' => 'textarea',
		'active_callback'	=> 'formula_client_area_desc',
	));	
	
	// CallOut Title.
	$wp_customize->add_setting( 'formula_cta_area_title',array(
		'default' => 'Have any project?',
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));
	$wp_customize->add_control( 'formula_cta_area_title',array(
		'label'   => esc_html__( 'Title', 'formula' ),
		'section' => 'formula_theme_cta',
		'priority'        => 5,
		'type' => 'text',
		'active_callback'	=> 'formula_cta_area_title',
	));
	// CallOut Description.
	$wp_customize->add_setting( 'formula_cta_area_des',array(
		'default' => 'Let"s Talk',
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));
	$wp_customize->add_control( 'formula_cta_area_des',array(
		'label'   => esc_html__( 'Description', 'formula' ),
		'section' => 'formula_theme_cta',
		'priority'        => 6,
		'type' => 'textarea',
		'active_callback'	=> 'formula_cta_area_des',
	));
	// CallOut Button Text.
	$wp_customize->add_setting( 'formula_cta_button_text',array(
		'default' => 'Contact Us',
		'sanitize_callback' => 'formula_sanitize_text',
		'transport' => $selective_refresh,
	));
	$wp_customize->add_control( 'formula_cta_button_text',array(
		'label'   => esc_html__( 'Button Text', 'formula' ),
		'section' => 'formula_theme_cta',
		'priority'        => 10,
		'type' => 'text',
		'active_callback'	=> 'formula_cta_button_text',
	));
	
	//callout title 1.
	$wp_customize->add_setting('top_bottom_info_title_1',array(
		'default'	=> __('Head Office','formula'),
		'transport'	=> $selective_refresh,
	));	
	$wp_customize->add_control('top_bottom_info_title_1',array(
		'label'		=> __('Title','formula'),
		'section'	=> 'formula_theme_info',
		'type'		=> 'text',
		'active_callback'	=> 'top_bottom_info_title_1',
	));
	
	//callout Description 1.
	$wp_customize->add_setting('top_bottom_info_desc_1',array(
		'default'	=> __('1026 Park Avenue, San Diago, US','formula'),
		'transport'	=> $selective_refresh,
	));	
	$wp_customize->add_control('top_bottom_info_desc_1',array(
		'label'		=> __('Description','formula'),
		'section'	=> 'formula_theme_info',
		'type'		=> 'textarea',
		'active_callback'	=> 'top_bottom_info_desc_1',
	));
	
	/* 	//callout Icon 1.
	$wp_customize->add_setting('top_bottom_info_icon_1',array(
		'default'	=> __('fa-map-marker','formula'),
		'transport'	=> $selective_refresh,
	));	
	$wp_customize->add_control('top_bottom_info_icon_1',array(
		'label'		=> __('Title','formula'),
		'section'	=> 'formula_theme_info',
		'type'		=> 'text',
	)); */
	
	// callout title 2.
	$wp_customize->add_setting('top_bottom_info_title_2',array(
		'default'		=> __('Call Us','formula'),
		'transport'		=> $selective_refresh,
	));	
	$wp_customize->add_control('top_bottom_info_title_2',array(
		'label'		=> __('Title','formula'),
		'section'	=> 'formula_theme_info',
		'type'		=> 'text',
		'active_callback'	=> 'top_bottom_info_title_2',
	));
	
	// callout Description 2.
	$wp_customize->add_setting('top_bottom_info_desc_2',array(
		'default'		=> __('(+97) 750-290-3353','formula'),
		'transport'		=> $selective_refresh,
	));	
	$wp_customize->add_control('top_bottom_info_desc_2',array(
		'label'		=> __('Description','formula'),
		'section'	=> 'formula_theme_info',
		'type'		=> 'textarea',
		'active_callback'	=> 'top_bottom_info_desc_2',
	));
	
	// callout title 3.
	$wp_customize->add_setting('top_bottom_info_title_3',array(
		'default'	=> __('Email Us:','formula'),
		'transport'	=> $selective_refresh,
	));	
	$wp_customize->add_control('top_bottom_info_title_3',array(
		'label'		=> __('Title','formula'),
		'section'	=> 'formula_theme_info',
		'type'		=> 'text',
		'active_callback'	=> 'top_bottom_info_title_3',
	));
	
	// callout Description 3.
	$wp_customize->add_setting('top_bottom_info_desc_3',array(
		'default'	=> __('info@awordpress.com','formula'),
		'transport'	=> $selective_refresh,
	));	
	$wp_customize->add_control('top_bottom_info_desc_3',array(
		'label'		=> __('Description','formula'),
		'section'	=> 'formula_theme_info',
		'type'		=> 'textarea',
		'active_callback'	=> 'top_bottom_info_desc_3',
	));

	// Woocommerce Title.
	$wp_customize->add_setting( 'formula_woocommerce_area_title',array(
		'default'			=> 'FEATURED PRODUCTS',
		'sanitize_callback'	=> 'formula_sanitize_text',
		'transport'			=> $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_woocommerce_area_title',array(
		'label'		=> esc_html__( 'Title', 'formula' ),
		'section'	=> 'formula_theme_woocommerce',
		'priority'	=> 6,
		'type'		=> 'text',
		'active_callback'	=> 'formula_woocommerce_area_title',
	));	
	
	// Woocommerce Description.
	$wp_customize->add_setting( 'formula_woocommerce_area_desc',array(
		'default'			=> 'Showcase your products in this beautiful shop section',
		'sanitize_callback'	=> 'formula_sanitize_text',
		'transport'			=> $selective_refresh,
	));	
	$wp_customize->add_control( 'formula_woocommerce_area_desc',array(
		'label'		=> esc_html__( 'Description', 'formula' ),
		'section'	=> 'formula_theme_woocommerce',
		'priority'	=> 6,
		'type'		=> 'textarea',
		'active_callback'	=> 'formula_woocommerce_area_desc',
	));	
}
add_action( 'customize_register', 'AWP_formula_Customizer_selective_refresh_settings' );