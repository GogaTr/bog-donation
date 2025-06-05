<?php require_once BOG_DONATION_PLUGIN_PATH . 'includes/email.php'; ?>
<?php
defined('ABSPATH') || exit;

function bog_donation_process_form() {
    if (!empty($_POST['bog_donate_nonce']) && wp_verify_nonce($_POST['bog_donate_nonce'], 'bog_donate_form')) {
        $amount = 0;
        if (!empty($_POST['amount']) && $_POST['amount'] !== 'custom') {
            $amount = (int) $_POST['amount'];
        } elseif (!empty($_POST['custom_amount'])) {
            $amount = (int) $_POST['custom_amount'];
        }

        if ($amount > 0) {
            $payment_url = bog_donation_initiate_payment($amount);

            if (!is_wp_error($payment_url)) {
                wp_redirect($payment_url);
                exit;
            } else {
                wp_die('დაფიქსირდა შეცდომა: ' . $payment_url->get_error_message());
            }
        }
    }
}
add_action('init', 'bog_donation_process_form');

/**
 * Callback handler for BOG
 */
function bog_donation_callback_handler() {
    if (isset($_GET['bog-donation-callback'])) {
        global $wpdb;
        $table = $wpdb->prefix . 'bog_donation_log';

        $data = [
            'transaction_id' => sanitize_text_field($_GET['transaction_id'] ?? ''),
            'status' => sanitize_text_field($_GET['status'] ?? 'unknown'),
            'amount' => sanitize_text_field($_GET['amount'] ?? '0'),
            'created_at' => current_time('mysql')
        ];

        $wpdb->insert($table, $data);
        bog_donation_send_email_notice($data);

        wp_redirect(home_url('/thanks')); // Change to your actual thank you page
        exit;
    }
}
add_action('init', 'bog_donation_callback_handler');
?>
