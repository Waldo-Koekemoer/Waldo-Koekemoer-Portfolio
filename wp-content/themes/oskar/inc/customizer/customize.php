<?php
/**
 * Oskar Theme Customizer
 *
 * @package Oskar
 */

function oskar_customizer_files_array() {
	return array( 'controls', 'sanitization', 'assets', 'sections' );
}

function oskar_customizer_settings_array() {
	return array( 'homepage', 'layout', 'colors', 'typography', 'header_image', 'header_footer' );
}

foreach ( oskar_customizer_files_array() as $oskar_customizer_file ) {
	require OSKAR_TEMPLATE_DIR . '/inc/customizer/' . $oskar_customizer_file . '.php';
}

foreach ( oskar_customizer_settings_array() as $oskar_customizer_settings_file ) {
	require OSKAR_TEMPLATE_DIR . '/inc/customizer/settings/' . $oskar_customizer_settings_file . '.php';
}

/**
 * Returns array of all combined customizer settings.
 */
function oskar_customizer_settings() {

	$settings = array();

	foreach ( oskar_customizer_settings_array() as $settings_group ) {
		$function_name = 'oskar_customizer_settings_' . $settings_group;
		$settings = array_merge(
			$settings,
			$function_name()
		);
	}

	return $settings;

}

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object
 */
