<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Main Team.
 *
 * @package formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Homepage_Team_Option' ) ) :

	class formula_Customize_Homepage_Team_Option extends formula_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
				
				'formula_team_heading'	=> array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Team Options', 'formula' ),
						'section' => 'formula_theme_team',
					),
				),

				// Team Enable
				'formula_team_disabled'	=> array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Team Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_team',
					),
				),	

				// Team Autoplay
				'formula_team_autoplay_disable'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 12,
						'label'    => esc_html__( 'AutoPlay Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_team',
						'active_callback' => 'formula_team_autoplay_disable',
					),
				),

				// Team Animation Speed
				'formula_team_animation_speed' => array('setting' => array(
					'default'           => '4000',
					'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'select',
						'priority'        => 12,
						'is_default_type' => true,
						'label'           => esc_html__( 'Team Animation Speed', 'formula' ),
						'description'     => esc_html__( 'Note: Turn on Autoplay', 'formula' ),
						'section'         => 'formula_theme_team',
						'choices'         => array(
							'2000' => esc_html__( '2.0', 'formula' ),
							'3000' => esc_html__( '3.0', 'formula' ),
							'4000' => esc_html__( '4.0', 'formula' ),
							'5000' => esc_html__( '5.0', 'formula' ),
							'6000' => esc_html__( '6.0', 'formula' ),
						),
						'active_callback' => 'formula_team_animation_speed',
					),
				),	

				// container
				'formula_team_container_size'     => array(
					'setting' => array(
						'default'			=> 'container-full',
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'				=> 'radio',
						'priority'			=> 25,
						'is_default_type'	=> true,
						'label'				=> esc_html__( 'Team Width', 'formula' ),
						'section'			=> 'formula_theme_team',
						'choices'			=> array(
							'container'		=> esc_html__( 'Container', 'formula' ),
							'container-full'=> esc_html__( 'Container Full', 'formula' ),
						),
						'active_callback' => 'formula_team_container_size',
					),
				),
				// column layout
				'formula_team_column_layout'	=> array(
					'setting'	=> array(
						'default'           => 4,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control'	=> array(
						'type'		=> 'radio_image',
						'priority'	=> 30,
						'label'		=> esc_html__( 'Column Layout', 'formula' ),
						'section'	=> 'formula_theme_team',
						'choices'	=> array(
							'2'	=> FORMULA_THEME_URL . '/assets/images/icons/column-2.png',
							'3'	=> FORMULA_THEME_URL . '/assets/images/icons/column-3.png',
							'4'	=> FORMULA_THEME_URL . '/assets/images/icons/column-4.png',
						),
						'active_callback' => 'formula_team_column_layout',
					),
				),

				'formula_team_upgrade'	=> array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 10,
						'label'    => esc_html__( 'Team', 'awp-companion' ),
						'section'  => 'formula_theme_team',
					),
				),
			);
		}
	}

	new formula_Customize_Homepage_Team_Option();

endif;
