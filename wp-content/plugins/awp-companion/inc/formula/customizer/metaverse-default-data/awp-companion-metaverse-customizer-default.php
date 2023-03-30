<?php

/**
 *
 * @package awp-companion
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme      = $activate_theme_data->name;
if ( 'Metaverse' == $activate_theme ) {

	// Slider Default Data.
	if ( ! function_exists( 'formula_main_slider_default_content' ) ) :
		function formula_main_slider_default_content( $wp_customize ) {
			$formula_main_slider_data = $wp_customize->get_setting( 'formula_main_slider_content' );
			if ( ! empty( $formula_main_slider_data ) ) {
				$formula_main_slider_data->default = json_encode(
					array(
						array(
							'title'          => esc_html__( 'Metaverse Ecosystem For Growing New Projects', 'formula' ),
							'subtitle'       => esc_html__( 'Building The Metaverse', 'formula' ),
							'text'           => esc_html__( 'The Metaverse Is The Next Generation Of The Internet. As One Of Its Earliest Explorers, You Will Help Fuel Its Expansion And Share In The Benefits Of This Growth.', 'formula' ),
							'button_text'    => __( 'Open App', 'formula' ),
							'link'           => '#',
							'slide_format'   => 'customizer_repeater_slide_format_standard',
							'content_format' => 'left',
							'image_url'      => awp_companion_plugin_url . 'inc/formula/img/slider/metaverse.jpg',
							'open_new_tab'   => 'no',
							'id'             => 'customizer_repeater_56d7ea7f40b96',
						),
					)
				);
			}
		}
		add_action( 'customize_register', 'formula_main_slider_default_content' );
	endif;

	// formula portfolio content data.
	if ( ! function_exists( 'formula_portfolio_default_customize_register' ) ) :
		function formula_portfolio_default_customize_register( $wp_customize ) {
			$formula_portfolio_data = $wp_customize->get_setting( 'formula_portfolio_content' );
			if ( ! empty( $formula_portfolio_data ) ) {
				$formula_portfolio_data->default = json_encode(
					array(
						array(
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/portfolio/project-1.jpg',
							'title'           => esc_html__( 'SignIn Network', 'formula' ),
							'subtitle'        => esc_html__( 'VR', 'formula' ),
							'link'            => '#',
							'open_new_tab'    => 'no',
							'id'              => 'customizer_repeater_56d7ea7f40c56',
						),
						array(
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/portfolio/project-2.jpg',
							'title'           => esc_html__( 'Animal Concerts', 'formula' ),
							'subtitle'        => esc_html__( 'Cartoon', 'formula' ),
							// 'designation'        => esc_html__( 'Founder & CEO', 'formula' ),
							// 'text'            => 'Craft beer salvia celiac mlkshk. Pinterest celiac tumblr, portland salvia skateboard cliche thundercats. Tattooed chia austin hell.',
							'link'            => '#',
							'open_new_tab'    => 'no',
							'id'              => 'customizer_repeater_56d7ea7f40c66',
						),
						array(
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/portfolio/project-3.jpg',
							'title'           => esc_html__( 'Wizardia', 'formula' ),
							'subtitle'        => esc_html__( 'Online', 'formula' ),
							// 'designation'        => esc_html__( 'Director', 'formula' ),
							// 'text'            => 'Pok pok direct trade godard street art, poutine fam typewriter food truck narwhal kombucha wolf cardigan butcher whatever pickled you.',
							'link'            => '#',
							'open_new_tab'    => 'no',
							'id'              => 'customizer_repeater_56d7ea7f40c76',
						),

					)
				);
			}
		}
		add_action( 'customize_register', 'formula_portfolio_default_customize_register' );
	endif;

	// Service content.
	if ( ! function_exists( 'formula_service_default_content' ) ) :
		function formula_service_default_content( $wp_customize ) {
			$formula_service_data = $wp_customize->get_setting( 'formula_service_content' );
			if ( ! empty( $formula_service_data ) ) {
				$formula_service_data->default = json_encode(
					array(
						array(
							'title'        => esc_html__( 'Fueling The Metaverse', 'formula' ),
							'text'         => esc_html__( 'The Metaverse Is The Next Generation Of The Internet. As One Of Its Earliest Explorers, You Will Help Fuel Its', 'formula' ),
							'subtitle'     => esc_html__( '', 'formula' ),
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/service/icon-1.png',
							'choice'       => 'customizer_repeater_image',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
							'title'        => esc_html__( 'Interconnected Economies', 'formula' ),
							'text'         => esc_html__( 'The Metaverse Is The Next Generation Of The Internet. As One Of Its Earliest Explorers, You Will Help Fuel Its', 'formula' ),
							'subtitle'     => esc_html__( '', 'formula' ),
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/service/icon-2.png',
							'choice'       => 'customizer_repeater_image',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
							'title'        => esc_html__( 'Non-fungible assets', 'formula' ),
							'text'         => esc_html__( 'The Metaverse Is The Next Generation Of The Internet. As One Of Its Earliest Explorers, You Will Help Fuel Its', 'formula' ),
							'subtitle'     => esc_html__( '', 'formula' ),
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/service/icon-3.png',
							'choice'       => 'customizer_repeater_image',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b17',
						),
					)
				);
			}
		}
		add_action( 'customize_register', 'formula_service_default_content' );
	endif;

	// Client section
	if ( ! function_exists( 'formula_client_default_customize_register' ) ) :
		function formula_client_default_customize_register( $wp_customize ) {
			// formula default client data.
			$formula_client_data = $wp_customize->get_setting( 'formula_client_content' );
			if ( ! empty( $formula_client_data ) ) {
				$formula_client_data->default = json_encode(
					array(
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/partner-1.png',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b96',
						),
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/partner-2.png',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b97',
						),
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/partner-3.png',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b98',
						),
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/partner-4.png',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b98',
						),
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/partner-5.png',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b98',
						),
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/partner-6.png',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b98',
						),					
					)
				);
			}
		}
		add_action( 'customize_register', 'formula_client_default_customize_register' );
	endif;

}
