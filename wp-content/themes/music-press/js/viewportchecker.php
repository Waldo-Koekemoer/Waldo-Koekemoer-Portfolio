<?php if( ! defined( 'ABSPATH' ) ) exit;
	
	function music_press_animation_classes () { ?>
	<script>
		
		jQuery("body").ready(function() {
			
			
			jQuery('.lt-left').addClass("hidden").viewportChecker({
				classToAdd: 'animated fadeInLeft',
				offset: 0  
			}); 
			
			jQuery('.lt-right').addClass("hidden").viewportChecker({
				classToAdd: 'animated fadeInRight',
				offset: 0  
			}); 	
		});
		
		<?php if ( get_theme_mod('music_press_animation_content','zoomIn')) { ?>
			jQuery("body").ready(function() {
				jQuery('article').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo esc_html( get_theme_mod('music_press_animation_content','zoomIn') ); ?>', // Class to add to the elements when they are visible
					offset: 0  
				}); 
			});  
		<?php } ?>
			
	</script>
	<?php } 
	
	add_action('wp_footer', 'music_press_animation_classes');				   
	
	
