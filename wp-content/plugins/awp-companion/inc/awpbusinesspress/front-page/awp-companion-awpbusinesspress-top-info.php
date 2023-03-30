<!-- Info Top -->
<?php
// top info.
	$awpbusinesspress_top_info_disabled = get_theme_mod( 'awpbusinesspress_top_info_disabled', true );
if ( $awpbusinesspress_top_info_disabled == true ) :
	$awpbusinesspress_top_info_container_size = get_theme_mod( 'awpbusinesspress_top_info_container_size', 'container' );
	if ( 'Hospital Health Care' == $activate_theme ) {
		$awpbusinesspress_top_info_container_size = get_theme_mod( 'awpbusinesspress_top_info_container_size', 'container-full' );
	}
	?>
		<section id="topinfo-selector-scroll" class="top-contact-info theme-top-info">
			<div class="<?php echo esc_attr( $awpbusinesspress_top_info_container_size ); ?> topinfo-selector">
				<div class="row theme-top-info-content wow animate flipInX" data-wow-delay=".3s">
				<?php
				$awpbusinesspress_top_info_content = get_theme_mod( 'awpbusinesspress_top_info_content' );
				if ( ! empty( $awpbusinesspress_top_info_content ) ) {
					$allowed_html                      = array(
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'b'      => array(),
						'i'      => array(),
					);
					$awpbusinesspress_top_info_content = json_decode( $awpbusinesspress_top_info_content );
					foreach ( $awpbusinesspress_top_info_content as $features_item ) {
						$icon  = ! empty( $features_item->icon_value ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
						$title = ! empty( $features_item->title ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->title, 'Features section' ) : '';
						$text  = ! empty( $features_item->text ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->text, 'Features section' ) : '';
						$link  = ! empty( $features_item->link ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->link, 'Features section' ) : '';
						// $button_text = ! empty( $features_item->button_text ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->button_text, 'Features section' ) : '';
						$image        = ! empty( $features_item->image_url ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->image_url, 'Features section' ) : '';
						$open_new_tab = $features_item->open_new_tab;
						?>
							<div class="col-md-4 col-sm-12 col-xs-12">
								<div class="contact-info-module">
									<div class="media">
										<?php if ( ! empty( $icon ) ) : ?>

											<?php
											// If Icon Link Is NOT Empty.
											if ( ! empty( $link ) ) :
												?>
												<a class="contact-icon" href="<?php echo esc_url( $link ); ?>" 
																						<?php
																							if ( $open_new_tab == 'yes' || $open_new_tab == 'on' ) {
																								echo "target='_blank'"; }
																						?>
												>
													<i class="fa <?php echo esc_html( $icon ); ?>"></i>
												</a>
											<?php endif; ?>

											<?php
											// If Icon Link Is Empty.
											if ( empty( $link ) ) :
												?>
											<div class="contact-icon">
												<i class="fa <?php echo esc_html( $icon ); ?>"></i>
											</div>
											<?php endif; ?>

										<?php endif; ?>

										<div class="media-body">
											<?php if ( ! empty( $title ) ) : // text. ?>
												<h4 class="title-1"><?php echo wp_kses( html_entity_decode( $title ), $allowed_html ); ?></h4>
											<?php endif; ?>

											<?php if ( ! empty( $text ) ) : // text. ?>
												<h6 class="desc-1"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></h6>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<?php
					}
				} else {
					?>
						<div class="col-md-4">
							<div class="contact-info-module">
								<div class="media">
									<div class="contact-icon"><i class="fa fa-map-marker"></i></div>
									<div class="media-body">
										<h4 class="title-1"><?php esc_html_e( 'Head Office', 'awp-companion' ); ?></h4>
										<h6 class="desc-1"><?php esc_html_e( '2130 Fulton Street, San Francisco', 'awp-companion' ); ?></h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-info-module">
								<div class="media">
									<div class="contact-icon"><i class="fa fa-phone"></i></div>
									<div class="media-body">
										<h4 class="title-2"><?php esc_html_e( 'Call Us:', 'awp-companion' ); ?></h4>
										<h6 class="desc-2"><?php esc_html_e( '+(15) 94117-1080', 'awp-companion' ); ?></h6>
									</div>
								</div>
							</div>
						</div>	

						<div class="col-md-4">
							<div class="contact-info-module">
								<div class="media">
									<div class="contact-icon"><i class="fa fa-envelope-open-o"></i></div>
									<div class="media-body">
										<h4 class="title-3"><?php esc_html_e( 'Email:', 'awp-companion' ); ?></h4>
										<h6 class="desc-3"><?php esc_html_e( 'example@gmail.com', 'awp-companion' ); ?></h6>
									</div>
								</div>
							</div>		
						</div>
						<?php
				}
				?>
				</div>
			</div>
		</section>			
<?php endif; ?>		
<!-- End of Top Contact Info Callout -->

<div class="clearfix"></div>
