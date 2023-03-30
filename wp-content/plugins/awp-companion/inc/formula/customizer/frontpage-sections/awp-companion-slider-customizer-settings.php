<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Main Slider.
 *
 * @package formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Homepage_Slider_Option' ) ) :

	class formula_Customize_Homepage_Slider_Option extends formula_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
				
				'formula_main_slider_heading'	=> array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
						'priority'        => 1,
						'label'   => esc_html__( 'Slider Options', 'formula' ),
						'section' => 'formula_main_theme_slider',
					),
				),
				
				// Slider Enable
				'formula_main_slider_disabled'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Slider Enable/Disable', 'formula' ),
						'section'  => 'formula_main_theme_slider',
					),
				),	
			
				// Slider Autoplay
				'formula_main_slider_autoplay_disable'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 15,
						'label'    => esc_html__( 'AutoPlay Enable/Disable', 'formula' ),
						'section'  => 'formula_main_theme_slider',
						'active_callback'	=> 'formula_main_slider_autoplay_disable',
					),
				),
				
				// Slider Animation Speed
				'formula_main_slider_animation_speed' => array('setting' => array(
					'default'           => '4000',
					'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'select',
						'priority'        => 20,
						'is_default_type' => true,
						'label'           => esc_html__( 'Slider Animation Speed', 'formula' ),
						'description'     => esc_html__( 'Note: Turn on Autoplay', 'formula' ),
						'section'         => 'formula_main_theme_slider',
						'choices'         => array(
							'2000' => esc_html__( '2.0', 'formula' ),
							'3000' => esc_html__( '3.0', 'formula' ),
							'4000' => esc_html__( '4.0', 'formula' ),
							'5000' => esc_html__( '5.0', 'formula' ),
							'6000' => esc_html__( '6.0', 'formula' ),
						),
						'active_callback'	=> 'formula_main_slider_animation_speed',
					),
				),	
				
				
				// Slider Fade Animation 
				'formula_main_slider_animation'	=> array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 25,
						'label'    => esc_html__( 'Fade Animation Enable/Disable', 'formula' ),
						'section'  => 'formula_main_theme_slider',
						'active_callback'	=> 'formula_main_slider_animation',
					),
				),
				
				
				
				// Slider Overlay
				'formula_main_slider_overlay_disable'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 26,
						'label'    => esc_html__( 'Overlay Enable/Disable', 'formula' ),
						'section'  => 'formula_main_theme_slider',
						'active_callback'	=> 'formula_main_slider_overlay_disable',
					),
				),
				
				
				// Slider Overlay color
				'formula_main_slider_overlay_color' => array(
					'setting' => array(
						'default'           => 'rgba(0,0,0,0.2)',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 30,
						'label'           => esc_html__( 'Slider Overlay Color', 'formula' ),
						'section'         => 'formula_main_theme_slider',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback'	=> 'formula_main_slider_overlay_color',
					),
				), 

				// Slide Title Color
				'formula_main_slider_caption_title_color' => array(
					'setting' => array(
						'default'           => '#fff',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 35,
						'label'           => esc_html__( 'Slide Title Color', 'formula' ),
						'description'	  => esc_html__( 'Set the color for slide title.', 'formula' ),
						'section'         => 'formula_main_theme_slider',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback'	=> 'formula_main_slider_caption_title_color',
					),
				), 
				// Slide SubTitle Color
				'formula_main_slider_caption_subtitle_title_color' => array(
					'setting' => array(
						'default'           => '#fff',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 40,
						'label'           => esc_html__( 'Slide Subtitle Color', 'formula' ),
						'description'	  => esc_html__( 'Set the color for slide subtitle.', 'formula' ),
						'section'         => 'formula_main_theme_slider',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback'	=> 'formula_main_slider_caption_subtitle_title_color',
					),
				), 
				// Slide Description Color
				'formula_main_slider_caption_descrption_title_color' => array(
					'setting' => array(
						'default'           => '#fff',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 45,
						'label'           => esc_html__( 'Slide Description Color', 'formula' ),
						'description'	  => esc_html__( 'Set the color for slide description.', 'formula' ),
						'section'         => 'formula_main_theme_slider',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback'	=> 'formula_main_slider_caption_descrption_title_color',
					),
				), 

				'formula_slider_upgrade'	=> array(
					'setting' => array( ),
					'control' => array(
						'type'     => 'upgrade',
						'priority' => 10,
						'label'    => esc_html__( 'Slider', 'awp-companion' ),
						'section'  => 'formula_main_theme_slider',
					),
				),
			);
		}
	}

	new formula_Customize_Homepage_Slider_Option();

endif;
