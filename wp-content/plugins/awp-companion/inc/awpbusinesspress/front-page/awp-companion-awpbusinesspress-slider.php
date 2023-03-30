<?php
$awpbusinesspress_main_slider_options         = get_theme_mod( 'awpbusinesspress_main_slider_content' );
$awpbusinesspress_main_slider_disabled        = get_theme_mod( 'awpbusinesspress_main_slider_disabled', true );
$awpbusinesspress_main_slider_overlay_disable = get_theme_mod( 'awpbusinesspress_main_slider_overlay_disable', true );
if ( $awpbusinesspress_main_slider_disabled != false ) {

	if ( 'Home Interior' == $activate_theme ) {
		$theme_scheme = 'theme-dark';
	} else {
		$theme_scheme = 'theme-light-white';
	}
	?>

<section id="slider-selector-scroll" class="hero-slider theme-main-slider <?php echo esc_attr( $theme_scheme ); ?>">
	<div id="slider-demo" class="owl-carousel owl-theme 
		<?php
		if ( $awpbusinesspress_main_slider_overlay_disable == false ) {
			?>
			overlay-none <?php } ?>
		<?php
		if ( 'Coin Market' == $activate_theme || 'Hospital Health Care' == $activate_theme ) {
			?>
			overlay-disable <?php } ?>">

		<?php
			$awpbusinesspress_main_slider_options = json_decode( $awpbusinesspress_main_slider_options );
		if ( $awpbusinesspress_main_slider_options != '' ) {
			foreach ( $awpbusinesspress_main_slider_options as $slide_item ) {
				$title           = ! empty( $slide_item->title ) ? $slide_item->title : '';
				$img_description = ! empty( $slide_item->text ) ? $slide_item->text : '';
				$readmorelink    = ! empty( $slide_item->link ) ? $slide_item->link : '';
				$readmore_button = ! empty( $slide_item->button_text ) ? $slide_item->button_text : '';
				$open_new_tab    = $slide_item->open_new_tab;

				if ( $slide_item->image_url != '' ) {
					?>

						<div id="post-<?php the_ID(); ?>" class="item home-section home-full-height" 
													<?php
														$slider_image = ! empty( $slide_item->image_url ) ? apply_filters( 'awpbusinesspress_translate_single_string', $slide_item->image_url, 'Slider section' ) : '';
														if ( $slider_image != '' ) {

															?>
							style="background-image:url(<?php echo $slider_image; ?>); <?php } ?>">

							<?php if ( $title != '' || $img_description != '' || $readmore_button != '' ) { ?>
								<div class="container slider-caption">

									<figcaption class="theme-slider-content caption-content 
										<?php
										if ( 'AwpBusinessPress' == $activate_theme || 'Home Interior' == $activate_theme ) {
											?>
												text-center <?php } ?>
											<?php
											if ( 'Coin Market' == $activate_theme || 'Hospital Health Care' == $activate_theme ) {
												?>
												text-left <?php } ?>"> 
											<?php if ( ( $title != '' ) || ( $img_description != '' ) ) { ?>
												<h1 class="title"><?php echo wp_kses_post( html_entity_decode( $title ) ); ?></h1>
												<p class="description"><?php echo wp_kses_post( html_entity_decode( $img_description ) ); ?></p>
											<?php } if ( $readmore_button != '' ) { ?>

											<div class="
												<?php
												if ( 'AwpBusinessPress' == $activate_theme || 'Home Interior' == $activate_theme ) {
													?>
													m-top-40 <?php } ?>
												<?php
												if ( 'Coin Market' == $activate_theme || 'Hospital Health Care' == $activate_theme ) {
													?>
												m-top-30 <?php } ?>"> 
													<a href="<?php echo $readmorelink; ?>" 
																<?php
																if ( $open_new_tab == 'yes' || $open_new_tab == '1' ) {
																	echo "target='_blank'"; }
																?>
														class="btn-large btn-light btn-animation">
														<?php echo esc_html( $readmore_button ); ?>
													</a>
											</div>
										<?php } ?>
									</figcaption>
								</div>
								<?php
							}
							?>
						</div>
						<?php
				}
			}
		} else {
			?>

				<?php
				// parent theme.
				if ( 'AwpBusinessPress' == $activate_theme ) {
					?>
						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/1.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-center">
									<h1 class="title"><?php _e( 'We Create Stunning WordPress Themes', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'AWP BusinessPress have to satisfy real needs of real projects. We got a pack of tools for that.', 'awp-companion' ); ?></p>
									<div class="m-top-40">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Learn More', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</div>

						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/2.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-center">
									<h1 class="title"><?php _e( 'Digital Marketing & Branding', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'We provide world best Services for our clients to grow their businesses', 'awp-companion' ); ?></p>
									<div class="m-top-40">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Learn More', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</diV>

					<?php } ?>	
					<?php if ( 'Coin Market' == $activate_theme ) { ?>
							<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/coin1.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-left">
									<h1 class="title"><?php _e( 'Welcome To The Coin Market Theme', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'Coin Market have to Satisfy Real needs of Market Projects. Come Join Us & Grow your Market To The Moon.', 'awp-companion' ); ?></p>
									<div class="m-top-30">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Know More', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</div>

						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/coin2.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-left">
									<h1 class="title"><?php _e( 'Market To The Moon', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'Lorem Ipsum has been the industrys standard dummy text ever since the, when an printer took a galley of type and scrambled.', 'awp-companion' ); ?></p>
									<div class="m-top-30">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Check It Out', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</diV>
					<?php } ?>
	
					<?php if ( 'Hospital Health Care' == $activate_theme ) { ?>
						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/hospital1.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-left">
									<h1 class="title"><?php _e( 'Welcome To Hospital Care', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'Start Your Journey With Hospital Care', 'awp-companion' ); ?></p>
									<div class="m-top-30">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Know More', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</div>

						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/hospital2.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-left">
									<h1 class="title"><?php _e( 'Inspiring Better Health', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'Growing To Meet Your Real Needs', 'awp-companion' ); ?></p>
									<div class="m-top-30">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Check It Out', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</diV>
					<?php } ?>

					<?php if ( 'Home Interior' == $activate_theme ) { ?>
						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/homedecor1.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-center">
									<h1 class="title"><?php _e( 'WELCOME TO HOME INTERIOR', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'Start your Journey with Home Interior Designers', 'awp-companion' ); ?></p>
									<div class="m-top-30">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Know More', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</div>

						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/homedecor2.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-center">
									<h1 class="title"><?php _e( 'Beautiful Home Designs', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'Growing To Meet Your Real Needs', 'awp-companion' ); ?></p>
									<div class="m-top-30">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Check It Out', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</diV>
					<?php } ?>

					<?php if ( 'Business Campaign' == $activate_theme ) { ?>
						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/campaign1.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-center">
									<h1 class="title"><?php _e( 'Launch Ultra Modern Effective Business', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'We provide world best Services for our clients to grow their businesses', 'awp-companion' ); ?></p>
									<div class="m-top-30">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Check it out', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</div>

						<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/slider/campaign2.jpg);">
							<div class="container slider-caption">
								<figcaption class="caption-content text-center">
									<h1 class="title"><?php _e( 'Make Business Unique With Great Ideas', 'awp-companion' ); ?></h1>
									<p class="description"><?php _e( 'Business Campaign have to satisfy real needs of real projects. We got a pack of tools for that.', 'awp-companion' ); ?></p>
									<div class="m-top-30">
										<a href="#" class="btn-large btn-light btn-animation"><?php _e( 'Know More', 'awp-companion' ); ?></a>
									</div>
								</figcaption>
							</div>
						</diV>
						<?php
					}
		}
		?>
	</div>		
</section>
<?php } ?>
