<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       https://wenthemes.com
 * @since      1.0.0
 *
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/admin
 * @author     WEN Themes <info@wenthemes.com>
 */
class WEN_Skill_Charts_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

    $screen = get_current_screen();
    if ( WEN_SKILL_CHARTS_POST_TYPE_SKILL == $screen->id ) {
  		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wen-skill-charts-admin.css', array(), $this->version, 'all' );
    }

	}

  /**
   * Register the JavaScript for the dashboard.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {

    $screen = get_current_screen();
    if ( WEN_SKILL_CHARTS_POST_TYPE_SKILL == $screen->id ) {

      wp_enqueue_style( 'wp-color-picker' );
      wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wen-skill-charts-admin.js', array( 'jquery', 'wp-color-picker', 'jquery-ui-core', 'jquery-ui-sortable' ), $this->version, false );
      wp_enqueue_script( $this->plugin_name.'-custom', plugin_dir_url( __FILE__ ) . 'js/wen-skill-charts-custom.js', array( 'jquery'), $this->version, false);
      wp_enqueue_script( 'wsc-tab', plugin_dir_url( __FILE__ ) . 'js/wen-skill-charts-tab.js', array( 'jquery'), false);
      wp_enqueue_script( $this->plugin_name.'wsc-validate-form', plugin_dir_url( __FILE__ ) . 'js/wen-skill-charts-form.js', array( 'jquery'), $this->version, false);

      $extra_array = array(
        'lang' => array(
          'are_you_sure'             => __( 'Are you sure?', 'wen-skill-charts' ),
          'title'                    => __( 'Title', 'wen-skill-charts' ),
          'enter_title'              => __( 'Enter Title', 'wen-skill-charts' ),
          'description'              => __( 'Description', 'wen-skill-charts' ),
          'enter_description'        => __( 'Enter Description', 'wen-skill-charts' ),
          'percentage'               => __( 'Percentage', 'wen-skill-charts' ),
          'enter_percentage'         => __( 'Enter Percentage', 'wen-skill-charts' ),
          'enter_percentage_without' => __( 'Enter Percentage without % sign', 'wen-skill-charts' ),
          'remove'                   => __( 'Remove', 'wen-skill-charts' ),
          'if_no_color'              => __( 'If not selected, Default Color will be used.', 'wen-skill-charts' ),
        ),
      );
      wp_localize_script( $this->plugin_name, 'WSC_OBJ', $extra_array );
      wp_enqueue_script( $this->plugin_name );

    }

  } //end function

function add_admin_form_scripts( $hook ) {

    global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'wen_skill' === $post->post_type ) {


        }
    }
}


 /**
   * Get percentage position options.
   *
   * @since    1.0.0
   */
  public function get_transitions_options( $add_disable = true ) {

    $options = array(
      'left'   => __( 'Fade', 'wen-skill-charts', 'wen-skill-charts' ),
      'middle' => __( 'Flip', 'wen-skill-charts', 'wen-skill-charts' ),
      'right'  => __( 'Slide', 'wen-skill-charts', 'wen-skill-charts' ),
    );
    $options = apply_filters( 'ws_image_slider_transitions_options', $options );
    return $options;

  }



  /**
   * Extra column content in admin listing.
   *
   * @since    1.0.0
   */
  function customize_column_content( $column_name, $post_id ){

    switch ( $column_name ) {
      case 'id':
        echo $post_id;
        break;

      case 'usage':
        echo '<code>[wsc id="' . $post_id . '"]</code>';
        break;

      case 'skills':
        $skills = get_post_meta( $post_id, '_wsc_skills', true );
        echo $count = ( empty( $skills ) ) ? 0 : count( $skills ) ;
        break;

      default:
        break;
    }

  }

  /**
   * Add plugin meta boxes.
   *
   * @since    1.0.0
   */
  function add_skill_meta_boxes(){

    $screens = array( WEN_SKILL_CHARTS_POST_TYPE_SKILL );

    foreach ( $screens as $screen ) {

      add_meta_box(
        'wen_skill_charts_content_skills',
        __( 'Skills', 'wen-skill-charts' ),
        array($this,'skills_meta_box_callback'),
        $screen,
        'normal',
        'low'
      );
      add_meta_box(
        'wen_skill_charts_settings_metabox',
        __( 'Skill Settings', 'wen-skill-charts' ),
        array($this,'settings_meta_box_callback'),
        $screen,
        'side',
        'low'
      );
      add_meta_box(
        'wen_skill_charts_usage_metabox',
        __( 'Usage', 'wen-skill-charts' ),
        array( $this, 'usage_meta_box_callback' ),
        $screen,
        'side',
        'low'
      );


    }

  }

  /**
   * Skills meta box callback.
   *
   * @since    1.0.0
   */
  function skills_meta_box_callback( $post ){
    ?>
    <?php wp_nonce_field( plugin_basename( __FILE__ ), 'wen_skill_charts_skills_nonce' ); ?>
    <div class="wsc-skill-note"><span><?php _e( 'Note:', 'wen-skill-charts' ); ?></span><?php _e( 'Title and Percentage fields are required.', 'wen-skill-charts' ); ?></div><!-- .wsc-skill-note -->
    <div id="main-skills-list-wrap">

      <?php
        $skills = get_post_meta( $post->ID, '_wsc_skills', true ) ;
      ?>
      <?php if ( ! empty( $skills ) ): ?>

        <?php foreach ( $skills as $key => $skill ): ?>
          <div class="skill-item-wrap">
            <input type="button" class="button btn-remove-skill-item"/>
            <div class="wsc-form-row">
              <label><?php _e( 'Title', 'wen-skill-charts' ); ?><span class="required">*</span></label>
              <input type="text" name="skill_title[]" value="<?php echo esc_attr( $skill['title'] ); ?>" placeholder="<?php _e( 'Enter Title', 'wen-skill-charts' ); ?>" class="txt-skill-title regular-text code" required />
              <span class="description"><?php _e( 'Enter Title', 'wen-skill-charts' ); ?></span>
            </div><!-- .wsc-form-row -->

            <div class="wsc-form-row">
              <label><?php _e( 'Description', 'wen-skill-charts' ); ?></label>
              <input type="text" name="skill_description[]" value="<?php echo esc_attr( $skill['description'] ); ?>" placeholder="<?php _e( 'Enter Description', 'wen-skill-charts' ); ?>" class="txt-skill-description regular-text code" />
              <span class="description"><?php _e( 'Enter Description', 'wen-skill-charts' ); ?></span>
            </div><!-- .wsc-form-row -->

            <div class="wsc-form-row">
              <label><?php _e( 'Percentage', 'wen-skill-charts' ); ?><span class="required">*</span></label>
              <input type="number" name="skill_percentage[]" value="<?php echo esc_attr( $skill['percentage'] ); ?>" placeholder="<?php _e( 'Enter Percentage', 'wen-skill-charts' ); ?>" class="txt-skill-percentage regular-text code" min="1" required />
              <span class="description"><?php _e( 'Enter Percentage without % sign', 'wen-skill-charts' ); ?></span>
            </div><!-- .wsc-form-row -->

            <div class="wsc-form-row wsc-color-row">
              <label><?php _e( 'Color', 'wen-skill-charts' ); ?></label>
              <input type="text" name="skill_color[]" value="<?php echo esc_attr( $skill['color'] ); ?>" class="txt-skill-color wsc-color-field" /><span class="description"><?php _e( 'If not selected, Default Color will be used.', 'wen-skill-charts' ); ?></span>
            </div><!-- .wsc-form-row -->



          </div><!-- .skill-item-wrap -->

        <?php endforeach ?>

      <?php endif ?>

    </div><!-- #main-skills-list-wrap -->
    <p><input type="button" value="<?php  esc_attr( _e( 'Add New Skill', 'wen-skill-charts' ) ); ?>" class="button button-primary btn-add-skill-item" /></p>

    <?php

  }

  /**
   * Settings meta box callback.
   *
   * @since    1.0.0
   */
  function settings_meta_box_callback( $post ){

    $wsc_settings = get_post_meta( $post->ID, 'wen_skill_charts_settings', true );

    if ( empty( $wsc_settings ) ) {
      $wsc_settings = array();
    }

    $plugin_common = new WEN_Skill_Charts_Common();
    $defaults = $plugin_common->get_default_skill_settings();
    $settings_args = array_merge( $defaults, $wsc_settings );

    ?>
    <?php wp_nonce_field( plugin_basename( __FILE__ ), 'wen_skill_charts_settings_nonce' ); ?>

    <h4><?php _e( 'Chart', 'wen-skill-charts' ); ?></h4>
    <p><label><?php _e( 'Type', 'wen-skill-charts' ); ?></label>
      <select id="chart-type" name="wen_skill_charts_settings[chart_type]">
        <?php
          $chart_options = $plugin_common->get_skill_type_options();
        ?>
        <?php if ( ! empty( $chart_options ) ): ?>
          <?php foreach ( $chart_options as $key => $type ): ?>
            <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $settings_args['chart_type'], $key ); ?> ><?php echo esc_html( $type ); ?></option>
          <?php endforeach ?>
        <?php endif ?>
      </select>
    </p>

    <div class="circle-section">
    <h4><?php _e( 'Circle Chart Options', 'wen-skill-charts' ); ?></h4>
    <p><label><?php _e( 'Circle size', 'wen-skill-charts' ); ?>
      <input type="number" min="150" max="200" step="25" name="wen_skill_charts_settings[circle_size]" id="circle-size" value="<?php echo esc_attr( $settings_args['circle_size'] ); ?>" class="wsc-circle-size" data-default-color="<?php echo esc_attr( $defaults['circle_size'] ); ?>" required /></label>
    <em style="clear:both; display:block;"><?php _e( 'Please put the circle size without px.', 'wen-skill-charts' ); ?></em>
    </p>

    <p><label><?php _e( 'Circle width', 'wen-skill-charts' ); ?>
      <input type="number" min="5" max="50" step="5" name="wen_skill_charts_settings[circle_width]" id="circle-width"  value="<?php echo esc_attr( $settings_args['circle_width'] ); ?>" class="wsc-circle-width" data-default-color="<?php echo esc_attr( $defaults['circle_width'] ); ?>" required /></label>
    <em style="clear:both; display:block;"><?php _e( 'Please put the circle width without px.', 'wen-skill-charts' ); ?></em>
    </p>

    <p><label><?php _e( 'Track width', 'wen-skill-charts' ); ?>
      <input type="number" min="5" max="50" step="5" name="wen_skill_charts_settings[track_width]" id="track-width" value="<?php echo esc_attr( $settings_args['track_width'] ); ?>" class="wsc-track-width" data-default-color="<?php echo esc_attr( $defaults['track_width'] ); ?>" required /></label>
    <em style="clear:both; display:block;"><?php _e( 'Please put the track width without px.', 'wen-skill-charts' ); ?></em>
    </p>

    <p><label><?php _e( 'Arc-cap style', 'wen-skill-charts' ); ?></label>
      <select name="wen_skill_charts_settings[cap_type]">
        <?php
          $cap_options = $plugin_common->get_cap_type_options();
        ?>
        <?php if ( ! empty( $cap_options ) ): ?>
          <?php foreach ( $cap_options as $key => $type ): ?>
            <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $settings_args['cap_type'], $key ); ?> ><?php echo esc_html( $type ); ?></option>
          <?php endforeach ?>
        <?php endif ?>
      </select>
    </p>

    <p><label><?php _e( 'Track color', 'wen-skill-charts' ); ?></label>
      <input type="text" name="wen_skill_charts_settings[track_color]" value="<?php echo esc_attr( $settings_args['track_color'] ); ?>" class="wsc-color-field" data-default-color="<?php echo esc_attr( $defaults['track_color'] ); ?>" />
    </p>
    </div>

