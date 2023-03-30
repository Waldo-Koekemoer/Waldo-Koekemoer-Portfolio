<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Main Slider.
 *
 * @package awp-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'awpbusinesspress_Customize_Homepage_Slider_Option' ) ) :

	class awpbusinesspress_Customize_Homepage_Slider_Option extends awpbusinesspress_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
			
				'awpbusinesspress_main_slider_heading'	=> array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Slider Options', 'awp-companion' ),
						'section' => 'awpbusinesspress_main_theme_slider',
					),
				),
				
	
				'awpbusinesspress_main_slider_disabled'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Slider Enable/Disable', 'awp-companion' ),
						'section'  => 'awpbusinesspress_main_theme_slider',
					),
				),	
				
				'awpbusinesspress_main_slider_overlay_disable'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Overlay Enable/Disable', 'awp-companion' ),
						'section'  => 'awpbusinesspress_main_theme_slider',
					),
				),
				
				'awpbusinesspress_slider_upgrade'	=> array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Slides', 'awp-companion' ),
						'section'  => 'awpbusinesspress_main_theme_slider',
					),
				),

			);

		}

	}

	new awpbusinesspress_Customize_Homepage_Slider_Option();

endif;
