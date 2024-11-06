<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_menu', function () {
    add_options_page(
        __('Sending e-mails', 'acary-cloud-helper'),
        __('Sending e-mails', 'acary-cloud-helper'),
        'manage_options',
        'acary_cloud_helper_sendmail',
        'acary_cloud_helper_sendmail_render_settings_page'
    );
});