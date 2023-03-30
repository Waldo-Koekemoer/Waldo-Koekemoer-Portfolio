<?php
$activate_theme_data = wp_get_theme(); // getting current theme data
$activate_theme      = $activate_theme_data->name;

if( 'Metaverse' == $activate_theme ) {
	$formula_funfact_disabled = get_theme_mod('formula_funfact_disabled', false);	
} else {
	$formula_funfact_disabled = get_theme_mod('formula_funfact_disabled', true);
}

if($formula_funfact_disabled == true):

$formula_funfact_container_size = get_theme_mod('formula_funfact_container_size', 'container-full');
?>
	<!-- funfact Section -->
	<section id="funfact-selector-scroll" class="funfact">
		<div class="funfact-shape"></div>
		<?php $formula_funfact_background = get_theme_mod('formula_funfact_background', awp_companion_plugin_url . 'inc/formula/img/funfact-shape.png'); ?>
		<style>
			<?php if($formula_funfact_background != "") { ?>
				.funfact-shape { 
					background: url("<?php echo $formula_funfact_background; ?>") center center fixed;
				}
			<?php } ?>
		</style>
		<div class="<?php echo esc_attr($formula_funfact_container_size); ?>">
			<div class="funfact-selector">
				<div class="row">
					<?php
					$formula_funfact_column_layout  = get_theme_mod( 'formula_funfact_column_layout','col-md-3');
					$formula_funfact_count  = get_theme_mod( 'formula_funfact_count', array('slider' => 4,'suffix' => '',));
					$formula_funfact_content  = get_theme_mod( 'formula_funfact_content');
					if ( ! empty( $formula_funfact_content ) ) {
						$allowed_html = array(
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'b'      => array(),
						'i'      => array(),
						);
						$formula_funfact_content = json_decode( $formula_funfact_content );
						
						$item = 0;
						foreach ( $formula_funfact_content as $features_item ) {
							
							if ($item <= $formula_funfact_count['slider'] - 1){
								$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'formula_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
								$title = ! empty( $features_item->title ) ? apply_filters( 'formula_translate_single_string', $features_item->title, 'Features section' ) : '';
								$text = ! empty( $features_item->text ) ? apply_filters( 'formula_translate_single_string', $features_item->text, 'Features section' ) : '';
								?>
								<div class="<?php echo esc_attr($formula_funfact_column_layout); ?>">	
									<div class="funfact-inner text-center">
										<?php if ( ! empty( $icon ) ) : //icon ?>
											<i class="fa <?php echo esc_html( $icon ); ?> funfact-icon"></i>
										<?php  endif; ?>	
										<?php if ( ! empty( $title ) ) : //title + Link ?>
											<h3 class="funfact-title odometer" data-count="<?php echo esc_html( $title ); ?>"><?php _e('00','formula'); ?></h3>
										<?php  endif; ?>
										<?php if ( ! empty( $text ) ) : //text ?>
											<p class="description"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
										<?php  endif; ?>
									</div>  
								</div><?php
								$item++;
							}
						} 
					} else { ?>
						<div class="col-lg-3 col-md-3 col-sm-6">	
							<div class="funfact-inner text-center">
								<i class="fa fa-hand-peace-o funfact-icon"></i>
								<h3 class="funfact-title odometer" data-count="100000">100000</h3>
								<p class="description"><?php _e('CLIENT TRUST','formula'); ?></p>
								
							</div>  
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">		
							<div class="funfact-inner text-center">
								<i class="fa fa-users funfact-icon"></i>						
								<h3 class="funfact-title odometer" data-count="150">150</h3>
								<p class="description"><?php _e('EXPERTS','formula'); ?></p>
							</div>  
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">		
							<div class="funfact-inner text-center">
								<i class="fa fa-street-view funfact-icon"></i>
								<h3 class="funfact-title odometer" data-count="15">15</h3>
								<p class="description"><?php _e('EXPERIENCE','formula'); ?></p>
							</div>  
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">			
							<div class="funfact-inner text-center">
								<i class="fa fa-trophy funfact-icon"></i>
								<h3 class="funfact-title odometer" data-count="120">120</h3>
								<p class="description"><?php _e('AWARDS','formula'); ?></p>
							</div>  
						</div>
					<?php } ?>	
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- /End of Funfact Section ---->	
<div class="clearfix"></div>