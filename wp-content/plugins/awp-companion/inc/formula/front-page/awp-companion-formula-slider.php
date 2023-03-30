<!-- Slider Section -->
<?php
$formula_main_slider_options = get_theme_mod('formula_main_slider_content');
$formula_main_slider_disabled = get_theme_mod('formula_main_slider_disabled', true);
if($formula_main_slider_disabled != false){

//slider option settings
$formula_main_slider_autoplay_disable = get_theme_mod('formula_main_slider_autoplay_disable', true); 
$formula_main_slider_animation = get_theme_mod('formula_main_slider_animation', false); 
$formula_main_slider_animation_speed = get_theme_mod('formula_main_slider_animation_speed', '4000'); 
$formula_main_slider_overlay_disable = get_theme_mod('formula_main_slider_overlay_disable', true);
$formula_main_slider_overlay_color = get_theme_mod( 'formula_main_slider_overlay_color', 'rgba(0, 0, 0, 0.2)');
$formula_main_slider_caption_title_color = get_theme_mod( 'formula_main_slider_caption_title_color', '#fff');
$formula_main_slider_caption_subtitle_title_color = get_theme_mod( 'formula_main_slider_caption_subtitle_title_color', '#fff');
$formula_main_slider_caption_descrption_title_color = get_theme_mod( 'formula_main_slider_caption_descrption_title_color', '#fff');

?>
<style>
	.slider-caption .title { color: <?php echo $formula_main_slider_caption_title_color; ?>; }
	.slider-caption .subtitle { color: <?php echo $formula_main_slider_caption_subtitle_title_color; ?>;  }
	.slider-caption p { color: <?php echo $formula_main_slider_caption_descrption_title_color; ?>;  }
	<?php if($formula_main_slider_overlay_disable == true){ ?>
		#slider-demo .item::before { 
			background-color: <?php echo $formula_main_slider_overlay_color; ?>; 
		}
	<?php } else { ?>
		#slider-demo .item::before { 
			background-color: transparent; 
		}
	<?php } ?>
</style>

