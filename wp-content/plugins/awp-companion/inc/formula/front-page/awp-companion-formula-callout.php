<?php
	$formula_cta_disabled = get_theme_mod('formula_cta_disabled','on');
	if($formula_cta_disabled == true):
		$formula_cta_area_title = get_theme_mod('formula_cta_area_title', __('Stake Nata To Earn Rewards','formula'));
		$formula_cta_area_des = get_theme_mod('formula_cta_area_des', __('A Gamified Marketplace Dedicated To The Metaverse And Gaming Assets. The Metaverse Marketplace Allows Users To Trade, Auction, And Rent Virtual Ownership Assets From Various Metaverse And Gaming Projects.','formula'));
		$formula_cta_button_text = get_theme_mod('formula_cta_button_text',__('Stake Nata ','formula'));
		$formula_cta_button_link = get_theme_mod('formula_cta_button_link','#');
		$homepage_callout_btn_link_target = get_theme_mod('homepage_callout_btn_link_target',false);
		
		$formula_cta_container_size = get_theme_mod('formula_cta_container_size', 'container');
	?>
	<!-- Callout Two Section -->
	<section id="cta-selector-scroll" class="callout-to-action">
		<div class="<?php echo esc_attr($formula_cta_container_size); ?>">
		<?php $formula_cta_background_image = get_theme_mod('formula_cta_background_image', awp_companion_plugin_url . 'inc/formula/img/callout/callout-bg.jpg'); ?>
			<style>
			.callout-to-action {   
				background: url("<?php echo $formula_cta_background_image; ?>") center center fixed;
			}
			</style>
			<div class="row">	
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">	
					<div class="callout-inner-txt">
						<h2 class="title"><?php echo $formula_cta_area_title; ?></h2>
						<p class="subtitle"><?php echo $formula_cta_area_des; ?></p>
					</div>
					
					<?php if($formula_cta_button_text!='') { ?>
						<div class="m-top-40">
							<a <?php if($formula_cta_button_link !='' ) { ?> href="<?php echo $formula_cta_button_link; ?>" 
								<?php if($homepage_callout_btn_link_target== true) { echo "target='_blank'"; } } ?> class="thm-btn">
								<?php echo $formula_cta_button_text; ?>
							</a>
						</div>
					<?php } ?>	
				</div>	
			</div>			
		</div>
	</section>
<?php endif; ?>	
<!-- End of Callout Two Section -->
<div class="clearfix"></div>