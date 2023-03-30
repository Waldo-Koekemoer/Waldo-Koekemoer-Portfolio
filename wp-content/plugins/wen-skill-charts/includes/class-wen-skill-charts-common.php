<?php

/**
 * The file that defines common tasks
 *
 * @link       https://wenthemes.com
 * @since      1.0.0
 *
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/includes
 */

/**
 * Common class.
 *
 * This class contains common stuff.
 *
 * @since      1.0.0
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/includes
 * @author     WEN Themes <info@wenthemes.com>
 */
class WEN_Skill_Charts_Common {

  /**
   * Get skill default settings.
   *
   * @since    1.0.0
   */
  public function get_default_skill_settings() {

    $default_settings = array(
      'circle_size'          => '150',
      'circle_width'         => '10',
      'track_width'          => '10',
      'bar_height'           => '35',
      'default_color'        => '#0000ff',
      'track_color'          => '#EEEEEE',
      'bar_track_color'      => '#EEEEEE',
      'chart_type'           => 'bar',
      'cap_type'             => 'square',
      'title_position'       => 'top',
      'description_position' => 'disable',
      'percentage_position'  => 'right',
      'percentage_color'     => '#111111',
    );
    $default_settings = apply_filters( 'wen_skill_charts_default_skill_settings', $default_settings );
    return $default_settings;

  }

  /**
   * Get skill type options.
   *
   * @since    1.0.0
   */
  public function get_skill_type_options() {

    $options = array(
      'bar'    => __( 'Bar', 'wen-skill-charts' ),
      'circle' => __( 'Circle', 'wen-skill-charts' ),
    );
    $options = apply_filters( 'wen_skill_charts_skill_type_options', $options );
    return $options;

  }


  /**
   * Get arc shape type options.
   *
   * @since    1.0.0
   */
  public function get_cap_type_options() {

    $options = array(
      'round'    => __( 'Round', 'wen-skill-charts' ),
      'Square' => __( 'Square', 'wen-skill-charts' ),
    );
    $options = apply_filters( 'wen_skill_cap_type_options', $options );
    return $options;

  }


  /**
   * Get text position options.
   *
   * @since    1.0.0
   */
  public function get_text_position_options( $add_disable = true ) {

    $options = array(
      'bottom' => __( 'Bottom', 'wen-skill-charts' ),
      'top'    => __( 'Top', 'wen-skill-charts' ),
    );
    if ( true === $add_disable ) {
      $options = array_merge( array(
        'disable' => __( 'Disable', 'wen-skill-charts' ),
      ), $options );
    }
    $options = apply_filters( 'wen_skill_charts_text_position_options', $options );
    return $options;

  }

  /**
   * Get percentage position options.
   *
   * @since    1.0.0
   */
  public function get_percentage_position_options( $add_disable = true ) {

    $options = array(
      'left'   => __( 'Left', 'wen-skill-charts' ),
      'middle' => __( 'Middle', 'wen-skill-charts' ),
      'right'  => __( 'Right', 'wen-skill-charts' ),
    );
    if ( true === $add_disable ) {
      $options = array_merge( array(
        'disable' => __( 'Disable', 'wen-skill-charts' ),
      ), $options );
    }
    $options = apply_filters( 'wen_skill_charts_percentage_position_options', $options );
    return $options;

  }

}
