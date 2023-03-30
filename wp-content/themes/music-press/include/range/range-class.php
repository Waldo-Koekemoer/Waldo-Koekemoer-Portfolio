<?php if( ! defined( 'ABSPATH' ) ) exit;
	function music_press_customize_register_range( $wp_customize ) {
		class WP_Customize_Range_Control extends WP_Customize_Control {
			public $type = 'custom_range';
			public function enqueue () {
				wp_enqueue_script( 'music-press-range-js', get_template_directory_uri(). "/include/range/range.js", array('jquery'), false , true );
			}
			public function render_content() {
			?>			</label>
			
			<label>
				<?php if ( ! empty( $this->label )) : ?>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
				<?php endif; ?>
				<div id="value_<?php echo esc_html($this->id); ?>" class="custom-range-value"><?php echo esc_html($this->value()); ?> </div>
				<input id="input_<?php echo esc_html($this->id); ?>" class="customize-range" data-input-type="range" type="range" <?php esc_html($this->input_attrs()); ?> value="<?php echo esc_html($this->value()); ?>" <?php esc_url($this->link()); ?> />
				<?php if ( ! empty( $this->description )) : ?>
				<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
				<?php endif; ?>
				
				<?php
				}
			}		
	}
	add_action( 'customize_register', 'music_press_customize_register_range', 0 );
	
	
	/*********************************************************************************************************
		* Customizer Styles
	**********************************************************************************************************/
	function music_press_customize_range_styles( $input ) { ?>
	<style>
		.customize-range {
		width: 100%;
		}
		.custom-range-value {
		color: #50575e;
		font-family: Impact;
		font-size: 17px;
		}
		.dashicons-image-rotate {
		position:absolute;
		right: 10px;
		}
	</style>
	
	<?php }
	add_action( 'customize_controls_print_styles', 'music_press_customize_range_styles');
	
	
	

