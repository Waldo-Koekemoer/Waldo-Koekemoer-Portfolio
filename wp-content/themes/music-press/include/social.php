<?php if( ! defined( 'ABSPATH' ) ) exit;

	function music_press_social_section ($class) { 
		$link_type_seos =  get_theme_mod( 'music_press_social_link_type' );
		?>
		
			<div class="<?php echo esc_html($class); ?>">
			
				<?php if (get_theme_mod( 'music_press_facebook' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_facebook' )); ?>"><i class="fa fa-facebook-f"></i></a>
				<?php endif; ?>
							
				<?php if (get_theme_mod( 'music_press_twitter' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_twitter' )) ?>"><i class="fa fa-twitter"></i></a>
				<?php endif; ?>

				<?php if (get_theme_mod( 'music_press_youtube' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_youtube' )); ?>"><i class="fa fa-youtube"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'music_press_vimeo' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_vimeo' )); ?>"><i class="fa fa-vimeo"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'music_press_pinterest' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_pinterest' )); ?>"><i class="fa fa-pinterest"></i></a>
				<?php endif; ?>
				
				<?php if (get_theme_mod( 'music_press_instagram' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_instagram' )); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'music_press_linkedin' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_linkedin' )); ?>"><i class="fa fa-linkedin"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'music_press_rss' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_rss' )); ?>"><i class="fa fa-rss"></i></a>
				<?php endif; ?>

				<?php if (get_theme_mod( 'music_press_tiktok' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_tiktok' )); ?>"><i class="fa fa-brands fa-tiktok"></i></a>
				<?php endif; ?>					
				
				<?php if (get_theme_mod( 'music_press_patreon' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_patreon' )); ?>"><i class="fa fa-brands fa-patreon"></i></a>
				<?php endif; ?>						

				<?php if (get_theme_mod( 'music_press_telegram' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_telegram' )); ?>"><i class="fa fa-brands fa-telegram"></i></a>
				<?php endif; ?>						

				<?php if (get_theme_mod( 'music_press_stumbleupon' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_stumbleupon' )); ?>"><i class="fa fa-stumbleupon"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_flickr' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_flickr' )); ?>"><i class="fa fa-flickr" aria-hidden="true"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_dribbble' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_dribbble' )); ?>"><i class="fa fa-dribbble"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_digg' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_digg' )); ?>"><i class="fa fa-digg"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_skype' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_skype' )); ?>"><i class="fa fa-skype"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_deviantart' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_deviantart' )); ?>"><i class="fa fa-deviantart"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_yahoo' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_yahoo' )); ?>"><i class="fa fa-yahoo"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_reddit_alien' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_reddit_alien' )); ?>"><i class="fa fa-reddit-alien"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_paypal' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else { echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_paypal' )); ?>"><i class="fa fa-paypal"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_dropbox' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_dropbox' )); ?>"><i class="fa fa-dropbox"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_soundcloud' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_soundcloud' )); ?>"><i class="fa fa-soundcloud"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_vk' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_vk' )); ?>"><i class="fa fa-vk"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_envelope' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_envelope' )); ?>"><i class="fa fa-envelope"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_address_book' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_address_book' )); ?>"><i class="fa fa-address-book" aria-hidden="true"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_apple' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_apple' )); ?>"><i class="fa fa-apple"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_amazon' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_amazon' )); ?>"><i class="fa fa-amazon"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_slack' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_slack' )); ?>"><i class="fa fa-slack"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_slideshare' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_slideshare' )); ?>"><i class="fa fa-slideshare"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_address_wikipedia' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_address_wikipedia' )); ?>"><i class="fa fa-wikipedia-w"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_wordpress' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_wordpress' )); ?>"><i class="fa fa-wordpress"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'music_press_odnoklassniki' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_odnoklassniki' )); ?>"><i class="fa fa-odnoklassniki"></i></a>
				<?php endif; ?>
																											
				<?php if (get_theme_mod( 'music_press_tumblr' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_tumblr' )); ?>"><i class="fa fa-tumblr"></i></a>
				<?php endif; ?>

				<?php if (get_theme_mod( 'music_press_github' )) : ?>
					<a target="<?php if($link_type_seos){ echo "_blank"; }  else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'music_press_github' )); ?>"><i class="fa fa-github-alt" aria-hidden="true"></i></a>
				<?php endif; ?>	
				
			</div>
		
<?php } 

add_action( 'customize_register', 'music_press__social' );

function music_press__social( $wp_customize ) {

		
 		$wp_customize->add_section( 'music_press_social_section' , array(
			'title'       => __( 'Social Media', 'music-press' ),
			'priority'    => 2,	
			//'description' => __( 'Social media buttons', 'music-press' ),
		) ); 

 		$wp_customize->add_setting( 'music_press_active_social_footer', array (
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_active_social_footer', array(
			'label'    => __( 'Activate Social Icons in Footer', 'music-press' ),
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_active_social_footer',
			'type' => 'checkbox'
		) ) );
	
 		$wp_customize->add_setting( 'music_press_social_link_type', array (
			'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_social_link_type', array(
			'label'    => __( 'Activate link in new window.', 'music-press' ),
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_social_link_type',
			'type' => 'checkbox'
		) ) );

		$wp_customize->add_setting( 'music_press_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_facebook', array(
			'label'    => __( 'Enter Facebook url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_facebook',
		) ) );	
		
		
		$wp_customize->add_setting( 'music_press_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_twitter', array(
			'label'    => __( 'Enter Twitter url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_twitter',
		) ) );	
			
		
		$wp_customize->add_setting( 'music_press_linkedin', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_linkedin', array(
			'label'    => __( 'Enter Linkedin url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_linkedin',
		) ) );	
			
		$wp_customize->add_setting( 'music_press_rss', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_rss', array(
			'label'    => __( 'Enter RSS url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_rss',
		) ) );

		$wp_customize->add_setting( 'music_press_tiktok', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_tiktok', array(
			'label'    => __( 'TikTok url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_tiktok',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_patreon', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_patreon', array(
			'label'    => __( 'Patreon url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_patreon',
		) ) );	
		
		$wp_customize->add_setting( 'music_press_telegram', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_telegram', array(
			'label'    => __( 'Telegram url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_telegram',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_pinterest', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_pinterest', array(
			'label'    => __( 'Enter Pinterest url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_pinterest',
		) ) );	
						
		$wp_customize->add_setting( 'music_press_youtube', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_youtube', array(
			'label'    => __( 'Enter Youtube url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_youtube',
		) ) );	
	

		$wp_customize->add_setting( 'music_press_vimeo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_vimeo', array(
			'label'    => __( 'Enter Vimeo url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_vimeo',
		) ) );	

		$wp_customize->add_setting( 'music_press_instagram', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_instagram', array(
			'label'    => __( 'Enter Instagram url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_instagram',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_stumbleupon', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_stumbleupon', array(
			'label'    => __( 'Enter Stumbleupon url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_stumbleupon',
		) ) );	
		
		$wp_customize->add_setting( 'music_press_flickr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_flickr', array(
			'label'    => __( 'Enter Flickr url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_flickr',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_dribbble', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_dribbble', array(
			'label'    => __( 'Enter Dribbble url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_dribbble',
		) ) );	

		$wp_customize->add_setting( 'music_press_digg', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_digg', array(
			'label'    => __( 'Enter Digg url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_digg',
		) ) );	

		$wp_customize->add_setting( 'music_press_skype', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_skype', array(
			'label'    => __( 'Enter Skype url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_skype',
		) ) );	

		$wp_customize->add_setting( 'music_press_deviantart', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_deviantart', array(
			'label'    => __( 'Enter Deviantart url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_deviantart',
		) ) );	

		$wp_customize->add_setting( 'music_press_yahoo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_yahoo', array(
			'label'    => __( 'Enter Yahoo url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_yahoo',
		) ) );	

		$wp_customize->add_setting( 'music_press_reddit_alien', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_reddit_alien', array(
			'label'    => __( 'Enter Reddit Alien url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_reddit_alien',
		) ) );	

		$wp_customize->add_setting( 'music_press_paypal', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_paypal', array(
			'label'    => __( 'Enter Paypal url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_paypal',
		) ) );	

		$wp_customize->add_setting( 'music_press_dropbox', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_dropbox', array(
			'label'    => __( 'Enter Dropbox url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_dropbox',
		) ) );	

		$wp_customize->add_setting( 'music_press_soundcloud', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_soundcloud', array(
			'label'    => __( 'Enter Soundcloud url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_soundcloud',
		) ) );	

		$wp_customize->add_setting( 'music_press_vk', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_vk', array(
			'label'    => __( 'Enter VK url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_vk',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_envelope', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_envelope', array(
			'label'    => __( 'Enter Envelope url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_envelope',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_address_book', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_address_book', array(
			'label'    => __( 'Enter Address Book url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_address_book',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_apple', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_apple', array(
			'label'    => __( 'Enter Apple url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_apple',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_amazon', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_amazon', array(
			'label'    => __( 'Enter Amazon url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_amazon',
		) ) );	
		
		$wp_customize->add_setting( 'music_press_slack', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_slack', array(
			'label'    => __( 'Enter Slack url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_slack',
		) ) );	

		$wp_customize->add_setting( 'music_press_slideshare', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_slideshare', array(
			'label'    => __( 'Enter Slideshare url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_slideshare',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_address_wikipedia', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_address_wikipedia', array(
			'label'    => __( 'Enter Wikipedia url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_address_wikipedia',
		) ) );	

		$wp_customize->add_setting( 'music_press_wordpress', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_wordpress', array(
			'label'    => __( 'Enter WordPress url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_wordpress',
		) ) );	
	
		$wp_customize->add_setting( 'music_press_odnoklassniki', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_odnoklassniki', array(
			'label'    => __( 'Enter Odnoklassniki url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_odnoklassniki',
		) ) );	
		
		$wp_customize->add_setting( 'music_press_tumblr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_tumblr', array(
			'label'    => __( 'Enter Tumblr url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_tumblr',
		) ) );	

		$wp_customize->add_setting( 'music_press_github', array (
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_github', array(
			'label'    => __( 'Enter GitHub url', 'music-press' ),		
			'section'  => 'music_press_social_section',
			'settings' => 'music_press_github',
		) ) );	

}

/********************************************
* Social styles
*********************************************/ 	

function music_press_social_method() {

        $social_media_color_mod = get_theme_mod( 'social_media_color' );
        $social_media_hover_color_mod = get_theme_mod( 'social_media_hover_color' );

		if($social_media_color_mod) { $social_media_color = ".social .fa-icons i, .social-top .fa {color: {$social_media_color_mod} !important;}";} else {$social_media_color ="";}
		if($social_media_hover_color_mod) { $social_media_hover_color = ".social .fa-icons i:hover, .social-top a:hover .fa {color: {$social_media_hover_color_mod} !important;}";} else {$social_media_hover_color ="";}

        wp_add_inline_style( 'custom-style-css', 
		$social_media_color.$social_media_hover_color);
}
add_action( 'wp_enqueue_scripts', 'music_press_social_method' );				
		