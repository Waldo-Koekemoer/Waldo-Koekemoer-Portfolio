<?php
if ( 'Hospital Health Care' == $activate_theme || 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
	$awpbusinesspress_client_disabled = get_theme_mod( 'awpbusinesspress_client_disabled', true );
} else {
	$awpbusinesspress_client_disabled = get_theme_mod( 'awpbusinesspress_client_disabled', false );
}
// Section Background scheme.
if ( 'Home Interior' == $activate_theme ) {
	$theme_scheme = 'theme-dark';
} else {
	$theme_scheme = 'theme-light-white';
}

if ( $awpbusinesspress_client_disabled == true ) :
	$awpbusinesspress_client_content = get_theme_mod( 'awpbusinesspress_client_content' );

	$awpbusinesspress_client_container_size = get_theme_mod( 'awpbusinesspress_client_container_size', 'container-full' );
	?><!-- Sponsors Section -->
		<section id="client-selector-scroll" class="sponsors theme-white section <?php echo esc_attr( $theme_scheme ); ?>">
			<div class="<?php echo esc_attr( $awpbusinesspress_client_container_size ); ?>">
				<div class="row theme-sponsors-content wow animate fadeInUp" data-wow-delay=".3s">
					<div class="col-md-12">
						<?php
							$t                               = true;
							$awpbusinesspress_client_content = json_decode( $awpbusinesspress_client_content );
						if ( $awpbusinesspress_client_content != '' ) {
							foreach ( $awpbusinesspress_client_content as $client_iteam ) {
								$title        = ! empty( $client_iteam->title ) ? apply_filters( 'awpbusinesspress_translate_single_string', $client_iteam->title, 'Client section' ) : '';
								$link         = ! empty( $client_iteam->link ) ? apply_filters( 'awpbusinesspress_translate_single_string', $client_iteam->link, 'Client section' ) : '';
								$client_link  = $client_iteam->link;
								$open_new_tab = $client_iteam->open_new_tab;
								?>
									<div class="col-lg-3 col-md-3 col-sm-12">
										<a href="<?php echo esc_url( $client_link ); ?>" 
															<?php
															if ( $open_new_tab == 'yes' ) {
																echo 'target="_blank"';}
															?>
										>
											<img src="<?php echo $client_iteam->image_url; ?>" alt="">
										</a>
									</div>
									<?php
							}
						} else {
							if ( 'Home Interior' == $activate_theme || 'Business Campaign' == $activate_theme ) {
								$client_image1 = 'client-home1';
								$client_image2 = 'client-home2';
								$client_image3 = 'client-home3';
								$client_image4 = 'client-home4';
							} else {
								$client_image1 = 'client-1';
								$client_image2 = 'client-2';
								$client_image3 = 'client-3';
								$client_image4 = 'client-4';
							}
							?>

								<div class="col-lg-3 col-md-3 col-sm-12"><a href="#"><img src="<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/client/<?php echo $client_image1; ?>.jpg" alt="client"></a></div>
								<div class="col-lg-3 col-md-3 col-sm-12"><a href="#"><img src="<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/client/<?php echo $client_image2; ?>.jpg." alt="client"></a></div>
								<div class="col-lg-3 col-md-3 col-sm-12"><a href="#"><img src="<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/client/<?php echo $client_image3; ?>.jpg." alt="client"></a></div>
								<div class="col-lg-3 col-md-3 col-sm-12"><a href="#"><img src="<?php echo awp_companion_plugin_url; ?>/inc/awpbusinesspress/img/client/<?php echo $client_image4; ?>.jpg." alt="client"></a></div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</section>
<?php endif; ?>	
<!-- End of Sponsors Section -->			
<div class="clearfix"></div>
