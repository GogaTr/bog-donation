<?php
defined('ABSPATH') || exit;

function bog_donation_send_email_notice($data) {
    $to = get_option('admin_email');
    $subject = 'ახალი დონაცია - საქართველოს ბანკი';
    $message = "მიმიღებულია ახალი დონაცია:\n\n" .
               "Transaction ID: " . esc_html($data['transaction_id']) . "\n" .
               "Status: " . esc_html($data['status']) . "\n" .
               "Amount: " . esc_html($data['amount']) . " ლარი\n" .
               "დრო: " . esc_html($data['created_at']);

    wp_mail($to, $subject, $message);
}
?>
