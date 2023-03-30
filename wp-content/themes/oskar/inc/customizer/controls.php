<?php
/**
 * Oskar Customizer Controls Classes
 *
 * @package Oskar
 */


if( class_exists('WP_Customize_Control') ):

class Oskar_Image_Radio_Control extends WP_Customize_Control {

	public function render_content() {

		if ( empty( $this->choices ) )
			return;

		$name = '_customize-radio-' . $this->id;

		?>
		<style>
			#oskar-img-container-<?php echo esc_attr( $this->id ); ?> .oskar-radio-img-img {
			border: 2px solid #f5f5f5;
			cursor: pointer;
			margin: 0 4px 4px 0;
			}
			#oskar-img-container-<?php echo esc_attr( $this->id ); ?> .oskar-radio-img-selected {
			border: 2px solid var(--oskar-highlight-color);
			margin: 0 4px 4px 0;
			}
			input[type=checkbox]:before {
			content: '';
			margin: -3px 0 0 -4px;
			}
		</style>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php if ( $this->description ) {
			echo '<span class="customize-control-description">' . esc_html( $this->description ) . '</span>';
		}
		?>
		<ul class="controls" id='oskar-img-container-<?php echo esc_attr( $this->id ); ?>'>
		<?php
		foreach ( $this->choices as $value => $label ) :
			$class = ($this->value() == $value)?'oskar-radio-img-selected oskar-radio-img-img':'oskar-radio-img-img';
			?>
			<li style="display: inline;">
				<label>
					<input <?php $this->link(); ?>style="display:none" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
					<img src="<?php echo esc_url( $label ); ?>" class="<?php echo esc_attr( $class ); ?>" />
				</label>
			</li>
			<?php
			endforeach;
		?>
		</ul>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.controls#oskar-img-container-<?php echo esc_attr( $this->id ); ?> li img').click(function(){
					$('.controls#oskar-img-container-<?php echo esc_attr( $this->id ); ?> li').each(function(){
						$(this).find('img').removeClass ('oskar-radio-img-selected') ;
				});
				$(this).addClass ('oskar-radio-img-selected') ;
				});
			});
		</script>
	<?php
	}
}


class Oskar_Icon_Choices extends WP_Customize_Control{
	public $type = 'icon';

	public function render_content(){
		$func_append = $this->description;
		?>
			<label>
				<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
				</span>

				<div class="selected-icon">
					<i class="<?php echo esc_attr($this->value()); ?>"></i>
					<span><i class="fa-solid fa-angle-down"></i></span>
				</div>

				<ul id="icon-box<?php echo esc_attr( $func_append ); ?>" class="icon-list">
				<form class="icon-search-input" action="#">
					<input id="input<?php echo esc_attr( $func_append ); ?>" class="" type="text" placeholder="<?php esc_attr_e( 'Search...', 'oskar' ); ?>">
				</form>
					<?php
					$fontawesome_array = oskar_fontawesome_array_all();

					foreach ( $fontawesome_array as $fontawesome_array_single => $single_keywords ) {
						$icon_class = $this->value() == $fontawesome_array_single ? 'icon-active' : '';
							if ( $fontawesome_array_single === 'not-a-real-icon' ) {
								$zero_icon = 'NONE';
								$b_class = ' class="visible"';
							} else {
								$zero_icon = str_replace('fa-', '', $fontawesome_array_single . ' ' . $single_keywords );
								$b_class = '';
							}
						echo '<li class="' . esc_attr( $icon_class ) . '"><i class="' . esc_attr( $fontawesome_array_single ) . '"></i><b' . $b_class . '>' . esc_html( $zero_icon ) . '</b></li>';
					}

					?>
				</ul>
				<input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />

<script>
(function ($) {
	$(function () {
		oskarListFilter($("#icon-box<?php echo esc_attr( $func_append ); ?>"), $("#input<?php echo esc_attr( $func_append ); ?>"));
	});
}(jQuery));
</script>

			</label>
		<?php
	}
}


class Oskar_Customize_Heading_Large extends WP_Customize_Control {
	public function render_content() {
		if ( !empty( $this->label ) ) : ?>
			<h3 class="oskar-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
		<?php endif; ?>
		<?php if ( !empty( $this->description ) ) : ?>
			<p class="oskar-accordion-section-paragraph-large"><?php echo esc_html( $this->description ); ?></p>
		<?php endif;
	}
}


