<?php
defined('ABSPATH') || exit;

function bog_donation_logs_page() {
    if (!current_user_can('manage_options')) return;

    global $wpdb;
    $table = $wpdb->prefix . 'bog_donation_log';
    $results = $wpdb->get_results("SELECT * FROM $table ORDER BY created_at DESC", ARRAY_A);

    echo '<div class="wrap"><h1>დონაციის ტრანზაქციები</h1>';
    echo '<table class="widefat fixed striped"><thead><tr>
            <th>ID</th><th>Transaction ID</th><th>Status</th><th>Amount</th><th>Created At</th>
          </tr></thead><tbody>';

    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . esc_html($row['id']) . '</td>';
        echo '<td>' . esc_html($row['transaction_id']) . '</td>';
        echo '<td>' . esc_html($row['status']) . '</td>';
        echo '<td>' . esc_html($row['amount']) . '</td>';
        echo '<td>' . esc_html($row['created_at']) . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table></div>';
}

function bog_donation_admin_menu_logs() {
    add_submenu_page(
        'bog-donation-settings',
        'დონაციის ლოგები',
        'ტრანზაქციები',
        'manage_options',
        'bog-donation-logs',
        'bog_donation_logs_page'
    );
}
add_action('admin_menu', 'bog_donation_admin_menu_logs');
?>
