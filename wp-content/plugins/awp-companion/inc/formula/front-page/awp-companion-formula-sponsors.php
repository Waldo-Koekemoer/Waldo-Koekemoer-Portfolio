<?php 
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme      = $activate_theme_data->name;
$formula_client_disabled = get_theme_mod('formula_client_disabled',true);
if($formula_client_disabled == true):
	$formula_client_content = get_theme_mod('formula_client_content');
	$formula_client_autoplay = get_theme_mod('formula_client_autoplay', true);
	$formula_client_area_title = get_theme_mod('formula_client_area_title', __('','formula'));
	$formula_client_area_desc = get_theme_mod('formula_client_area_desc', __('','formula'));

	$formula_client_container_size = get_theme_mod('formula_client_container_size', 'container');
	$formula_client_column_layout = get_theme_mod('formula_client_column_layout', 3);
	?><!-- Sponsors Section -->
		<section id="client-selector-scroll" class="sponsors">
			<div class="<?php echo esc_attr($formula_client_container_size); ?> sponsors-selector">
				<div class="row">
					<?php  
					if( ($formula_client_area_title) || ($formula_client_area_desc)!='' ) { ?>
					<!-- Section Title -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-header">
								<?php if($formula_client_area_desc != null): ?>
									<p class="section-subtitle"><?php echo wp_kses_post($formula_client_area_desc); ?></p>
								<?php endif; ?>
								<?php if($formula_client_area_title != null): ?>
									<h2 class="section-title"><?php echo wp_kses_post($formula_client_area_title); ?></h2>
								<?php endif; ?>
								<div class="divider-line"></div>
							</div>
						</div>
					</div>
					<!-- /Section Title -->
					<?php }  ?>
					<div class="owl-carousel owl-theme col-md-12" id="sponsors-demo">
						<?php
							$t=true;
							$formula_client_content = json_decode($formula_client_content);
							if( $formula_client_content !='' ){
								foreach($formula_client_content as $client_iteam){ 
									$title = ! empty( $client_iteam->title ) ? apply_filters( 'formula_translate_single_string', $client_iteam->title, 'Client section' ) : '';
									$link = ! empty( $client_iteam->link ) ? apply_filters( 'formula_translate_single_string', $client_iteam->link, 'Client section' ) : '';
									$client_link = $client_iteam->link;
									$open_new_tab = $client_iteam->open_new_tab;
									?>
									<div class="item">
										<a href="<?php echo $client_link; ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
											<img src="<?php echo $client_iteam->image_url; ?>" alt="">
										</a>
									</div><?php	
								} 
							} else { ?>
								<?php if( 'Metaverse' == $activate_theme ) { ?>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/partner-1.png" alt="client"></a></div>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/partner-2.png" alt="client"></a></div>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/partner-3.png" alt="client"></a></div>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/partner-4.png" alt="client"></a></div>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/partner-5.png" alt="client"></a></div>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/partner-6.png" alt="client"></a></div>
								<?php } else {  ?>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/c1.jpg" alt="client"></a></div>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/c2.jpg" alt="client"></a></div>
									<div class="item"><a href="#"><img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/client/c3.jpg" alt="client"></a></div>
								<?php } ?>


								<?php 
							} ?>
					</div>
				</div>
			</div>
		</section>
<?php endif; ?>
<script>
		jQuery(window).load(function(){
			jQuery("#sponsors-demo").owlCarousel({
				navigation : false,
				<?php if($formula_client_autoplay == true){ ?>
					autoplay: true,
				<?php } ?>
				autoplayTimeout: <?php echo esc_html(get_theme_mod('formula_client_animation_speed', 3000)); ?>, //autoplay speed
				autoplayHoverPause: true,
				smartSpeed: 700,
				loop:true,
				nav:false,
				margin:30,
				autoHeight: true,
				responsiveClass:true,
				dots: false,
				navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
				responsive:{
					200:{ items:1 },	
					480:{ items:1 },
					768:{ items:3 },
					1000:{ items:<?php echo esc_attr($formula_client_column_layout); ?> }
				}
			});
		});
	</script>
<!-- End of Sponsors Section -->			
<div class="clearfix"></div>