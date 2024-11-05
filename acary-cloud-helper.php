<?php
/**
 * Plugin Name:   Cloud - Helper
 * Description:   Ce plugin, conçu par Acary, est un plugin multifonction conçu pour les sites WordPress hébergés sur nos serveurs cloud, offrant une gamme d'outils pratiques. 
 * Version:       0.0.1
 * Author:        Acary
 * Author URI:    https://acary.ca
 * Text Domain:   acary-cloud-helper
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'ACARYCLOUDHELPER_VERSION' ) ) define( 'ACARYCLOUDHELPER_VERSION', '0.0.1' );
if ( ! defined( 'ACARYCLOUDHELPER_ABSPATH' ) ) define( 'ACARYCLOUDHELPER_ABSPATH', plugin_dir_path( __FILE__ ) );

require_once( ACARYCLOUDHELPER_ABSPATH . '/core/plugin-register-settings.php' );