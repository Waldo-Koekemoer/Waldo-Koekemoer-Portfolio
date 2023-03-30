<?php
$awpbusinesspress_cta_disabled    = get_theme_mod( 'awpbusinesspress_cta_disabled', true );
$awpbusinesspress_cta_button_text = get_theme_mod( 'awpbusinesspress_cta_button_text', 'Contact Us' );
$awpbusinesspress_cta_button_link = get_theme_mod( 'awpbusinesspress_cta_button_link', '#' );

if ( 'Business Campaign' == $activate_theme ) {
	$awpbusinesspress_cta_area_subtitle = get_theme_mod( 'awpbusinesspress_cta_area_subtitle', '+215 2153.2159' );
	$awpbusinesspress_cta_area_des      = get_theme_mod( 'awpbusinesspress_cta_area_des', 'Contact Our Agent For Any kind off Business Help (24/7 Available)' );
} else {
	$awpbusinesspress_cta_area_subtitle = get_theme_mod( 'awpbusinesspress_cta_area_subtitle', 'Do you have any questions?' );
	$awpbusinesspress_cta_area_des      = get_theme_mod( 'awpbusinesspress_cta_area_des', 'How can wehelp your business? Because many people love our free consultation for growing their businesses which gives the user complete freedom to set up a business.' );
}

// Diffrent Themes.
if ( 'AwpBusinessPress' == $activate_theme ) {
	$awpbusinesspress_cta_background_image = get_theme_mod( 'awpbusinesspress_cta_background_image', awp_companion_plugin_url . '/inc/awpbusinesspress/img/callout/callout-bg.jpg' );
}
if ( 'Coin Market' == $activate_theme || 'Home Interior' == $activate_theme ) {
	$awpbusinesspress_coin_cta_background_image = get_theme_mod( 'awpbusinesspress_coin_cta_background_image', awp_companion_plugin_url . '/inc/awpbusinesspress/img/callout/coin-callout-bg.jpg' );
}
if ( 'Hospital Health Care' == $activate_theme ) {
	$awpbusinesspress_hh_care_cta_background_image = get_theme_mod( 'awpbusinesspress_hh_care_cta_background_image', awp_companion_plugin_url . '/inc/awpbusinesspress/img/callout/hospital-callout-bg.jpg' );
}
if ( 'Business Campaign' == $activate_theme ) {
	$awpbusinesspress_bc_cta_background_image = get_theme_mod( 'awpbusinesspress_bc_cta_background_image', awp_companion_plugin_url . '/inc/awpbusinesspress/img/callout/campaign-callout-bg.jpg' );
}
// Section Background scheme.
if ( 'Home Interior' == $activate_theme ) {
	$theme_scheme = 'theme-dark';
} else {
	$theme_scheme = 'theme-light-white';
}

if ( $awpbusinesspress_cta_disabled == true ) : ?>
	<!--Call to Action Section-->	
	<section id="cta-selector-scroll" class="callout-to-action <?php echo esc_attr( $theme_scheme ); ?>"
		<?php if ( 'AwpBusinessPress' == $activate_theme ) { ?>
			style="background-image:url('<?php echo esc_url( $awpbusinesspress_cta_background_image ); ?>'); "
		<?php } if ( 'Coin Market' == $activate_theme || 'Home Interior' == $activate_theme ) { ?>
			style="background-image:url('<?php echo esc_url( $awpbusinesspress_coin_cta_background_image ); ?>'); "
		<?php } if ( 'Hospital Health Care' == $activate_theme ) { ?>
			style="background-image:url('<?php echo esc_url( $awpbusinesspress_hh_care_cta_background_image ); ?>'); "
		<?php } if ( 'Business Campaign' == $activate_theme ) { ?>
			style="background-image:url('<?php echo esc_url( $awpbusinesspress_bc_cta_background_image ); ?>'); "
		<?php } ?>>
		<div class="container">			
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 text-center">
					<div class="cta-block text-center">
						<?php if ( $awpbusinesspress_cta_area_subtitle != null ) : ?>
							<h2 class="title wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post( $awpbusinesspress_cta_area_subtitle ); ?></h2>
						<?php endif; ?>
						<?php if ( $awpbusinesspress_cta_area_des != null ) : ?>
							<p class="subtitle wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post( $awpbusinesspress_cta_area_des ); ?></p>
						<?php endif; ?>
						<?php if ( $awpbusinesspress_cta_button_text != null ) : ?>
							<div class="m-top-40">
								<a href="<?php echo esc_url( $awpbusinesspress_cta_button_link ); ?>" class="btn-large btn-light btn-animation callout-button wow animate fadeInUp" data-wow-delay=".3s">
									<?php echo esc_html( $awpbusinesspress_cta_button_text ); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>					
			</div>
		</div>
	</section>
	<!--/End of Call to Action Section-->
<?php endif; ?>
