<?php
defined('ABSPATH') || exit;

function bog_donation_admin_menu() {
    add_menu_page(
        'BOG Donation Settings',
        'BOG Donation',
        'manage_options',
        'bog-donation-settings',
        'bog_donation_settings_page',
        'dashicons-money-alt'
    );
}
add_action('admin_menu', 'bog_donation_admin_menu');

function bog_donation_settings_page() {
    ?>
    <div class="wrap">
        <h1>საქართველოს ბანკის დონაციის პარამეტრები</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('bog_donation_settings_group');
            do_settings_sections('bog-donation-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function bog_donation_settings_init() {
    register_setting('bog_donation_settings_group', 'bog_donation_settings');

    add_settings_section(
        'bog_donation_settings_section',
        'API პარამეტრები',
        null,
        'bog-donation-settings'
    );

    $fields = [
        'client_id' => 'Client ID',
        'client_secret' => 'Client Secret',
        'redirect_uri' => 'Redirect URI',
        'success_url' => 'Success URL',
        'fail_url' => 'Fail URL',
        'callback_url' => 'Callback URL'
    ];

    foreach ($fields as $id => $label) {
        add_settings_field(
            $id,
            $label,
            function () use ($id) {
                $options = get_option('bog_donation_settings');
                printf(
                    '<input type="text" name="bog_donation_settings[%1$s]" value="%2$s" class="regular-text">',
                    esc_attr($id),
                    isset($options[$id]) ? esc_attr($options[$id]) : ''
                );
            },
            'bog-donation-settings',
            'bog_donation_settings_section'
        );
    }
}
add_action('admin_init', 'bog_donation_settings_init');
?>
