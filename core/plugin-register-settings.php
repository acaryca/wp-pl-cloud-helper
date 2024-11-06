<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_init', function () {
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_type');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_sitemail_key');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_sitemail_from_name');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_host');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_port');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_encryption');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_username');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_password');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_name');
    register_setting(ACARYCLOUDHELPER_PREFIX . 'sendmail', ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_email');
    if (get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === false) {
        update_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type', '');
    }
});