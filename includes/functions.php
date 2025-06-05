<?php
defined('ABSPATH') || exit;

function bog_donation_shortcode() {
    ob_start();
    include BOG_DONATION_PLUGIN_PATH . 'templates/form.php';
    return ob_get_clean();
}
add_shortcode('bog_donation_form', 'bog_donation_shortcode');
?>
