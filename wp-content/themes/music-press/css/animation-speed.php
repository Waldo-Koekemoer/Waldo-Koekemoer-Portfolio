<?php if( ! defined( 'ABSPATH' ) ) exit;
	function music_press_animation() { 
		$article_speed = get_theme_mod( 'music_press_animation_content_speed' );	
		$speed = get_theme_mod('music_press_sub_menu_animation_speed');
		$gallery_speed = get_theme_mod( 'music_press_animation_gallery_speed' );
		$sidebar_speed = get_theme_mod( 'music_press_animation_sidebar_speed' );	
		$popular_speed = get_theme_mod( 'music_press_animation_popular_speed' );	
		$about_us_speed = get_theme_mod( 'music_press_animation_about_speed' );
		$footer_speed = get_theme_mod( 'music_press_animation_footer_speed' )		
	?>
	<style>
		<?php if (get_theme_mod( 'music_press_animation_content'  )) { ?>			
			article {
			-webkit-animation-duration: <?php if ($article_speed ) { echo esc_html( $article_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($article_speed ) { echo esc_html( $article_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>
		
		.main-navigation ul li:hover > ul {
		-webkit-animation-duration: <?php echo esc_html($speed); ?>s !important;
		animation-duration: <?php echo esc_html($speed); ?>s  !important;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
		z-index: 99999;
		}
		
		<?php if (get_theme_mod( 'music_press_animation_gallery'  )) { ?>		
			#seos-gallery a, .album a {
			-webkit-animation-duration: <?php if ($gallery_speed) { echo esc_html( $gallery_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($gallery_speed) { echo esc_html( $gallery_speed ); } else echo "0.3"; ?>s !important;		
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>

		<?php if (get_theme_mod( 'music_press_animation_about'  )) { ?>		
			.about-us-container, .about_us-card {
			-webkit-animation-duration: <?php if ($about_us_speed) { echo esc_html( $about_us_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($about_us_speed) { echo esc_html( $about_us_speed ); } else echo "0.3"; ?>s !important;		
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>
		
		
		<?php if (get_theme_mod( 'music_press_animation_popular'  )) { ?>		
			.top-popular {
			-webkit-animation-duration: <?php if ($popular_speed ) { echo esc_html( $popular_speed  ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($popular_speed ) { echo esc_html( $popular_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>
		
		
		<?php if (get_theme_mod( 'music_press_animation_sidebar'  )) { ?>		
			aside section {
			display: block;
			-webkit-animation-duration: <?php if ($sidebar_speed ) { echo esc_html( $sidebar_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($sidebar_speed ) { echo esc_html( $sidebar_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>

		
		<?php if (get_theme_mod( 'music_press_animation_footer'  )) { ?>			
			.footer-widgets {
			-webkit-animation-duration: <?php if ($footer_speed) { echo esc_html( $footer_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($footer_speed) { echo esc_html( $footer_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>		
	</style>
	<?php }
	
add_action('wp_footer', 'music_press_animation');