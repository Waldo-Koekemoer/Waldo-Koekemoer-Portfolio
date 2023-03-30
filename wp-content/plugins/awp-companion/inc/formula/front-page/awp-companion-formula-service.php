<?php
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme      = $activate_theme_data->name;

$formula_service_area_disabled = get_theme_mod('formula_service_area_disabled','true');	
if($formula_service_area_disabled == true):

	if( 'Metaverse' == $activate_theme ) {
		$formula_service_area_title = get_theme_mod('formula_service_area_title', __('Access The Future','formula'));
		$formula_service_area_des = get_theme_mod('formula_service_area_des', __('KEY FEATURES','formula'));
		$formula_service_background = get_theme_mod('formula_service_background', awp_companion_plugin_url . 'inc/formula/img/service/service-bg.jpg');
	} else {
		$formula_service_area_title = get_theme_mod('formula_service_area_title', __('What We Do','formula'));
		$formula_service_area_des = get_theme_mod('formula_service_area_des', __('Services we can help you.','formula'));
		$formula_service_background = get_theme_mod('formula_service_background', awp_companion_plugin_url . 'inc/formula/img/service/service-shape.png');
	}

$formula_service_container_size = get_theme_mod('formula_service_container_size', 'container-full');


?>
<!-- Service Section -->
<section id="service-selector-scroll" class="service theme-dark">

	<div class="service-shape"></div>		
	<style>
		<?php if($formula_service_background != "") { ?>
			.service-shape {
				background: url("<?php echo $formula_service_background; ?>") no-repeat left fixed;
			}
		<?php } ?>
	</style>

	<div class="<?php echo esc_attr($formula_service_container_size); ?> service-selector">
		<?php  
			if( ($formula_service_area_title) || ($formula_service_area_des)!='' ) { ?>
			<!-- Section Title -->
			<div class="row">
				<div class="col-md-12"> 
					<div class="section-header">
						<?php if($formula_service_area_des != null): ?>
							<p class="section-subtitle"><?php echo wp_kses_post($formula_service_area_des); ?></p>
						<?php endif; ?>
						<?php if($formula_service_area_title != null): ?>
							<h2 class="section-title"><?php echo wp_kses_post($formula_service_area_title); ?></h2>
						<?php endif; ?>
						<div class="divider-line"></div>
					</div>
				</div>
			</div>
			<!-- /Section Title -->
			<?php } ?>
			<div class="row">
				<?php 
				$formula_service_column_layout  = get_theme_mod( 'formula_service_column_layout','col-md-4');
				$formula_service_content  = get_theme_mod( 'formula_service_content');
				$formula_service_count  = get_theme_mod( 'formula_service_count', array('slider' => 4,'suffix' => '',));
				if ( ! empty( $formula_service_content ) ) {
					$allowed_html = array(
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array(),
					);
					$formula_service_content = json_decode( $formula_service_content );
					$item = 0;
					foreach ( $formula_service_content as $features_item ) {

						if ($item <= $formula_service_count['slider'] - 1){
							$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'formula_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
							$title = ! empty( $features_item->title ) ? apply_filters( 'formula_translate_single_string', $features_item->title, 'Features section' ) : '';
							$text = ! empty( $features_item->text ) ? apply_filters( 'formula_translate_single_string', $features_item->text, 'Features section' ) : '';
							$link = ! empty( $features_item->link ) ? apply_filters( 'formula_translate_single_string', $features_item->link, 'Features section' ) : '';
							$button_text = ! empty( $features_item->button_text ) ? apply_filters( 'formula_translate_single_string', $features_item->button_text, 'Features section' ) : '';
							$image = ! empty( $features_item->image_url ) ? apply_filters( 'formula_translate_single_string', $features_item->image_url, 'Features section' ) : '';
							$open_new_tab = $features_item->open_new_tab; ?>
							<div class="<?php echo esc_attr($formula_service_column_layout); ?> col-sm-6 col-xs-12 service-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
								<article class="post">

									<?php if ( ! empty( $title ) ) : 
										if(empty($link)){ ?>
											<div class="entry-header">
												<h2 class="entry-title"><?php echo esc_html( $title ); ?></h2>
											</div><?php
										} else {
												?>
											<div class="entry-header">
												<h4 class="entry-title">
													<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab =='yes'){?>target="_blank" <?php }?> ><?php echo esc_html( $title ); ?></a>
												</h4>
											</div>
											<?php
										}
									endif; ?>

									<div class="entry-content">
										<?php if ( ! empty( $text ) ) : //text ?>
											<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
										<?php  endif; ?>

										<p class="<?php if ( ! empty( $icon ) ) : ?> service-one-button <?php endif; ?>">
											<?php if ( ! empty( $button_text ) ) : ?>
												<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes') { echo "target='_blank'"; } ?>class="more-link">
													<?php echo esc_html( $button_text ); ?>
												</a>
											<?php  endif; ?>
										</p>
									</div>

									<?php if($features_item->choice == 'customizer_repeater_image'){ ?>

											<?php if ( ! empty( $image ) ) : ?>
											<div class="service-image">
												<?php if ( ! empty( $link ) ) : ?>
													<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== 'on') { echo "target='_blank'"; } ?>>
													   <img class="" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
													</a>
												<?php endif; ?>	
												<?php if ( empty( $link ) ) : ?>	
														<img class="" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
												<?php endif; ?>	
											</div>					
											<?php endif; ?>

									<?php } else if($features_item->choice =='customizer_repeater_icon'){ ?>

											<?php if ( ! empty( $icon ) ) : ?>
												<div class="service-icon">
													<?php if ( ! empty( $link ) ) : ?>
														<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== 'on') { echo "target='_blank'"; } ?>>
															<i class="fa <?php echo esc_html( $icon ); ?>"></i>
														</a>
													<?php endif; ?>
													<?php if ( empty( $link ) ) : ?>
														<i class="fa <?php echo esc_html( $icon ); ?>"></i>	
													<?php endif; ?>
												</div>
											<?php endif; ?>
									<?php } ?>
								</article>
							</div>
							<?php
							$item++;
						}
					}
				} else { ?>
						<?php if( 'Metaverse' == $activate_theme ) {
							
							$s1_title = 'Fueling The Metaverse';
							$s1_img = awp_companion_plugin_url . 'inc/formula/img/service/icon-1.png';
							$s2_title = 'Interconnected Economies';
							$s2_img = awp_companion_plugin_url . 'inc/formula/img/service/icon-2.png';
							$s3_title = 'Non-fungible assets';
							$s3_img = awp_companion_plugin_url . 'inc/formula/img/service/icon-3.png';
							
							$s_desc = 'The Metaverse Is The Next Generation Of The Internet. As One Of Its Earliest Explorers, You Will Help Fuel Its';
							$s_button = '';

						} else {
							$s1_title = 'Digital Marketing';
							$s1_img = awp_companion_plugin_url . 'inc/formula/img/service/s1.png';
							$s2_title = 'eCommerce';
							$s2_img = awp_companion_plugin_url . 'inc/formula/img/service/s2.png';
							$s3_title = 'Branding Design';
							$s3_img = awp_companion_plugin_url . 'inc/formula/img/service/s3.png';
							
							$s_desc = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin, est eu vehicula pulvinar';
							$s_button = 'Know More';
						} 
						?>
						<div class="col-lg-4 col-sm-6 col-xs-12 service-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<div class="entry-header">
									<h2 class="entry-title"><a href="#"><?php echo esc_html($s1_title); ?></a></h2>
								</div>		
								<div class="entry-content">
									<p><?php echo esc_html($s_desc); ?></p>
									<?php if(!empty($s_button)) { ?>						
										<p><a href="#" class="more-link"><?php echo esc_html($s_button); ?></a></p>	
									<?php } ?>	
								</div>
								<div class="service-image">
									<a href="#" target='_blank' ?>
										<img class="" src="<?php echo esc_url($s1_img); ?>" alt="Digital Marketing" title="Digital Marketing"  />
									</a>
								</div>					
							</article> 
						</div>

						<div class="col-lg-4 col-sm-6 col-xs-12 service-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<div class="entry-header">
									<h2 class="entry-title"><a href="#"><?php echo esc_html($s2_title); ?></a></h2>
								</div>		
								<div class="entry-content">
									<p><?php echo esc_html($s_desc); ?></p>						
									<?php if(!empty($s_button)) { ?>						
										<p><a href="#" class="more-link"><?php echo esc_html($s_button); ?></a></p>	
									<?php } ?>			
								</div>
								<div class="service-image">
									<a href="#" target='_blank' ?>
										<img class="" src="<?php echo esc_url($s2_img); ?>" alt="Digital Marketing" title="Digital Marketing"  />
									</a>
								</div>	
							</article> 
						</div>

						<div class="col-lg-4 col-sm-6 col-xs-12 service-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<div class="entry-header">
									<h2 class="entry-title"><a href="#"><?php echo esc_html($s3_title); ?></a></h2>
								</div>		
								<div class="entry-content">
									<p><?php echo esc_html($s_desc); ?></p>						
									<?php if(!empty($s_button)) { ?>						
										<p><a href="#" class="more-link"><?php echo esc_html($s_button); ?></a></p>	
									<?php } ?>			
								</div>
								<div class="service-image">
									<a href="#" target='_blank' ?>
										<img class="" src="<?php echo esc_url($s3_img); ?>" alt="Digital Marketing" title="Digital Marketing"  />
									</a>
								</div>	
							</article> 
						</div>
				<?php } ?>
			</div>
	</div>
</section>
<?php endif; ?>
<!-- End of Service Section -->
<div class="clearfix"></div>