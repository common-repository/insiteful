<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://insiteful.co
 * @since             1.0.0
 * @package           Insiteful
 *
 * @wordpress-plugin
 * Plugin Name:       Insiteful — Form Abandonment Tracking, Partial Entries, Save & Continue Later
 * Plugin URI:        https://app.insiteful.co
 * Description:       <strong>No more missed opportunities!</strong> Form abandonment tracking, partial entries, saved progress, auto follow-up & more — install in just a couple clicks <a href="/wp-admin/options-general.php?page=insiteful" target="_blank">here</a>.
 * Version:           1.1.0
 * Author:            Insiteful
 * Author URI:        https://insiteful.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       insiteful
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'INSITEFUL_VERSION', '1.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-insiteful-activator.php
 */
function activate_insiteful() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-insiteful-activator.php';
	Insiteful_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-insiteful-deactivator.php
 */
function deactivate_insiteful() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-insiteful-deactivator.php';
	Insiteful_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_insiteful' );
register_deactivation_hook( __FILE__, 'deactivate_insiteful' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-insiteful.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_insiteful() {

	$plugin = new Insiteful();
	$plugin->run();

}
run_insiteful();
