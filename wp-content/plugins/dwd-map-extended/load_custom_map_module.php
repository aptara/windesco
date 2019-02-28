<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://diviwebdesign.com/
 * @since             1.0.0
 * @package           Dwd_Map_Extended
 *
 * @wordpress-plugin
 * Plugin Name:       Divi Map Module Extended
 * Plugin URI:        https://diviwebdesign.com/
 * Description:       A Custom Map Module for Divi. Enhance the Google Map and impress your visitors with customized map design, custom pin icons and more!
 * Version:           2.0.1
 * Author:            Divi Web Design
 * Author URI:        https://diviwebdesign.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dwd-map-extended
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dwd-map-extended-activator.php
 */
function activate_dwd_map_extended() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dwd-map-extended-activator.php';
	Dwd_Map_Extended_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dwd-map-extended-deactivator.php
 */
function deactivate_dwd_map_extended() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dwd-map-extended-deactivator.php';
	Dwd_Map_Extended_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dwd_map_extended' );
register_deactivation_hook( __FILE__, 'deactivate_dwd_map_extended' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dwd-map-extended.php';
include_once ( ABSPATH . 'wp-admin/includes/plugin.php' );
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dwd_map_extended() {

	$plugin = new Dwd_Map_Extended();
	$plugin->run();

}
run_dwd_map_extended();

$map_activated = get_option( 'map_license_key_activated' );
    
function remove_dwd_map_update_notifications( $value ) {
    if ( isset( $value ) && is_object( $value ) ) {
        unset( $value->response[ 'dwd-map-extended/load_custom_map_module.php' ] );
    }
    return $value;
}

if ( empty( $lic_m )) {
    function dwd_map_license_notice() {
        if ( ! MAPPAnD::is_admin_notice_active( 'map-disable-done-notice-forever' ) ) {
            return;
        }
        $class = 'notice notice-info is-dismissible';
        $message = __( 'Please enter your Map Extended Module plugin license key to get regular update and support by Navigating to Settings -> Divi Extended. You were given a license key when you purchased this item.', 'dwd-map' );

        printf( '<div data-dismissible="map-disable-done-notice-forever" class="%1$s"><p>%2$s</p></div>', $class, $message );
    }
    add_action( 'admin_notices', 'dwd_map_license_notice' );
}
add_action( 'admin_init', array( 'MAPPAnD', 'init' ) );

if ( $map_activated == 'activated' ) {
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://diviwebdesign.com/'.$licpath.'map.json',
        __FILE__,
        'dwd-maps-extended'
    );
} else {
    add_filter( 'site_transient_update_plugins', 'remove_dwd_map_update_notifications' );
}  
