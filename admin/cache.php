<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Fonction pour afficher la page de paramètres
function acary_cloud_helper_cache_render_settings_page() {
    $settings = get_cache_settings(); // Récupère les paramètres actuels

    ?>
    <div class="acary_cloud_helper__container">
        <h1><?php echo __('Cache', 'acary-cloud-helper'); ?></h1>
        <p><?php echo __('This page allows you to configure some cache settings.', 'acary-cloud-helper'); ?></p>
        <form method="post" action="">
            <input type="hidden" name="acary_cloud_helper_cache_save" value="1" />
            
            <div class="acary_cloud_helper__block">
                <div class="acary_cloud_helper__block-header">
                    <h3><?php echo __('Settings', 'acary-cloud-helper'); ?></h3>
                </div>
                <div class="acary_cloud_helper__block-content">              
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row"><?php echo __('Enable Varnish Cache', 'acary-cloud-helper'); ?></th>
                            <td>
                                <input type="checkbox" name="enabled" value="1" <?php checked($settings['enabled'], true); ?> />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php echo __('Varnish Server', 'acary-cloud-helper'); ?></th>
                            <td>
                                <input type="text" name="server" value="<?php echo esc_attr($settings['server']); ?>" required />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php echo __('Cache Lifetime', 'acary-cloud-helper'); ?></th>
                            <td>
                                <input type="text" name="cache_lifetime" value="<?php echo esc_attr($settings['cacheLifetime']); ?>" required />
                                <p class="description"><?php echo __('Cache Lifetime in seconds.', 'acary-cloud-helper'); ?></p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php echo __('Cache Tag Prefix', 'acary-cloud-helper'); ?></th>
                            <td>
                                <input type="text" name="cache_tag_prefix" value="<?php echo esc_attr($settings['cacheTagPrefix']); ?>" required />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php echo __('Excluded Params', 'acary-cloud-helper'); ?></th>
                            <td>
                                <input type="text" name="excluded_params" value="<?php echo esc_attr(implode(',', $settings['excludedParams'])); ?>" />
                                <p class="description"><?php echo __('List of GET parameters to disable caching.', 'acary-cloud-helper'); ?></p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php echo __('Excludes', 'acary-cloud-helper'); ?></th>
                            <td>
                                <textarea name="excludes" rows="6"><?php echo esc_textarea(implode(PHP_EOL, $settings['excludes'])); ?></textarea>
                                <p class="description"><?php echo __('Urls that Varnish Cache shouldn\'t cache.', 'acary-cloud-helper'); ?></p>
                            </td>
                        </tr>
                    </table>
                    
                    <?php submit_button(); ?>
                </div>
            </div>
        </form>
    </div>
    <?php
}

// Fonction pour récupérer les paramètres du cache
function get_cache_settings() {
    $settings_file = sprintf('%s/.varnish-cache/settings.json', rtrim(getenv('HOME'), '/'));
    $default_settings = [
        'cache_devmode' => false,
        'enabled' => false,
        'server' => '',
        'cacheLifetime' => '3600',
        'cacheTagPrefix' => '',
        'excludedParams' => [],
        'excludes' => []
    ];

    if (file_exists($settings_file)) {
        $cache_settings = json_decode(file_get_contents($settings_file), true);
        
        // Merge avec les paramètres par défaut et s'assurer que les valeurs sont du bon type
        return array_merge($default_settings, $cache_settings ?: []);
    }
    
    return $default_settings;
}

// Fonction pour écrire les paramètres dans le fichier JSON
function write_cache_settings(array $settings) {
    $settings_file = sprintf('%s/.varnish-cache/settings.json', rtrim(getenv('HOME'), '/'));
    $settings_json = json_encode($settings, JSON_PRETTY_PRINT);
    file_put_contents($settings_file, $settings_json);
}

// Sauvegarde des données de soumission du formulaire
if (isset($_POST['acary_cloud_helper_cache_save'])) {
    $new_settings = [
        'cache_devmode' => isset($_POST['cache_devmode']) && $_POST['cache_devmode'] === '1',
        'enabled' => isset($_POST['enabled']) && $_POST['enabled'] === '1',
        'server' => sanitize_text_field($_POST['server']),
        'cacheLifetime' => sanitize_text_field($_POST['cache_lifetime']),
        'cacheTagPrefix' => sanitize_text_field($_POST['cache_tag_prefix']),
        'excludedParams' => array_map('trim', explode(',', sanitize_text_field($_POST['excluded_params']))),
        'excludes' => array_map('trim', explode(PHP_EOL, sanitize_textarea_field($_POST['excludes'])))
    ];
    
    write_cache_settings($new_settings);
    add_action('admin_notices', function() {
        echo '<div class="notice notice-success is-dismissible"><p>' . __('Settings saved successfully.', 'acary-cloud-helper') . '</p></div>';
    });
}
?>
