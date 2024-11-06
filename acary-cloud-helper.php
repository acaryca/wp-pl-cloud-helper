<?php
/**
 * Plugin Name:   Acary Cloud
 * Description:   This plugin, developed by Acary, is a multi-functional plugin designed for WordPress sites hosted on our cloud servers, offering a range of practical tools.
 * Version: 0.0.2-dev-1105212629
 * Author:        Acary
 * Author URI:    https://acary.ca
 * Text Domain:   acary-cloud-helper
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'ACARYCLOUDHELPER_VERSION' ) ) define( 'ACARYCLOUDHELPER_VERSION', '0.0.2-dev-1105212629' );
if ( ! defined( 'ACARYCLOUDHELPER_VERSIONDEV' ) ) define( 'ACARYCLOUDHELPER_VERSIONDEV', true );
if ( ! defined( 'ACARYCLOUDHELPER_PREFIX' ) ) define( 'ACARYCLOUDHELPER_PREFIX', 'acary_cloud_helper_' );
if ( ! defined( 'ACARYCLOUDHELPER_DOMAIN' ) ) define( 'ACARYCLOUDHELPER_DOMAIN', 'acary-cloud-helper' );
if ( ! defined( 'ACARYCLOUDHELPER_ABSPATH' ) ) define( 'ACARYCLOUDHELPER_ABSPATH', plugin_dir_path( __FILE__ ) );
if ( ! defined( 'ACARYCLOUDHELPER_BASENAME' ) ) define( 'ACARYCLOUDHELPER_BASENAME', plugin_basename(__FILE__) );

add_action( 'plugins_loaded', function () { load_plugin_textdomain( ACARYCLOUDHELPER_DOMAIN, false, dirname( ACARYCLOUDHELPER_BASENAME ) . '/languages/' ); } );

require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-update.php' );
require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-register-settings.php' );
require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-register-menu.php' );

require_once( ACARYCLOUDHELPER_ABSPATH . '/admin/sendmail.php' );
