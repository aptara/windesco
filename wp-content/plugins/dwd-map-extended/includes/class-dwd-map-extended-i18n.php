<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://diviwebdesign.com/
 * @since      1.0.0
 *
 * @package    Dwd_Map_Extended
 * @subpackage Dwd_Map_Extended/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Dwd_Map_Extended
 * @subpackage Dwd_Map_Extended/includes
 * @author     Divi Web Design <hello@diviwebdesign.com>
 */
class Dwd_Map_Extended_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'dwd-map-extended',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
