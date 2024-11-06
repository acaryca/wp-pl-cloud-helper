<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

function acary_cloud_helper_cache_render_settings_page() {
    ?>
    <div class="acary_cloud_helper__container">
        <h1><?php echo __('Cache', 'acary-cloud-helper'); ?></h1>
        <p>
            <?php echo __('This page allows you to configure some cache settings.', 'acary-cloud-helper'); ?>
        </p>
        <form method="post" action="options.php">
            <?php settings_fields(ACARYCLOUDHELPER_PREFIX . 'cache'); ?>
            <?php do_settings_sections(ACARYCLOUDHELPER_PREFIX . 'cache'); ?>

            <div class="acary_cloud_helper__block-header">
                <h3><?php echo __('Settings', 'acary-cloud-helper'); ?></h3>
            </div>
            <div class="acary_cloud_helper__block-content">
            
                <h2><?php echo __('Development Mode', 'acary-cloud-helper'); ?></h2>
                <p>
                    <?php echo __('Development mode allows you to disable cache for debugging or development purposes. When enabled, cache will be disabled and no cache will be used.', 'acary-cloud-helper'); ?>
                </p>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php echo __('Development Mode', 'acary-cloud-helper'); ?></th>
                        <td>
                            <label for="<?php echo(ACARYCLOUDHELPER_PREFIX . 'cache_devmode'); ?>">
                                <input type="checkbox" id="<?php echo(ACARYCLOUDHELPER_PREFIX . 'cache_devmode'); ?>" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'cache_devmode'); ?>" value="1" <?php checked(get_option(ACARYCLOUDHELPER_PREFIX . 'cache_devmode'), '1'); ?> />
                                <?php echo __('Enable development mode', 'acary-cloud-helper'); ?>
                            </label>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>

            </div>
        </form>

    </div>
    <?php
}