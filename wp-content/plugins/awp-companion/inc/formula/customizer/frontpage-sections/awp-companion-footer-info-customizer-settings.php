<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage info.
 *
 * @package formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Homepage_Footer_Info_Option' ) ) :

	class formula_Customize_Homepage_Footer_Info_Option extends formula_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'formula_footer_info_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Footer Info Options', 'formula' ),
						'section' => 'formula_theme_footer_info',
					),
				),
					
				// Info Top Enable
				'formula_footer_info_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 3,
						'label'    => esc_html__( 'Footer Info Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_footer_info',
					),
				),		
				
				// container
				'formula_footer_info_container_size'     => array(
					'setting' => array(
						'default'			=> 'container',
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'				=> 'radio',
						'priority'			=> 25,
						'is_default_type'	=> true,
						'label'				=> esc_html__( 'Info Width', 'formula' ),
						'section'			=> 'formula_theme_footer_info',
						'choices'			=> array(
							'container'		=> esc_html__( 'Container', 'formula' ),
							'container-full'=> esc_html__( 'Container Full', 'formula' ),
						),
						'active_callback' => 'formula_footer_info_container_size',
					),
				),
				// column layout
				'formula_footer_info_column_layout'	=> array(
					'setting'	=> array(
						'default'           => 'col-md-4',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control'	=> array(
						'type'		=> 'radio_image',
						'priority'	=> 30,
						'label'		=> esc_html__( 'Column Layout', 'formula' ),
						'section'	=> 'formula_theme_footer_info',
						'choices'	=> array(
							'col-md-6'	=> FORMULA_THEME_URL . '/assets/images/icons/column-2.png',
							'col-md-4'	=> FORMULA_THEME_URL . '/assets/images/icons/column-3.png',
							'col-md-3'	=> FORMULA_THEME_URL . '/assets/images/icons/column-4.png',
						),
						'active_callback' => 'formula_footer_info_column_layout',
					),
					
				),
			);
		}
	}

	new formula_Customize_Homepage_Footer_Info_Option();

endif;