<?php
    // Exit if accessed directly.
    if ( ! defined( 'ABSPATH' ) ) exit;
    
    require_once( ACARYCLOUDHELPER_ABSPATH . '/includes/plugin-update-checker-5.5/plugin-update-checker.php' );

    use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

    $AcaryCloudHelperUpdateChecker = PucFactory::buildUpdateChecker(
        'https://github.com/acaryca/wp-pl-cloud-helper',
        ACARYCLOUDHELPER_ABSPATH . '/acary-cloud-helper.php',
        'acary-cloud-helper'
    );

    $AcaryCloudHelperUpdateChecker->setBranch('main');
    $AcaryCloudHelperUpdateChecker->getVcsApi()->enableReleaseAssets();

    if ( defined('ACARYCLOUDHELPER_VERSIONDEV') && ACARYCLOUDHELPER_VERSIONDEV === 'true' ) {
        $AcaryCloudHelperUpdateChecker->getVcsApi()->setReleaseFilter('include-prereleases');
    }