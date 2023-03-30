<?php
	// Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	/******************************
		* Font Sanitize
	******************************/
	function music_press_array_fonts() {
		$array = array(
		'' => esc_attr__( 'inherit', 'music-press' ),		
		'Helvetica' => esc_attr__( 'Helvetica', 'music-press' ),
		'Arial' => esc_attr__( 'Arial', 'music-press' ),
		'Oswald' => esc_attr__( 'Oswald', 'music-press' ),
		'Verdana' => esc_attr__( 'Verdana', 'music-press' ),
		'Tahoma' => esc_attr__( 'Tahoma', 'music-press' ),
		'Trebuchet MS' => esc_attr__( 'Trebuchet MS', 'music-press' ),
		'Impact' => esc_attr__( 'Impact', 'music-press' ),
		'Times New Roman' => esc_attr__( 'Times New Roman', 'music-press' ),
		'Courier' => esc_attr__( 'Courier', 'music-press' ),
		);
		return $array;
	}
	function music_press_sanitize_fonts( $input ) {
		$valid = music_press_array_fonts();
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
			} else {
			return '';
		}
	}	
	/******************************
		* Font Wight Sanitize
	******************************/
	function music_press_array_font_weight() {
		$array = array(
		'' => esc_attr__( 'Inherit', 'music-press' ),		
		'100' => esc_attr__( 'Thin 100', 'music-press' ),
		'200' => esc_attr__( 'Extra Light 200', 'music-press' ),
		'300' => esc_attr__( 'Light 300', 'music-press' ),
		'400' => esc_attr__( 'Normal 400', 'music-press' ),
		'500' => esc_attr__( 'Medium 500', 'music-press' ),
		'600' => esc_attr__( 'Semi Bold 600', 'music-press' ),
		'700' => esc_attr__( 'Bold 700', 'music-press' ),
		'800' => esc_attr__( 'Extra Bold 800', 'music-press' ),
		'900' => esc_attr__( 'Ultra Bold 900', 'music-press' ),
		);
		return $array;
	}
	function music_press_sanitize_fonts_weight( $input ) {
		$valid = music_press_array_font_weight();
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
			} else {
			return '';
		}
	}
	/******************************
		* Text Transform Sanitize
	******************************/
	function music_press_array_text_transform() {
		$array = array(
		'inherit' => esc_attr__( 'Inherit', 'music-press' ),		
		'' => esc_attr__( 'None', 'music-press' ),
		'capitalize' => esc_attr__( 'Capitalize', 'music-press' ),
		'uppercase' => esc_attr__( 'Uppercase', 'music-press' ),
		'lowercase' => esc_attr__( 'Lowercase', 'music-press' ),
		);
		return $array;
	}
	function music_press_sanitize_text_transform( $input ) {
		$valid = music_press_array_text_transform();
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
			} else {
			return '';
		}
	}
	
	/******************************
		* Font Style Sanitize
	******************************/
	
	function music_press_array_font_style() {
		$array = array(
		'inherit' => esc_attr__( 'Inherit', 'music-press' ),		
		'italic' => esc_attr__( 'Italic', 'music-press' ),
		);
		return $array;
	}
	function music_press_sanitize_font_style( $input ) {
		$valid = music_press_array_font_style();
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
			} else {
			return '';
		}
	}
	
	/******************************
		* Float Sanitize
	******************************/
	
	function music_press_sanitize_float( $input ) {
		return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	}
	
	add_action( 'customize_register', 'music_press_typography_customize' );
	function music_press_typography_customize( $wp_customize ) {
		
		$wp_customize->add_panel( 'seos_typography_panel' , array(
		'title'       => __( 'Typography', 'music-press' ),
		'priority'    => 6,
		) );
		
		////////////////////////////////////////  Site Title Typography ///////////////////////////////////////////////////////
		
		$wp_customize->add_section( 'typography_site_title' , array(
		'panel'       => "seos_typography_panel",
		'title'       => __( 'Site Title', 'music-press' ),
		'priority'    => 1,
		) );
		
		/******************************
			* Font
		******************************/		
		$wp_customize->add_setting( 'typography_font_site_title', array (
		'sanitize_callback' => 'music_press_sanitize_fonts',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_site_title', array(
		'label'    => __( 'Font', 'music-press' ),
		'section'  => 'typography_site_title',
		'priority'    => 1,
		'settings' => 'typography_font_site_title',
		'type'     =>  'select',
		'choices'  => music_press_array_fonts(),		
		) ) );		
		
		/******************************
			* Font Weight
		******************************/
		$wp_customize->add_setting( 'typography_font_weight_site_title', array (
		'sanitize_callback' => 'music_press_sanitize_fonts_weight',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_weight_site_title', array(
		'label'    => __( 'Font Weight', 'music-press' ),
		'settings' => 'typography_font_weight_site_title',
		'section'  => 'typography_site_title',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_font_weight(),		
		) ) );
		
		/******************************
			* Text Transform
		******************************/		
		$wp_customize->add_setting( 'typography_text_transform_site_title', array (
		'sanitize_callback' => 'music_press_sanitize_text_transform',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_text_transform_site_title', array(
		'label'    => __( 'Text Transform', 'music-press' ),
		'section'  => 'typography_site_title',
		'settings' => 'typography_text_transform_site_title',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_text_transform(),		
		) ) );		
		
		
		/******************************
			* Font Style
		******************************/		
		$wp_customize->add_setting( 'typography_font_style_site_title', array (
		'sanitize_callback' => 'music_press_sanitize_font_style',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_style_site_title', array(
		'label'    => __( 'Font Style', 'music-press' ),
		'section'  => 'typography_site_title',
		'settings' => 'typography_font_style_site_title',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_font_style(),		
		) ) );			
		
		/******************************
			* Font Size
		******************************/		
		$wp_customize->add_setting( 'typography_font_size_site_title', array (
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_font_size_site_title', array(
		'section'  => 'typography_site_title',
		'priority'    => 1,
		'settings' => 'typography_font_size_site_title',
		'label'       => __( 'Font Size / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'type'     =>  'range',
		'input_attrs'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
		),
		) ) );		

		/******************************
			* Font Size Mobile
		******************************/		
		$wp_customize->add_setting( 'typography_font_size_mobile_title', array (
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_font_size_mobile_title', array(
		'section'  => 'typography_site_title',
		'priority'    => 1,
		'settings' => 'typography_font_size_mobile_title',
		'label'       => __( 'Mobile Font Size / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'type'     =>  'range',
		'input_attrs'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
		),
		) ) );
				
		
		/******************************
			* Line Hight
		******************************/
		$wp_customize->add_setting( 'typography_line_height_site_title', array(
		'sanitize_callback' => 'music_press_sanitize_float',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_line_height_site_title', array(
		'type' => 'range',
		'priority' => 1,
		'settings' => 'typography_line_height_site_title',
		'section'  => 'typography_site_title',
		'label'       => __( 'Line Hight / em', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'input_attrs' => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 0.1,
		),
		) ) );		
		
		
		/******************************
			* Letter Spacing
		******************************/		
		
		$wp_customize->add_setting( 'typography_letter_spacing_site_title', array(
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_letter_spacing_site_title', array(
		'type' => 'range',
		'priority' => 9,
		'section' => 'typography_site_title',
		'label'       => __( 'Letter Spacing / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),			
		'input_attrs' => array(
		'min'  => 0,
		'max'  => 10,
		'step' => 1,
		),
		) ) );			

		////////////////////////////////////////  Site Description Typography ///////////////////////////////////////////////////////

		
		$wp_customize->add_section( 'typography_description' , array(
		'panel'       => "seos_typography_panel",
		'title'       => __( 'Site Description', 'music-press' ),
		'priority'    => 1,
		) );
		/******************************
			* Font
		******************************/		
		$wp_customize->add_setting( 'typography_font_description', array (
		'sanitize_callback' => 'music_press_sanitize_fonts',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_description', array(
		'label'    => __( 'Font', 'music-press' ),
		'section'  => 'typography_description',
		'priority'    => 1,
		'settings' => 'typography_font_description',
		'type'     =>  'select',
		'choices'  => music_press_array_fonts(),		
		) ) );
		
		
		/******************************
			* Font Weight
		******************************/
		$wp_customize->add_setting( 'typography_font_weight_description', array (
		'sanitize_callback' => 'music_press_sanitize_fonts_weight',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_weight_description', array(
		'label'    => __( 'Font Weight', 'music-press' ),
		'settings' => 'typography_font_weight_description',
		'section'  => 'typography_description',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_font_weight(),		
		) ) );
		
		/******************************
			* Text Transform
		******************************/		
		$wp_customize->add_setting( 'typography_text_transform_description', array (
		'sanitize_callback' => 'music_press_sanitize_text_transform',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_text_transform_description', array(
		'label'    => __( 'Text Transform', 'music-press' ),
		'section'  => 'typography_description',
		'settings' => 'typography_text_transform_description',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_text_transform(),		
		) ) );		
		
		
		/******************************
			* Font Style
		******************************/		
		$wp_customize->add_setting( 'typography_font_style_description', array (
		'sanitize_callback' => 'music_press_sanitize_font_style',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_style_description', array(
		'label'    => __( 'Font Style', 'music-press' ),
		'section'  => 'typography_description',
		'settings' => 'typography_font_style_description',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_font_style(),		
		) ) );			
		
		/******************************
			* Letter Spacing
		******************************/		
		
		$wp_customize->add_setting( 'typography_letter_spacing_description', array(
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_letter_spacing_description', array(
		'type' => 'range',
		'priority' => 9,
		'section' => 'typography_description',
		'label'       => __( 'Letter Spacing / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),			
		'input_attrs' => array(
		'min'  => 0,
		'max'  => 10,
		'step' => 1,
		),
		) ) );			
		
		/******************************
			* Font Size
		******************************/		
		$wp_customize->add_setting( 'typography_font_size_description', array (
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_font_size_description', array(
		'section'  => 'typography_description',
		'priority'    => 1,
		'settings' => 'typography_font_size_description',
		'label'       => __( 'Font Size / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'type'     =>  'range',
		'input_attrs'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
		),
		) ) );		
		
		////////////////////////////////////////  Titles Typography ///////////////////////////////////////////////////////

		
		$wp_customize->add_section( 'typography_titles' , array(
		'panel'       => "seos_typography_panel",
		'title'       => __( 'Titles', 'music-press' ),
		'priority'    => 1,
		) );
		/******************************
			* Font
		******************************/		
		$wp_customize->add_setting( 'font_titles', array (
		'sanitize_callback' => 'music_press_sanitize_fonts',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_titles', array(
		'label'    => __( 'Font', 'music-press' ),
		'section'  => 'typography_titles',
		'priority'    => 1,
		'settings' => 'font_titles',
		'type'     =>  'select',
		'choices'  => music_press_array_fonts(),		
		) ) );
		
		
		/******************************
			* Font Weight
		******************************/
		$wp_customize->add_setting( 'font_weight_titles', array (
		'sanitize_callback' => 'music_press_sanitize_fonts_weight',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_weight_titles', array(
		'label'    => __( 'Font Weight', 'music-press' ),
		'settings' => 'font_weight_titles',
		'section'  => 'typography_titles',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_font_weight(),		
		) ) );
		
		/******************************
			* Text Transform
		******************************/		
		$wp_customize->add_setting( 'text_transform_titles', array (
		'sanitize_callback' => 'music_press_sanitize_text_transform',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'text_transform_titles', array(
		'label'    => __( 'Text Transform', 'music-press' ),
		'section'  => 'typography_titles',
		'settings' => 'text_transform_titles',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_text_transform(),		
		) ) );		
		
		
		/******************************
			* Font Style
		******************************/		
		$wp_customize->add_setting( 'font_style_titles', array (
		'sanitize_callback' => 'music_press_sanitize_font_style',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_style_titles', array(
		'label'    => __( 'Font Style', 'music-press' ),
		'section'  => 'typography_titles',
		'settings' => 'font_style_titles',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_font_style(),		
		) ) );			
		
		/******************************
			* Letter Spacing
		******************************/		
		
		$wp_customize->add_setting( 'letter_spacing_titles', array(
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'letter_spacing_titles', array(
		'type' => 'range',
		'priority' => 9,
		'section' => 'typography_titles',
		'label'       => __( 'Letter Spacing / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),			
		'input_attrs' => array(
		'min'  => 0,
		'max'  => 10,
		'step' => 1,
		),
		) ) );			
		
		/******************************
			* Font Size
		******************************/		
		$wp_customize->add_setting( 'font_size_titles', array (
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'font_size_titles', array(
		'section'  => 'typography_titles',
		'priority'    => 1,
		'settings' => 'font_size_titles',
		'label'       => __( 'Font Size / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'type'     =>  'range',
		'input_attrs'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
		),
		) ) );
		
		/******************************
			* Font Size
		******************************/		
		$wp_customize->add_setting( 'font_size_mobile_titles', array (
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'font_size_mobile_titles', array(
		'section'  => 'typography_titles',
		'priority'    => 1,
		'settings' => 'font_size_mobile_titles',
		'label'       => __( 'Mobile Font Size / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'type'     =>  'range',
		'input_attrs'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
		),
		) ) );		
		
		/******************************
			* Line Hight
		******************************/
		$wp_customize->add_setting( 'line_height_titles', array(
		'sanitize_callback' => 'music_press_sanitize_float',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'line_height_titles', array(
		'type' => 'range',
		'priority' => 1,
		'settings' => 'line_height_titles',
		'section'  => 'typography_titles',
		'label'       => __( 'Line Hight / em', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'input_attrs' => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 0.1,
		),
		) ) );		
		
			
		
		////////////////////////////////////////  Article Typography ///////////////////////////////////////////////////////
		
		
		
		$wp_customize->add_section( 'typography_article' , array(
		'panel'       => "seos_typography_panel",
		'title'       => __( 'Content', 'music-press' ),
		'priority'    => 1,
		) );
		/******************************
			* Font
		******************************/		
		$wp_customize->add_setting( 'typography_font_article', array (
		'sanitize_callback' => 'music_press_sanitize_fonts',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_article', array(
		'label'    => __( 'Font', 'music-press' ),
		'section'  => 'typography_article',
		'priority'    => 1,
		'settings' => 'typography_font_article',
		'type'     =>  'select',
		'choices'  => music_press_array_fonts(),		
		) ) );
		
		
		/******************************
			* Font Weight
		******************************/
		$wp_customize->add_setting( 'typography_font_weight_article', array (
		'sanitize_callback' => 'music_press_sanitize_fonts_weight',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_weight_article', array(
		'label'    => __( 'Font Weight', 'music-press' ),
		'settings' => 'typography_font_weight_article',
		'section'  => 'typography_article',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_font_weight(),		
		) ) );
		
		/******************************
			* Text Transform
		******************************/		
		$wp_customize->add_setting( 'typography_text_transform_article', array (
		'sanitize_callback' => 'music_press_sanitize_text_transform',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_text_transform_article', array(
		'label'    => __( 'Text Transform', 'music-press' ),
		'section'  => 'typography_article',
		'settings' => 'typography_text_transform_article',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_text_transform(),		
		) ) );		
		
		
		/******************************
			* Font Style
		******************************/		
		$wp_customize->add_setting( 'typography_font_style_article', array (
		'sanitize_callback' => 'music_press_sanitize_font_style',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'typography_font_style_article', array(
		'label'    => __( 'Font Style', 'music-press' ),
		'section'  => 'typography_article',
		'settings' => 'typography_font_style_article',
		'priority'    => 1,
		'type'     =>  'select',
		'choices'  => music_press_array_font_style(),		
		) ) );			
		
		/******************************
			* Letter Spacing
		******************************/		
		
		$wp_customize->add_setting( 'typography_letter_spacing_article', array(
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_letter_spacing_article', array(
		'type' => 'range',
		'priority' => 9,
		'section' => 'typography_article',
		'label'       => __( 'Letter Spacing / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),			
		'input_attrs' => array(
		'min'  => 0,
		'max'  => 10,
		'step' => 1,
		),
		) ) );			
		
		/******************************
			* Font Size
		******************************/		
		$wp_customize->add_setting( 'typography_font_size_article', array (
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_font_size_article', array(
		'section'  => 'typography_article',
		'priority'    => 1,
		'settings' => 'typography_font_size_article',
		'label'       => __( 'Font Size / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'type'     =>  'range',
		'input_attrs'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
		),
		) ) );		
		

		/******************************
			* Font Size
		******************************/		
		$wp_customize->add_setting( 'typography_font_size_mobile_article', array (
		'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_font_size_mobile_article', array(
		'section'  => 'typography_article',
		'priority'    => 1,
		'settings' => 'typography_font_size_mobile_article',
		'label'       => __( 'Mobile Font Size / px', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'type'     =>  'range',
		'input_attrs'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
		),
		) ) );		
		
		/******************************
			* Line Hight
		******************************/
		$wp_customize->add_setting( 'typography_line_height_article', array(
		'sanitize_callback' => 'music_press_sanitize_float',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'typography_line_height_article', array(
		'type' => 'range',
		'priority' => 1,
		'settings' => 'typography_line_height_article',
		'section'  => 'typography_article',
		'label'       => __( 'Line Hight / em', 'music-press' ),
		'description' => __( 'When the range is null, the default value is set.', 'music-press' ),		
		'input_attrs' => array(
		'min'  => 0,
		'max'  => 5,
		'step' => 0.1,
		),
		) ) );
		
	}




	
	add_action( 'wp_enqueue_scripts', 'music_press_typography_styles' );	
	function music_press_typography_styles() {

		$typography_text_transform_site_title = esc_html(get_theme_mod( 'typography_text_transform_site_title' ) );
		$typography_font_style_site_title = esc_html(get_theme_mod( 'typography_font_style_site_title' ) );
		$typography_font_size_site_title = esc_html(get_theme_mod( 'typography_font_size_site_title' ) );
		$typography_line_height_site_title = esc_html(get_theme_mod( 'typography_line_height_site_title' ) );
		$typography_letter_spacing_site_title = esc_html(get_theme_mod( 'typography_letter_spacing_site_title' ) );
		$typography_font_site_title = esc_html(get_theme_mod( 'typography_font_site_title' ) );
		$typography_font_weight_site_title = esc_html(get_theme_mod( 'typography_font_weight_site_title' ) );
		$typography_font_size_mobile_title = esc_html(get_theme_mod( 'typography_font_size_mobile_title' ) );

		$typography_font_size_article = esc_html(get_theme_mod( 'typography_font_size_article' ) );
		$typography_font_size_mobile_article = esc_html(get_theme_mod( 'typography_font_size_mobile_article' ) );
		$typography_line_height_article = esc_html(get_theme_mod( 'typography_line_height_article' ) );	
		$typography_font_article = esc_html(get_theme_mod( 'typography_font_article' ) );
		$typography_font_weight_article = esc_html(get_theme_mod( 'typography_font_weight_article' ) );
		$typography_text_transform_article = esc_html(get_theme_mod( 'typography_text_transform_article' ) );
		$typography_letter_spacing_article = esc_html(get_theme_mod( 'typography_letter_spacing_article' ) );
		$typography_font_style_article = esc_html(get_theme_mod( 'typography_font_style_article' ) );
		
		$typography_font_size_description = esc_html(get_theme_mod( 'typography_font_size_description' ) );
		$typography_font_size_mobile_description = esc_html(get_theme_mod( 'typography_font_size_mobile_description' ) );
		$typography_line_height_description = esc_html(get_theme_mod( 'typography_line_height_description' ) );	
		$typography_font_description = esc_html(get_theme_mod( 'typography_font_description' ) );
		$typography_font_weight_description = esc_html(get_theme_mod( 'typography_font_weight_description' ) );
		$typography_text_transform_description = esc_html(get_theme_mod( 'typography_text_transform_description' ) );
		$typography_letter_spacing_description = esc_html(get_theme_mod( 'typography_letter_spacing_description' ) );
		$typography_font_style_description = esc_html(get_theme_mod( 'typography_font_style_description' ) );

		$font_size_titles = esc_html(get_theme_mod( 'font_size_titles' ) );
		$font_size_mobile_titles = esc_html(get_theme_mod( 'font_size_mobile_titles' ) );
		$line_height_titles = esc_html(get_theme_mod( 'line_height_titles' ) );	
		$font_titles = esc_html(get_theme_mod( 'font_titles' ) );
		$font_weight_titles = esc_html(get_theme_mod( 'font_weight_titles' ) );
		$text_transform_titles = esc_html(get_theme_mod( 'text_transform_titles' ) );
		$letter_spacing_titles = esc_html(get_theme_mod( 'letter_spacing_titles' ) );
		$font_style_titles = esc_html(get_theme_mod( 'font_style_titles' ) );


		$article = "body, #secondary, article div, article a, article ul, article tt, article var, article address, article pre, article ol, article dl, article table, article code, article p ";
		$site_title = ".site-branding .site-title a, .site-title";
		$description = ".site-description";
		$titles = "h1,h2,h3,h4,h5,h6,.entry-header .entry-title, article header .entry-title a";
		
		if( $typography_font_site_title ) {$font_title = $site_title." {font-family: '{$typography_font_site_title}', 'sans-serif';}";} else { $font_title = ""; }
		if( $typography_font_weight_site_title ) {$title_font_weight= $site_title." {font-weight:{$typography_font_weight_site_title};}";} else { $title_font_weight = ""; }
		if( $typography_text_transform_site_title ) {$title_style_text_transform = $site_title."{text-transform: {$typography_text_transform_site_title};}";} else { $title_style_text_transform = ""; }
		if( $typography_font_size_mobile_title ) {$font_size_mob_title = "@media screen and (max-width: 900px) {" . $site_title."{font-size: {$typography_font_size_mobile_title}px !important;} }";} else { $font_size_mob_title = ""; }
		if( $typography_font_style_site_title ) {$title_font_style = $site_title."{font-style: {$typography_font_style_site_title};}";} else { $title_font_style = ""; }		
		if( $typography_font_size_site_title ) {$font_size_title = $site_title." {font-size: {$typography_font_size_site_title}px;}";} else { $font_size_title = ""; }
		if( $typography_line_height_site_title ) {$line_height_title = $site_title."{line-height: {$typography_line_height_site_title}em;}";} else { $line_height_title = ""; }		
		if( $typography_letter_spacing_site_title ) {$title_letter_spacing = $site_title."{letter-spacing: {$typography_letter_spacing_site_title}px;}";} else { $title_letter_spacing = ""; }
		
		
		if( $typography_font_size_article ) {$font_size_article = $article." {font-size: {$typography_font_size_article}px;}";} else { $font_size_article = ""; }
		if( $typography_font_size_mobile_article ) {$font_size_mob_article = "@media screen and (max-width: 900px) {" . $article."{font-size: {$typography_font_size_mobile_article}px !important;} }";} else { $font_size_mob_article = ""; }
		if( $typography_line_height_article ) {$line_height_article = $article."{line-height: {$typography_line_height_article}em;}";} else { $line_height_article = ""; }
		if( $typography_font_article ) {$style_font = $article."{font-family: '{$typography_font_article}', 'sans-serif';}";} else { $style_font = ""; }
		if( $typography_font_weight_article ) {$style_font_weight = $article. "{font-weight: {$typography_font_weight_article};}";} else { $style_font_weight = ""; }
		if( $typography_text_transform_article ) {$style_text_transform = $article."{text-transform: {$typography_text_transform_article};}";} else { $style_text_transform = ""; }
		if( $typography_letter_spacing_article ) {$style_letter_spacing = $article."{letter-spacing: {$typography_letter_spacing_article}px;}";} else { $style_letter_spacing = ""; }
		if( $typography_font_style_article ) {$style_font_style = $article."{font-style: {$typography_font_style_article};}";} else { $style_font_style = ""; }
		

		if( $typography_font_size_description ) {$font_size_description = $description." {font-size: {$typography_font_size_description}px;}";} else { $font_size_description = ""; }
		if( $typography_font_size_mobile_description ) {$font_size_mob_description = "@media screen and (max-width: 900px) {" . $description."{font-size: {$typography_font_size_mobile_description}px !important;} }";} else { $font_size_mob_description = ""; }
		if( $typography_line_height_description ) {$line_height_description = $description."{line-height: {$typography_line_height_description}em;}";} else { $line_height_description = ""; }
		if( $typography_font_description ) {$style_font_description = $description."{font-family: '{$typography_font_description}', 'sans-serif';}";} else { $style_font_description = ""; }
		if( $typography_font_weight_description ) {$style_font_weight_description = $description. "{font-weight: {$typography_font_weight_description};}";} else { $style_font_weight_description = ""; }
		if( $typography_text_transform_description ) {$style_text_transform_description = $description."{text-transform: {$typography_text_transform_description};}";} else { $style_text_transform_description = ""; }
		if( $typography_letter_spacing_description ) {$style_letter_spacing_description = $description."{letter-spacing: {$typography_letter_spacing_description}px;}";} else { $style_letter_spacing_description = ""; }
		if( $typography_font_style_description ) {$style_font_style_description = $description."{font-style: {$typography_font_style_description};}";} else { $style_font_style_description = ""; }
		
		if( $font_size_titles ) {$font_size_titles_styles = $titles." {font-size: {$font_size_titles}px;}";} else { $font_size_titles_styles = ""; }
		if( $font_size_mobile_titles ) {$font_size_mob_titles = "@media screen and (max-width: 900px) {" . $titles."{font-size: {$font_size_mobile_titles}px !important;} }";} else { $font_size_mob_titles = ""; }
		if( $line_height_titles ) {$style_line_height_titles = $titles."{line-height: {$line_height_titles}em;}";} else { $style_line_height_titles = ""; }
		if( $font_titles ) {$style_font_titles = $titles."{font-family: '{$font_titles}', 'sans-serif';}";} else { $style_font_titles = ""; }
		if( $font_weight_titles ) {$style_font_weight_titles= $titles. "{font-weight: {$font_weight_titles};}";} else { $style_font_weight_titles = ""; }
		if( $text_transform_titles ) {$style_text_transform_titles = $titles."{text-transform: {$text_transform_titles};}";} else { $style_text_transform_titles = ""; }
		if( $letter_spacing_titles ) {$style_letter_spacing_titles = $titles."{letter-spacing: {$letter_spacing_titles}px;}";} else { $style_letter_spacing_titles = ""; }
		if( $font_style_titles ) {$style_font_style_titles = $titles."{font-style: {$font_style_titles};}";} else { $style_font_style_titles = ""; }
		
		
		wp_add_inline_style( 'custom-style-css', 
			$font_size_article.$line_height_article.$style_font.$style_font_weight.$style_text_transform.$style_letter_spacing.$style_font_style.$font_size_mob_title.
			$font_title.$title_font_weight.$title_style_text_transform.$title_font_style.$font_size_title.$line_height_title.$title_letter_spacing.$font_size_mob_article.
			$font_size_description.$font_size_mob_description.$line_height_description.$style_font_description.$style_font_weight_description.$style_text_transform_description.$style_letter_spacing_description.$style_font_style_description.
			$font_size_titles_styles.$font_size_mob_titles.$style_line_height_titles.$style_font_titles.$style_font_weight_titles.$style_text_transform_titles.$style_letter_spacing_titles.$style_font_style_titles
		);
	}	