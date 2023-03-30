<?php
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme      = $activate_theme_data->name;

if( 'Metaverse' == $activate_theme ) {
	$formula_testimonial_disabled = get_theme_mod('formula_testimonial_disabled', false);	
} else {
	$formula_testimonial_disabled = get_theme_mod('formula_testimonial_disabled', true);
}
if($formula_testimonial_disabled == true):

	$formula_testimonial_autoplay = get_theme_mod('formula_testimonial_autoplay', true);
	$formula_testimonial_background = get_theme_mod('formula_testimonial_background', '');
	
	$formula_testimonial_container_size = get_theme_mod('formula_testimonial_container_size', 'container-full');
	$formula_testimonial_column_layout = get_theme_mod('formula_testimonial_column_layout', 2);
?>
<section id="testimonial-selector-scroll" class="testimonial theme-light"
	style="background-image:url('<?php echo esc_url($formula_testimonial_background);?>'); background-repeat: no-repeat;" >
	<div class="<?php echo esc_attr($formula_testimonial_container_size); ?> testimonial-selector">
		<div class="row">
			<?php
				$formula_testimonial_area_title = get_theme_mod('formula_testimonial_area_title',__('CUSTOMER FEEDBACKS ABOUT US','formula'));
				$formula_testimonial_area_des = get_theme_mod('formula_testimonial_area_des','Happy Customers!');
				if( $formula_testimonial_area_title != '' || $formula_testimonial_area_des != '') { ?>
					<div class="col-xl-4 col-lg-4 col-md-12 col-xs-12">
						<div class="section-header">
							<p class="section-subtitle"><?php echo esc_attr($formula_testimonial_area_des); ?></p>
							<h1 class="section-title"><?php echo esc_attr($formula_testimonial_area_title); ?></h1>
							<div class="divider-line"></div>
						</div>
					</div>
			<?php }
			// Note: Also used in about-us-2 template
			$formula_testimonial_column_layout = get_theme_mod('formula_testimonial_column_layout','2');
			$formula_testimonial_content = get_theme_mod('formula_testimonial_content');

			$formula_testimonial_area_title = get_theme_mod('formula_testimonial_area_title',__('CUSTOMER FEEDBACKS ABOUT US','formula'));
			$formula_testimonial_area_des = get_theme_mod('formula_testimonial_area_des','Happy Customers!');
								
			?>
			<!-- Testimonial Section template 1-->
			<?php if( $formula_testimonial_area_title != '' || $formula_testimonial_area_des != '') { ?>
			<div class="col-xl-8 col-lg-8 col-md-12 col-xs-12">
			<?php } else { ?>
			<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
			<?php } ?>
				<div id="testimonial-demo" class="owl-carousel owl-theme col-md-12">		
					<?php
					$formula_testimonial_content = json_decode($formula_testimonial_content);
					if( $formula_testimonial_content!='' ){
						$allowed_html = array(
							'br'     => array(),
							'em'     => array(),
							'strong' => array(),
							'b'      => array(),
							'i'      => array(),
						);	
							
						foreach($formula_testimonial_content as $testimonial_iteam){
							$title = ! empty( $testimonial_iteam->title ) ? apply_filters( 'formula_translate_single_string', $testimonial_iteam->title, 'Testimonial section' ) : '';
							$testimonial_clientname = ! empty( $testimonial_iteam->subtitle ) ? apply_filters( 'formula_translate_single_string', $testimonial_iteam->subtitle, 'Testimonial section' ) : '';
							$test_desc = ! empty( $testimonial_iteam->text ) ? apply_filters( 'formula_translate_single_string', $testimonial_iteam->text, 'Testimonial section' ) : '';
							//$test_link = $testimonial_iteam->link;
							//$open_new_tab = $testimonial_iteam->open_new_tab;
							//$rating_control = $testimonial_iteam->rating_control;
							
							$designation = ! empty( $testimonial_iteam->designation ) ? apply_filters( 'formula_translate_single_string', $testimonial_iteam->designation, 'Testimonial section' ) : '';  
							?>
							<div class="item">
								<blockquote class="review">
									<aside class="wt-content">
										<h4 class="wt-title"><?php echo wp_kses( html_entity_decode( $title ), $allowed_html ); ?></h4>
										<p class="section-subtitle"><?php echo wp_kses( html_entity_decode( $test_desc ), $allowed_html ); ?></p>
									</aside>
									 <article class="client-info">
										<figure class="client-thumbnail">
											<img class="img-circle" alt="img" src="<?php echo $testimonial_iteam->image_url; ?>">
										</figure>
										<cite class="client-name"><?php echo $testimonial_clientname; ?></cite>
										<span class="client-designation"><?php echo $designation; ?></span>
									</article>
									<div class="icon-quote">
										<img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/testimonial/quote.png">
									</div>
								</blockquote>
							</div>	
							<?php
						}	
					} else { ?>	

						<div class="item">
							<blockquote class="review">
								<aside class="wt-content">
									<h4 class="wt-title"><?php _e('"','formula'); ?></h4>
									<p><?php _e('I love your system. Agency is both attractive and highly adaptable. Man, this thing is getting better and better as I learn more about it. I am so pleased with this product.','formula'); ?></p></p>
								</aside>
								<article class="client-info">
									<figure class="client-thumbnail"><img src="<?php echo awp_companion_plugin_url ?>inc/formula/img/testimonial/test1.png" class="img-circle" alt="testimonial"></figure>
									<cite class="client-name"><?php _e('Billu Gol','formula'); ?></cite>
									<span class="client-designation"><?php _e('CEO, Agrok Inc.','formula'); ?></span>
								</article>
								<div class="icon-quote">
									<img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/testimonial/quote.png">
								</div>
							</blockquote>
						</div>

						<div class="item">
							<blockquote class="review">
								<aside class="wt-content">
									<h4 class="wt-title"><?php _e('"','formula'); ?></h4>
									<p><?php _e('It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.','formula'); ?></p></p>
								</aside>
								<article class="client-info">
									<figure class="client-thumbnail"><img src="<?php echo awp_companion_plugin_url ?>inc/formula/img/testimonial/test2.png" class="img-circle" alt="testimonial"></figure>
									<cite class="client-name"><?php _e('Mark Agroiks','formula'); ?></cite>
									<span class="client-designation"><?php _e('CEO, Apce.co','formula'); ?></span>
								</article>
								<div class="icon-quote">
									<img src="<?php echo awp_companion_plugin_url ?>/inc/formula/img/testimonial/quote.png">
								</div>
							</blockquote>
						</div>

					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	jQuery(window).load(function(){
		jQuery("#testimonial-demo").owlCarousel({
			navigation : true,
			<?php if($formula_testimonial_autoplay != false) { ?>
				autoplay: true,
			<?php } ?>
			autoplayTimeout: <?php echo esc_html(get_theme_mod('formula_testimonial_animation_speed', 3000)); ?>, //autoplay speed
			autoplayHoverPause: true,
			smartSpeed: 1000,
			loop:true,
			nav:true,
			margin:30,
			autoHeight: true,
			responsiveClass:true,
			dots: false,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			responsive:{
				200: { items:1 },	
				480: { items:1 },
				768: { items:2 },
				1000:{ items:<?php echo esc_attr($formula_testimonial_column_layout); ?> }			
			}
		});
	});
</script>
<?php endif; ?>
<div class="clearfix"></div>