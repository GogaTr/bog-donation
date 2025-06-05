<?php
defined('ABSPATH') || exit;

/**
 * Get OAuth token from BOG
 */
function bog_donation_get_token() {
    $options = get_option('bog_donation_settings');
    $client_id = $options['client_id'] ?? '';
    $client_secret = $options['client_secret'] ?? '';

    if (!$client_id || !$client_secret) {
        return new WP_Error('bog_token_error', 'Client ID ან Client Secret არ არის მითითებული.');
    }

    $auth = base64_encode("$client_id:$client_secret");

    $response = wp_remote_post('https://ipgtest.georgiancard.ge/api/v1/oauth2/token', [
        'headers' => [
            'Authorization' => 'Basic ' . $auth,
            'Content-Type'  => 'application/x-www-form-urlencoded'
        ],
        'body' => 'grant_type=client_credentials'
    ]);

    if (is_wp_error($response)) return $response;

    $body = json_decode(wp_remote_retrieve_body($response), true);
    return $body['access_token'] ?? new WP_Error('bog_token_missing', 'Token ვერ მოიძებნა.');
}

/**
 * Initiate a payment
 */
function bog_donation_initiate_payment($amount) {
    $token = bog_donation_get_token();
    if (is_wp_error($token)) return $token;

    $options = get_option('bog_donation_settings');
    $callback = $options['callback_url'] ?? home_url('/bog-donation-callback');
    $client_ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

    $response = wp_remote_post('https://ipgtest.georgiancard.ge/api/v1/checkout/url', [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'Content-Type'  => 'application/json'
        ],
        'body' => json_encode([
            'amount' => (int) $amount,
            'currency' => 'GEL',
            'client_ip_addr' => $client_ip,
            'callback_url' => $callback
        ])
    ]);

    if (is_wp_error($response)) return $response;

    $body = json_decode(wp_remote_retrieve_body($response), true);
    return $body['payment_url'] ?? new WP_Error('bog_payment_error', 'გადახდის ბმული ვერ მოიძებნა.');
}
?>
