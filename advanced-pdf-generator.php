<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wordpress.org/plugins/advanced-pdf-generator
 * @since             0.2.0
 * @package           Advanced_Pdf_Generator
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced PDF Generator
 * Plugin URI:        https://wordpress.org/plugins/advanced-pdf-generator/
 * Description:       Create PDF from template files
 * Version:           0.2.0
 * Author:            jcmlmorav
 * Author URI:        https://github.com/jcmlmorav/advanced-pdf-generator
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       apdfg
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'ADVANCED_PDF_GENERATOR_VERSION', '0.2.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_advanced_pdf_generator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-pdf-generator-activator.php';
	Advanced_Pdf_Generator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_advanced_pdf_generator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-pdf-generator-deactivator.php';
	Advanced_Pdf_Generator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_advanced_pdf_generator' );
register_deactivation_hook( __FILE__, 'deactivate_advanced_pdf_generator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advanced-pdf-generator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_advanced_pdf_generator() {

	$plugin = new Advanced_Pdf_Generator();
	$plugin->run();

}
run_advanced_pdf_generator();
