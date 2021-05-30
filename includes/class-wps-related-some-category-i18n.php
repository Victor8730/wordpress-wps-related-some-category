<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/Victor8730/wordpress-wps-related-some-category
 * @since      1.0.0
 *
 * @package    Wps_Related_Some_Category
 * @subpackage Wps_Related_Some_Category/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wps_Related_Some_Category
 * @subpackage Wps_Related_Some_Category/includes
 * @author     Victor Galiuzov <victor8730@gmail.com>
 */
class Wps_Related_Some_Category_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wps-related-some-category-load',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
