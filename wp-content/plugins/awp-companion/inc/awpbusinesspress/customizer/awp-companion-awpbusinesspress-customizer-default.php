<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 *
 * @package awp-companion
 */

	// Child Theme Hospital Health Care.
	require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/hospital-health-care-default-data/awp-companion-hospital-health-care-customizer-default.php';
	// Child Theme Home Interior.
	require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/home-interior-default-data/awp-companion-home-interior-customizer-default.php';
	// Child Theme Business Campaign.
	require awp_companion_plugin_dir . 'inc/awpbusinesspress/customizer/business-campaign-default-data/awp-companion-business-campaign-customizer-default.php';

if ( ! function_exists( 'awp_companion_awpbusinesspress_main_slider_default_content' ) ) :
	// Slider content.
	function awp_companion_awpbusinesspress_main_slider_default_content( $wp_customize ) {

		// Diffrent Themes.
		$activate_theme_data = wp_get_theme(); // getting current theme data.
		$activate_theme      = $activate_theme_data->name;

		$awpbusinesspress_main_slider_data = $wp_customize->get_setting( 'awpbusinesspress_main_slider_content' );
		if ( ! empty( $awpbusinesspress_main_slider_data ) ) {
			// Parent Theme.
			if ( 'AwpBusinessPress' == $activate_theme ) {
				$awpbusinesspress_main_slider_data->default = json_encode(
					array(
						array(
							'title'        => esc_html__( 'We Create Stunning WordPress Themes', 'awp-companion' ),
							'text'         => esc_html__( 'AWP BusinessPress have to satisfy real needs of real projects. We got a pack of tools for that.', 'awp-companion' ),
							'button_text'  => __( 'Know More', 'awp-companion' ),
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/slider/1.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b10',
						),
						array(
							'title'        => esc_html__( 'Digital Marketing & Branding', 'awp-companion' ),
							'text'         => esc_html__( 'We provide world best Services for our clients to grow their businesses', 'awp-companion' ),
							'button_text'  => __( 'Check it out', 'awp-companion' ),
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/slider/2.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b14',
						),

					)
				);
			}
			// Child Theme 1.
			if ( 'Coin Market' == $activate_theme ) {
				$awpbusinesspress_main_slider_data->default = json_encode(
					array(
						array(
							'title'        => esc_html__( 'Welcome To The Coin Market Theme', 'awp-companion' ),
							'text'         => esc_html__( 'Coin Market have to Satisfy Real needs of Market Projects. Come Join Us & Grow your Market To The Moon.', 'awp-companion' ),
							'button_text'  => __( 'Know More', 'awp-companion' ),
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/slider/coin1.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b10',
						),
						array(
							'title'        => esc_html__( 'Market To The Moon', 'awp-companion' ),
							'text'         => esc_html__( 'Lorem Ipsum has been the industrys standard dummy text ever since the, when an printer took a galley of type and scrambled.', 'awp-companion' ),
							'button_text'  => __( 'Check it out', 'awp-companion' ),
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/slider/coin2.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b14',
						),

					)
				);
			}
		}
	}
	add_action( 'customize_register', 'awp_companion_awpbusinesspress_main_slider_default_content' );
	endif;


	// Theme Info content.
if ( ! function_exists( 'awp_companion_awpbusinesspress_top_info_default_content' ) ) :
	function awp_companion_awpbusinesspress_top_info_default_content( $wp_customize ) {

		$awpbusinesspress_top_info_data = $wp_customize->get_setting( 'awpbusinesspress_top_info_content' );
		if ( ! empty( $awpbusinesspress_top_info_data ) ) {
			$activate_theme_data = wp_get_theme(); // getting current theme data.
			$activate_theme      = $activate_theme_data->name;

			// Parent Theme
			// if('Coin Market' == $activate_theme){.
				$awpbusinesspress_top_info_data->default = json_encode(
					array(
						array(
							'icon_value'   => 'fa fa-map-marker',
							'title'        => esc_html__( 'Head Office', 'awp-companion' ),
							'text'         => esc_html__( '2130 Fulton Street, San Francisco', 'awp-companion' ),
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
							'icon_value'   => 'fa fa-phone',
							'title'        => esc_html__( 'Call Us:', 'awp-companion' ),
							'text'         => esc_html__( '+(15) 94117-1080', 'awp-companion' ),
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
							'icon_value'   => 'fa fa-envelope-open-o',
							'title'        => esc_html__( 'Email:', 'awp-companion' ),
							'text'         => esc_html__( 'example@mail.com', 'awp-companion' ),
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b17',
						),
					)
				);
			// }
		}
	}
	add_action( 'customize_register', 'awp_companion_awpbusinesspress_top_info_default_content' );
	endif;

	// Service content.
