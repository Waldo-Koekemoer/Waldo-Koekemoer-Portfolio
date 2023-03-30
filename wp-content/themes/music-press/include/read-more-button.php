<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Read More Button
 */
	function music_press__excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
        return '<p class="link-more"><a class="myButt " href="'. esc_url(get_permalink( get_the_ID() ) ) . '">' . music_press__return_read_more_text (). '</a></p>';
	}
	add_filter( 'excerpt_more', 'music_press__excerpt_more' );
	
	function music_press__excerpt_length( $length ) {
			if ( is_admin() ) {
				return $length;
			}
			return 22;
	}
	add_filter( 'excerpt_length', 'music_press__excerpt_length', 999 );
	
	function music_press__return_read_more_text () {
		if( get_theme_mod( 'music_press__return_read_more_text' ) ) {
			return esc_html( get_theme_mod( 'music_press__return_read_more_text' ) );
		} else {
		return __( 'Read More','music-press');
		}
	}

add_action( 'customize_register', 'music_press_read_more_customize_register' );
function music_press_read_more_customize_register( $wp_customize ) {
/***********************************************************************************
 * Back to top button Options
***********************************************************************************/

		$wp_customize->selective_refresh->add_partial( 'music_press__return_read_more_text', array(
			'selector'        => '.myButt',
			'render_callback' => 'music_press__customize_partial_music_press__return_read_more_text',
		) );
		
		$wp_customize->add_section( 'music_press_read_more' , array(
			'title'       => __( 'Read More Button - Custom Text', 'music-press' ),
			'priority'   => 34,
		) );
		$wp_customize->add_setting( 'music_press__return_read_more_text', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press__return_read_more_text', array(
			'priority'    => 1,
			'label'    => __( 'Read More Text', 'music-press' ),
			'section'  => 'music_press_read_more',
			'settings' => 'music_press__return_read_more_text',
			'type' => 'text',
		) ) );
}