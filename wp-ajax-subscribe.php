<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              silwalrabina.com.np
 * @since             1.0.0
 * @package           Wp_Ajax_Subscribe
 *
 * @wordpress-plugin
 * Plugin Name:       WP Ajax Subscribe
 * Plugin URI:        silwalrabina.com.np/plugins/wp-ajax-subscribe
 * Description:       Simply add subscribers to MailChimp lists in one click.
 * Version:           1.1.1
 * Author:            Rabina Silwal
 * Author URI:        silwalrabina.com.np
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-ajax-subscribe
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
define( 'WP_AJAX_SUBSCRIBE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-ajax-subscribe-activator.php
 */
function activate_wp_ajax_subscribe() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-ajax-subscribe-activator.php';
	Wp_Ajax_Subscribe_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-ajax-subscribe-deactivator.php
 */
function deactivate_wp_ajax_subscribe() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-ajax-subscribe-deactivator.php';
	Wp_Ajax_Subscribe_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_ajax_subscribe' );
register_deactivation_hook( __FILE__, 'deactivate_wp_ajax_subscribe' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-ajax-subscribe.php';
require plugin_dir_path( __FILE__ ) . 'custom-function/custom-function.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_ajax_subscribe() {

	$plugin = new Wp_Ajax_Subscribe();
	$plugin->run();

}
run_wp_ajax_subscribe();
