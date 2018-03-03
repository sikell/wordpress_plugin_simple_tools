<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://sikeller.de
 * @since             1.0.0
 * @package           sikeller-tools
 *
 * @wordpress-plugin
 * Plugin Name:       SK Simple Tools
 * Plugin URI:        http://sikeller.de/simple-tools/
 * Description:       A collection of some useful tools for developing with wordpress.
 * Version:           1.0.0
 * Author:            Simon Keller
 * Author URI:        http://sikeller.de/
 * License:           
 * License URI:       
 * Text Domain:       sikeller-tools
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Uses SemVer - https://semver.org.
 */
define( 'SIKELLER_TOOLS_VERSION', '1.0.0' );

/**
 * Get and include template files.
 *
 * @param string $template_name
 * @param array  $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 */
function sikeller_tools_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
    if ( ! empty( $args ) && is_array( $args ) ) {
        extract( $args );
    }

    $located = sikeller_tools_locate_template( $template_name, $template_path, $default_path );

    if ( ! file_exists( $located ) ) {
        _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '1.0' );
        return;
    }

    // Allow 3rd party plugin filter template file from their plugin.
    $located = apply_filters( 'sikeller_tools_get_template', $located, $template_name, $args, $template_path, $default_path );

    do_action( 'sikeller_tools_before_template_part', $template_name, $template_path, $located, $args );

    include( $located );

    do_action( 'sikeller_tools_after_template_part', $template_name, $template_path, $located, $args );
}

/**
 * Locate a template and return the path for inclusion.
 *
 * Note: FT_TEMPLATE_DEBUG_MODE will prevent overrides in themes from taking priority.
 *
 * This is the load order:
 *
 *      yourtheme       /   $template_path   /   $template_name
 *      yourtheme       /   $template_name
 *      $default_path   /   $template_name
 *
 * @param  string $template_name
 * @param  string $template_path (default: '')
 * @param  string $default_path (default: '')
 * @return string
 */
function sikeller_tools_locate_template( $template_name, $template_path = '', $default_path = '' ) {
    if ( ! $template_path ) {
        $template_path = apply_filters( 'sikeller_tools_template_path', 'sikeller-tools/' );
    }

    if ( ! $default_path ) {
        $default_path = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/';
    }

    // Look within passed path within the theme - this is priority.
    $template = locate_template(
        array(
            trailingslashit( $template_path ) . $template_name,
            $template_name,
        )
    );

    // Get default template/
    if ( ! $template ) {
        $template = $default_path . $template_name;
    }

    // Return what we found.
    return apply_filters( 'sikeller_tools_locate_template', $template, $template_name, $template_path );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sikeller-tools-activator.php
 */
function activate_sikeller_tools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sikeller-tools-activator.php';
	Sikeller_Tools_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sikeller-tools-deactivator.php
 */
function deactivate_sikeller_tools() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sikeller-tools-deactivator.php';
	Sikeller_Tools_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sikeller_tools' );
register_deactivation_hook( __FILE__, 'deactivate_sikeller_tools' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sikeller-tools.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sikeller_tools() {

	$plugin = new Sikeller_Tools();
	$plugin->run();

}
run_sikeller_tools();
