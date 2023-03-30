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
if ( 'Formula Light' == $activate_theme ) {

	// Slider Default Data.
	if ( ! function_exists( 'formula_main_slider_default_content' ) ) :
		function formula_main_slider_default_content( $wp_customize ) {
			$formula_main_slider_data = $wp_customize->get_setting( 'formula_main_slider_content' );
			if ( ! empty( $formula_main_slider_data ) ) {
				$formula_main_slider_data->default = json_encode(
					array(
						array(
							'title'          => esc_html__( 'The Reality Is Everthing You Can Imagine', 'formula' ),
							'subtitle'       => esc_html__( 'Think Beyond Imaginations', 'formula' ),
							'text'           => esc_html__( 'Hustle in silence and let your success make the noise.', 'formula' ),
							'button_text'    => __( 'Join The Venture', 'formula' ),
							'link'           => '#',
							'slide_format'   => 'customizer_repeater_slide_format_standard',
							'content_format' => 'left',
							'image_url'      => awp_companion_plugin_url . 'inc/formula/img/slider/slide.png',
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
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/portfolio/p1.jpg',
							'title'           => esc_html__( '', 'formula' ),
							'subtitle'        => esc_html__( '', 'formula' ),
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
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/portfolio/p2.jpg',
							'title'           => esc_html__( '', 'formula' ),
							'subtitle'        => esc_html__( '', 'formula' ),
							// 'designation'        => esc_html__( 'Founder & CEO', 'formula' ),
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
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/portfolio/p3.jpg',
							'title'           => esc_html__( '', 'formula' ),
							'subtitle'        => esc_html__( '', 'formula' ),
							// 'designation'        => esc_html__( 'Director', 'formula' ),
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
							'title'        => esc_html__( 'Digital Marketing', 'formula' ),
							'text'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin, est eu vehicula pulvinar.', 'formula' ),
							'subtitle'     => esc_html__( 'Know More ', 'formula' ),
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/service/s1.png',
							'choice'       => 'customizer_repeater_image',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b15',
						),
						array(
							'title'        => esc_html__( 'eCommerce', 'formula' ),
							'text'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin, est eu vehicula pulvinar.', 'formula' ),
							'subtitle'     => esc_html__( 'Know More ', 'formula' ),
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/service/s2.png',
							'choice'       => 'customizer_repeater_image',
							'link'         => '#',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b16',
						),
						array(
							'title'        => esc_html__( 'Branding Design', 'formula' ),
							'text'         => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin, est eu vehicula pulvinar.', 'formula' ),
							'subtitle'     => esc_html__( 'Know More ', 'formula' ),
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/service/s3.png',
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

	// Testimonial content.
	if ( ! function_exists( 'formula_testimonial_default_content' ) ) :
		function formula_testimonial_default_content( $wp_customize ) {
			$formula_testimonial_data = $wp_customize->get_setting( 'formula_testimonial_content' );
			if ( ! empty( $formula_testimonial_data ) ) {
				$formula_testimonial_data->default = json_encode(
					array(
						array(
							'title'          => '"',
							'text'           => 'I love your system. Agency is both attractive and highly adaptable. Man, this thing is getting better and better as I learn more about it. I am so pleased with this product.',
							'subtitle'       => esc_html__( 'Billu Gol', 'formula' ),
							'designation'    => esc_html__( 'CEO, Agrok Inc.', 'formula' ),
							'link'           => '#',
							'image_url'      => awp_companion_plugin_url . 'inc/formula/img/testimonial/test1.png',
							'rating_control' => 'customizer_repeater_rating_control_five',
							'open_new_tab'   => 'no',
							'id'             => 'customizer_repeater_56d7ea7f40b96',
						),
						array(
							'title'          => '"',
							'text'           => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout. It vaese tam simplic quam Occidental in fact.',
							'subtitle'       => esc_html__( 'Mark Agroiks', 'formula' ),
							'designation'    => esc_html__( 'CEO, Apce.co', 'formula' ),
							'link'           => '#',
							'image_url'      => awp_companion_plugin_url . 'inc/formula/img/testimonial/test2.png',
							'rating_control' => 'customizer_repeater_rating_control_four',
							'open_new_tab'   => 'no',
							'id'             => 'customizer_repeater_56d7ea7f40b97',
						),
					)
				);
			}
		}
		add_action( 'customize_register', 'formula_testimonial_default_content' );
	endif;

	// formula funfact content data
	if ( ! function_exists( 'formula_funfact_default_customize_register' ) ) :
		function formula_funfact_default_customize_register( $wp_customize ) {
			// formula default funfact data.
			$formula_funfact_content_control = $wp_customize->get_setting( 'formula_funfact_content' );
			if ( ! empty( $formula_funfact_content_control ) ) {
				$formula_funfact_content_control->default = json_encode(
					array(
						array(
							'icon_value' => 'fa fa-hand-peace-o',
							'title'      => esc_html__( '10000', 'formula' ),
							'text'       => esc_html__( 'CLIENT TRUST', 'formula' ),
						),
						array(
							'icon_value' => 'fa fa-users',
							'title'      => esc_html__( '150', 'formula' ),
							'text'       => esc_html__( 'EXPERTS', 'formula' ),
						),
						array(
							'icon_value' => 'fa fa-street-view',
							'title'      => esc_html__( '15', 'formula' ),
							'text'       => esc_html__( 'EXPERIENCE', 'formula' ),
						),
						array(
							'icon_value' => 'fa fa-trophy',
							'title'      => esc_html__( '120', 'formula' ),
							'text'       => esc_html__( 'AWARDS', 'formula' ),
						),
					)
				);

			}
		}
		add_action( 'customize_register', 'formula_funfact_default_customize_register' );
	endif;

	// formula Team content data
	if ( ! function_exists( 'formula_team_default_customize_register' ) ) :
		add_action( 'customize_register', 'formula_team_default_customize_register' );
		function formula_team_default_customize_register( $wp_customize ) {
			// formula default team data.
			$formula_team_data = $wp_customize->get_setting( 'formula_team_content' );
			if ( ! empty( $formula_team_data ) ) {
				$formula_team_data->default = json_encode(
					array(
						array(
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/team/team-1.png',
							'title'           => esc_html__( 'Tasnia Tasnim', 'formula' ),
							'designation'     => esc_html__( 'Senior Consultant', 'formula' ),
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
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/team/team-2.png',
							'title'           => esc_html__( 'Abdullah Marsad', 'formula' ),
							'designation'     => esc_html__( 'Business Advisor', 'formula' ),
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
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/team/team-3.png',
							'title'           => esc_html__( 'Shannon Garcia', 'formula' ),
							'designation'     => esc_html__( 'Director', 'formula' ),
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
						array(
							'image_url'       => awp_companion_plugin_url . 'inc/formula/img/team/team-4.png',
							'title'           => esc_html__( 'Thomas Omazan', 'formula' ),
							'designation'     => esc_html__( 'Project Manager', 'formula' ),
							'link'            => '#',
							'open_new_tab'    => 'no',
							'id'              => 'customizer_repeater_56d7ea7f40c86',
							'social_repeater' => json_encode(
								array(
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb925cedcb2',
										'link' => 'facebook.com',
										'icon' => 'fa-facebook',
									),
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb92615f030',
										'link' => 'twitter.com',
										'icon' => 'fa-twitter',
									),
									array(
										'id'   => 'customizer-repeater-social-repeater-57fb9266c223a',
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
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/c1.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b96',
						),
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/c2.jpg',
							'open_new_tab' => 'no',
							'id'           => 'customizer_repeater_56d7ea7f40b97',
						),
						array(
							'link'         => '#',
							'image_url'    => awp_companion_plugin_url . 'inc/formula/img/client/c3.jpg',
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
