<?php
defined('ABSPATH') || exit;

function bog_donation_activate() {
    global $wpdb;

    $table = $wpdb->prefix . 'bog_donation_log';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        transaction_id VARCHAR(255),
        status VARCHAR(100),
        amount VARCHAR(100),
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'bog_donation_activate');
?>