class Oskar_Customize_Heading_Small extends WP_Customize_Control {
	public function render_content() {
		if ( !empty( $this->label ) ) : ?>
			<h5 class="oskar-accordion-section-title"><?php echo esc_html( $this->label ); ?></h5>
		<?php endif; ?>
		<?php if ( !empty( $this->description ) ) : ?>
			<p class="oskar-accordion-section-paragraph"><?php echo esc_html( $this->description ); ?></p>
		<?php endif;
	}
}


class Oskar_Customize_Label extends WP_Customize_Control {
	public function render_content() {
		if ( !empty( $this->label ) ) : ?>
			<label class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
		<?php endif; ?>
		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif;
	}
}


class Oskar_Customize_Helper_Text extends WP_Customize_Control {
	public function render_content() {
		if ( !empty( $this->description ) ) :
			echo wp_kses_post( $this->description );
		endif;
	}
}


class Oskar_Customize_Extra_Control extends WP_Customize_Control {
	public $settings = 'blogname';
	public $label = '';
	public $description = '';
	public $url = '';
	public $group = '';

	public function render_content() {
		switch ( $this->type ) {
			default:

			case 'extra':
				echo '<p style="margin-top:40px;">' . sprintf(
							'<a href="%1$s" target="_blank">%2$s</a>',
							esc_url( $this->url ),
							esc_html__( 'More options available', 'oskar' )
						) . '</p>';
				echo '<p class="description" style="margin-top:5px;">' . $this->description . '</p>';
				break;

			case 'button':
				echo sprintf(
							'<a href="%1$s" class="button-primary" target="_blank">%2$s</a>',
							esc_url( $this->url ),
							$this->label
						);
				break;
					
			case 'line' :
				echo '<hr />';
				break;
		}
	}
}


/**
 * Sortable multi check boxes custom control.
 * @since 0.1.0
 * @author David Chandra Purnama <david@genbu.me>
 * @copyright Copyright (c) 2015, Genbu Media
 * @license https://www.gnu.org/licenses/gpl-2.0.html
 */
class Oskar_Sortable_Checkboxes extends WP_Customize_Control {
	/**
	 * Control Type
	 */
	public $type = 'oskar-multicheck-sortable';
	/**
	 * Enqueue Scripts
	 */
	public function enqueue() {
		wp_enqueue_style( 'oskar-customize' );
		wp_enqueue_script( 'oskar-customize' );
	}
	/**
	 * Render Settings
	 */
	public function render_content() {
		/* if no choices, bail. */
		if ( empty( $this->choices ) ){
			return;
		} ?>

		<?php if ( !empty( $this->label ) ){ ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php } // add label if needed. ?>

		<?php if ( !empty( $this->description ) ){ ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php } // add desc if needed. ?>

		<?php
		/* Data */
		$values = explode( ',', $this->value() );
		$choices = $this->choices;
		/* If values exist, use it. */
		$options = array();
		if( $values ){
			/* get individual item */
			foreach( $values as $value ){
				/* separate item with option */
				$value = explode( ':', $value );
				/* build the array. remove options not listed on choices. */
				if ( array_key_exists( $value[0], $choices ) ){
					$options[$value[0]] = $value[1] ? '1' : '0'; 
				}
			}
		}
		/* if there's new options (not saved yet), add it in the end. */
		foreach( $choices as $key => $val ){
			/* if not exist, add it in the end. */
			if ( ! array_key_exists( $key, $options ) ){
				$options[$key] = '0'; // use zero to deactivate as default for new items.
			}
		}
		?>

		<ul class="oskar-multicheck-sortable-list">

			<?php foreach ( $options as $key => $value ){ ?>

				<li>
					<label>
						<input name="<?php echo esc_attr( $key ); ?>" class="oskar-multicheck-sortable-item" type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( $value ); ?> /> 
						<?php echo esc_html( $choices[$key] ); ?>
					</label>
					<i class="dashicons dashicons-move oskar-multicheck-sortable-handle"></i>
				</li>

			<?php } // end choices. ?>

				<li class="oskar-hideme">
					<input type="hidden" class="oskar-multicheck-sortable" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
				</li>

		</ul>


	<?php
	}
}


endif;
