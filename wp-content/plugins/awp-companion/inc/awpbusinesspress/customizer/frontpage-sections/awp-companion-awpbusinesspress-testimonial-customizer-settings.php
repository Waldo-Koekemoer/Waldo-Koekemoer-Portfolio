<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

/**
 * Frontpage Testimonial.
 *
 * @package awp-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'awpbusinesspress_Customize_Homepage_Testimonial_Option' ) ) :

	class awpbusinesspress_Customize_Homepage_Testimonial_Option extends awpbusinesspress_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'awpbusinesspress_main_testimonial_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Testimonial Options', 'awp-companion' ),
						'section' => 'awpbusinesspress_theme_testimonial',
					),
				),

				'awpbusinesspress_testimonial_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Testimonial Enable/Disable', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_testimonial',
					),
				),

				'awpbusinesspress_testimonial_upgrade'            => array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 20,
						'label'    => esc_html__( 'Testimonial', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_testimonial',
					),
				),
			);
		}
	}

	new awpbusinesspress_Customize_Homepage_Testimonial_Option();

endif;