function oskar_customize_register( $wp_customize ) {

	$wp_customize->get_section('static_front_page')->priority = 21;
	$wp_customize->get_section('colors')->description = esc_html__( 'Oskar automatically creates additional lighter and darker variations of each color, available for use in the editor.', 'oskar' );

	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	$wp_customize->get_control('header_textcolor')->description = esc_html__( 'Site Title and Tagline', 'oskar' );
	$wp_customize->get_control('background_color')->label = esc_html__( 'Background', 'oskar' );
	$wp_customize->get_control('background_color')->description = esc_html__( 'Site background and light text color', 'oskar' );

	/* customizer sections */
	$sections = oskar_customizer_sections();
	foreach ( $sections as $section => $value ) {
		$wp_customize->add_section(
			$section,
			array(
				'title'			=> $value['label'],
				'description'	=> $value['description'],
				'panel'			=> $value['panel'],
				'priority'		=> $value['priority'],
			)
		);
	}

	/* customizer settings & controls */
	foreach ( oskar_customizer_settings() as $setting => $value ) {

		$sanitize_callback = 'oskar_sanitize_' . $value['control'];

		if ( isset( $value['description'] ) ) {
			$description = $value['description'];
		} else {
			$description = '';
		}

		if ( isset( $value['preview'] ) ) {
			$transport = 'postMessage';
		} else {
			$transport = 'refresh';
		}

		if ( isset( $value['priority'] ) ) {
			$priority = $value['priority'];
		} else {
			$priority = NULL;
		}

		if ( isset( $value['plugin'] ) ) {
			if ( $value['plugin']['state'] === 'active' && class_exists( $value['plugin']['class'] ) ) {
				$wp_customize->add_setting(
					$setting,
					array(
						'default'			=> $value['default'],
						'transport'			=> $transport,
						'sanitize_callback'	=> $sanitize_callback,
					)
				);
			} elseif ( $value['plugin']['state'] === 'inactive' && !class_exists( $value['plugin']['class'] ) ) {
				$wp_customize->add_setting(
					$setting,
					array(
						'default'			=> $value['default'],
						'transport'			=> $transport,
						'sanitize_callback'	=> $sanitize_callback,
					)
				);
			}
		} else {
			$wp_customize->add_setting(
				$setting,
				array(
					'default'			=> $value['default'],
					'transport'			=> $transport,
					'sanitize_callback'	=> $sanitize_callback,
				)
			);
		}

		switch ( $value['control'] ) {
			case 'checkbox':
				$wp_customize->add_control(
					$setting,
					array(
						'settings'		=> $setting,
						'section'		=> $value['section'],
						'label'			=> $value['label'],
						'description'	=> $description,
						'type'			=> 'checkbox',
						'priority'		=> $priority
					)
				);
			break;
			case 'color':
				$wp_customize->add_control( 
					new WP_Customize_Color_Control(
						$wp_customize,
						$setting,
						array( 
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'label'			=> $value['label'],
							'description'	=> $description,
							'priority'		=> $priority
						)
					)
				);
			break;
			case 'number':
				$wp_customize->add_control(
					$setting,
					array(
						'settings'		=> $setting,
						'section'		=> $value['section'],
						'label'			=> $value['label'],
						'description'	=> $description,
						'type'			=> 'number',
						'input_attrs'	=> $value['attrs'],
						'priority'		=> $priority
					)
				);
			break;
			case 'select':
				$wp_customize->add_control(
					$setting,
					array(
						'settings'		=> $setting,
						'section'		=> $value['section'],
						'label'			=> $value['label'],
						'description'	=> $description,
						'type'			=> 'select',
						'choices'		=> $value['choices'],
						'priority'		=> $priority
					)
				);
			break;
			case 'page_select':
				$wp_customize->add_control(
					$setting,
					array(
						'settings'		=> $setting,
						'section'		=> $value['section'],
						'label'			=> $value['label'],
						'description'	=> $description,
						'type'			=> 'dropdown-pages',
						'priority'		=> $priority
					)
				);
			break;
			case 'text':
				$wp_customize->add_control(
					$setting,
					array(
						'settings'		=> $setting,
						'section'		=> $value['section'],
						'label'			=> $value['label'],
						'description'	=> $description,
						'type'			=> 'text',
						'input_attrs' => array(
							'placeholder' => $value['placeholder'],
						),
						'priority'		=> $priority
					)
				);
			break;
			case 'image_radio':
				$wp_customize->add_control(
					new Oskar_Image_Radio_Control(
						$wp_customize,
						$setting,
						array(
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'label'			=> $value['label'],
							'description'	=> $description,
							'type'			=> 'radio',
							'choices'		=> $value['choices'],
							'priority'		=> $priority
						)
					)
				);
			break;
			case 'icon_select':
				$wp_customize->add_control(
					new Oskar_Icon_Choices(
						$wp_customize,
						$setting,
						array(
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'label'			=> $value['label'],
							'description'	=> $description,
							'type'			=> 'select',
							'priority'		=> $priority
						)
					)
				);
			break;
			case 'sortable':
				$wp_customize->add_control(
					new Oskar_Sortable_Checkboxes(
						$wp_customize,
						$setting,
						array(
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'label'			=> $value['label'],
							'description'	=> $description,
							'choices'		=> $value['choices'],
							'priority'		=> $priority
						)
					)
				);
			break;
			case 'heading_large':
				$wp_customize->add_control(
					new Oskar_Customize_Heading_Large(
						$wp_customize,
						$setting,
						array(
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'label'			=> $value['label'],
							'description'	=> $description,
							'priority'		=> $priority
						)
					)
				);
			break;
			case 'heading_small':
				$wp_customize->add_control(
					new Oskar_Customize_Heading_Small(
						$wp_customize,
						$setting,
						array(
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'label'			=> $value['label'],
							'description'	=> $description,
							'priority'		=> $priority
						)
					)
				);
			break;
			case 'helper_text':
				$wp_customize->add_control(
					new Oskar_Customize_Helper_Text(
						$wp_customize,
						$setting,
						array(
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'label'			=> $value['label'],
							'description'	=> $description,
							'priority'		=> $priority
						)
					)
				);
			break;
			case 'extra_button':
				$wp_customize->add_control(
					new Oskar_Customize_Extra_Control(
						$wp_customize,
						$setting,
						array(
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'type'			=> 'button',
							'label'			=> $value['label'],
							'url'			=> $value['url'],
							'priority'		=> $priority
						)
					)
				);
			break;
			default:
				$wp_customize->add_control(
					new Oskar_Customize_Label(
						$wp_customize,
						$setting,
						array(
							'settings'		=> $setting,
							'section'		=> $value['section'],
							'label'			=> $value['label'],
							'description'	=> $description,
							'priority'		=> $priority
						)
					)
				);
			break;
		}
	}

	$wp_customize->add_control(
		new Oskar_Customize_Extra_Control(
			$wp_customize,
			'go_pro',
			array(
				'section'   => 'theme_upgrade',
				'type'	  => 'button',
				'label'		=> esc_html__( 'Get Oskar Pro', 'oskar' ) . ' →',
				'url'		=> 'https://uxlthemes.com/theme/oskar-pro/'
			)
		)
	);

}
add_action( 'customize_register', 'oskar_customize_register' );

