<?php
$awpbusinesspress_team_disabled = get_theme_mod( 'awpbusinesspress_team_disabled', true );
$awpbusinesspress_team_content  = get_theme_mod( 'awpbusinesspress_team_content' );
if ( $awpbusinesspress_team_disabled == true ) :
	$awpbusinesspress_team_container_size = get_theme_mod( 'awpbusinesspress_team_container_size', 'container-full' );
	// Section Background scheme.
	if ( 'Home Interior' == $activate_theme ) {
		$theme_scheme = 'theme-dark';
	} else {
		$theme_scheme = 'theme-light-white';
	}
	?>
	<!-- Team Section -->
	<section id="team-selector-scroll" class="section team <?php echo esc_attr( $theme_scheme ); ?>">

		<div class="<?php echo esc_attr( $awpbusinesspress_team_container_size ); ?> team-selector">
			<?php
			$awpbusinesspress_team_area_title = get_theme_mod( 'awpbusinesspress_team_area_title', __( 'Our Team', 'awpbusinesspress' ) );
			$awpbusinesspress_team_area_des   = get_theme_mod( 'awpbusinesspress_team_area_des', 'The Best Team Available' );
			if ( ( $awpbusinesspress_team_area_title ) || ( $awpbusinesspress_team_area_des ) != '' ) {
				?>
				<div class="row">
					<div class="col-md-12">
						<div class="section-header">
							<?php if ( $awpbusinesspress_team_area_des ) { ?>
								<p class="section-subtitle wow animate fadeInUp" data-wow-delay=".3s"><?php echo $awpbusinesspress_team_area_des; ?></p>
							<?php } if ( $awpbusinesspress_team_area_title ) { ?>
								<h1 class="section-title wow animate fadeInUp" data-wow-delay=".3s"><?php echo $awpbusinesspress_team_area_title; ?></h1>
							<?php } ?>
							<div class="divider-line wow animate fadeInUp" data-wow-delay=".3s"></div>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- Team Template 1 -->
			<div class="row theme-team-content wow animate fadeInUp" data-wow-delay=".3s">
				<div id="team-demo-two" class="col-md-12">
					<?php
					$awpbusinesspress_team_content = json_decode( $awpbusinesspress_team_content );
					if ( $awpbusinesspress_team_content != '' ) {
						foreach ( $awpbusinesspress_team_content as $team_item ) {
							$image        = ! empty( $team_item->image_url ) ? $team_item->image_url : '';
							$title        = ! empty( $team_item->title ) ? $team_item->title : '';
							$subtitle     = ! empty( $team_item->subtitle ) ? $team_item->subtitle : '';
							$designation  = ! empty( $team_item->designation ) ? $team_item->designation : '';
							$link         = ! empty( $team_item->link ) ? $team_item->link : '';
							$open_new_tab = $team_item->open_new_tab;
							?>
							<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="team-module-two">
									<figure class="team-avatar">
										<?php if ( ! empty( $image ) ) : ?>
											<?php
											if ( ! empty( $link ) ) :
												$link_html = '<a href="' . esc_url( $link ) . '"';
												if ( function_exists( 'wpbusinesspress_is_external_url' ) ) {
													$link_html .= wpbusinesspress_is_external_url( $link );
												}
												$link_html .= '>';
												echo wp_kses_post( $link_html );
											endif;
											echo '<img class="img-responsive" src="' . esc_url( $image ) . '"';
											if ( ! empty( $title ) ) {
												echo 'alt="' . esc_attr( $title ) . '" title="' . esc_attr( $title ) . '"';
											}
											echo '/>';
											if ( ! empty( $link ) ) {
												echo '</a>';
											}
											?>
										<?php endif; ?>
									</figure>
									<figcaption class="team-caption text-left">
										<?php if ( ! empty( $title ) ) : ?>
											<?php if ( ! empty( $link ) ) : ?>
												<a href="<?php echo $link; ?>"
																	<?php
																	if ( $open_new_tab == 'yes' ) {
																		echo 'target="_blank"'; }
																	?>
												>
													<h4 class="name"><?php echo esc_html( $title ); ?></h4>
												</a>
											<?php endif; ?>
										<?php endif; ?>
										<?php if ( ! empty( $designation ) ) : ?>
											<h6 class="designation"><?php echo esc_html( $designation ); ?></h6>
										<?php endif; ?>

										<?php if ( ! empty( $subtitle ) ) : ?>
											<p><?php echo esc_html( $subtitle ); ?></p>
										<?php endif; ?>

										<div class="team-social-icons">
											<?php
											if ( ! empty( $team_item->social_repeater ) ) :
												$icons         = html_entity_decode( $team_item->social_repeater );
												$icons_decoded = json_decode( $icons, true );
												if ( ! empty( $icons_decoded ) ) :
													foreach ( $icons_decoded as $value ) {
														$social_icon = ! empty( $value['icon'] ) ? apply_filters( 'awpbusinesspress_translate_single_string', $value['icon'], 'Team section' ) : '';
														$social_link = ! empty( $value['link'] ) ? apply_filters( 'awpbusinesspress_translate_single_string', $value['link'], 'Team section' ) : '';

														if ( ! empty( $social_icon ) ) {
															?>
																<a 
																<?php
																if ( $open_new_tab == 'yes' ) {
																	echo 'target="_blank"';}
																?>
																href="<?php echo esc_url( $social_link ); ?>" class="btn btn-just-icon btn-simple"><i class="fa <?php echo esc_attr( $social_icon ); ?> "></i></a>														
															<?php
														}
													}
													endif;
												endif;
											?>
										</div>
									</figcaption>
								</div>
							</div>
							<?php
						}
					} else {
						if ( 'Hospital Health Care' == $activate_theme ) {
							$team_image1 = 'hospital-team-1';
							$team_image2 = 'hospital-team-2';
							$team_image3 = 'hospital-team-3';
						} else {
							$team_image1 = 'home-1';
							$team_image2 = 'home-2';
							$team_image3 = 'home-3';
						}
						?>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="team-module-two">
								<figure class="team-avatar">
									<img class="img-responsive" src="<?php echo awp_companion_plugin_url; ?>inc/awpbusinesspress/img/team/<?php echo $team_image1; ?>.jpg" alt="Jane Smith">
								</figure>
								<figcaption class="team-caption text-left">
									<h4 class="name"><?php esc_html_e( 'Jane Smith', 'awpbusinesspress' ); ?></h4>
									<h6 class="designation"><?php esc_html_e( 'UI Designer', 'awpbusinesspress' ); ?></h6>
									<p><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid.', 'awpbusinesspress' ); ?></p>
									<div class="team-social-icons">
										<a href="#" title="Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="#" title="Twitter" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="#" title="Linkedin" class="linkedin"><i class="fa fa-linkedin"></i></a>
									</div>
								</figcaption>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="team-module-two">
								<figure class="team-avatar">
									<img class="img-responsive" src="<?php echo awp_companion_plugin_url; ?>inc/awpbusinesspress/img/team/<?php echo $team_image2; ?>.jpg" alt="David Wilson">
								</figure>
								<figcaption class="team-caption text-left">
									<h4 class="name"><?php esc_html_e( 'David Wilson', 'awpbusinesspress' ); ?></h4>
									<h6 class="designation"><?php esc_html_e( 'Founder & CEO', 'awpbusinesspress' ); ?></h6>
									<p><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid.', 'awpbusinesspress' ); ?></p>
									<div class="team-social-icons">
										<a href="#" title="Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="#" title="Twitter" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="#" title="Linkedin" class="linkedin"><i class="fa fa-linkedin"></i></a>
									</div>
								</figcaption>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="team-module-two">
								<figure class="team-avatar">
									<img class="img-responsive" src="<?php echo awp_companion_plugin_url; ?>inc/awpbusinesspress/img/team/<?php echo $team_image3; ?>.jpg" alt="Owen Robbert">
								</figure>
								<figcaption class="team-caption text-left">
									<h4 class="name"><?php esc_html_e( 'Owen Robbert', 'awpbusinesspress' ); ?></h4>
									<h6 class="designation"><?php esc_html_e( 'Director', 'awpbusinesspress' ); ?></h6>
									<p><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quos cupid.', 'awpbusinesspress' ); ?></p>
									<div class="team-social-icons">
										<a href="#" title="Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="#" title="Twitter" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="#" title="Linkedin" class="linkedin"><i class="fa fa-linkedin"></i></a>
									</div>
								</figcaption>
							</div>
						</div>
						<?php
					}
					?>
				</div>			
			</div>
		</div>
	</section>	
<?php endif; ?>	
<!--/End of Team Section-->
<div class="clearfix"></div>
