<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation
 *
 * @link       https://www.plugdigital.net/manuel-padilla
 * @since      1.0.0
 *
 * @package    mp_portfolio
 * @subpackage mp_portfolio/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    mp_portfolio
 * @subpackage mp_portfolio/includes
 * @author     Manuel Padilla <manuel@plugdigital.net>
 */
class mp_portfolio_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mp_portfolio',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
