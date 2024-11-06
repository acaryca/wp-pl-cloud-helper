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

add_action('admin_menu', function () {
    add_options_page(
        __('Cache', 'acary-cloud-helper'),
        __('Cache', 'acary-cloud-helper'),
        'manage_options',
        'acary_cloud_helper_cache',
        'acary_cloud_helper_cache_render_settings_page'
    );
});
add_action('admin_bar_menu', function ($adminbar) {
    if( !is_admin() ) return;
    if( !current_user_can('manage_options') ) return;
    
    $admin_bar_nodes = [
        [
            'id'     => 'acary-cloud-helper',
            'title'  => __('Cache', 'acary-cloud-helper'),
            'meta'   => ['class' => 'acary-cloud-helper'],
        ],
        [
            'parent' => 'acary-cloud-helper',
            'id'     => 'acary-cloud-helper-purge',
            'title'  => __('Purge all', 'acary-cloud-helper'),
            'href'   => wp_nonce_url(add_query_arg('acary-cloud-helper-cache', 'purge-entire-cache'), 'purge-entire-cache'),
            'meta'   => [
                'title' => __( 'Purge all', 'acary-cloud-helper' ),
            ],
        ],
        [
            'parent' => 'acary-cloud-helper',
            'id'     => 'acary-cloud-helper-settings',
            'title'  => __('Settings', 'acary-cloud-helper'),
            'href'   => admin_url('options-general.php?page=acary_cloud_helper_cache'),
            'meta'   => [ 'tabindex' => '0' ],
        ],
    ];
    foreach ($admin_bar_nodes as $node) {
        $adminbar->add_node($node);
    }
}, 100);