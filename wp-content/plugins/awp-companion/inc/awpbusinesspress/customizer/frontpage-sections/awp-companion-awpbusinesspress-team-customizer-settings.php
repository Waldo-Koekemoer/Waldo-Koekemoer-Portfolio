<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Main Team.
 *
 * @package awp-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'awpbusinesspress_Customize_Homepage_Team_Option' ) ) :

	class awpbusinesspress_Customize_Homepage_Team_Option extends awpbusinesspress_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
				
				'awpbusinesspress_team_heading'	=> array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Team Options', 'awp-companion' ),
						'section' => 'awpbusinesspress_theme_team',
					),
				),
				
				// Team Enable
				'awpbusinesspress_team_disabled'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Team Enable/Disable', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_team',
					),
				),
				
				'awpbusinesspress_team_upgrade'	=> array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Team', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_team',
					),
				),
				
				// container
				'awpbusinesspress_team_container_size'     => array(
					'setting' => array(
						'default'			=> 'container-full',
						'sanitize_callback'	=> array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'				=> 'radio',
						'priority'			=> 25,
						'is_default_type'	=> true,
						'label'				=> esc_html__( 'Team Width', 'awp-companion' ),
						'section'			=> 'awpbusinesspress_theme_team',
						'choices'			=> array(
							'container'		=> esc_html__( 'Container', 'awp-companion' ),
							'container-full'=> esc_html__( 'Container Full', 'awp-companion' ),
						),
					),
				),
			);
		}
	}

	new awpbusinesspress_Customize_Homepage_Team_Option();

endif;
