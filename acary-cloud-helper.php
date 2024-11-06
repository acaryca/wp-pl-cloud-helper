<?php
/**
 * Plugin Name:   Acary Cloud
 * Description:   Ce plugin, conçu par Acary, est un plugin multifonction conçu pour les sites WordPress hébergés sur nos serveurs cloud, offrant une gamme d'outils pratiques. 
 * Version: 0.0.1-dev-1105193728
 * Author:        Acary
 * Author URI:    https://acary.ca
 * Text Domain:   acary-cloud-helper
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'ACARYCLOUDHELPER_VERSION' ) ) define( 'ACARYCLOUDHELPER_VERSION', '0.0.1-dev-1105193728' );
if ( ! defined( 'ACARYCLOUDHELPER_VERSIONDEV' ) ) define( 'ACARYCLOUDHELPER_VERSIONDEV', true );
if ( ! defined( 'ACARYCLOUDHELPER_ABSPATH' ) ) define( 'ACARYCLOUDHELPER_ABSPATH', plugin_dir_path( __FILE__ ) );

require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-update.php' );
require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-register-settings.php' );
require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-register-menu.php' );
