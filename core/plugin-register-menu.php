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
add_filter('plugin_action_links_acary-cloud-helper', function ($links) {
    $settings_link = '<a href="options-general.php?page=acary_cloud_helper_sendmail">' . __('Sending e-mails', 'acary-cloud-helper') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
});