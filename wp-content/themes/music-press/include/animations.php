<?php if( ! defined( 'ABSPATH' ) ) exit;


function music_press_animations_customize_register( $wp_customize ) {

/************************************   Animations  ***********************************************/

function music_press_animations(){
	$array = array(
				'default0' => esc_attr__( 'Deactivate Animation', 'music-press' ),			
				'fadeIn' => esc_attr__( 'fadeIn', 'music-press' ),
				'flipInX' => esc_attr__( 'flipInX', 'music-press' ),
				'flip' => esc_attr__( 'flip', 'music-press' ),
				'flipInY' => esc_attr__( 'flipInY', 'music-press' ),			
				'bounce' => esc_attr__( 'bounce', 'music-press' ),
				'bounceIn' => esc_attr__( 'bounceIn', 'music-press' ),
				'bounceInDown' => esc_attr__( 'bounceInDown', 'music-press' ),
				'bounceInLeft' => esc_attr__( 'bounceInLeft', 'music-press' ),
				'bounceInRight' => esc_attr__( 'bounceInRight', 'music-press' ),
				'bounceInUp' => esc_attr__( 'bounceInUp', 'music-press' ),
				'fadeInDownBig' => esc_attr__( 'fadeInDownBig', 'music-press' ),
				'fadeInLeft' => esc_attr__( 'fadeInLeft', 'music-press' ),
				'fadeInLeftBig' => esc_attr__( 'fadeInLeftBig', 'music-press' ),
				'fadeInRight' => esc_attr__( 'fadeInRight', 'music-press' ),
				'fadeInRightBig' => esc_attr__( 'fadeInRightBig', 'music-press' ),
				'fadeInUp' => esc_attr__( 'fadeInUp', 'music-press' ),
				'fadeInUpBig' => esc_attr__( 'fadeInUpBig', 'music-press' ),
				'flash' => esc_attr__( 'flash', 'music-press' ),
				'headShake' => esc_attr__( 'headShake', 'music-press' ),
				'hinge' => esc_attr__( 'hinge', 'music-press' ),
				'jello' => esc_attr__( 'jello', 'music-press' ),
				'lightSpeedIn' => esc_attr__( 'lightSpeedIn', 'music-press' ),
				'pulse' => esc_attr__( 'pulse', 'music-press' ),
				'rollIn' => esc_attr__( 'rollIn', 'music-press' ),
				'rotateIn' => esc_attr__( 'rotateIn', 'music-press' ),
				'rotateInDownLeft' => esc_attr__( 'rotateInDownLeft', 'music-press' ),
				'rotateInDownRight' => esc_attr__( 'rotateInDownRight', 'music-press' ),
				'rotateInUpLeft' => esc_attr__( 'rotateInUpLeft', 'music-press' ),
				'rotateInUpRight' => esc_attr__( 'rotateInUpRight', 'music-press' ),
				'shake' => esc_attr__( 'shake', 'music-press' ),
				'slideInDown' => esc_attr__( 'slideInDown', 'music-press' ),
				'slideInLeft' => esc_attr__( 'slideInLeft', 'music-press' ),
				'slideInRight' => esc_attr__( 'slideInRight', 'music-press' ),
				'slideInUp' => esc_attr__( 'slideInUp', 'music-press' ),
				'swing' => esc_attr__( 'swing', 'music-press' ),
				'tada' => esc_attr__( 'tada', 'music-press' ),
				'wobble' => esc_attr__( 'wobble', 'music-press' ),
				'zoomIn' => esc_attr__( 'zoomIn', 'music-press' ),
				'zoomInDown' => esc_attr__( 'zoomInDown', 'music-press' ),
				'zoomInLeft' => esc_attr__( 'zoomInLeft', 'music-press' ),
				'zoomInRight' => esc_attr__( 'zoomInRight', 'music-press' ),
				'zoomInUp' => esc_attr__( 'zoomInUp', 'music-press' ),
				);
	return $array;
}	
		function music_press_sanitize_animations( $input ) {

			$valid = music_press_animations();

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
		
/************************************** Site Title Animation ******************************************/	

		$wp_customize->add_panel( 'music_press_animations' , array(
			'title'       => __( 'Animations', 'music-press' ),
			'priority'   => 4,
		) );

/************************************** Article Animation ******************************************/	

		$wp_customize->add_section( 'music_press_content_animations' , array(
			'title'       => __( 'Article Scroll Animation', 'music-press' ),
			'panel'       => 'music_press_animations',
			'priority'   => 4,
		) );
		
		$wp_customize->add_setting( 'music_press_animation_content', array (
			'sanitize_callback' => 'music_press_sanitize_animations',
			'default' => 'zoomIn',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_animation_content', array(
			'label'    => __( 'Article Animation', 'music-press' ),
			'section'  => 'music_press_content_animations',
			'settings' => 'music_press_animation_content',
			'type'     =>  'select',
            'choices'  => music_press_animations(),
		) ) );


}
add_action( 'customize_register', 'music_press_animations_customize_register' );