function oskar_customizer_color_scheme() {
	$admin_color_scheme = get_user_option( 'admin_color' );
	if ( $admin_color_scheme ) {
		switch ( $admin_color_scheme ) {
			case 'fresh':
				$highlight_color = '#2271b1';
				$highlight_color_bg = '#72aee6';
				break;

			case 'light':
				$highlight_color = '#04a4cc';
				$highlight_color_bg = '#72aee6';
				break;

			case 'modern':
				$highlight_color = '#3858e9';
				$highlight_color_bg = '#72aee6';
				break;

			case 'blue':
				$highlight_color = '#e1a948';
				$highlight_color_bg = '#52accc';
				break;

			case 'coffee':
				$highlight_color = '#c7a589';
				$highlight_color_bg = '#59524c';
				break;

			case 'ectoplasm':
				$highlight_color = '#a3b745';
				$highlight_color_bg = '#523f6d';
				break;

			case 'midnight':
				$highlight_color = '#e14d43';
				$highlight_color_bg = '#363b3f';
				break;

			case 'ocean':
				$highlight_color = '#9ebaa0';
				$highlight_color_bg = '#738e96';
				break;

			case 'sunrise':
				$highlight_color = '#dd823b';
				$highlight_color_bg = '#cf4944';
				break;
			
			default:
				$highlight_color = '#2271b1';
				$highlight_color_bg = '#72aee6';
				break;
		}
	}
	return 'body{--oskar-highlight-color:' . esc_attr( $highlight_color ) . ';--oskar-highlight-color-bg:' . esc_attr( $highlight_color_bg ) . ';}';
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function oskar_customize_preview_script() {
	wp_enqueue_script( 'oskar-customizer-preview', OSKAR_TEMPLATE_DIR_URI . '/assets/js/customizer.js', array('customize-preview'), OSKAR_VERSION, true );
	wp_localize_script( 'oskar-customizer-preview', 'oskar_featured_services', array( 'number' => oskar_featured_services_number() ) );
	wp_localize_script( 'oskar-customizer-preview', 'oskar_latest_posts', oskar_customize_get_latest_posts() );
	wp_localize_script( 'oskar-customizer-preview', 'oskar_published_pages', oskar_customize_get_published_pages() );
	wp_localize_script( 'oskar-customizer-preview', 'oskar_preview_attrs', oskar_customize_preview_live_attrs() );
}
add_action( 'customize_preview_init', 'oskar_customize_preview_script' );

function oskar_customizer_script() {
	wp_enqueue_script( 'oskar-customizer-script', OSKAR_TEMPLATE_DIR_URI .'/assets/js/customizer-scripts.js', array( 'jquery', 'jquery-ui-draggable' ), OSKAR_VERSION );
	wp_enqueue_script( 'oskar-sortable-checkbox', OSKAR_TEMPLATE_DIR_URI . '/assets/js/oskar-sortable-checkbox.js', array( 'jquery', 'jquery-ui-sortable', 'customize-controls' ), OSKAR_VERSION );
	wp_enqueue_style( 'oskar-fontawesome', OSKAR_TEMPLATE_DIR_URI . '/assets/fontawesome/css/all.min.css', '', OSKAR_VERSION );
	wp_enqueue_style( 'oskar-customizer-style', OSKAR_TEMPLATE_DIR_URI .'/assets/css/customizer-style.css', '', OSKAR_VERSION );
	wp_add_inline_style( 'oskar-customizer-style', oskar_customizer_color_scheme(), 'after' );
}
add_action( 'customize_controls_enqueue_scripts', 'oskar_customizer_script' );
