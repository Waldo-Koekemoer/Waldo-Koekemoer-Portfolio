<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage portfolio.
 *
 * @package formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Homepage_Portfolio_Option' ) ) :
	
	class formula_Customize_Homepage_Portfolio_Option extends formula_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'formula_portfolio_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'   	=> 'heading',
						'priority'	=> 1,
						'label'  	=> esc_html__( 'Portfolio Options', 'formula' ),
						'section'	=> 'formula_theme_portfolio',
					),
				),

				'formula_portfolio_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Portfolio Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_portfolio',
					),
				),

				// portfolio Autoplay
				'formula_portfolio_autoplay_disable'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 12,
						'label'    => esc_html__( 'AutoPlay Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_portfolio',
						'active_callback' => 'formula_portfolio_autoplay_disable',
					),
				),

				// portfolio Animation Speed
				'formula_portfolio_animation_speed' => array('setting' => array(
					'default'           => '4000',
					'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'select',
						'priority'        => 13,
						'is_default_type' => true,
						'label'           => esc_html__( 'Portfolio Animation Speed', 'formula' ),
						'section'         => 'formula_theme_portfolio',
						'choices'         => array(
							'2000' => esc_html__( '2.0', 'formula' ),
							'3000' => esc_html__( '3.0', 'formula' ),
							'4000' => esc_html__( '4.0', 'formula' ),
							'5000' => esc_html__( '5.0', 'formula' ),
							'6000' => esc_html__( '6.0', 'formula' ),
						),
						'active_callback' => 'formula_portfolio_animation_speed',
					),
				),	

				// container
				'formula_portfolio_container_size'     => array(
					'setting' => array(
						'default'			=> 'container-full',
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'				=> 'radio',
						'priority'			=> 25,
						'is_default_type'	=> true,
						'label'				=> esc_html__( 'Portfolio Width', 'formula' ),
						'section'			=> 'formula_theme_portfolio',
						'choices'			=> array(
							'container'		=> esc_html__( 'Container', 'formula' ),
							'container-full'=> esc_html__( 'Container Full', 'formula' ),
						),
						'active_callback' => 'formula_portfolio_container_size',
					),
				),

				// column Homepage1 layout
				'formula_portfolio_homepage1_column_layout'	=> array(
					'setting'	=> array(
						'default'           => 3,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control'	=> array(
						'type'		=> 'radio_image',
						'priority'	=> 30,
						'label'		=> esc_html__( 'Section Column Layout', 'formula' ),
						'section'	=> 'formula_theme_portfolio',
						'choices'	=> array(
							'2'	=> FORMULA_THEME_URL . '/assets/images/icons/column-2.png',
							'3'	=> FORMULA_THEME_URL . '/assets/images/icons/column-3.png',
							'4'	=> FORMULA_THEME_URL . '/assets/images/icons/column-4.png',
						),
						'active_callback' => 'formula_portfolio_homepage1_column_layout',
					),
					
				),

				// Portfolio Count For Homepage 
				/* 'formula_portfolio_count' => array(
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
						'label'       => esc_html__( 'HomePage Portfolio Count', 'formula' ),
						'section'     => 'formula_theme_portfolio',
						'input_attrs' => array(
							'min'  => 2,
							'max'  => 20,
							'step' => 1,
						),
						'active_callback' => 'formula_portfolio_count',
					),
				), */

				'formula_portfolio_upgrade'	=> array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 10,
						'label'    => esc_html__( 'Portfolio', 'awp-companion' ),
						'section'  => 'formula_theme_portfolio',
					),
				),
			);
		}
	}

	new formula_Customize_Homepage_Portfolio_Option();

endif;