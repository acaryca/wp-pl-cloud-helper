<?php
/**
 * Plugin Name:   Acary Cloud
 * Description:   This plugin, developed by Acary, is a multi-functional plugin designed for WordPress sites hosted on our cloud servers, offering a range of practical tools.
 * Version: 0.0.1-dev-1105195616
 * Author:        Acary
 * Author URI:    https://acary.ca
 * Text Domain:   acary-cloud-helper
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'ACARYCLOUDHELPER_VERSION' ) ) define( 'ACARYCLOUDHELPER_VERSION', '0.0.1-dev-1105195616' );
if ( ! defined( 'ACARYCLOUDHELPER_VERSIONDEV' ) ) define( 'ACARYCLOUDHELPER_VERSIONDEV', true );
if ( ! defined( 'ACARYCLOUDHELPER_ABSPATH' ) ) define( 'ACARYCLOUDHELPER_ABSPATH', plugin_dir_path( __FILE__ ) );
if ( ! defined( 'ACARYCLOUDHELPER_PREFIX' ) ) define( 'ACARYCLOUDHELPER_PREFIX', 'acary_cloud_helper_' );

require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-update.php' );
require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-register-settings.php' );
require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-register-menu.php' );

require_once( ACARYCLOUDHELPER_ABSPATH . '/admin/sendmail.php' );
