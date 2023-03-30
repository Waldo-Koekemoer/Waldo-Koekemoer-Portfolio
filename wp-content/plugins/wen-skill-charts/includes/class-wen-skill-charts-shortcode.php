<?php
/**
 * The file that defines shortcode
 *
 * @link       https://wenthemes.com
 * @since      1.0.0
 *
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/includes
 */

/**
 * Shortcode class.
 *
 * This class contains shortcode stuff.
 *
 * @since      1.0.0
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/includes
 * @author     WEN Themes <info@wenthemes.com>
 */
class WEN_Skill_Charts_Shortcode {

  /**
   * Initialize.
   *
   * @since    1.0.0
   */
  public function init() {

    add_shortcode( 'wsc', array( $this, 'wen_skill_charts_shortcode_callback' ) );

  }

  /**
   * Check if skill is valid.
   *
   * @since    1.0.0
   */
  private function check_if_valid_skill( $args ){

    $output = false;
    if ( isset($args['id']) && intval( $args['id'] ) > 0  ) {

      $slider = get_post(intval($args['id']));

      if ( ! empty( $slider ) && WEN_SKILL_CHARTS_POST_TYPE_SKILL == $slider->post_type ) {
        $output = true;
      }
    }
    return $output;

  }

  /**
   * Shortcode callback.
   *
   * @since    1.0.0
   */
  function wen_skill_charts_shortcode_callback( $atts, $content = "" ){

    $atts = shortcode_atts( array(
        'id' => '',
    ), $atts, 'wsc' );

    $atts['id'] = absint($atts['id']);

    $is_valid_skill = $this->check_if_valid_skill($atts);

    if ( ! $is_valid_skill ) {
      return __( 'Skill not found', 'wen-skill-charts' );
    }
    ob_start();
    ?>
    <?php
      $skills = get_post_meta( $atts['id'], '_wsc_skills', true );
     ?>
     <?php if ( ! empty( $skills ) ): ?>

      <?php
       // Get skill settings
       $skill_settings = get_post_meta( $atts['id'], 'wen_skill_charts_settings', true );

       // Get default skill settings
       $plugin_common = new WEN_Skill_Charts_Common();
       $defaults = $plugin_common->get_default_skill_settings();

       // Merge with defaults
       $skill_settings = array_merge( $defaults, $skill_settings );

       // Add random key
       $skill_settings['random_id'] = uniqid(esc_attr($atts['id']).'-');
       ?>
        <div class="wen-skill-charts-wrap">
          <?php
          $method_name = 'render_skill_' .  $skill_settings['chart_type'];
          $output = call_user_func_array(array( $this, $method_name), array( $skills, $skill_settings ) );
          echo $output;
          ?>
        </div> <!-- .wsc-skill -->
     <?php endif ?>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;

  }

