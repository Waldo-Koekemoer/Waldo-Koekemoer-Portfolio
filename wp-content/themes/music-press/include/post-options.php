<?php if( ! defined( 'ABSPATH' ) ) exit;
function music_press_customize_register_meta( $wp_customize ) {
	
	
		$wp_customize->selective_refresh->add_partial( 'hide_author', array(
			'selector' => '.entry-meta',
			'render_callback' => 'music_press_customize_partial_hide_author',
		) );		
	
		$wp_customize->add_section( 'music_press_hide_meta' , array(
			'title'       => __( 'Post Options', 'music-press' ),
			'priority'    => 26,			) );
		$wp_customize->add_setting( 'hide_author', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_author', array(
			'label'    => __( 'Hide Author', 'music-press' ),
			'section'  => 'music_press_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_author',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting( 'hide_date', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_date', array(
			'label'    => __( 'Hide Calendar', 'music-press' ),
			'section'  => 'music_press_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_date',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting( 'hide_comments', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_comments', array(
			'label'    => __( 'Hide Comments Link', 'music-press' ),
			'section'  => 'music_press_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_comments',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting( 'hide_posted_in', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_posted_in', array(
			'label'    => __( 'Hide Posted in Category', 'music-press' ),
			'section'  => 'music_press_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_posted_in',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting( 'hide_posted_tags', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_posted_tags', array(
			'label'    => __( 'Hide Tags', 'music-press' ),
			'section'  => 'music_press_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_posted_tags',
			'type' => 'checkbox',
		) ) );
	
}
add_action( 'customize_register', 'music_press_customize_register_meta' );
function music_press_hide_meta_styles() {
        $hide_author = get_theme_mod( 'hide_author' );
        $hide_date = get_theme_mod( 'hide_date' );
        $hide_comments = get_theme_mod( 'hide_comments' );
        $hide_posted_in = get_theme_mod( 'hide_posted_in' );
        $hide_posted_tags = get_theme_mod( 'hide_posted_tags' );	
		if($hide_author) { $style1 = ".cont-author {display: none !important;}";} else {$style1 ="";}
		if($hide_date) { $style2 = ".entry-meta .cont-date {display: none;} article header .entry-title {width: 100%; padding-left: 0 !important;} ";} else {$style2 ="";}
		if($hide_comments) { $style3 = ".entry-meta .cont-comments {display: none;}";} else {$style3 ="";}
		if($hide_posted_in) { $style4 = ".entry-meta .cont-portfolio {display: none !important; } ";} else {$style4 ="";}
		if($hide_posted_tags) { $style5 = ".entry-meta .cont-tags {display: none;}";} else {$style5 ="";}
        wp_add_inline_style( 'custom-style-css', 
		$style1.$style2.$style3.$style4.$style5
		);
}
add_action( 'wp_enqueue_scripts', 'music_press_hide_meta_styles' );