<?php
$awpbusinesspress_funfact_disabled = get_theme_mod( 'awpbusinesspress_funfact_disabled', true );
if ( $awpbusinesspress_funfact_disabled == true ) :

	if ( 'Hospital Health Care' == $activate_theme ) {
		$funfact_bg_image = 'hh-bg';
	} else {
		$funfact_bg_image = 'home-bg';
	}
	$awpbusinesspress_funfact_background = get_theme_mod( 'awpbusinesspress_funfact_background', awp_companion_plugin_url . "/inc/awpbusinesspress/img/funfact/$funfact_bg_image.jpg" );

	$awpbusinesspress_funfact_container_size = get_theme_mod( 'awpbusinesspress_funfact_container_size', 'container-full' );

	// Section Background scheme.
	if ( 'Home Interior' == $activate_theme ) {
		$theme_scheme = 'theme-dark';
	} else {
		$theme_scheme = 'theme-light-white';
	}
	?>

	<!-- funfact Section -->
	<section id="funfact-selector-scroll" class="section funfact theme-default <?php echo esc_attr( $theme_scheme ); ?>" 
	style="background-image:url('<?php echo esc_url( $awpbusinesspress_funfact_background ); ?>'); ">

		<div class="<?php echo esc_attr( $awpbusinesspress_funfact_container_size ); ?> funfact-selector">

			<!-- index-funfact-1.php -->
				<div class="row theme-funfact-content wow animate fadeInUp" data-wow-delay=".3s">
					<?php
					$awpbusinesspress_funfact_content = get_theme_mod( 'awpbusinesspress_funfact_content' );
					if ( ! empty( $awpbusinesspress_funfact_content ) ) {
						$allowed_html                     = array(
							'br'     => array(),
							'em'     => array(),
							'strong' => array(),
							'b'      => array(),
							'i'      => array(),
						);
						$awpbusinesspress_funfact_content = json_decode( $awpbusinesspress_funfact_content );
						foreach ( $awpbusinesspress_funfact_content as $features_item ) {
							$icon  = ! empty( $features_item->icon_value ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
							$title = ! empty( $features_item->title ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->title, 'Features section' ) : '';
							$text  = ! empty( $features_item->text ) ? apply_filters( 'awpbusinesspress_translate_single_string', $features_item->text, 'Features section' ) : '';
							?>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="funfact-inner text-center">
									<?php if ( ! empty( $icon ) ) : // icon. ?>
										<i class="fa <?php echo esc_html( $icon ); ?> funfact-icon"></i>
									<?php endif; ?>	
									<?php if ( ! empty( $title ) ) : // title + Link. ?>
										<h3 class="funfact-title"><?php echo esc_html( $title ); ?></h3>
									<?php endif; ?>
									<?php if ( ! empty( $text ) ) : // text. ?>
										<p class="description"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
									<?php endif; ?>
								</div>  
							</div>
							<?php
						}
					} else {
						?>
						<div class="col-lg-4 col-md-4 col-sm-12">	
							<div class="funfact-inner text-center">
								<i class="fa fa-smile-o funfact-icon"></i>
								<h3 class="funfact-title"><?php _e( '1639', 'awpbusinesspress' ); ?></h3>
								<p class="description"><?php _e( 'HAPPY CUSTOMER', 'wpbusinesspress' ); ?></p>

							</div>  
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">		
							<div class="funfact-inner text-center">
								<i class="fa fa-suitcase funfact-icon"></i>						
								<h3 class="funfact-title"><?php _e( '1650', 'awpbusinesspress' ); ?></h3>
								<p class="description"><?php _e( 'COMPLETE PROJECTS', 'wpbusinesspress' ); ?></p>
							</div>  
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12">		
							<div class="funfact-inner text-center">
								<i class="fa fa-line-chart funfact-icon"></i>
								<h3 class="funfact-title"><?php _e( '750', 'awpbusinesspress' ); ?></h3>
								<p class="description"><?php _e( 'WORKING DAYS', 'wpbusinesspress' ); ?></p>
							</div>  
						</div>
					<?php } ?>	
				</div>
		</div>
	</section>
<?php endif; ?>
<!-- /End of Funfact Section ---->	
<div class="clearfix"></div>
