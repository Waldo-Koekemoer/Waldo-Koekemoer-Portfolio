<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link       https://wenthemes.com
 * @since      1.0.0
 *
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    WEN_Skill_Charts
 * @subpackage WEN_Skill_Charts/includes
 * @author     WEN Themes <info@wenthemes.com>
 */
class WEN_Skill_Charts {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WEN_Skill_Charts_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'wen-skill-charts';
		$this->version = WEN_SKILL_CHARTS_VERSION;

		$this->load_dependencies();
    	$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
    	$this->init_shortcodes();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WEN_Skill_Charts_Loader. Orchestrates the hooks of the plugin.
	 * - WEN_Skill_Charts_i18n. Defines internationalization functionality.
	 * - WEN_Skill_Charts_Admin. Defines all hooks for the dashboard.
	 * - WEN_Skill_Charts_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wen-skill-charts-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wen-skill-charts-i18n.php';

	    /**
	     * The class responsible for defining shortcodes of the plugin.
	     */
	    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wen-skill-charts-shortcode.php';

	    /**
	     * The class responsible for defining common tasks of the plugin.
	     */
	    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wen-skill-charts-common.php';


		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wen-skill-charts-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wen-skill-charts-public.php';

		$this->loader = new WEN_Skill_Charts_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WEN_Skill_Charts_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WEN_Skill_Charts_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	* Init shortcodes.
	*
	* @since    1.0.0
	*/
	public function init_shortcodes(){

	    $plugin_shortcode = new WEN_Skill_Charts_Shortcode();
	    $plugin_shortcode->init();

	}

	/**
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new WEN_Skill_Charts_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'add_admin_form_scripts' );

	    // Add Admin column
	    $this->loader->add_filter( "manage_".WEN_SKILL_CHARTS_POST_TYPE_SKILL."_posts_columns", $plugin_admin, 'customize_column_head' );
	    $this->loader->add_action( "manage_".WEN_SKILL_CHARTS_POST_TYPE_SKILL."_posts_custom_column", $plugin_admin, 'customize_column_content', 10, 2 );

	    // Row action
	    $this->loader->add_filter( 'post_row_actions', $plugin_admin, 'customize_row_actions', 10, 2 );

	    // Post messages
	    $this->loader->add_filter( 'post_updated_messages', $plugin_admin, 'updated_messages' );

	    // Hide publishing actions
	    $this->loader->add_action( 'admin_head-post.php', $plugin_admin, 'hide_publishing_actions' );
	    $this->loader->add_action( 'admin_head-post-new.php', $plugin_admin, 'hide_publishing_actions' );

	    // Add metaboxes
	    $this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'add_skill_meta_boxes' );
	    $this->loader->add_action( 'save_post', $plugin_admin, 'save_skills_meta_box' );
	    $this->loader->add_action( 'save_post', $plugin_admin, 'save_settings_meta_box' );

	    // Templates
	    $this->loader->add_action( 'admin_footer', $plugin_admin, 'html_templates' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WEN_Skill_Charts_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	    // Register custom post type
	    $this->loader->add_filter( 'init', $plugin_public, 'custom_post_types' );

	    // Enable shortcode in Text widget
	    add_filter( 'widget_text', 'shortcode_unautop');
	    add_filter( 'widget_text', 'do_shortcode');

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    WEN_Skill_Charts_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}