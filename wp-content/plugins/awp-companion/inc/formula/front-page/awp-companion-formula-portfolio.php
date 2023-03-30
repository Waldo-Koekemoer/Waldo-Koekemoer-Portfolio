<?php 
$formula_portfolio_disabled = get_theme_mod('formula_portfolio_disabled','on');
if($formula_portfolio_disabled ==true):

$formula_portfolio_container_size = get_theme_mod('formula_portfolio_container_size', 'container-full');
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme      = $activate_theme_data->name;
?>
<!-- Portfolio Section -->
<section id="portfolio-selector-scroll" class="portfolio">
	<div class="<?php echo esc_attr($formula_portfolio_container_size); ?> portfolio-selector">
		<?php 
		if( 'Metaverse' == $activate_theme ) {
			$formula_project_area_title = get_theme_mod('formula_project_area_title',__('Create The Exciting Projects With Us','formula'));
			$formula_project_area_des = get_theme_mod('formula_project_area_des','OUR PROJECTS');
		} else {
			$formula_project_area_title = get_theme_mod('formula_project_area_title',__('Our latest projects','formula'));
			$formula_project_area_des = get_theme_mod('formula_project_area_des','Portfolio');
		}

		?>
		<!-- Section Title -->
		<?php if( ($formula_project_area_title) || ($formula_project_area_des)!='' ) { ?> 
			<div class="row">
				<div class="col-md-12">
					<div class="section-header" data-wow-delay=".3s">
						<p class="section-subtitle"><?php echo $formula_project_area_des; ?></p>
						<h2 class="section-title"><?php echo $formula_project_area_title; ?></h2>
						<div class="divider-line"></div>
					</div>
				</div>
			</div>
		<?php } 
		$formula_portfolio_content = get_theme_mod('formula_portfolio_content'); 
		$formula_portfolio_autoplay_disable = get_theme_mod('formula_portfolio_autoplay_disable', true);
		$formula_portfolio_homepage1_column_layout  = get_theme_mod( 'formula_portfolio_homepage1_column_layout', 3);
		?>
		<div class="row">
			<div id="portfolio-demo" class="owl-carousel owl-theme col-md-12">
				<?php
				$formula_portfolio_count  = get_theme_mod( 'formula_portfolio_count', array('slider' => 4,'suffix' => '',));	
				$formula_portfolio_content = json_decode($formula_portfolio_content);
				if( $formula_portfolio_content!='' ){
					$item = 0;
					foreach($formula_portfolio_content as $portfolio_item){
					
						if ($item <= $formula_portfolio_count['slider'] - 1){
							$image    = ! empty( $portfolio_item->image_url ) ? apply_filters( 'formula_translate_single_string', $portfolio_item->image_url, 'portfolio section' ) : '';
							$title    = ! empty( $portfolio_item->title ) ? apply_filters( 'formula_translate_single_string', $portfolio_item->title, 'portfolio section' ) : '';
							$subtitle = ! empty( $portfolio_item->subtitle ) ? apply_filters( 'formula_translate_single_string', $portfolio_item->subtitle, 'portfolio section' ) : '';
							$designation = ! empty( $portfolio_item->designation ) ? apply_filters( 'formula_translate_single_string', $portfolio_item->designation, 'portfolio section' ) : '';  
							$link     = ! empty( $portfolio_item->link ) ? apply_filters( 'formula_translate_single_string', $portfolio_item->link, 'portfolio section' ) : '';
							$open_new_tab = $portfolio_item->open_new_tab; ?>
							<div class="item wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
								<article class="post">
									<figure class="portfolio-thumbnail">
										<?php if ( ! empty( $image ) ) : ?>
												<?php
												if ( ! empty( $link ) ) :
													$link_html = '<a href="' . esc_url( $link ) . '"';
													if ( function_exists( 'formula_is_external_url' ) ) {
														$link_html .= formula_is_external_url( $link );
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
										<?php if(!empty($subtitle) || !empty($title)) { ?>
										<figcaption>
											<div class="portfolio-overlay">
												<div class="portfolio-overlay-inner">
													<div class="portfolio-icons">
														<a href="<?php echo $image; ?>" class="click" data-lightbox="image"><i class="fas fa-eye"></i></a>
														<a href="<?php echo $link; ?>" <?php if(!empty($open_new_tab)){ echo 'target="_blank"'; } ?> ><i class="fas fa-link"></i></a>
													</div>
												</div>
											</div>
											<?php if(!empty($subtitle)) { ?>
												<p class="branding"><?php echo $subtitle; ?></p>
											<?php } ?>
											<?php if(!empty($title)) { ?>
												<h5 class="entry-title">
													<?php if($link != "" ){ ?>
														<a  href="<?php echo $link; ?>"<?php if(!empty($open_new_tab)){ echo 'target="_blank"'; } ?> ><?php echo $title; ?></a>
													<?php } else { ?>
														<a  href="<?php echo the_permalink(); ?>"<?php if(!empty($open_new_tab)){ echo 'target="_blank"'; } ?> ><?php echo $title; ?></a>
													<?php } ?>	
												</h5>
											<?php } ?>
										</figcaption>
										<?php } ?>
									</figure>
								</article>
							</div><?php
							$item++;
						}
					}
				} else { ?>
					<?php if( 'Metaverse' == $activate_theme ) { ?>
						<div class="item wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<figure class="portfolio-thumbnail">
									<img src="<?php echo awp_companion_plugin_url ?>inc/formula/img/portfolio/project-1.jpg" alt="Print Media">
									<figcaption>
										<div class="portfolio-overlay">
											<div class="portfolio-overlay-inner">
												<div class="portfolio-icons">
													<a href="assets/images/portfolio/project-1.jpg" data-lightbox="image" class="click"><i class="fas fa-eye"></i></a>
													<a href="#"><i class="fas fa-link"></i></a>
												</div>
											</div>
										</div>
										<p class="branding">VR</p>
										<h5 class="entry-title"><a href="#">SignIn Network</a></h5>
									</figcaption>
									<!--<a href="images/item1.jpg" data-lightbox="image" class="click"><i class="fa fa-search"></i></a>-->
								</figure>
							</article>
						</div>
						<div class="item wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<figure class="portfolio-thumbnail">
									<img src="<?php echo awp_companion_plugin_url ?>inc/formula/img/portfolio/project-2.jpg" alt="Print Media">
									<figcaption>
										<div class="portfolio-overlay">
											<div class="portfolio-overlay-inner">
												<div class="portfolio-icons">
													<a href="assets/images/portfolio/project-1.jpg" data-lightbox="image" class="click"><i class="fas fa-eye"></i></a>
													<a href="#"><i class="fas fa-link"></i></a>
												</div>
											</div>
										</div>
										<p class="branding">Cartoon</p>
										<h5 class="entry-title"><a href="#">Animal Concerts</a></h5>
									</figcaption>
								</figure>
							</article>
						</div>
						<div class="item wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<figure class="portfolio-thumbnail">
									<img src="<?php echo awp_companion_plugin_url ?>inc/formula/img/portfolio/project-3.jpg" alt="Print Media">
									<figcaption>
										<div class="portfolio-overlay">
											<div class="portfolio-overlay-inner">
												<div class="portfolio-icons">
													<a href="assets/images/portfolio/project-1.jpg" data-lightbox="image" class="click"><i class="fas fa-eye"></i></a>
													<a href="#"><i class="fas fa-link"></i></a>
												</div>
											</div>
										</div>
										<p class="branding">Online</p>
										<h5 class="entry-title"><a href="#">Wizardia</a></h5>
									</figcaption>
								</figure>
							</article>
						</div>
					<?php } else { ?>
						<div class="item wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<figure class="portfolio-thumbnail">
									<img src="<?php echo awp_companion_plugin_url ?>inc/formula/img/portfolio/p1.jpg" alt="Print Media">
								</figure>
							</article>
						</div>
						<div class="item wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<figure class="portfolio-thumbnail">
									<img src="<?php echo awp_companion_plugin_url ?>inc/formula/img/portfolio/p2.jpg" alt="Print Media">
								</figure>
							</article>
						</div>
						<div class="item wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post">
								<figure class="portfolio-thumbnail">
									<img src="<?php echo awp_companion_plugin_url ?>inc/formula/img/portfolio/p3.jpg" alt="Print Media">
								</figure>
							</article>
						</div>
					<!-- /Portfolio Item -->
				<?php }
				} ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>	
<script>
	jQuery(window).load(function(){
		jQuery("#portfolio-demo").owlCarousel({
			navigation : false,
			<?php if($formula_portfolio_autoplay_disable != false) { ?>
			autoplay:  true,  // autoplay
			<?php } ?>
			autoplayTimeout: <?php echo esc_html(get_theme_mod('formula_portfolio_animation_speed', 3000)); ?>, 
			autoplayHoverPause: true,
			smartSpeed: 700,
			loop:true, // loop is true up to 1199px screen.
			nav:false, // is true across all sizes
			margin:30, // margin 10px till 960 breakpoint
			autoHeight: true,
			responsiveClass:true,
			dots: false,
			navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
			responsive:{
				100:{ items:1 },
				480:{ items:1 },
				768:{ items:2 },
				1000:{ items:<?php echo esc_attr($formula_portfolio_homepage1_column_layout); ?> }
			}
		});
	});
</script>
<!-- End of Portfolio Section -->
<div class="clearfix"></div>