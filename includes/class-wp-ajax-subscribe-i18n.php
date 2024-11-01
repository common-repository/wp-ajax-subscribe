<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       silwalrabina.com.np
 * @since      1.0.0
 *
 * @package    Wp_Ajax_Subscribe
 * @subpackage Wp_Ajax_Subscribe/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Ajax_Subscribe
 * @subpackage Wp_Ajax_Subscribe/includes
 * @author     Ram Nepal <silwalrabina@gmail.com>
 */
class Wp_Ajax_Subscribe_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-ajax-subscribe',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
