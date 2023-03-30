<?php
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme      = $activate_theme_data->name;

if( 'Metaverse' == $activate_theme ) {
	$formula_team_disabled = get_theme_mod('formula_team_disabled',false);
} else {
	$formula_team_disabled = get_theme_mod('formula_team_disabled',true);
}
if($formula_team_disabled == true):

$formula_homepage_template_design = get_theme_mod('formula_homepage_template_design','formula_homepage_template_1');
if(isset($_GET['homepage_template'])) $formula_homepage_template_design = $_GET['homepage_template'];

$formula_team_container_size = get_theme_mod('formula_team_container_size', 'container-full');
?>
<!-- Team Section -->
<section id="team-selector-scroll" class="team">
	<div class="<?php echo esc_attr($formula_team_container_size); ?> team-selector">
		<?php
		$formula_team_area_title = get_theme_mod('formula_team_area_title',__('Our Team','formula'));
		$formula_team_area_des = get_theme_mod('formula_team_area_des','Know our expert team agents.');
		if(($formula_team_area_title) || ($formula_team_area_des)!='' ){ ?>
			<div class="row">
				<div class="col-md-12">
					<div class="section-header wow animate fadeInUp" data-wow-delay=".3s">
						<?php if($formula_team_area_des) { ?>
							<p class="section-subtitle"><?php echo $formula_team_area_des; ?></p>
						<?php } if($formula_team_area_title) { ?>
							<h1 class="section-title"><?php echo $formula_team_area_title; ?></h1>
						<?php } ?>
						<div class="divider-line"></div>
					</div>
				</div>
			</div>
		<?php }
			$formula_team_content = get_theme_mod('formula_team_content'); 
			$formula_team_autoplay_disable = get_theme_mod('formula_team_autoplay_disable', true);
			$formula_team_column_layout  = get_theme_mod( 'formula_team_column_layout', 4);
		?>
		<div class="row">
			<div id="team-demo" class="owl-carousel owl-theme col-md-12">
				<?php	
				$formula_team_content = json_decode($formula_team_content);
				if( $formula_team_content!='' ){
					foreach($formula_team_content as $team_item){
						$image    = ! empty( $team_item->image_url ) ? apply_filters( 'formula_translate_single_string', $team_item->image_url, 'Team section' ) : '';
						$title    = ! empty( $team_item->title ) ? apply_filters( 'formula_translate_single_string', $team_item->title, 'Team section' ) : '';
						$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'formula_translate_single_string', $team_item->subtitle, 'Team section' ) : '';
						$designation = ! empty( $team_item->designation ) ? apply_filters( 'formula_translate_single_string', $team_item->designation, 'Team section' ) : '';  
						$link     = ! empty( $team_item->link ) ? apply_filters( 'formula_translate_single_string', $team_item->link, 'Team section' ) : '';
						$open_new_tab = $team_item->open_new_tab;
						?>
						<div class="item wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<div class="team-module">
								<figure class="team-avatar">
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
								</figure>
								<figcaption class="team-caption text-center">
									<div class="team-overlay">
										<div class="team-overlay-inner">
											<div class="team-social-icons">
												<?php 
												if ( ! empty( $team_item->social_repeater ) ) :
													$icons         = html_entity_decode( $team_item->social_repeater );
													$icons_decoded = json_decode( $icons, true );
													if ( ! empty( $icons_decoded ) ) : 
															foreach ( $icons_decoded as $value ) {
																$social_icon = ! empty( $value['icon'] ) ? apply_filters( 'formula_translate_single_string', $value['icon'], 'Team section' ) : '';
																$social_link = ! empty( $value['link'] ) ? apply_filters( 'formula_translate_single_string', $value['link'], 'Team section' ) : '';

																if ( ! empty( $social_icon ) ) {
																	
																?>											
																<a <?php if($open_new_tab == 'yes'){ echo 'target="_blank"'; } ?> href="<?php echo esc_url( $social_link ); ?>" class="facebook">
																<i class="fab <?php echo esc_attr( $social_icon ); ?> "></i></a>														
																<?php											
																}	
															}
													endif;
												endif; ?>
											</div>
										</div>
									</div>
									<?php if ( ! empty( $designation ) ) : ?>
										<p class="designation"><?php echo esc_html( $designation ); ?></p>
									<?php endif; ?>
									
									<?php if ( ! empty( $title ) ) : ?>
										<?php if( $link != "" ){ ?>
											<a href="<?php echo $link ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"'; } ?>>
												<h4 class="name"><?php echo esc_html( $title ); ?></h4>
											</a>
										<?php } else { ?>
											<h4 class="name"><?php echo esc_html( $title ); ?></h4>
										<?php } ?>
									<?php endif; ?>
								</figcaption>
							</div>
						</div>
						<?php 
					} 
				} else {  ?>
					<div class="item wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
						<div class="team-module">
							<figure class="team-avatar">
								<img class="img-responsive" src="<?php echo awp_companion_plugin_url ?>inc/formula/img/team/team-1.png" alt="Tasnia Tasnim">
							</figure>
							<figcaption class="team-caption text-center">
								<div class="team-overlay">
									<div class="team-overlay-inner">
										<div class="team-social-icons">
											<a href="#" title="Facebook" class="facebook"><i class="fab fa-facebook"></i></a>
											<a href="#" title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a>
											<a href="#" title="Linkedin" class="linkedin"><i class="fab fa-linkedin"></i></a>
										</div>
									</div>
								</div>
								<p class="designation"><?php _e('Senior Consultant','formula'); ?></p>
								<h4 class="name"><?php _e('Tasnia Tasnim', 'formula'); ?></h4>
							</figcaption>
						</div>
					</div>

					<div class="item wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
						<div class="team-module">
							<figure class="team-avatar">
								<img class="img-responsive" src="<?php echo awp_companion_plugin_url ?>inc/formula/img/team/team-2.png" alt="Abdullah Marsad">
							</figure>
							<figcaption class="team-caption text-center">
								<div class="team-overlay">
									<div class="team-overlay-inner">
										<div class="team-social-icons">
											<a href="#" title="Facebook" class="facebook"><i class="fab fa-facebook"></i></a>
											<a href="#" title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a>
											<a href="#" title="Linkedin" class="linkedin"><i class="fab fa-linkedin"></i></a>
										</div>
									</div>
								</div>
								<p class="designation"><?php _e('Business Advisor', 'formula'); ?></p>
								<h4 class="name"><?php _e('Abdullah Marsad', 'formula'); ?></h4>
							</figcaption>
						</div>
					</div>

					<div class="item wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
						<div class="team-module">
							<figure class="team-avatar">
								<img class="img-responsive" src="<?php echo awp_companion_plugin_url ?>inc/formula/img/team/team-3.png" alt="Shannon Garcia">
							</figure>
							<figcaption class="team-caption text-center">
								<div class="team-overlay">
									<div class="team-overlay-inner">
										<div class="team-social-icons">
											<a href="#" title="Facebook" class="facebook"><i class="fab fa-facebook"></i></a>
											<a href="#" title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a>
											<a href="#" title="Linkedin" class="linkedin"><i class="fab fa-linkedin"></i></a>
										</div>
									</div>
								</div>
								<p class="designation"><?php _e('Director', 'formula'); ?></p>
								<h4 class="name"><?php _e('Shannon Garcia', 'formula'); ?></h4>
							</figcaption>
						</div>
					</div>

					<div class="item wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
						<div class="team-module">
							<figure class="team-avatar">
								<img class="img-responsive" src="<?php echo awp_companion_plugin_url ?>inc/formula/img/team/team-4.png" alt="Thomas Omazan">
							</figure>
							<figcaption class="team-caption text-center">
								<div class="team-overlay">
									<div class="team-overlay-inner">
										<div class="team-social-icons">
											<a href="#" title="Facebook" class="facebook"><i class="fab fa-facebook"></i></a>
											<a href="#" title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a>
											<a href="#" title="Linkedin" class="linkedin"><i class="fab fa-linkedin"></i></a>
										</div>
									</div>
								</div>
								<p class="designation"><?php _e('Project Manager', 'formula'); ?></p>
								<h4 class="name"><?php _e('Thomas Omazan', 'formula'); ?></h4>
							</figcaption>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php  endif; ?>
<!--/End of Team Section-->
<div class="clearfix"></div>
<script>
	jQuery(window).load(function(){
		jQuery("#team-demo").owlCarousel({
			navigation : false,
			<?php if($formula_team_autoplay_disable != false) { ?>
			autoplay:  true,  // autoplay
			<?php } ?>
			autoplayTimeout: <?php echo esc_html(get_theme_mod('formula_team_animation_speed', 3000)); ?>, 
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
				1000:{ items:<?php echo esc_attr($formula_team_column_layout); ?> }
			}
		});
	});
</script>