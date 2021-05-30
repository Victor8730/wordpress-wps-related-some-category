<?php
/**
 *
 * @since             1.0.0
 * @package           Wps_Related_Some_Category
 * @wordpress-plugin
 * Plugin Name: Wps related some category
 * Description: Plugin for organizing slider with product some category in page WooCommerce product
 * Version: 1.0.0
 * Author URI:  https://webpagestudio.net
 * Author: Victor Galiuzov
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'WPS_RELATED_SOME_CATEGORY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wps-related-some-category-activator.php
 */
function activate_wps_related_some_category() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wps-related-some-category-activator.php';
    Wps_Related_Some_Category_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wps-related-some-category-deactivator.php
 */
function deactivate_wps_related_some_category() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wps-related-some-category-deactivator.php';
    Wps_Related_Some_Category_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wps_related_some_category' );
register_deactivation_hook( __FILE__, 'deactivate_wps_related_some_category' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wps-related-some-category.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wps_related_some_category() {

    $plugin = new Wps_Related_Some_Category();
    $plugin->run();

}

run_wps_related_some_category();
