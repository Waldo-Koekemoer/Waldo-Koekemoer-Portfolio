<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Service.
 *
 * @package awp-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'awpbusinesspress_Customize_Homepage_Service_Option' ) ) :

	class awpbusinesspress_Customize_Homepage_Service_Option extends awpbusinesspress_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'awpbusinesspress_main_service_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Service Options', 'awp-companion' ),
						'section' => 'awpbusinesspress_theme_service',
					),
				),
					
				'awpbusinesspress_service_area_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Service Enable/Disable', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_service',
					),
				),
				
				'awpbusinesspress_service_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Service', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_service',
					),
				),

			);

		}

	}

	new awpbusinesspress_Customize_Homepage_Service_Option();

endif;
