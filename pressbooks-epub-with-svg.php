<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/lukaiser
 * @since             1.0.0
 * @package           Pressbooks_Epub_With_Svg
 *
 * @wordpress-plugin
 * Plugin Name:       Pressbooks ePub with SVG
 * Plugin URI:        https://github.com/eSkript/pressbooks-epub-with-svg
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Lukas Kaiser
 * Author URI:        https://github.com/lukaiser
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pressbooks-epub-with-svg
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pressbooks-epub-with-svg-activator.php
 */
function activate_pressbooks_epub_with_svg() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-epub-with-svg-activator.php';
	Pressbooks_Epub_With_Svg_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pressbooks-epub-with-svg-deactivator.php
 */
function deactivate_pressbooks_epub_with_svg() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-epub-with-svg-deactivator.php';
	Pressbooks_Epub_With_Svg_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pressbooks_epub_with_svg' );
register_deactivation_hook( __FILE__, 'deactivate_pressbooks_epub_with_svg' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-epub-with-svg.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pressbooks_epub_with_svg() {

	$plugin = new Pressbooks_Epub_With_Svg();
	$plugin->run();

}
run_pressbooks_epub_with_svg();
