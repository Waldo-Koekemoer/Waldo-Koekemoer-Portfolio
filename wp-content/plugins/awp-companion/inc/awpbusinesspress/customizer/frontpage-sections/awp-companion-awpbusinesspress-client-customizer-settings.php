<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Frontpage Client.
 *
 * @package awp-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'awpbusinesspress_Customize_Homepage_Client_Option' ) ) :

	class awpbusinesspress_Customize_Homepage_Client_Option extends awpbusinesspress_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'awpbusinesspress_client_heading'        => array(
					'setting' => array(),
					'control' => array(
						'type'     => 'heading',
						'priority' => 1,
						'label'    => esc_html__( 'Client Options', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_client',
					),
				),

				// Client Enable.
				'awpbusinesspress_client_disabled'       => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 3,
						'label'    => esc_html__( 'Client Enable/Disable', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_client',
					),
				),

				'awpbusinesspress_client_upgrade'        => array(
					'setting' => array(),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Client', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_client',
					),
				),

				// container.
				'awpbusinesspress_client_container_size' => array(
					'setting' => array(
						'default'           => 'container-full',
						'sanitize_callback' => array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'radio',
						'priority'        => 25,
						'is_default_type' => true,
						'label'           => esc_html__( 'Client Width', 'awp-companion' ),
						'section'         => 'awpbusinesspress_theme_client',
						'choices'         => array(
							'container'      => esc_html__( 'Container', 'awp-companion' ),
							'container-full' => esc_html__( 'Container Full', 'awp-companion' ),
						),
					),
				),
			);
		}
	}

	new awpbusinesspress_Customize_Homepage_Client_Option();

endif;
