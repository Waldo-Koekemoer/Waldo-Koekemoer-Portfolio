<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Call to action
 *
 * @package formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Homepage_Cta_Option' ) ) :

	class formula_Customize_Homepage_Cta_Option extends formula_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

			    'formula_main_cta_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'CallOut Options', 'formula' ),
						'section' => 'formula_theme_cta',
					),
				),
			
			    	
				'formula_cta_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_cta',
					),
				),
				
				'formula_cta_button_text' => array(
					'setting' => array(
						'default'           => 'Contact Us',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'control' => array(
						'type'            => 'text',
						'priority'        => 10,
						'is_default_type' => true,
						'label'           => esc_html__( 'Button Text', 'formula' ),
						'section'         => 'formula_theme_cta',
						'active_callback' => 'formula_cta_button_text',
					),
				),
				
				'formula_cta_button_link' => array(
					'setting' => array(
						'default'           => '#',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'control' => array(
						'type'            => 'url',
						'priority'        => 10,
						'is_default_type' => true,
						'label'           => esc_html__( 'Button Link', 'formula' ),
						'section'         => 'formula_theme_cta',
						'active_callback' => 'formula_cta_button_link',
					),
				),

				// container
				'formula_cta_container_size'     => array(
					'setting' => array(
						'default'			=> 'container',
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'				=> 'radio',
						'priority'			=> 25,
						'is_default_type'	=> true,
						'label'				=> esc_html__( 'Cta Width', 'formula' ),
						'section'			=> 'formula_theme_cta',
						'choices'			=> array(
							'container'		=> esc_html__( 'Container', 'formula' ),
							'container-full'=> esc_html__( 'Container Full', 'formula' ),
						),
						'active_callback' => 'formula_cta_container_size',
					),
				),

				'formula_cta_upgrade'	=> array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'CTA', 'awp-companion' ),
						'section'  => 'formula_theme_cta',
					),
				),

			);

		}

	}

	new formula_Customize_Homepage_Cta_Option();

endif;