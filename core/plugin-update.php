<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

require_once( ACARYCLOUDHELPER_ABSPATH . '/includes/plugin-update-checker/plugin-update-checker.php' );

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
use YahnisElsts\PluginUpdateChecker\v5p5\Vcs\Api;

$AcaryCloudHelperUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/acaryca/wp-pl-cloud-helper',
    ACARYCLOUDHELPER_ABSPATH . '/acary-cloud-helper.php',
    'acary-cloud-helper'
);

$AcaryCloudHelperUpdateChecker->setBranch('main');
$AcaryCloudHelperUpdateChecker->getVcsApi()->enableReleaseAssets();

if ( defined('ACARYCLOUDHELPER_VERSIONDEV') && ACARYCLOUDHELPER_VERSIONDEV === true ) {
    // Utiliser un filtre personnalisé pour inclure uniquement les pré-releases
    $AcaryCloudHelperUpdateChecker->getVcsApi()->setReleaseFilter(
        function($version, $release) {
            // Vérifie si la version est une pré-release en utilisant une convention de nommage ou une propriété spécifique
            return (strpos($version, 'beta') !== false || strpos($version, 'alpha') !== false || strpos($version, 'RC') !== false);
        },
        Api::RELEASE_FILTER_ALL, // Utiliser cette constante pour inclure tous les types et filtrer manuellement
        5 // Nombre maximum de releases à examiner
    );
}