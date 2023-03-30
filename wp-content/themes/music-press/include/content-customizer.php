<?php if( ! defined( 'ABSPATH' ) ) exit;
function music_press__customize_register_content( $wp_customize ) {
	
/**
 * Recent Posts
 */
		$wp_customize->add_section( 'seos_content_section' , array(
			'title'       => __( 'Content Options', 'music-press' ),
			'priority'    => 27,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) );
 		$wp_customize->add_setting( 'content_padding', array (
            'default' => 0,		
			'sanitize_callback' => 'absint',
		) );
		 $wp_customize->add_control( 'content_padding', array(
		  'type' => 'range',
		  'section' => 'seos_content_section',
		  'settings' => 'content_padding',
		  'label' => __( 'Content Padding', 'music-press' ),
		  'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		  ),
		) );
 		$wp_customize->add_setting( 'hide_home_content', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_home_content', array(
			'label'    => __( 'Hide sidebar and content on home page', 'music-press' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'hide_home_content',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'hide_featured', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_featured', array(
			'label'    => __( 'Show featured images on all single pages.', 'music-press' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'hide_featured',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'hide_page_titles', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_page_titles', array(
			'label'    => __( 'Hide all single page and post titles', 'music-press' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'hide_page_titles',
			'type' => 'checkbox',
		) ) );
		
 		$wp_customize->add_setting( 'article_justify', array (
            'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'article_justify', array(
			'label'    => __( 'Article Text Align - Justify', 'music-press' ),
			'section'  => 'seos_content_section',
			'priority'    => 1,				
			'settings' => 'article_justify',
			'type' => 'checkbox',
		) ) );		
		
}
add_action( 'customize_register', 'music_press__customize_register_content' );
/********************************************
* Content Styles
*********************************************/ 	
function music_press__content_styles () {
        $hide_page_titles = esc_attr(get_theme_mod( 'hide_page_titles' ) );
        $article_justify = esc_attr(get_theme_mod( 'article_justify' ) );
        $hide_home_content = esc_attr(get_theme_mod( 'hide_home_content' ) );
        $content_padding = esc_attr(get_theme_mod( 'content_padding' ) );
        $homepage_columns = esc_attr(get_theme_mod( 'homepage_columns' ) );
		
		if( $hide_page_titles and is_singular()) { $hide_page_titles_style = ".entry-header .entry-title {display: none;}";} else {$hide_page_titles_style ="";}	
		if( $article_justify ) { $article_justify_style = "body article, body article p {text-align: justify;}";} else {$article_justify_style ="";}
		if( $hide_home_content and ( is_front_page() ) ) { $hide_home_content_style = ".home #content #primary, .home #content #secondary {display: none !important;}";} else {$hide_home_content_style ="";}
		if( $content_padding ) { $content_padding_style = "#content,.h-center {padding: {$content_padding}px !important; overflow: hidden;}";} else {$content_padding_style ="";}
		if( $homepage_columns == "1" and is_home()) { $homepage_columns_style1 = ".home article {width: 100%;}";} else {$homepage_columns_style1 ="";}
		if( $homepage_columns == "2" and is_home()) { $homepage_columns_style2 = ".home article {width: 45%;}";} else {$homepage_columns_style2 ="";}
        wp_add_inline_style( 'custom-style-css', 
		$hide_home_content_style.$content_padding_style.$homepage_columns_style1.$homepage_columns_style2.$article_justify_style.$hide_page_titles_style
		);
}
add_action( 'wp_enqueue_scripts', 'music_press__content_styles' );