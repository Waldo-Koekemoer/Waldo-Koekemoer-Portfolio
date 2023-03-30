<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wenthemes.com
 * @since      1.0.0
 *
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/public
 * @author     WEN Themes <info@wenthemes.com>
 */
class WEN_Skill_Charts_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WEN_Skill_Charts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WEN_Skill_Charts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wen-skill-charts-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WEN_Skill_Charts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WEN_Skill_Charts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

    wp_enqueue_script( $this->plugin_name. '-appear', plugin_dir_url( __FILE__ ) . 'js/jquery.appear.js', array( 'jquery' ), $this->version, false );
    wp_enqueue_script( $this->plugin_name. '-easypiechart', plugin_dir_url( __FILE__ ) . 'js/jquery.easypiechart.js', array( 'jquery' ), $this->version, false );
	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wen-skill-charts-public.js', array( 'jquery', $this->plugin_name. '-appear', $this->plugin_name. '-easypiechart' ), $this->version, false );

	}


  public function custom_post_types(){

    // Register Skill Post Type
    $labels = array(
      'name'               => _x( 'Skills', 'post type general name', 'wen-skill-charts' ),
      'singular_name'      => _x( 'Skill', 'post type singular name', 'wen-skill-charts' ),
      'menu_name'          => _x( 'Skills', 'admin menu', 'wen-skill-charts' ),
      'name_admin_bar'     => _x( 'Skill', 'add new on admin bar', 'wen-skill-charts' ),
      'add_new'            => _x( 'Add New', 'wen_skill', 'wen-skill-charts' ),
      'add_new_item'       => __( 'Add New Skill', 'wen-skill-charts' ),
      'new_item'           => __( 'New Skill', 'wen-skill-charts' ),
      'edit_item'          => __( 'Edit Skill', 'wen-skill-charts' ),
      'view_item'          => __( 'View Skill', 'wen-skill-charts' ),
      'all_items'          => __( 'All Skills', 'wen-skill-charts' ),
      'search_items'       => __( 'Search Skills', 'wen-skill-charts' ),
      'parent_item_colon'  => __( 'Parent Skills:', 'wen-skill-charts' ),
      'not_found'          => __( 'No skills found.', 'wen-skill-charts' ),
      'not_found_in_trash' => __( 'No skills found in Trash.', 'wen-skill-charts' )
    );

    $args = array(
      'labels'             => $labels,
      'public'             => false,
      'publicly_queryable' => false,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => false,
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_icon'          => 'dashicons-awards',
      'supports'           => array( 'title' )
    );

    register_post_type( WEN_SKILL_CHARTS_POST_TYPE_SKILL, $args );

  }



}