<div class="bar-section">
<h4><?php _e( 'Bar Chart Options', 'wen-skill-charts' ); ?></h4>
<p><label><?php _e( 'Bar height', 'wen-skill-charts' ); ?>
      <input type="number" min="25" max="100" step="5" name="wen_skill_charts_settings[bar_height]" id="bar_height" value="<?php echo esc_attr( $settings_args['bar_height'] ); ?>" class="wsc-bar-height" data-default-color="<?php echo esc_attr( $defaults['bar_height'] ); ?>" /></label>
    <em style="clear:both; display:block;"><?php _e( 'Please put the bar height without px.', 'wen-skill-charts' ); ?></em>
    </p>
    <p><label><?php _e( 'Bar Track color', 'wen-skill-charts' ); ?></label>
      <input type="text" name="wen_skill_charts_settings[bar_track_color]" value="<?php echo esc_attr( $settings_args['bar_track_color'] ); ?>" class="wsc-color-field" data-default-color="<?php echo esc_attr( $defaults['bar_track_color'] ); ?>" />
    </p>
</div>

    <h4><?php _e( 'Color', 'wen-skill-charts' ); ?></h4>
    <p><label><?php _e( 'Default', 'wen-skill-charts' ); ?></label>
      <input type="text" name="wen_skill_charts_settings[default_color]" value="<?php echo esc_attr( $settings_args['default_color'] ); ?>" class="wsc-color-field" data-default-color="<?php echo esc_attr( $defaults['default_color'] ); ?>" />
    </p>

    <p><label><?php _e( 'Percentage', 'wen-skill-charts' ); ?></label>
      <input type="text" name="wen_skill_charts_settings[percentage_color]" value="<?php echo esc_attr( $settings_args['percentage_color'] ); ?>" class="wsc-color-field" data-default-color="<?php echo esc_attr( $defaults['percentage_color'] ); ?>" />
    </p>


    <h4><?php _e( 'Position', 'wen-skill-charts' ); ?></h4>
    <p><label><?php _e( 'Title', 'wen-skill-charts' ); ?></label>
      <select name="wen_skill_charts_settings[title_position]">
        <?php
          $title_position_options = $plugin_common->get_text_position_options();
        ?>
        <?php if ( ! empty( $title_position_options ) ): ?>
          <?php foreach ( $title_position_options as $key => $type ): ?>
            <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $settings_args['title_position'], $key ); ?> ><?php echo esc_html( $type ); ?></option>
          <?php endforeach ?>
        <?php endif ?>
      </select>
    </p>

    <p><label><?php _e( 'Description', 'wen-skill-charts' ); ?></label>
      <select name="wen_skill_charts_settings[description_position]">
        <?php
          $description_position_options = $plugin_common->get_text_position_options();
        ?>
        <?php if ( ! empty( $description_position_options ) ): ?>
          <?php foreach ( $description_position_options as $key => $type ): ?>
            <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $settings_args['description_position'], $key ); ?> ><?php echo esc_html( $type ); ?></option>
          <?php endforeach ?>
        <?php endif ?>
      </select>
    </p>

    <p><label><?php _e( 'Percentage', 'wen-skill-charts' ); ?></label>
      <select name="wen_skill_charts_settings[percentage_position]">
        <?php
          $percentage_position_options = $plugin_common->get_percentage_position_options();
        ?>
        <?php if ( ! empty( $percentage_position_options ) ): ?>
          <?php foreach ( $percentage_position_options as $key => $type ): ?>
            <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $settings_args['percentage_position'], $key ); ?> ><?php echo esc_html( $type ); ?></option>
          <?php endforeach ?>
        <?php endif ?>
      </select>
      <em style="clear:both; display:block;"><?php _e( 'Left and Right is applied for Bar Chart only', 'wen-skill-charts' ); ?></em>
    </p>
    <?php

  }

  /**
   * Save setting meta box.
   *
   * @since    1.0.0
   */
  function save_settings_meta_box( $post_id ){

    if ( WEN_SKILL_CHARTS_POST_TYPE_SKILL != get_post_type( $post_id ) ) {
      return $post_id;
    }

    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if ( !isset( $_POST['wen_skill_charts_settings_nonce'] ) || !wp_verify_nonce( $_POST['wen_skill_charts_settings_nonce'], plugin_basename( __FILE__ ) ) )
        return $post_id;

    // if our current user can't edit this post, bail
    if( ! current_user_can( 'edit_post' , $post_id ) )
      return $post_id;

    $refined_settings = array();
    if ( ! empty( $_POST['wen_skill_charts_settings'] ) ) {
      foreach ( $_POST['wen_skill_charts_settings'] as $key => $value) {
        $refined_settings[$key] = esc_attr($value);
        switch ( $key ) {
          case 'slider_delay':
            if( intval($value) < 1 ) {
              $refined_settings[$key] = 4;
            }
            break;
          case 'transition_time':
            if( intval($value) < 1 ) {
              $refined_settings[$key] = 1;
            }
            break;
          case 'images_per_slide':
            if( intval($value) < 1 || intval($value) > 9  ) {
              $refined_settings[$key] = 5;
            }
            break;

          default:
            # code...
            break;
        }
      }
    }
    if ( ! empty( $refined_settings ) ) {
      update_post_meta( $post_id, 'wen_skill_charts_settings', $refined_settings );
    }

  }


  /**
   * Usage meta box callback.
   *
   * @since    1.0.0
   */
  function usage_meta_box_callback( $post ){

    ?>
    <h4><?php _e( 'Shortcode', 'wen-skill-charts' ); ?></h4>
    <p><?php _e( 'Copy and paste this shortcode directly into any WordPress post or page.', 'wen-skill-charts' ); ?></p>
    <textarea class="large-text code" readonly="readonly"><?php echo '[wsc id="'.$post->ID.'"]'; ?></textarea>

    <h4><?php _e( 'Template Include', 'wen-skill-charts' ); ?></h4>
    <p><?php _e( 'Copy and paste this code into a template file to include the slider within your theme.', 'wen-skill-charts' ); ?></p>
    <textarea class="large-text code" readonly="readonly">&lt;?php echo do_shortcode("[wsc id='<?php echo $post->ID; ?>']"); ?&gt;</textarea>
    <?php

  }

  /**
   * Extra column head in admin listing.
   *
   * @since    1.0.0
   */
  function customize_column_head( $columns ){

    $new_columns['cb']     = '<input type="checkbox" />';
    $new_columns['title']  = $columns['title'];
    $new_columns['id']     = _x( 'ID', 'column name', 'wen-skill-charts' );
    $new_columns['skills'] = _x( 'Skills', 'column name', 'wen-skill-charts' );
    $new_columns['usage']  = __( 'Usage', 'wen-skill-charts' );
    $new_columns['date']   = $columns['date'];
    return $new_columns;

  }

  /**
   * Hide publishing actions in admin page.
   *
   * @since    1.0.0
   */
  function hide_publishing_actions() {
    global $post;
    if ( WEN_SKILL_CHARTS_POST_TYPE_SKILL != $post->post_type ) {
      return;
    }
    ?>
    <style type="text/css">
    #misc-publishing-actions,#minor-publishing-actions{
      display:none;
    }
    </style>
    <?php
    return;
  }

  /**
   * Save skills info.
   *
   * @since    1.0.0
   */
  function save_skills_meta_box( $post_id ){

    if ( WEN_SKILL_CHARTS_POST_TYPE_SKILL != get_post_type( $post_id ) ) {
      return $post_id;
    }

    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if ( ! isset( $_POST['wen_skill_charts_skills_nonce'] ) || !wp_verify_nonce( $_POST['wen_skill_charts_skills_nonce'], plugin_basename( __FILE__ ) ) )
        return $post_id;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' , $post_id ) )
      return $post_id;

    $skill_title_array = array();
    if ( isset( $_POST['skill_title'] ) ) {

      $skill_title_array = $_POST['skill_title'];

    }
    if ( empty( $skill_title_array ) ) {
      delete_post_meta( $post_id, '_wsc_skills' );
      return;
    }
    $skills_array = array();
    $cnt = 0;
    foreach ( $skill_title_array as $key => $title ) {

      if ( empty( $title ) || ( absint( $_POST['skill_percentage'][$key] ) ) < 1 ) {
        continue;
      }
      $skills_array[$cnt]['title']       = sanitize_text_field( $title );
      $skills_array[$cnt]['description'] = sanitize_text_field( $_POST['skill_description'][$key] );
      $skills_array[$cnt]['percentage'] = sanitize_text_field( $_POST['skill_percentage'][$key] );
      $skills_array[$cnt]['color']       = sanitize_text_field( $_POST['skill_color'][$key] );
      $cnt++;

    } //end foreach
    if ( ! empty( $skills_array ) ) {
      update_post_meta( $post_id, '_wsc_skills', $skills_array );
    }
    else{
      delete_post_meta( $post_id, '_wsc_skills' );
    }

  }

  /**
   * Update messages in admin side.
   *
   * @since    1.0.0
   */
  function updated_messages( $messages ){

    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages[WEN_SKILL_CHARTS_POST_TYPE_SKILL] = array(
      0  => '', // Unused. Messages start at index 1.
      1  => __( 'Skill updated.', 'wen-skill-charts' ),
      2  => __( 'Custom field updated.', 'wen-skill-charts' ),
      3  => __( 'Custom field deleted.', 'wen-skill-charts' ),
      4  => __( 'Skill updated.', 'wen-skill-charts' ),
      /* translators: %s: date and time of the revision */
      5  => isset( $_GET['revision'] ) ? sprintf( __( 'Skill restored to revision from %s', 'wen-skill-charts' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6  => __( 'Skill created.', 'wen-skill-charts' ),
      7  => __( 'Skill saved.', 'wen-skill-charts' ),
      8  => __( 'Skill submitted.', 'wen-skill-charts' ),
      9  => sprintf(
        __( 'Skill scheduled for: <strong>%1$s</strong>.', 'wen-skill-charts' ),
        // translators: Publish box date format, see http://php.net/date
        date_i18n( __( 'M j, Y @ G:i', 'wen-skill-charts' ), strtotime( $post->post_date ) )
      ),
      10 => __( 'Skill draft updated.', 'wen-skill-charts' )
    );

    return $messages;

  }

  /**
   * Customize row actions.
   *
   * @since    1.0.0
   */
  function customize_row_actions( $actions, $post ){

    if ( WEN_SKILL_CHARTS_POST_TYPE_SKILL == $post->post_type ) {

      unset( $actions['inline hide-if-no-js'] );

    }

    return $actions;

  }

  /**
   * HTML template for adding new skill item.
   *
   * @since    1.0.0
   */
  function html_templates(){
    ?>
    <script type="text/template" id='template-wsc-skill-item'>

      <div class="skill-item-wrap">
            <input type="button" class="button btn-remove-skill-item"/>

        <div class="wsc-form-row">
          <label><?php _e( 'Title', 'wen-skill-charts' ); ?><span class="required">*</span></label>
          <input type="text" name="skill_title[]" value="" placeholder="<?php _e( 'Enter Title', 'wen-skill-charts' ); ?>" class="txt-skill-title regular-text code" />
          <span class="description"><?php _e( 'Enter Title', 'wen-skill-charts' ); ?></span>
        </div><!-- .wsc-form-row -->

        <div class="wsc-form-row">
          <label><?php _e( 'Description', 'wen-skill-charts' ); ?></label>
          <input type="text" name="skill_description[]" value="" placeholder="<?php _e( 'Enter Description', 'wen-skill-charts' ); ?>" class="txt-skill-description regular-text code" />
          <span class="description"><?php _e( 'Enter Description', 'wen-skill-charts' ); ?></span>
        </div><!-- .wsc-form-row -->

        <div class="wsc-form-row">
          <label><?php _e( 'Percentage', 'wen-skill-charts' ); ?><span class="required">*</span></label>
          <input type="number" name="skill_percentage[]" value="" placeholder="<?php _e( 'Enter Percentage', 'wen-skill-charts' ); ?>" class="txt-skill-percentage regular-text code" min="1" />
          <span class="description"><?php _e( 'Enter Percentage without % sign', 'wen-skill-charts' ); ?></span>
        </div><!-- .wsc-form-row -->

        <div class="wsc-form-row wsc-color-row">
          <label><?php _e( 'Color', 'wen-skill-charts' ); ?></label>
          <input type="text" name="skill_color[]" value="" class="txt-skill-color wsc-color-field" /><span class="description"><?php _e( 'If not selected, Default Color will be used.', 'wen-skill-charts' ); ?></span>
        </div><!-- .wsc-form-row -->




      </div><!-- .skill-item-wrap -->


    </script>

    <?php
  }


} //end class
