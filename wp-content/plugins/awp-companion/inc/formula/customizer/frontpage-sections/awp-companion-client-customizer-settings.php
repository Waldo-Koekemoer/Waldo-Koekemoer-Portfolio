<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Client.
 *
 * @package formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Homepage_Client_Option' ) ) :

	class formula_Customize_Homepage_Client_Option extends formula_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'formula_client_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Client Options', 'formula' ),
						'section' => 'formula_theme_client',
					),
				),
					
				// Client Enable
				'formula_client_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 3,
						'label'    => esc_html__( 'Client Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_client',
					),
				),
				
				// Client Autoplay
				'formula_client_autoplay'           => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 15,
						'label'    => esc_html__( 'Client Autoplay', 'formula' ),
						'section'  => 'formula_theme_client',
						'active_callback' => 'formula_client_autoplay',
					),
				),
				
				// Client Animation Speed
				'formula_client_animation_speed' => array('setting' => array(
					'default'           => '4000',
					'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'select',
						'priority'        => 20,
						'is_default_type' => true,
						'label'           => esc_html__( 'Client Animation Speed', 'formula' ),
						'description'     => esc_html__( 'Note: Turn on Autoplay', 'formula' ),
						'section'         => 'formula_theme_client',
						'choices'         => array(
							'2000' => esc_html__( '2.0', 'formula' ),
							'3000' => esc_html__( '3.0', 'formula' ),
							'4000' => esc_html__( '4.0', 'formula' ),
							'5000' => esc_html__( '5.0', 'formula' ),
							'6000' => esc_html__( '6.0', 'formula' ),
						),
						'active_callback' => 'formula_client_animation_speed',
					),
				),
				
				// container
				'formula_client_container_size'     => array(
					'setting' => array(
						'default'			=> 'container',
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'				=> 'radio',
						'priority'			=> 25,
						'is_default_type'	=> true,
						'label'				=> esc_html__( 'Client Width', 'formula' ),
						'section'			=> 'formula_theme_client',
						'choices'			=> array(
							'container'		=> esc_html__( 'Container', 'formula' ),
							'container-full'=> esc_html__( 'Container Full', 'formula' ),
						),
						'active_callback' => 'formula_client_container_size',
					),
				),
				// column layout
				'formula_client_column_layout'	=> array(
					'setting'	=> array(
						'default'           => 3,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control'	=> array(
						'type'		=> 'radio_image',
						'priority'	=> 30,
						'label'		=> esc_html__( 'Column Layout', 'formula' ),
						'section'	=> 'formula_theme_client',
						'choices'	=> array(
							'2'	=> FORMULA_THEME_URL . '/assets/images/icons/column-2.png',
							'3'	=> FORMULA_THEME_URL . '/assets/images/icons/column-3.png',
							'4'	=> FORMULA_THEME_URL . '/assets/images/icons/column-4.png',
							'5'	=> FORMULA_THEME_URL . '/assets/images/icons/column-5.png',
							'6'	=> FORMULA_THEME_URL . '/assets/images/icons/column-6.png',
							'7'	=> FORMULA_THEME_URL . '/assets/images/icons/column-7.png',
						),
						'active_callback' => 'formula_client_column_layout',
					),
					
				),
				
				
				'formula_client_upgrade'	=> array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 10,
						'label'    => esc_html__( 'Client', 'awp-companion' ),
						'section'  => 'formula_theme_client',
					),
				),
			);
		}
	}

	new formula_Customize_Homepage_Client_Option();

endif;