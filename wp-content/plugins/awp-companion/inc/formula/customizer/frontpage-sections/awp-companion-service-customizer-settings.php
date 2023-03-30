<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Service.
 *
 * @package formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Homepage_Service_Option' ) ) :

	class formula_Customize_Homepage_Service_Option extends formula_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'formula_main_service_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Service Options', 'formula' ),
						'section' => 'formula_theme_service',
					),
				),
					
				'formula_service_area_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Service Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_service',
					),
				),
				// container
				'formula_service_container_size'     => array(
					'setting' => array(
						'default'			=> 'container-full',
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'				=> 'radio',
						'priority'			=> 25,
						'is_default_type'	=> true,
						'label'				=> esc_html__( 'Service Width', 'formula' ),
						'section'			=> 'formula_theme_service',
						'choices'			=> array(
							'container'		=> esc_html__( 'Container', 'formula' ),
							'container-full'=> esc_html__( 'Container Full', 'formula' ),
						),
						'active_callback' => 'formula_service_container_size',
					),
				),
				// column layout
				'formula_service_column_layout'	=> array(
					'setting'	=> array(
						'default'           => 'col-md-4',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control'	=> array(
						'type'		=> 'radio_image',
						'priority'	=> 30,
						'label'		=> esc_html__( 'Column Layout', 'formula' ),
						'section'	=> 'formula_theme_service',
						'choices'	=> array(
							'col-md-6'	=> FORMULA_THEME_URL . '/assets/images/icons/column-2.png',
							'col-md-4'	=> FORMULA_THEME_URL . '/assets/images/icons/column-3.png',
							'col-md-3'	=> FORMULA_THEME_URL . '/assets/images/icons/column-4.png',
						),
						'active_callback' => 'formula_service_column_layout',
					),
					
				),
				
				// Service Count For Homepage 
				/* 'formula_service_count' => array(
					'setting' => array(
						'default'           => array(
							'slider' => 4,
							'suffix' => '',
						),
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'priority'    => 55,
						'label'       => esc_html__( 'HomaPage Service Count', 'formula' ),
						'section'     => 'formula_theme_service',
						'input_attrs' => array(
							'min'  => 2,
							'max'  => 20,
							'step' => 1,
						),
						'active_callback' => 'formula_service_count',
					),
				), */

				'formula_service_upgrade'	=> array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 11,
						'label'    => esc_html__( 'Service', 'awp-companion' ),
						'section'  => 'formula_theme_service',
					),
				),

			);

		}

	}

	new formula_Customize_Homepage_Service_Option();

endif;
