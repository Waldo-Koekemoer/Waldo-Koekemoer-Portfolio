<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Blog.
 *
 * @package awp-companion
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'awpbusinesspress_Customize_Homepage_Blog_Option' ) ) :

	class awpbusinesspress_Customize_Homepage_Blog_Option extends awpbusinesspress_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(

				'awpbusinesspress_main_blog_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Blog Options', 'awp-companion' ),
						'section' => 'awpbusinesspress_theme_blog',
					),
				),
					
				'awpbusinesspress_blog_disabled'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'awpbusinesspress_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Blog Enable/Disable', 'awp-companion' ),
						'section'  => 'awpbusinesspress_theme_blog',
					),
				),

			);
		}
	}

	new awpbusinesspress_Customize_Homepage_Blog_Option();

endif;