/*********************************************************************************************************
*  Menu Animations
**********************************************************************************************************/

function music_press_style_menu_animation() {
 $menu_animation = get_theme_mod( 'music_press_sub_menu_animation' ); 

	if ($menu_animation == "") {$menu_animation = "";}
	if ($menu_animation == 'flipInX') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/flipInX.css');}
	if ($menu_animation == 'bounce') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounce.css');}
	if ($menu_animation == 'flash') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/flash.css');}
	if ($menu_animation == 'pulse') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/pulse.css'); }
	if ($menu_animation == 'rubberBand') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/rubberBand.css');}
	if ($menu_animation == 'shake') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/shake.css');}
	if ($menu_animation == 'headShake') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/headShake.css');}
	if ($menu_animation == 'swing') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/swing.css');}
	if ($menu_animation == 'tada') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/tada.css'); }
	if ($menu_animation == 'wobble') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/wobble.css');}
	if ($menu_animation == 'jello') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/jello.css');}
	if ($menu_animation == 'bounceIn') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceIn.css');}
	if ($menu_animation == 'bounceInDown') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceInDown.css');}
	if ($menu_animation == 'bounceInLeft') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceInLeft.css');}
	if ($menu_animation == 'bounceInRight') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceInRight.css');}
	if ($menu_animation == 'bounceInUp') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceInUp.css');}	
	if ($menu_animation == 'bounceOut') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceOut.css');}	
	if ($menu_animation == 'bounceOutDown') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceOutDown.css'); }	
	if ($menu_animation == 'bounceOutLeft') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceOutLeft.css');}		
	if ($menu_animation == 'bounceOutRight') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceOutRight.css');}				
	if ($menu_animation == 'bounceOutUp') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/bounceOutUp.css');}		
	if ($menu_animation == 'fadeIn') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeIn.css');}					
	if ($menu_animation == 'fadeInDown') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeInDown.css');}					
	if ($menu_animation == 'fadeInDownBig') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeInDownBig.css');}					
	if ($menu_animation == 'fadeInLeft') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeInLeft.css');}			
	if ($menu_animation == 'fadeInLeftBig') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeInLeftBig.css');}				
	if ($menu_animation == 'fadeInRight') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeInRight.css');}										
	if ($menu_animation == 'fadeInRightBig') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeInRightBig.css');}
	if ($menu_animation == 'fadeInUp') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeInUp.css');}
	if ($menu_animation == 'fadeInUpBig') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/fadeInUpBig.css');}					
	if ($menu_animation == 'flip') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/flip.css');}				
	if ($menu_animation == 'flipInY') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/flipInY.css');}			
	if ($menu_animation == 'lightSpeedIn') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/lightSpeedIn.css');}		
	if ($menu_animation == 'rotateIn') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/rotateIn.css');}				
	if ($menu_animation == 'rotateInDownLeft') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/rotateInDownLeft.css');}
	if ($menu_animation == 'rotateInUpLeft') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/rotateInUpLeft.css');}
	if ($menu_animation == 'rotateInDownRight') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/rotateInDownRight.css');}
	if ($menu_animation == 'rotateInUpRight') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/rotateInUpRight.css');}
	if ($menu_animation == 'rollIn') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/rollIn.css');}					
	if ($menu_animation == 'zoomIn') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/zoomIn.css');}				
	if ($menu_animation == 'zoomInDown') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/zoomInDown.css');}						
	if ($menu_animation == 'zoomInLeft') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/zoomInLeft.css');}							
	if ($menu_animation == 'zoomInRight') {	wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/zoomInRight.css');}								
	if ($menu_animation == 'zoomInUp') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/zoomInUp.css');}									
	if ($menu_animation == 'slideInDown') {wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/slideInDown.css');}											
	if ($menu_animation == 'slideInLeft') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/slideInLeft.css');}									
	if ($menu_animation == 'slideInRight') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/slideInRight.css');}								
	if ($menu_animation == 'slideInUp') { wp_enqueue_style( 'seos_animation_menu', get_template_directory_uri() . '/css/menu-animation/slideInUp.css'); }

	}
	add_action( 'wp_enqueue_scripts', 'music_press_style_menu_animation' );