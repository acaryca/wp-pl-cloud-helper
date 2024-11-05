<?php
    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) exit;

    add_action('admin_menu', function () {
        add_options_page(
            __('Envoi des courriels', 'acary-cloud-helper'),
            __('Envoi des courriels', 'acary-cloud-helper'),
            'manage_options',
            'acary_cloud_helper_sendmail',
            'acary_cloud_helper_sendmail_render_settings_page'
        );
    });