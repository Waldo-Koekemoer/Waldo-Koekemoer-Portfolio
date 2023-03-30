<?php if( ! defined( 'ABSPATH' ) ) exit;
function music_press_customize_register_header_buttons( $wp_customize ) {

		$wp_customize->selective_refresh->add_partial( 'button_1', array(
			'selector' => '.h-button-1 ',
			'render_callback' => 'music_press_customize_partial_button_1',
		) );	
		
		$wp_customize->selective_refresh->add_partial( 'button_2', array(
			'selector' => '.h-button-2 ',
			'render_callback' => 'music_press_customize_partial_button_2',
		) );	
		
		
		$wp_customize->add_section( 'seos_header_buttons_section' , array(
			'title'       => __( 'Homepage Header Buttons', 'music-press' ),
			'priority'    => 26,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) );
		
		$wp_customize->add_setting( 'button_1', array (
            'default' => '',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_1', array(
			'label'    => __( 'Button 1 Text', 'music-press' ),
			'description'    => __( 'The button will be activated if you insert text', 'music-press' ),			
			'section'  => 'seos_header_buttons_section',			
			'settings' => 'button_1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'button_1_link', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_1_link', array(
			'label'    => __( 'Button 1 URL', 'music-press' ),		
			'section'  => 'seos_header_buttons_section',
			'settings' => 'button_1_link',
		) ) );

/************************************
* Animation Articles
************************************/

		$wp_customize->add_setting( 'music_press_button_1_animation', array (
			'sanitize_callback' => 'music_press_sanitize_menu_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_button_1_animation', array(
			'label'    => __( 'Button 1 Animation', 'music-press' ),
			'section'  => 'seos_header_buttons_section',
			'settings' => 'music_press_button_1_animation',
			'type'     =>  'select',
            'choices'  => music_press_animations_menu(),		
		) ) );		

		$wp_customize->add_setting( 'button_2', array (
            'default' => '',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_2', array(
			'label'    => __( 'Button 2 Text', 'music-press' ),
			'description'    => __( 'The button will be activated if you insert text', 'music-press' ),			
			'section'  => 'seos_header_buttons_section',			
			'settings' => 'button_2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'button_2_link', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_2_link', array(
			'label'    => __( 'Button 2 URL', 'music-press' ),		
			'section'  => 'seos_header_buttons_section',
			'settings' => 'button_2_link',
		) ) );
		
		$wp_customize->add_setting( 'music_press_button_2_animation', array (
			'sanitize_callback' => 'music_press_sanitize_menu_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_button_2_animation', array(
			'label'    => __( 'Button 2 Animation', 'music-press' ),
			'section'  => 'seos_header_buttons_section',
			'settings' => 'music_press_button_2_animation',
			'type'     =>  'select',
            'choices'  => music_press_animations_menu(),		
		) ) );					
}
add_action( 'customize_register', 'music_press_customize_register_header_buttons' );



function music_press_buttons () {
	$button1 =  get_theme_mod( 'button_1' );
	$button2 = get_theme_mod( 'button_2' );
	$button_1_link = get_theme_mod( 'button_1_link' );
	$button_2_link = get_theme_mod( 'button_2_link' );
	$button_1_animation = get_theme_mod( 'music_press_button_1_animation' );
	$button_2_animation = get_theme_mod( 'music_press_button_2_animation' );

	?>
	<div>
	<?php if($button1) { ?>	
	<div class='h-button-1 animated <?php if($button_1_animation) { echo esc_html( $button_1_animation ); } else { echo "fadeInLeft"; } ?>'>	
		<a href='<?php echo esc_url( $button_1_link ); ?>'><?php echo esc_html( $button1 ); ?></a>
	</div>
	<?php } ?>
	<?php if($button2) { ?>	
	<div class='h-button-2 animated <?php if($button_2_animation) { echo esc_html( $button_2_animation ); } else { echo "fadeInRight"; } ?>'>	
		<a href='<?php echo esc_url( $button_2_link ); ?>'><?php echo esc_html( $button2 ); ?></a>	
	</div>
	<?php } ?>
	</div>
<?php
}
add_action('music_press_buttons_header', 'music_press_buttons');

	//Menu Animations
function music_press_animations_menu(){
	$array = array(
				'none' => esc_attr__( 'Deactivate Animation', 'music-press' ),
				'fadeInUp' => esc_attr__( 'Default', 'music-press' ),				
				'fadeIn' => esc_attr__( 'fadeIn', 'music-press' ),		
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
				'zoomInDown' => esc_attr__( 'zoomInDown', 'music-press' ),
				'zoomInLeft' => esc_attr__( 'zoomInLeft', 'music-press' ),
				'zoomInRight' => esc_attr__( 'zoomInRight', 'music-press' ),
				'zoomInUp' => esc_attr__( 'zoomInUp', 'music-press' ),
				);
	return $array;
}
		function music_press_sanitize_menu_animations( $input ) {
			$valid = music_press_animations_menu();
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}