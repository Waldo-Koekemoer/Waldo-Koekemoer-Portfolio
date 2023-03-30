<?php if( ! defined( 'ABSPATH' ) ) exit;
	
function music_press_cat_customize_register( $wp_customize ) {
		
		
	/***************** Slider General *********************/
	
	$wp_customize->add_section( 'music_press_cat_section' , array(
	    'title'       => __( 'Categories Page Options', 'music-press' ),
	    'priority'   => 25,
	) );
	
	$wp_customize->add_setting( 'music_press_cat_more', array (
		'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'music_press_cat_more', array(
		'label'    => __( 'Read More Text', 'music-press' ),		
		'section'  => 'music_press_cat_section',
		'settings' => 'music_press_cat_more',
		'type'     =>  'text'				
	) ) );		



	$wp_customize->add_setting( 'music_press_read_more_icon', array (
           'default' => "1",		
		'sanitize_callback' => 'music_press__sanitize_checkbox',
	) );
		
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_read_more_icon', array(
		'label'    => __( 'Activate Read More Icons', 'music-press' ),
		'section'  => 'music_press_cat_section',
		'priority'    => 3,				
		'settings' => 'music_press_read_more_icon',
		'type' => 'checkbox',
	) ) );
	
	$wp_customize->add_setting( 'music_press_cat_title_icon', array (
		'sanitize_callback' => 'wp_kses_post',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_cat_title_icon', array(
		'label'    => __( 'Title Icon', 'music-press' ),			
		'description'    => __( 'How to use the icons? <a target="_blank" href="https://developer.wordpress.org/resource/dashicons/#editor-video">You can see here the icons.</a>. Select icon and then copy HTML code. Put the code in the field below. ', 'music-press' ),			
		'section'  => 'music_press_cat_section',
		'settings' => 'music_press_cat_title_icon',
		'type' => 'textarea',
	) ) );		
	
}
add_action( 'customize_register', 'music_press_cat_customize_register' );

	function music_press_cat_styles () {
		
        $music_press_read_more_icon = esc_html(get_theme_mod( 'music_press_read_more_icon','1' ) );
		if( !$music_press_read_more_icon ) { $music_press_cat_gallery_icon_style = ".mp-details .mp-3 .show-desc { margin-top: 5px; }";} else {$music_press_cat_gallery_icon_style ="";}
			
	wp_add_inline_style( 'custom-style-css', 
		$music_press_cat_gallery_icon_style
		);	


	}
add_action( 'wp_enqueue_scripts', 'music_press_cat_styles' );