<section id="slider-selector-scroll" class="hero-slider">
	<div id="slider-demo" class="owl-carousel owl-theme">
		<?php
		$formula_main_slider_options = json_decode($formula_main_slider_options);
		if( $formula_main_slider_options != '' ){
			foreach($formula_main_slider_options as $slide_item){ ?>		
			<div id="post-<?php the_ID(); ?>" class="item home-section home-full-height" 
				<?php   
					$slider_image = ! empty( $slide_item->image_url ) ? apply_filters( 'formula_translate_single_string', $slide_item->image_url, 'Slider section' ) : ''; 
					if($slider_image != '' ) { ?>
						style="background-image:url(<?php echo $slider_image; ?>); <?php 
					} ?>">
					<?php
						$title = ! empty( $slide_item->title ) ? apply_filters( 'formula_translate_single_string', $slide_item->title, 'Slider section' ) : ''; 
						$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'formula_translate_single_string', $slide_item->subtitle, 'Slider section' ) : '';
						$img_description = ! empty( $slide_item->text ) ? apply_filters( 'formula_translate_single_string', $slide_item->text, 'Slider section' ) : '';
						$readmorelink = ! empty( $slide_item->link ) ? apply_filters( 'formula_translate_single_string', $slide_item->link, 'Slider section' ) : '';
						$readmore_button = ! empty( $slide_item->button_text ) ? apply_filters( 'formula_translate_single_string', $slide_item->button_text, 'Slider section' ) : '';
						//slide format
						$slide_format =  ! empty( $slide_item->slide_format ) ? apply_filters( 'formula_translate_single_string', $slide_item->slide_format, 'Slider section' ) : '';
						$content_format = ! empty( $slide_item->content_format ) ? apply_filters( 'formula_translate_single_string', $slide_item->content_format, 'Slider section' ) : '';
						$sub_format = 'center';
						switch ($content_format) {
						  case "left":
							$sub_format = 'baseline';
							break;
						  case "center":
							$sub_format = 'center';
							break;
						  case "right":
							$sub_format = 'end';
							break;
						}
						
						if($slide_format == 'customizer_repeater_slide_format_video'):
							$video_url = ! empty( $slide_item->video_url ) ? apply_filters( 'formula_translate_single_string', $slide_item->video_url, 'Slider section' ) : 'https://www.youtube.com/watch?v=kUl4xAwvm7s&list=PLXR1UeeO9dcfx8Wx_4Z-T-1NCw8ovnPQ8'; 
						endif;
						$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'formula_translate_single_string', $slide_item->open_new_tab, 'Slider section' ) : '';
	
						//if($slide_format == 'customizer_repeater_slide_format_standard'): ?>
						<div class="container slider-caption">
							<div class="caption-content">
								<figcaption class="caption-content " style="text-align: <?php echo $content_format; ?>;align-items: <?php echo $sub_format; ?>">
									<?php if(($title!= '') || ($img_description !='')) { ?>
										<?php if(!empty($subtitle)) { ?>
											<span class="subtitle " ><?php echo $subtitle; ?></span>
										<?php } ?>
										<h2 class="title slider-selector"><?php echo $title; ?></h2>
										<p class="description"><?php echo $img_description; ?></p>
									<?php } if($readmore_button !='' ) { ?>
										<div class="m-top-40">
											<a href="<?php echo $readmorelink; ?>" class="thm-btn"
												<?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?>>
												<?php echo $readmore_button ?>
											</a>
										</div>
									<?php } ?>
								</figcaption>
							</div>
						</div>

					<?php //endif; ?>
					<!--
					<?php if($slide_format == 'customizer_repeater_slide_format_video'): ?>
						<div class="container slider-caption format-video">
							<figcaption class="caption-content slider-selector" style="text-align: <?php echo $content_format; ?>">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php if(($title!= '') || ($img_description !='')) { ?>
										<span class="subtitle"><?php echo $subtitle; ?></span>
										<h2 class="title"><?php echo $title; ?></h2>
										<p class="description"><?php echo $img_description; ?></p>
									<?php } if($readmore_button !='' ) { ?>
										<div class="m-top-40">
											<a href="<?php echo $readmorelink; ?>" class="thm-btn"
												<?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?>>
												<?php echo $readmore_button ?>
											</a>
										</div>
									<?php } ?>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php 
									$width = '540';
									$height = '360';
									
									//$video_url = "//www.youtube.com/embed"
									$parsedUrl  = parse_url($video_url);
									
									//specified condition for YouTube URL
									if($parsedUrl['host'] == 'www.youtube.com' || $parsedUrl['host'] == 'youtube.com')	{
									//get Youtube id from URL
									$embed = $parsedUrl['query'];
									parse_str($embed, $out);
									$embedUrl   = $out['v'];
									$embedUrl = explode('__',$embedUrl);
									$url = '//www.youtube.com/embed/'.$embedUrl[0] ;

									//echo the embed code for you tube
									echo '<div class="video-frame"><iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe></div>';
									}

									//specified condition for vimeo URL
									if($parsedUrl['host'] == 'www.vimeo.com' || $parsedUrl['host'] == 'vimeo.com') {
									//get vimeo id from URL	
									$urlid = $parsedUrl['path'];
									$number = preg_replace("/[^0-9]/", '', $urlid);
									$url = '//player.vimeo.com/video/'.$number ;

									//echo the embed code for Vimeo
									echo '<div class="video-frame"><iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe></div>';
									}
									?>
								</div>
							</figcaption>
						</div>
					<?php endif; ?>-->
			</div><?php
			}  
		} else {
			$activate_theme_data = wp_get_theme(); // getting current theme data.
			$activate_theme      = $activate_theme_data->name;
			if ( 'Formula' == $activate_theme || 'Formula Light' == $activate_theme ) {
				?>
					<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url ?>inc/formula/img/slider/slide.png);">
						<div class="container slider-caption">
							<figcaption class="caption-content" style="text-align: left;align-items: baseline;">
								<span class="subtitle"><?php _e('Explore Your Creativity','formula'); ?></span>
								<h2 class="title"><?php _e('Give Wings To Your Imaginations','formula'); ?></h2>
								<p><?php _e('Take your dreams and imagination to the next level of your expectations.','formula'); ?></p>
								<div class="m-top-40">
									<a href="#" class="thm-btn"><?php _e('Build Something Creative','formula'); ?></a>
								</div>
							</figcaption>
						</div>
					</div>
				<?php 
			} elseif ( 'Formula Dark' == $activate_theme ) { ?>
					<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url ?>inc/formula/img/slider/slide-dark.jpg);">
						<div class="container slider-caption">
							<figcaption class="caption-content" style="text-align: left;align-items: baseline;">
								<span class="subtitle"><?php _e('Think Beyond Imaginations','formula'); ?></span>
								<h2 class="title"><?php _e('The Reality Is Everthing You Can Imagine','formula'); ?></h2>
								<p><?php _e('Hustle in silence and let your success make the noise.','formula'); ?></p>
								<div class="m-top-40">
									<a href="#" class="thm-btn"><?php _e('Join The Venture','formula'); ?></a>
								</div>
							</figcaption>
						</div>
					</div>
				<?php 
			} elseif ( 'Metaverse' == $activate_theme ) { ?>
					<div class="item home-section home-full-height" style="background-image:url(<?php echo awp_companion_plugin_url ?>inc/formula/img/slider/metaverse.jpg);">
						<div class="container slider-caption">
							<figcaption class="caption-content" style="text-align: left;align-items: baseline;">
								<span class="subtitle"><?php _e('Building The Metaverse','formula'); ?></span>
								<h2 class="title"><?php _e('Metaverse Ecosystem For Growing New Projects','formula'); ?></h2>
								<p><?php _e('The Metaverse Is The Next Generation Of The Internet. As One Of Its Earliest Explorers, You Will Help Fuel Its Expansion And Share In The Benefits Of This Growth.','formula'); ?></p>
								<div class="m-top-40">
									<a href="#" class="thm-btn"><?php _e('Open App','formula'); ?></a>
								</div>
							</figcaption>
						</div>
					</div>
			<?php 
			}
		} ?>
	</div>
</section>
<?php } ?>
<script>
	jQuery(window).load(function(){
		jQuery("#slider-demo").owlCarousel({
			 navigation: true, // Show next and prev buttons
			<?php if($formula_main_slider_autoplay_disable != false) { ?>
				autoplay:  true,  // autoplay
			<?php } if($formula_main_slider_animation == true){ ?>
				animateOut:  'fadeOut', // fadeout	
			<?php } ?>	
			autoplayTimeout: <?php echo $formula_main_slider_animation_speed; ?>, //autoplay speed
			autoplayHoverPause: true,
			smartSpeed: 800,
			singleItem:true,
			autoHeight:true,
			loop:true, // loop is true up to 1199px screen.
			nav:true, // is true across all sizes
			margin:0, // margin 10px till 960 breakpoint
			responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
			items: 1,
			dots: false,
			navText: ["PREV", "NEXT"]
		});
	});
</script>
<!-- /Slider Section -->
<div class="clearfix"></div>