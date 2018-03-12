<?php

/**
 *
 * @link              https://www.plugdigital.net/manuel-padilla
 * @since             1.0.0
 * @package           mp_portfolio
 *
 * @wordpress-plugin
 * Plugin Name:       MP Portfolio
 * Plugin URI:        https://www.plugdigital.net/mp_portfolio
 * Description:       Web pages portfolio.
 * Version:           1.0.0
 * Author:            Manuel Padilla
 * Author URI:        https://www.plugdigital.net/manuel-padilla
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mp_portfolio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * Plugin activation.
 */
function activate_mp_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mp_portfolio-activator.php';
	mp_portfolio_Activator::activate();
}

/**
 * Plugin deactivation.
 */
function deactivate_mp_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mp_portfolio-deactivator.php';
	mp_portfolio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mp_portfolio' );
register_deactivation_hook( __FILE__, 'deactivate_mp_portfolio' );

/**
 * The core plugin class
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mp_portfolio.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_mp_portfolio() {

	$plugin = new mp_portfolio();
	$plugin->run();

}
run_mp_portfolio();