if ( ! function_exists( 'awp_companion_awpbusinesspress_service_default_content' ) ) :
	function awp_companion_awpbusinesspress_service_default_content( $wp_customize ) {

		$awpbusinesspress_service_data = $wp_customize->get_setting( 'awpbusinesspress_service_content' );
		if ( ! empty( $awpbusinesspress_service_data ) ) {

			$activate_theme_data = wp_get_theme(); // getting current theme data.
			$activate_theme      = $activate_theme_data->name;

			// Parent Theme.
			if ( 'AwpBusinessPress' == $activate_theme ) {
				$awpbusinesspress_service_data->default = json_encode(
					array(
						array(
							'icon_value'   => 'fa fa-mobile',
							'title'        => esc_html__( 'Responsive Design', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_icon',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
							'icon_value'   => 'fa fa-cogs',
							'title'        => esc_html__( 'Easy to Customize', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_icon',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
							'icon_value'   => 'fa fa-handshake-o',
							'title'        => esc_html__( 'Great Support', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_icon',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b17',
						),
					)
				);
			}
			// Child Theme 1.
			if ( 'Coin Market' == $activate_theme ) {
				$awpbusinesspress_service_data->default = json_encode(
					array(
						array(
							'icon_value'   => 'fa fa-mobile',
							'title'        => esc_html__( 'Great Value', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_image',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/service/service-coin1.jpg',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
							'icon_value'   => 'fa fa-cogs',
							'title'        => esc_html__( 'Easy to Grow', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_image',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/service/service-coin2.jpg',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
							'icon_value'   => 'fa fa-handshake-o',
							'title'        => esc_html__( 'Great Support', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_image',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/service/service-coin3.jpg',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b17',
						),

					)
				);
			}
		}
	}
	add_action( 'customize_register', 'awp_companion_awpbusinesspress_service_default_content' );
	endif;

	// Testimonial content.
if ( ! function_exists( 'awp_companion_awpbusinesspress_testimonial_default_content' ) ) :
	function awp_companion_awpbusinesspress_testimonial_default_content( $wp_customize ) {

		$awpbusinesspress_testimonial_data = $wp_customize->get_setting( 'awpbusinesspress_testimonial_content' );

		$activate_theme_data = wp_get_theme(); // getting current theme data.
		$activate_theme      = $activate_theme_data->name;

		if ( ! empty( $awpbusinesspress_testimonial_data ) ) {

			if ( 'AwpBusinessPress' == $activate_theme ) {
				$awpbusinesspress_testimonial_data->default = json_encode(
					array(
						array(
							'title'       => 'Mike',
							'text'        => '"It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout. Thank you!"',
							'designation' => __( 'CEO & Founder', 'awp-companion' ),
							'image_url'   => awp_companion_plugin_url . 'inc/awpbusinesspress/img/testimonial/1.jpg',
							'id'          => 'customizer_repeater_56d7ea7f40b30',
						),
					)
				);
			}

			if ( 'Coin Market' == $activate_theme ) {
				$awpbusinesspress_testimonial_data->default = json_encode(
					array(
						array(
							'title'       => 'Mike',
							'text'        => '"It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout. Thank you!"',
							'designation' => __( 'CEO & Founder', 'awp-companion' ),
							'image_url'   => awp_companion_plugin_url . 'inc/awpbusinesspress/img/testimonial/testimonial-coin1.jpg',
							'id'          => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
							'title'       => 'Mitchell',
							'text'        => '"You guys are legendary! You guys are great and having amazing support & service. I couldn’t ask for any better. Thank you!"',
							'designation' => __( 'Financer', 'awp-companion' ),
							'image_url'   => awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-coin2.jpg',
							'id'          => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
							'title'       => 'Julia Cloe',
							'text'        => '"You guys are really Awesome! You guys are great and having an amazing support & service. Thank you so much"',
							'designation' => __( 'Sales Manager', 'awp-companion' ),
							'image_url'   => awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-coin3.jpg',
							'id'          => 'customizer_repeater_56d7ea7f40b33',
						),
					)
				);

			}
		}
	}
	add_action( 'customize_register', 'awp_companion_awpbusinesspress_testimonial_default_content' );
	endif;


	// Client section.
if ( ! function_exists( 'awp_companion_awpbusinesspress_client_default_content' ) ) :
	add_action( 'customize_register', 'awp_companion_awpbusinesspress_client_default_content' );
	function awp_companion_awpbusinesspress_client_default_content( $wp_customize ) {
		// awpbusinesspress default client data.
		$awpbusinesspress_client_data = $wp_customize->get_setting( 'awpbusinesspress_client_content' );
		if ( ! empty( $awpbusinesspress_client_data ) ) {

			$activate_theme_data = wp_get_theme(); // getting current theme data.
			$activate_theme      = $activate_theme_data->name;

			if ( 'AwpBusinessPress' == $activate_theme ) {
				$awpbusinesspress_client_data->default = json_encode(
					array(
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-1.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b96',
						),

						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-2.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b97',
						),

						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-3.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b98',
						),

						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-4.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b99',
						),

					)
				);
			}

			if ( 'Coin Market' == $activate_theme ) {
				$awpbusinesspress_client_data->default = json_encode(
					array(
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-1.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b96',
						),

						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-2.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b97',
						),

						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-3.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b98',
						),

						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-4.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b99',
						),

					)
				);
			}
		}
	}
	endif;
