<?php
/**
 * Plugin Name: BOG Donation
 * Description: დონაციის პლაგინი საქართველოს ბანკის გადახდებით.
 * Version: 1.0
 * Author: Goga Trapaidze
 */

defined('ABSPATH') || exit;

function bog_donation_load_textdomain() {
    load_plugin_textdomain('bog-donation', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'bog_donation_load_textdomain');

define('BOG_DONATION_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('BOG_DONATION_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once BOG_DONATION_PLUGIN_PATH . 'includes/functions.php';

function bog_donation_enqueue_scripts() {
    wp_enqueue_style('bog-donation-style', BOG_DONATION_PLUGIN_URL . 'assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'bog_donation_enqueue_scripts');
?>

require_once BOG_DONATION_PLUGIN_PATH . 'includes/admin-settings.php';
require_once BOG_DONATION_PLUGIN_PATH . 'includes/bog-api.php';

require_once BOG_DONATION_PLUGIN_PATH . 'includes/form-handler.php';
require_once BOG_DONATION_PLUGIN_PATH . 'includes/activate.php';
require_once BOG_DONATION_PLUGIN_PATH . 'includes/admin-logs.php';
