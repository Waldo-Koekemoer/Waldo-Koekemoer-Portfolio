<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 *
 * @package awp-companion
 */

$activate_theme_data = wp_get_theme(); // getting current theme data.
$activate_theme      = $activate_theme_data->name;
if ( 'Business Campaign' == $activate_theme ) {

	if ( ! function_exists( 'awp_companion_awpbusinesspress_main_slider_default_content' ) ) :
		// Slider content.
		function awp_companion_awpbusinesspress_main_slider_default_content( $wp_customize ) {

			$awpbusinesspress_main_slider_data = $wp_customize->get_setting( 'awpbusinesspress_main_slider_content' );
			if ( ! empty( $awpbusinesspress_main_slider_data ) ) {
				// Parent Theme.

				$awpbusinesspress_main_slider_data->default = json_encode(
					array(
						array(
							'title'        => esc_html__( 'Launch Ultra Modern Effective Business', 'awp-companion' ),
							'text'         => esc_html__( 'We provide world best Services for our clients to grow their businesses', 'awp-companion' ),
							'button_text'  => __( 'Check it out', 'awp-companion' ),
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/slider/campaign1.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b10',
						),
						array(
							'title'        => esc_html__( 'Make Business Unique With Great Ideas', 'awp-companion' ),
							'text'         => esc_html__( 'Business Campaign have to satisfy real needs of real projects. We got a pack of tools for that.', 'awp-companion' ),
							'button_text'  => __( 'Know More', 'awp-companion' ),
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/slider/campaign2.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b14',
						),

					)
				);

			}
		}
		add_action( 'customize_register', 'awp_companion_awpbusinesspress_main_slider_default_content' );
	endif;


	// Theme Info content.
	if ( ! function_exists( 'awp_companion_awpbusinesspress_top_info_default_content' ) ) :
		function awp_companion_awpbusinesspress_top_info_default_content( $wp_customize ) {

			$awpbusinesspress_top_info_data = $wp_customize->get_setting( 'awpbusinesspress_top_info_content' );
			if ( ! empty( $awpbusinesspress_top_info_data ) ) {

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
							'title'        => esc_html__( 'Call Us', 'awp-companion' ),
							'text'         => esc_html__( '+(15) 94117-1080', 'awp-companion' ),
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
							'icon_value'   => 'fa fa-envelope-open-o',
							'title'        => esc_html__( 'Email', 'awp-companion' ),
							'text'         => esc_html__( 'example@mail.com', 'awp-companion' ),
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b17',
						),
					)
				);
			}
		}
		add_action( 'customize_register', 'awp_companion_awpbusinesspress_top_info_default_content' );
	endif;

	// Service content.
	if ( ! function_exists( 'awp_companion_awpbusinesspress_service_default_content' ) ) :
		function awp_companion_awpbusinesspress_service_default_content( $wp_customize ) {

			$awpbusinesspress_service_data = $wp_customize->get_setting( 'awpbusinesspress_service_content' );
			if ( ! empty( $awpbusinesspress_service_data ) ) {

				$awpbusinesspress_service_data->default = json_encode(
					array(
						array(
							'icon_value'   => '',
							'title'        => esc_html__( 'Business Solution', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_image',
							'image_url'    => awp_companion_plugin_url . 'inc/awpbusinesspress/img/service/campaign1.jpg',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
							'icon_value'   => '',
							'title'        => esc_html__( 'Creative Ideas', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_image',
							'image_url'    => awp_companion_plugin_url . 'inc/awpbusinesspress/img/service/campaign2.jpg',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
							'icon_value'   => '',
							'title'        => esc_html__( 'Market Research', 'awp-companion' ),
							'text'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid',
							'choice'       => 'customizer_repeater_image',
							'image_url'    => awp_companion_plugin_url . 'inc/awpbusinesspress/img/service/campaign3.jpg',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b17',
						),

					)
				);
			}
		}
		add_action( 'customize_register', 'awp_companion_awpbusinesspress_service_default_content' );
	endif;

	// Funfact content.
	if ( ! function_exists( 'awp_companion_awpbusinesspress_funfact_default_content' ) ) :
		function awp_companion_awpbusinesspress_funfact_default_content( $wp_customize ) {

			$awpbusinesspress_funfact_data = $wp_customize->get_setting( 'awpbusinesspress_funfact_content' );
			if ( ! empty( $awpbusinesspress_funfact_data ) ) {

				$awpbusinesspress_funfact_data->default = json_encode(
					array(
						array(
							'icon_value' => 'fa-smile-o',
							'title'      => esc_html__( '1505', 'awpbusinesspress' ),
							'text'       => esc_html__( 'HAPPY CUSTOMERS', 'awpbusinesspress' ),
						),
						array(
							'icon_value' => 'fa-suitcase',
							'title'      => esc_html__( '1650', 'awpbusinesspress' ),
							'text'       => esc_html__( 'COMPLETE PROJECTS', 'awpbusinesspress' ),
						),
						array(
							'icon_value' => 'fa-line-chart',
							'title'      => esc_html__( '750', 'awpbusinesspress' ),
							'text'       => esc_html__( 'WORKING DAYS', 'awpbusinesspress' ),
						),
					)
				);
			}
		}
		add_action( 'customize_register', 'awp_companion_awpbusinesspress_funfact_default_content' );
	endif;

	// Testimonial content.
	if ( ! function_exists( 'awp_companion_awpbusinesspress_testimonial_default_content' ) ) :
		function awp_companion_awpbusinesspress_testimonial_default_content( $wp_customize ) {

			$awpbusinesspress_testimonial_data = $wp_customize->get_setting( 'awpbusinesspress_testimonial_content' );

			if ( ! empty( $awpbusinesspress_testimonial_data ) ) {

				$awpbusinesspress_testimonial_data->default = json_encode(
					array(
						array(
							'title'       => 'Mike',
							'text'        => '"It is a long established fact that a reader ill be distracted by the Dream home when looking at its Design. Thank you!"',
							'designation' => __( 'Best Building', 'awp-companion' ),
							'image_url'   => awp_companion_plugin_url . 'inc/awpbusinesspress/img/testimonial/testimonial-coin1.jpg',
							'id'          => 'customizer_repeater_56d7ea7f40b30',
						),
						array(
							'title'       => 'Mitchell',
							'text'        => '"You guys are legendary! You guys are great and having amazing Design & service. I couldn’t ask for any better. Thank you!"',
							'designation' => __( 'Sweet Home', 'awp-companion' ),
							'image_url'   => awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-coin2.jpg',
							'id'          => 'customizer_repeater_56d7ea7f40b31',
						),
						array(
							'title'       => 'Julia Cloe',
							'text'        => '"You guys are really Awesome! You guys are great and having an amazing Home Design & perfect service. Thank you so much"',
							'designation' => __( 'Interior Works', 'awp-companion' ),
							'image_url'   => awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-coin3.jpg',
							'id'          => 'customizer_repeater_56d7ea7f40b33',
						),
					)
				);
			}
		}
		add_action( 'customize_register', 'awp_companion_awpbusinesspress_testimonial_default_content' );
	endif;

	// Team content data.
	if ( ! function_exists( 'awp_companion_awpbusinesspress_team_default_content' ) ) :
		add_action( 'customize_register', 'awp_companion_awpbusinesspress_team_default_content' );
		function awp_companion_awpbusinesspress_team_default_content( $wp_customize ) {
			// awpbusinesspress default team data.
			$awpbusinesspress_team_data = $wp_customize->get_setting( 'awpbusinesspress_team_content' );
			if ( ! empty( $awpbusinesspress_team_data ) ) {
				$awpbusinesspress_team_data->default = json_encode(
					array(
						array(
							'image_url'       => awp_companion_plugin_url . '/inc/awpbusinesspress/img/team/home-1.jpg',
							'title'           => esc_html__( 'Jane Smith', 'awpbusinesspress' ),
							'subtitle'        => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'awpbusinesspress' ),
							'designation'     => esc_html__( 'CEO & Founder', 'awpbusinesspress' ),
							// 'text'            => 'Locavore pinterest chambray affogato art party, forage coloring book typewriter. Bitters cold selfies, retro celiac sartorial mustache.',
							'link'            => '#',
							'open_new_tab'    => 'no',
							'id'              => 'customizer_repeater_56d7ea7f40c56',
							'social_repeater' => json_encode(
								array(
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb908674e06',
										'link' => 'facebook.com',
										'icon' => 'fa-facebook',
									),
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb9148530fc',
										'link' => 'twitter.com',
										'icon' => 'fa-twitter',
									),
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb9150e1e89',
										'link' => 'linkedin.com',
										'icon' => 'fa-linkedin',
									),
								)
							),
						),
						array(
							'image_url'       => awp_companion_plugin_url . '/inc/awpbusinesspress/img/team/home-2.jpg',
							'title'           => esc_html__( 'Owen Robbert', 'awpbusinesspress' ),
							'subtitle'        => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'awpbusinesspress' ),
							'designation'     => esc_html__( 'Sales Manager', 'awpbusinesspress' ),
							// 'text'            => 'Craft beer salvia celiac mlkshk. Pinterest celiac tumblr, portland salvia skateboard cliche thundercats. Tattooed chia austin hell.',
							'link'            => '#',
							'open_new_tab'    => 'no',
							'id'              => 'customizer_repeater_56d7ea7f40c66',
							'social_repeater' => json_encode(
								array(
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb9155a1072',
										'link' => 'facebook.com',
										'icon' => 'fa-facebook',
									),
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb9160ab683',
										'link' => 'twitter.com',
										'icon' => 'fa-twitter',
									),
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb916ddffc9',
										'link' => 'linkedin.com',
										'icon' => 'fa-linkedin',
									),
								)
							),
						),
						array(
							'image_url'       => awp_companion_plugin_url . '/inc/awpbusinesspress/img/team/home-3.jpg',
							'title'           => esc_html__( 'Olivia Travis', 'awpbusinesspress' ),
							'subtitle'        => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'awpbusinesspress' ),
							'designation'     => esc_html__( 'Manager', 'awpbusinesspress' ),
							// 'text'            => 'Pok pok direct trade godard street art, poutine fam typewriter food truck narwhal kombucha wolf cardigan butcher whatever pickled you.',
							'link'            => '#',
							'open_new_tab'    => 'no',
							'id'              => 'customizer_repeater_56d7ea7f40c76',
							'social_repeater' => json_encode(
								array(
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb917e4c69e',
										'link' => 'facebook.com',
										'icon' => 'fa-facebook',
									),
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb91830825c',
										'link' => 'twitter.com',
										'icon' => 'fa-twitter',
									),
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb918d65f2e',
										'link' => 'linkedin.com',
										'icon' => 'fa-linkedin',
									),
								)
							),
						),

					)
				);

			}
		}
	endif;

	// Client section.
	if ( ! function_exists( 'awp_companion_awpbusinesspress_client_default_content' ) ) :
		add_action( 'customize_register', 'awp_companion_awpbusinesspress_client_default_content' );
		function awp_companion_awpbusinesspress_client_default_content( $wp_customize ) {
			// awpbusinesspress default client data.
			$awpbusinesspress_client_data = $wp_customize->get_setting( 'awpbusinesspress_client_content' );
			if ( ! empty( $awpbusinesspress_client_data ) ) {
				$awpbusinesspress_client_data->default = json_encode(
					array(
						array(

							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-home1.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b96',
						),

						array(

							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-home2.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b97',
						),

						array(

							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-home3.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b98',

						),

						array(

							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . '/inc/awpbusinesspress/img/client/client-home4.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b99',

						),
					)
				);
			}
		}
		endif;

}
