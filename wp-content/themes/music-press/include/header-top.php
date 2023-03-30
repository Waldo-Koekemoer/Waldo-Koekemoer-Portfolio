<?php
	// Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	add_action( 'customize_register', 'music_press__header_top_customize_register' );
	function music_press__header_top_customize_register( $wp_customize ) {
		/***********************************************************************************
			* Back to top button Options
		***********************************************************************************/
		$wp_customize->add_section( 'header_top' , array(
		'title'       => __( 'Header Top', 'music-press' ),
		'priority'   => 2,
		) );
		$wp_customize->add_setting( 'activate_header_top', array (
		'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_header_top', array(
		'priority'    => 1,
		'label'    => __( 'Deactivate Header Top', 'music-press' ),
		'section'  => 'header_top',
		'settings' => 'activate_header_top',
		'type' => 'checkbox',
		) ) );
		
 	    $wp_customize->add_setting( 'header_email', array (
		'default' => 'email@myemail.com',	
		'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_email', array(
		'label'    => __( 'E-mail', 'music-press' ),
		'priority'    => 3,
		'section'  => 'header_top',
		'settings' => 'header_email',
		'type' => 'text',
		) ) );
 	    $wp_customize->add_setting( 'header_address', array (
		'default' => 'Str. 368',
		'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_address', array(
		'label'    => __( 'Address', 'music-press' ),
		'priority'    => 3,
		'section'  => 'header_top',
		'settings' => 'header_address',
		'type' => 'text',
		) ) );
 	    $wp_customize->add_setting( 'header_phone', array (
		'default' => '+01234567890',		
		'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_phone', array(
		'label'    => __( 'Phone', 'music-press' ),
		'priority'    => 3,
		'section'  => 'header_top',
		'settings' => 'header_phone',
		'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'music_press_header_search', array (
		'default' => '',		
		'sanitize_callback' => 'music_press__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_header_search', array(
		'label'    => __( 'Activate search', 'music-press' ),
		'section'  => 'header_top',
		'priority'    => 1,				
		'settings' => 'music_press_header_search',
		'type' => 'checkbox',
		) ) );
		
		if( class_exists( 'WooCommerce' ) ) {		
			$wp_customize->add_setting( 'music_press_header_cart', array (
			'default' => '',		
			'sanitize_callback' => 'music_press__sanitize_checkbox',
			) );
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'music_press_header_cart', array(
			'label'    => __( 'Activate WooCommerce Cart', 'music-press' ),
			'section'  => 'header_top',
			'priority'    => 1,				
			'settings' => 'music_press_header_cart',
			'type' => 'checkbox',
			) ) );
	
		}		
	}	
	
	/**
		* Search Top
	*/
	add_action( 'music_press_header_search_top', 'music_press_search_top' );
	function music_press_search_top()
	{
		if ( get_theme_mod( 'music_press_header_search' ) ) {
			echo  '<div class="s-search-top">
			<i onclick="fastSearch()" id="search-top-ico" class="dashicons dashicons-search"></i>
			<div id="big-search" style="display:none;">
			<form method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<div style="position: relative;">
			<button class="button-primary button-search"><span class="screen-reader-text">' . esc_html( 'Search for:', 'music-press' ) . '</span></button>
			<span class="screen-reader-text">' . esc_html( 'Search for:', 'music-press' ) . '</span>
			<div class="s-search-show">
			<input id="s-search-field"  type="search" class="search-field"
			placeholder="' . esc_attr_x( 'Search ...', 'placeholder', 'music-press' ) . '"
			value="' . get_search_query() . '" name="s"
			title="' . esc_attr_x( 'Search for:', 'label', 'music-press' ) . '" />
			<input type="submit" id="stss" class="search-submit" value="' . esc_html( 'Search', 'music-press' ) . '" />
			<div onclick="fastCloseSearch()" id="s-close">X</div>
			</div>	
			</div>
			</form>
			</div>	
			</div>' ;
		}
	}
	
	function music_press__header () {
	?>
	<header class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		
		<?php if ( !get_theme_mod( 'activate_header_top' ) ) { ?>
			<div class="header-top">
				<div id="top-contacts" class="before-header">
					<?php if (get_theme_mod('header_email', 'email@myemail.com')) { ?>
						<div class="h-email" itemprop="email"><a href="mailto:<?php echo esc_html( get_theme_mod( 'header_email', 'email@myemail.com') ); ?>"><span class="dashicons dashicons-email-alt"> </span> <?php echo esc_html( get_theme_mod( 'header_email', 'email@myemail.com') ); ?></a></div>
					<?php } ?>
					<?php if (get_theme_mod('header_address','Str. 368')) { ?>
						<div class="h-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span class="dashicons dashicons-location"></span><?php echo esc_html( get_theme_mod( 'header_address','Str. 368') ); ?></div>
					<?php } ?>
					<?php if (get_theme_mod('header_phone','+01234567890')) { ?>
						<div class="h-phone" itemprop="telephone"><a href="tel:<?php echo esc_html( get_theme_mod( 'header_phone','+01234567890') ); ?>"><span class="dashicons dashicons-phone"> </span> <?php echo esc_html( get_theme_mod( 'header_phone','+01234567890') ); ?></a></div>
					<?php } ?>
					<div class="nav-top-detiles">
						<?php
							do_action( 'music_press_header_search_top' );
							do_action( 'music_press_header_woo_cart' );
						?>
					</div>			
				</div>		
			</div>
			<?php
			}
			 if( get_theme_mod( 'activate_dark_mode', 1) ) { ?>	
				<div class="dark-mode-button">
					<div class="dark-mode-button-inner-left"></div>
					<div class="dark-mode-button-inner"></div>
			</div>
			<?php } ?>
		<div style="position: relative;">
			<?php if( !get_theme_mod( 'hide_menu' ) ) { ?>
				<div id="menu-top" class="menu-cont">
					<div class="grid-menu">
						<div id="grid-top" class="grid-top">
							<!-- Site Navigation  -->
							<div class="header-right" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
								<?php the_custom_logo(); ?>
							</div>	
							<div class="mobile-cont">
								<div class="mobile-logo" itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand">
									<?php the_custom_logo(); ?>
								</div>
							</div>
							<button id="s-button-menu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img alt="mobile" src="<?php echo esc_url(get_template_directory_uri() ) . '/images/mobile.jpg'; ?>"/></button>
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle"><?php esc_html_e( 'Menu', 'music-press' ); ?></button>
								<?php wp_nav_menu( array( 
									'theme_location' => 'primary',
									'menu_id' => 'primary-menu'	
								) ); ?>
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- Header Image  -->	
		</div>
		<?php if ( !get_post_meta( get_the_ID(),'music_press_value_header_image', true ) ) { ?>	
			<?php if( (has_header_image() or get_theme_mod('video_upload')) and  (is_front_page() or is_home() ) and get_theme_mod( 'header_image_show', "home" ) == 'home' ) { ?>	
				<div class="all-header">
					<div class="s-shadow"></div>
					<div class="dotted"></div>
					<div class="s-hidden">
						<?php
							if(!get_theme_mod('video_upload') ) { ?>
							<?php if (get_theme_mod( 'header_image_position' ) == 'default' ) { ?>
								<img id="masthead" style="<?php music_press__heade_image_zoom_speed (); ?>" class="header-image" src='<?php echo esc_url(get_template_directory_uri() ) . '/images/header.webp'; ?>' alt="<?php esc_attr_e( 'header image','music-press' ); ?>"/>	
							<?php } ?>
							<?php if (get_theme_mod( 'header_image_position' ) == 'real' ) { ?>
								<img id="masthead" style="<?php music_press__heade_image_zoom_speed (); ?>" class="header-image" src='<?php if ( !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'music_press__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' alt="<?php esc_attr_e( 'header image','music-press' ); ?>"/>	
								<?php } else { ?>
								<div id="masthead" class="header-image" style="<?php music_press__heade_image_zoom_speed (); ?> background-image: url( '<?php if (  !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'music_press__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' );"></div>
								<?php } 
							} elseif( get_theme_mod('video_upload') ) { ?>
							<video <?php if( get_theme_mod( 'music_press_loop' ) ) { echo "loop"; } ?> muted autoplay preload="auto" id="masthead">
								<source src="<?php echo esc_url(wp_get_attachment_url( get_theme_mod('video_upload')) ); ?>" type="video/mp4">
							</video>
						<?php } ?>
					</div>
					<div class="site-branding">
						<?php if ( display_header_text() == true ) { ?>
							<?php
								if ( is_front_page() or is_home() ) :
							?>
							<h1 id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2"><?php bloginfo( 'name' ); ?></span></a></h1>
							<?php
								else :
							?>
							<p id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2"><?php if( get_theme_mod('music_press_header_single') ) { if( !is_singular() ) { the_archive_title(); } else { the_title(); } } else { bloginfo( 'name' ); } ?></span></a></p>
							<?php
								endif;
								$music_press__description = esc_html(get_bloginfo( 'description', 'display' ) );
								if ( $music_press__description || is_customize_preview() ) :
							?>    
							<p class="site-description" itemprop="headline">
								<span class="word"><?php echo esc_html($music_press__description); ?></span>
							</p>
							<?php endif; ?>	
							<?php }
							if ( is_front_page() or is_home() ) {
							    do_action('music_press_buttons_header');
							} ?>	
					</div>
					<!-- .site-branding -->
				</div>
			<?php } ?>
			<?php if ((has_header_image() or get_theme_mod('video_upload')) and get_theme_mod( 'header_image_show', "home"  ) == 'all' ) { ?>	
				<div class="all-header">
					<div class="s-shadow"></div>
					<div class="dotted"></div>
					<div class="s-hidden">
						<?php
							if(!get_theme_mod('video_upload') ) { ?>
							<?php if (get_theme_mod( 'header_image_position' ) == 'default' ) { ?>
								<img id="masthead" style="<?php music_press__heade_image_zoom_speed (); ?>" class="header-image" src='<?php echo esc_url(get_template_directory_uri() ) . '/images/header.webp'; ?>' alt="<?php esc_attr_e( 'header image','music-press' ); ?>"/>	
							<?php } ?>
							<?php if (get_theme_mod( 'header_image_position' ) == 'real' ) { ?>
								<img id="masthead" style="<?php music_press__heade_image_zoom_speed (); ?>" class="header-image" src='<?php if ( !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'music_press__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' alt="<?php esc_attr_e( 'header image','music-press' ); ?>"/>	
								<?php } else { ?>
								<div id="masthead" class="header-image" style="<?php music_press__heade_image_zoom_speed (); ?> background-image: url( '<?php if (  !is_home() and has_post_thumbnail() and get_post_meta( get_the_ID(), 'music_press__value_header_image', true ) ) { the_post_thumbnail_url(); } else { header_image(); } ?>' );"></div>
							<?php } } elseif( get_theme_mod('video_upload') ) { ?>
							<video <?php if( get_theme_mod( 'music_press_loop' ) ) { echo "loop"; } ?> muted  autoplay  id="masthead" >
								<source src="<?php echo esc_url(wp_get_attachment_url( get_theme_mod('video_upload')) ); ?>" type="video/mp4">
							</video>
						<?php } ?>
					</div>
					<div class="site-branding">
						<?php if ( display_header_text() == true ) { ?>
							<?php
								if ( is_front_page() or is_home() ) :
							?>
							<h1 id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2 letter"><?php bloginfo( 'name' ); ?></span></a></h1>
							<?php
								else :
							?>
							<p id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2 letter"><?php if( get_theme_mod('music_press_header_single') ) { if( !is_singular() ) { the_archive_title(); } else { the_title(); } } else { bloginfo( 'name' ); } ?></span></a></p>
							<?php
								endif;
								$music_press__description = esc_html(get_bloginfo( 'description', 'display' ) );
								if ( $music_press__description || is_customize_preview() ) :
							?>    
							<p class="site-description" itemprop="headline">
								<span class="word"><?php echo esc_html($music_press__description); ?></span>
							</p>
							<?php endif; ?>	
							<?php } 
							if ( is_front_page() or is_home() ) {
							    do_action('music_press_buttons_header');
							} ?>	
					</div>
					<!-- .site-branding -->
				</div>
				<?php } 
			}

			if ( get_post_meta( get_the_ID(),'music_press_value_header_image', true ) and has_post_thumbnail() ) { ?>	
			<div class="all-header">
				<div class="s-shadow"></div>
				<div class="dotted"></div>
				<div class="s-hidden">
					<?php do_action('custom_header'); // Go to include/mea-box-header-image.php ?>
				</div>
				<div class="site-branding">
				
						<?php
						
						if ( is_front_page() && is_home() ) :
						?>
						<h1 id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2"><?php echo esc_html( get_post_meta( get_the_ID(),'header_image_title', true ) ); ?></span></a></h1>
						<?php
							else :
						?>
						<p id="site-title" class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="ml2"><?php echo esc_html( get_post_meta( get_the_ID(),'header_image_title', true )  ); ?></span></a></p>
						<?php
							endif;	
						if ( get_post_meta( get_the_ID(),'header_image_description', true )  ) :
						?>    
						<p class="site-description" itemprop="headline">
							<span class="word"><?php echo esc_html( get_post_meta( get_the_ID(),'header_image_description', true )  ); ?></span>
						</p>
						<?php endif; ?>
				</div>
				<!-- .site-branding -->
			</div>
		<?php } ?>
		
	</header>
<?php }					