  /**
   * Render skill circle.
   *
   * @since    1.0.0
   */
  function render_skill_circle( $skills, $skill_settings ){

    if ( empty( $skills ) ) {
      return;
    }
    ob_start();
    ?>

    <div class="wen-skill-circle" id="<?php echo esc_attr( 'wsc-'.$skill_settings['random_id'] ); ?>">
      <?php foreach ( $skills as $key => $skill ): ?>
        <?php
          $color = empty( $skill['color'] ) ? $skill_settings['default_color'] : $skill['color'];
        ?>
        <div class="skill-wrap">
          <?php if ( 'top' == $skill_settings['title_position'] ): ?>
          <div class="skill-title"><?php echo esc_html( $skill['title'] ); ?></div>
          <?php endif ?>
          <?php if ( 'top' == $skill_settings['description_position'] ): ?>
          <div class="skill-description"><?php echo esc_html( $skill['description'] ); ?></div>
          <?php endif ?>
          <div class="skill-circle-wrap" data-percent="<?php echo esc_attr( $skill['percentage'] ); ?>" data-barcolor="<?php echo esc_attr( $color ); ?>">
            <?php if ( 'disable' != $skill_settings['percentage_position'] ): ?>
              <span class="skill-percentage" style="color:<?php echo esc_attr( $skill_settings['percentage_color'] ); ?>;"></span>
            <?php endif ?>
          </div>
          <?php if ( 'bottom' == $skill_settings['title_position'] ): ?>
          <div class="skill-title"><?php echo esc_html( $skill['title'] ); ?></div>
          <?php endif ?>
          <?php if ( 'bottom' == $skill_settings['description_position'] ): ?>
          <div class="skill-description"><?php echo esc_html( $skill['description'] ); ?></div>
          <?php endif ?>

        </div>
      <?php endforeach ?>
    </div><!-- .wen-skill-bar -->
    <script>
      jQuery(document).ready(function($){
        $('#<?php echo esc_attr( 'wsc-'.$skill_settings['random_id'] ); ?>').appear();
        $(document.body).on('appear', '#<?php echo esc_attr( 'wsc-'.$skill_settings['random_id'] ); ?>', function(e, affected) {
          $( '.skill-circle-wrap', '#<?php echo esc_attr( 'wsc-'.$skill_settings['random_id'] ); ?>' ).each(function(i, elem ){
            $(this).easyPieChart({
              easing: 'easeOutBounce',
              lineWidth: '<?php echo $skill_settings['circle_width'];?>',
              animate: 1500,
              scaleColor: false,
              trackWidth:'<?php echo esc_attr($skill_settings['track_width']);?>',
              size: '<?php echo esc_attr($skill_settings['circle_size']);?>',
              lineCap: '<?php echo esc_attr($skill_settings['cap_type']);?>',
              trackColor: '<?php echo esc_attr($skill_settings['track_color']);?>',
              barColor: $(this).data('barcolor'),
              onStep: function(from, to, percent) {
                $(this.el).find('.skill-percentage').text(Math.round(percent));
              },
              onStart: function(from, to) {
                $(this.el).find('.skill-percentage').fadeIn();
              }
            });
          });
        }); //end appear
      });
    </script>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;

  }

  /**
   * Render skill bar.
   *
   * @since    1.0.0
   */
  function render_skill_bar( $skills, $skill_settings ){

    if ( empty( $skills ) ) {
      return;
    }
    ob_start();
    ?>
    <div class="wen-skill-bar" id="<?php echo esc_attr( 'wsc-'.$skill_settings['random_id'] ); ?>">
      <?php foreach ( $skills as $key => $skill ): ?>
        <?php
          $color = empty( $skill['color'] ) ? $skill_settings['default_color'] : $skill['color'];
        ?>
        <div class="skill-wrap">
          <?php if ( 'top' == $skill_settings['title_position'] ): ?>
          <div class="skill-title"><?php echo esc_html( $skill['title'] ); ?></div>
          <?php endif ?>
          <?php if ( 'top' == $skill_settings['description_position'] ): ?>
          <div class="skill-description"><?php echo esc_html( $skill['description'] ); ?></div>
          <?php endif ?>
          <div class="skill-bar-wrap clearfix " style=" height:<?php echo esc_attr($skill_settings['bar_height']);?>px; background: <?php echo esc_attr( esc_attr($skill_settings['bar_track_color'])); ?>" data-percent="<?php echo esc_attr( $skill['percentage'] . '%' ); ?>">
            <div class="skill-bar" style="background: <?php echo esc_attr( $color ); ?>;  height:<?php echo esc_attr($skill_settings['bar_height']);?>px;">

            <?php if ( 'disable' != $skill_settings['percentage_position'] ): ?>
            <div class="skill-percentage skill-percentage-position-<?php echo esc_attr( $skill_settings['percentage_position'] ); ?>" style="color:<?php echo esc_attr( $skill_settings['percentage_color'] ); ?>;"><?php echo esc_attr( $skill['percentage'] ); ?></div></div>
            <?php endif ?>
          </div>
          <?php if ( 'bottom' == $skill_settings['title_position'] ): ?>
          <div class="skill-title"><?php echo esc_html( $skill['title'] ); ?></div>
          <?php endif ?>
          <?php if ( 'bottom' == $skill_settings['description_position'] ): ?>
          <div class="skill-description"><?php echo esc_html( $skill['description'] ); ?></div>
          <?php endif ?>

        </div>
      <?php endforeach ?>
    </div><!-- .wen-skill-bar -->
    <script>
      jQuery(document).ready(function($){
        $('#<?php echo esc_attr( 'wsc-'.$skill_settings['random_id'] ); ?>').appear();
        $(document.body).on('appear', '#<?php echo esc_attr( 'wsc-'.$skill_settings['random_id'] ); ?>', function(e, affected) {
          wen_skill_bar_animate(this);
        });
      });
    </script>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;

  }

}
