<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wenthemes.com
 * @since             1.0.0
 * @package           WEN_Skill_Charts
 *
 * @wordpress-plugin
 * Plugin Name:       WEN Skill Charts
 * Plugin URI:        https://wenthemes.com/item/wordpress-plugins/wen-skill-charts/
 * Description:       Show animated skill bar and circle.
 * Version:           1.5.2
 * Author:            WEN Themes
 * Author URI:        https://wenthemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wen-skill-charts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define
define( 'WEN_SKILL_CHARTS_NAME', 'WEN Skill Charts' );
define( 'WEN_SKILL_CHARTS_VERSION', '1.5.2' );
define( 'WEN_SKILL_CHARTS_SLUG', 'wen-skill-charts' );
define( 'WEN_SKILL_CHARTS_BASENAME', basename( dirname( __FILE__ ) ) );
define( 'WEN_SKILL_CHARTS_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
define( 'WEN_SKILL_CHARTS_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
define( 'WEN_SKILL_CHARTS_POST_TYPE_SKILL', 'wen_skill' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wen-skill-charts-activator.php
 */
function activate_wen_skill_charts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wen-skill-charts-activator.php';
	WEN_Skill_Charts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wen-skill-charts-deactivator.php
 */
function deactivate_wen_skill_charts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wen-skill-charts-deactivator.php';
	WEN_Skill_Charts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wen_skill_charts' );
register_deactivation_hook( __FILE__, 'deactivate_wen_skill_charts' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wen-skill-charts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wen_skill_charts() {

	$plugin = new WEN_Skill_Charts();
	$plugin->run();

}
run_wen_skill_charts();