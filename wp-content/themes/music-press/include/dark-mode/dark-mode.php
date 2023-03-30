<?php // Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
/*	
	function music_press_dark_mode($classes) {
		$music_press_night_mode = isset($_COOKIE['myNightMode']) ? $_COOKIE['myNightMode'] : '';
		//if the cookie is stored..
		if ($music_press_night_mode !== '') {
			// Add 'dark-mode' body class
			return array_merge($classes, array('dark-mode'));
		}
		return $classes;
	}
	add_filter('body_class', 'music_press_dark_mode');
	
*/	
	/**
		* Enqueue scripts and styles.
	*/
	
	add_action( 'wp_enqueue_scripts', 'music_press_dark_mode_scripts' );
	
	function music_press_dark_mode_scripts() {	
		if( get_theme_mod( 'activate_dark_mode', 'dark' ) == "button") {
			wp_enqueue_style( 'dark_mode-style', get_template_directory_uri() . '/include/dark-mode/dark-mode.css' );
			wp_enqueue_script( 'dark_mode-js', get_template_directory_uri() . '/include/dark-mode/dark-mode.js', array(), '', false );
		}
		if( get_theme_mod( 'activate_dark_mode', 'dark' ) == "dark") {
		     wp_enqueue_style( 'mode-dark', get_template_directory_uri() . '/include/dark-mode/dark.css' );
		}
		
		if( get_theme_mod( 'activate_dark_mode', 'dark' ) == "button1") {
			wp_enqueue_style( 'dark_style', get_template_directory_uri() . '/include/dark-mode/dark-mode.css' );
			wp_enqueue_script( 'white_mode-js', get_template_directory_uri() . '/include/dark-mode/white-mode.js', array(), '', false );
		}		
	}
	
	
	add_action( 'customize_register', 'music_press_dark_mode_customize' );
	function music_press_dark_mode_customize( $wp_customize ) {
	
		function music_press_dark_sanitize( $input ) {
			$valid = array(
				'dark' => esc_attr__( 'Activate Dark Mode', 'music-press' ),
				'white' => esc_attr__( 'Activate White Mode', 'music-press' ),
				'button' => esc_attr__( 'Activate White and Dark Button', 'music-press' ),
				'button1' => esc_attr__( 'Activate Dark and White Button', 'music-press' ),
			);
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
				} else {
				return '';
			}
		}
		
		$wp_customize->add_section( 'section_dark_mode' , array(
			'title'       => __( 'Button Dark Mode', 'music-press' ),
			'priority'    => 1,
		) );
		
		$wp_customize->add_setting( 'activate_dark_mode', array (
			'sanitize_callback' => 'music_press_dark_sanitize',
			'default'  => 'dark'	
		) );		

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_dark_mode', array(
			'label'    => __( 'Activate Dark and White Mode', 'music-press' ),
			'description'    => __( 'This option allows you to switch between dark and white mode or add a toggle button in the header', 'music-press' ),
			'section'  => 'section_dark_mode',		
			'settings' => 'activate_dark_mode',
			'type'     =>  'select',
			'priority'    => 1,			
			'choices'  => array(
				'dark' => esc_attr__( 'Activate Dark Mode', 'music-press' ),
				'white' => esc_attr__( 'Activate White Mode', 'music-press' ),
				'button' => esc_attr__( 'Activate White and Dark Button', 'music-press' ),
				'button1' => esc_attr__( 'Activate Dark and White Button', 'music-press' ),
		),
		) ) );
		
	}
