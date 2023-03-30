<?php
$awpbusinesspress_testimonial_options         = get_theme_mod( 'awpbusinesspress_testimonial_content' );
$awpbusinesspress_testimonial_disabled        = get_theme_mod( 'awpbusinesspress_testimonial_disabled', true );
$awpbusinesspress_testimonial_area_title      = get_theme_mod( 'awpbusinesspress_testimonial_area_title', __( 'Testimonials', 'awp-companion' ) );
$awpbusinesspress_testimonial_area_des        = get_theme_mod( 'awpbusinesspress_testimonial_area_des', __( 'What our customers are saying about us after using our products.', 'awp-companion' ) );
$awpbusinesspress_testimonial_overlay_disable = get_theme_mod( 'awpbusinesspress_testimonial_overlay_disable', false );

if ( 'Coin Market' == $activate_theme || 'Business Campaign' == $activate_theme ) {
	$coin_market_testimonial_background = get_theme_mod( 'awpbusinesspress_testimonial_background', awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-coin-bg.jpg' );
}
if ( 'Hospital Health Care' == $activate_theme ) {
	$hh_testimonial_background = get_theme_mod( 'awpbusinesspress_testimonial_background', awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-hospital-bg.jpg' );
}

// Section Background scheme.
if ( 'Home Interior' == $activate_theme ) {
	$home_testimonial_background = get_theme_mod( 'awpbusinesspress_testimonial_background', awp_companion_plugin_url . '/inc/awpbusinesspress/img/testimonial/testimonial-home-bg.jpg' );
	$theme_scheme                = 'theme-dark';
} else {
	$theme_scheme = 'theme-light-white';
}

if ( $awpbusinesspress_testimonial_disabled == true ) :
	?>
<section id="testimonial-selector-scroll" class="theme-testimonial section testimonial <?php echo esc_attr( $theme_scheme ); ?>
	<?php
	if ( 'Coin Market' == $activate_theme || 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
		?>
		testimonial-two <?php } ?>"

	<?php if ( 'Coin Market' == $activate_theme || 'Business Campaign' == $activate_theme ) { ?> 
		style="background-image:url('<?php echo esc_url( $coin_market_testimonial_background ); ?>'); "
	<?php } ?>
	<?php if ( 'Hospital Health Care' == $activate_theme ) { ?> 
		style="background-image:url('<?php echo esc_url( $hh_testimonial_background ); ?>'); "
	<?php } ?>
	<?php if ( 'Home Interior' == $activate_theme ) { ?> 
		style="background-image:url('<?php echo esc_url( $home_testimonial_background ); ?>'); "
	<?php } ?>>

	<div class="
	<?php
	if ( 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme ) {
		?>
		container-full 
		<?php
	} else {
		?>
		container <?php } ?>">
		<?php if ( $awpbusinesspress_testimonial_area_title != null || $awpbusinesspress_testimonial_area_des != null ) : ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="section-header">
						<?php if ( $awpbusinesspress_testimonial_area_des != null ) : ?>
						<p class="section-subtitle light wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post( $awpbusinesspress_testimonial_area_des ); ?></p>
						<?php endif; ?>
						<?php if ( $awpbusinesspress_testimonial_area_title != null ) : ?>
						<h1 class="section-title light wow animate fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post( $awpbusinesspress_testimonial_area_title ); ?></h1>
						<?php endif; ?>
						<div class="divider-line light wow animate fadeInUp" data-wow-delay=".3s"></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row theme-testimonial-content wow animate fadeInUp" data-wow-delay=".3s">
			<?php
			$awpbusinesspress_testimonial_options = json_decode( $awpbusinesspress_testimonial_options );
			if ( $awpbusinesspress_testimonial_options != '' ) {
				$allowed_html = array(
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array(),
				);
				foreach ( $awpbusinesspress_testimonial_options as $testimonial_iteam ) {
					$title       = ! empty( $testimonial_iteam->title ) ? $testimonial_iteam->title : '';
					$test_desc   = ! empty( $testimonial_iteam->text ) ? $testimonial_iteam->text : '';
					$designation = ! empty( $testimonial_iteam->designation ) ? $testimonial_iteam->designation : '';
					?>

						<?php
						// Parent Theme.
						if ( 'AwpBusinessPress' == $activate_theme ) {
							?>
							<div class="item">
								<div class="review">
									<aside class="wt-content">
										<?php if ( $title != null ) : ?>
											<h4 class="wt-title"><?php echo esc_html( $title ); ?></h4>
										<?php endif; ?>
										<?php if ( $test_desc != null ) : ?>
											<p><?php echo wp_kses( html_entity_decode( $test_desc ), $allowed_html ); ?></p>
										<?php endif; ?>	
									</aside>
									<article class="client-info">
										<?php if ( $testimonial_iteam->image_url != null ) : ?>
											<figure class="client-thumbnail">
												<img src="<?php echo $testimonial_iteam->image_url; ?>" class="img-circle" alt="<?php echo esc_attr( $title ); ?>" >
											</figure>
										<?php endif; ?>
										<?php if ( $title != null ) : ?>
											<cite class="client-name"><?php echo esc_html( $title ); ?></cite>
										<?php endif; ?>
										<?php if ( $designation != null ) : ?>
											<span class="client-designation"><?php echo esc_html( $designation ); ?></span>
										<?php endif; ?>		
									</article>	
								</div>	
							</div>
							<?php
						}
						?>

						<?php
						// Child Theme.
						if ( 'Coin Market' == $activate_theme || 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
							?>
							<div class="col-lg-4 col-md-4 col-sm-12">

								<div class="item">	
									<blockquote class="review text-center">
										<?php if ( $testimonial_iteam->image_url != null ) : ?>
											<figure class="avatar">
												<img class="img-circle" src="<?php echo $testimonial_iteam->image_url; ?>" class="img-circle" alt="<?php echo esc_attr( $title ); ?>">
											</figure>
										<?php endif; ?>

										<?php if ( $test_desc != null ) : ?>
											<div class="description">
												<p><?php echo wp_kses( html_entity_decode( $test_desc ), $allowed_html ); ?></p>
											</div>
										<?php endif; ?>

										<figcaption>
											<?php if ( $title != null ) : ?>
												<cite class="name"><?php echo esc_html( $title ); ?></cite>
											<?php endif; ?>

											<?php if ( $designation != null ) : ?>
												<span class="designation"><?php echo esc_html( $designation ); ?></span>
											<?php endif; ?>	
										</figcaption>
									</blockquote>
								</div>
							</div>
							<?php
						}
						?>
					<?php
				}
			} else {
				?>

				<?php if ( 'AwpBusinessPress' == $activate_theme ) { ?>
					<div class="item">
						<div class="review">
							<aside class="wt-content">
								<h4 class="wt-title"><?php esc_html_e( 'Creative & Professional', 'awp-companion' ); ?></h4>
								<p><?php esc_html_e( 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout. It vaese tam simplic quam Occidental in fact', 'awp-companion' ); ?></p>
							</aside>
							<article class="client-info">	
								<figure class="client-thumbnail"><img src="<?php echo awp_companion_plugin_url; ?>inc/awpbusinesspress/img/testimonial/1.jpg" class="img-circle" alt="testimonial"></figure> 
								<cite class="client-name"><?php esc_html_e( 'Mike', 'awp-companion' ); ?></cite>
								<span class="client-designation"><?php esc_html_e( 'CEO & Founder', 'awp-companion' ); ?></span>
							</article>	
						</div>
					</div>
				<?php } ?>

				<?php if ( 'Coin Market' == $activate_theme || 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) { ?>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="item">	
							<blockquote class="review text-center">
								<figure class="avatar">
									<img class="img-circle" alt="img" src="<?php echo awp_companion_plugin_url; ?>inc/awpbusinesspress/img/testimonial/testimonial-coin1.jpg">
								</figure>
								<div class="description">
									<p><?php esc_html_e( '"It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout. Thank you!"', 'awp-companion' ); ?></p>
								</div>	
								<figcaption>
									<cite class="name"><?php esc_html_e( 'Mike', 'awp-companion' ); ?></cite>
									<span class="designation"><?php esc_html_e( 'CEO & Founder', 'awp-companion' ); ?></span>
								</figcaption>
							</blockquote>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="item">	
							<blockquote class="review text-center">
								<figure class="avatar">
									<img class="img-circle" alt="img" src="<?php echo awp_companion_plugin_url; ?>inc/awpbusinesspress/img/testimonial/testimonial-coin2.jpg">
								</figure>
								<div class="description">
									<p><?php esc_html_e( 'You guys are legendary! You guys are great and having amazing support & service. I couldn’t ask for any better. Thank you!"', 'awp-companion' ); ?></p>
								</div>	
								<figcaption>
									<cite class="name"><?php esc_html_e( 'Mitchell', 'awp-companion' ); ?></cite>
									<span class="designation"><?php esc_html_e( 'Financer', 'awp-companion' ); ?></span>
								</figcaption>
							</blockquote>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="item">	
							<blockquote class="review text-center">
								<figure class="avatar">
									<img class="img-circle" alt="img" src="<?php echo awp_companion_plugin_url; ?>inc/awpbusinesspress/img/testimonial/testimonial-coin3.jpg">
								</figure>
								<div class="description">
									<p><?php esc_html_e( '"You guys are really Awesome! You guys are great and having an amazing Home Design & perfect service. Thank you so much"', 'awp-companion' ); ?></p>
								</div>	
								<figcaption>
									<cite class="name"><?php esc_html_e( 'Julia Cloe', 'awp-companion' ); ?></cite>
									<span class="designation"><?php esc_html_e( 'Sales Manager', 'awp-companion' ); ?></span>
								</figcaption>
							</blockquote>
						</div>
					</div>	
					<?php
				}
			}
			?>
		</div>
	</div>		
</section>
<?php endif; ?>
