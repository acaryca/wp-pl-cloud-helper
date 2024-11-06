<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

function acary_cloud_helper_sendmail_render_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo __('Sending e-mails', 'acary-cloud-helper'); ?></h1>
        <p>
            <?php echo __('This page allows you to configure the sending of e-mails from your site.', 'acary-cloud-helper'); ?>
        </p>
        <p class="for_aucun" style="color: red;">
            <strong><?php echo __('Note:', 'acary-cloud-helper'); ?></strong> <?php echo __('If no e-mail system is configured, e-mails from this site may not be sent.', 'acary-cloud-helper'); ?>
        </p>
        <form method="post" action="options.php" id="acarycloud_mail_form">
            <?php settings_fields(ACARYCLOUDHELPER_PREFIX . 'sendmail'); ?>
            <?php do_settings_sections(ACARYCLOUDHELPER_PREFIX . 'sendmail'); ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Type</th>
                    <td>
                        <select name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_type'); ?>" style="width: 300px;max-width:100%;">
                            <option value="" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === '' ? 'selected' : ''; ?>>Aucun</option>
                            <option value="sitemail" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === 'sitemail' ? 'selected' : ''; ?>>SiteMail</option>
                            <option value="smtp" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === 'smtp' ? 'selected' : ''; ?>>SMTP</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top" class="for_sitemail">
                    <th scope="row"><?php echo __('SiteMail Key', 'acary-cloud-helper'); ?></th>
                    <td><input type="text" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_sitemail_key'); ?>" style="width: 400px;max-width:100%;" value="<?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_sitemail_key'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_sitemail">
                    <th scope="row"><?php echo __('Sender\'s name', 'acary-cloud-helper'); ?></th>
                    <td><input type="text" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_sitemail_from_name'); ?>" style="width: 400px;max-width:100%;" value="<?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_sitemail_from_name'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row"><?php echo __('SMTP host', 'acary-cloud-helper'); ?></th>
                    <td><input type="text" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_host'); ?>" style="width: 400px;max-width:100%;" value="<?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_host'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row"><?php echo __('SMTP port', 'acary-cloud-helper'); ?></th>
                    <td><input type="text" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_port'); ?>" style="width: 400px;max-width:100%;" value="<?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_port'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row"><?php echo __('Encryption type', 'acary-cloud-helper'); ?></th>
                    <td>
                        <select name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_encryption'); ?>" style="width: 300px;max-width:100%;">
                            <option value="none" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_encryption') === 'none' ? 'selected' : ''; ?>>None</option>
                            <option value="ssl" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_encryption') === 'ssl' ? 'selected' : ''; ?>>SSL</option>
                            <option value="tls" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_encryption') === 'tls' ? 'selected' : ''; ?>>TLS</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row"><?php echo __('User name (e-mail)', 'acary-cloud-helper'); ?></th>
                    <td><input type="text" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_username'); ?>" style="width: 400px;max-width:100%;" value="<?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_username'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row"><?php echo __('Password', 'acary-cloud-helper'); ?></th>
                    <td><input type="password" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_password'); ?>" style="width: 400px;max-width:100%;" value="<?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_password'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row"><?php echo __('Sender\'s name', 'acary-cloud-helper'); ?></th>
                    <td><input type="text" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_name'); ?>" style="width: 400px;max-width:100%;" value="<?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_name'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row"><?php echo __('Sender\'s email', 'acary-cloud-helper'); ?></th>
                    <td><input type="text" name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_email'); ?>" style="width: 400px;max-width:100%;" value="<?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_email'); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    
        <style>
            .for_sitemail, .for_smtp, .for_aucun {
                display: none;
            }
        </style>
        <script>
            jQuery(document).ready(function($) {
                $('select[name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_type'); ?>"]').change(function() {
                    if ($(this).val() === 'sitemail') {
                        $('.for_sitemail').show();
                        $('.for_smtp').hide();
                        $('.for_aucun').hide();
                    } else if ($(this).val() === 'smtp') {
                        $('.for_sitemail').hide();
                        $('.for_smtp').show();
                        $('.for_aucun').hide();
                    } else {
                        $('.for_sitemail').hide();
                        $('.for_smtp').hide();
                        $('.for_aucun').show();
                    }
                });
                $('select[name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_type'); ?>"]').trigger('change');
            });
        </script>


        <div style="margin-top:100px;">
            <h1><?php echo __('Test the e-mail delivery', 'acary-cloud-helper'); ?></h1>
            <p>
                <?php echo __('You can test the configuration using the form below.', 'acary-cloud-helper'); ?>
            </p>
            <form method="post" action="" id="testing-form">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php echo __('Recipient\'s e-mail', 'acary-cloud-helper'); ?></th>
                        <td><input type="text" id="test-email" name="test-email" style="width: 400px;max-width:100%;" value="" /></td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo __('Send', 'acary-cloud-helper'); ?>" spellcheck="false">
                </p>
            </form>

            <script>
                jQuery(document).ready(function($){
                    $('#testing-form').submit(function(e) {
                        e.preventDefault();

                        $('#testing-form input[type="submit"]').val('<?php echo __('Sending...', 'acary-cloud-helper'); ?>');
                        $('#testing-form input[type="submit"]').prop('disabled', true);
                        $('#testing-form input[type="submit"]').css('cursor', 'not-allowed');
                        $('#testing-form input[type="submit"]').css('opacity', '0.7');
                        $('#testing-form input[type="submit"]').css('pointer-events', 'none');

                        var form = $(this);
                        $.ajax({
                            type: "POST",
                            url: form.attr('action'),
                            data: form.serialize(),
                            success: function(data) {
                                //wait 2 seconds
                                setTimeout(function() {
                                    //reload the page
                                    location.reload();
                                }, 1000);
                                
                            }
                        });
                    });
                });
            </script>
            <?php
                if(isset($_POST['test-email'])) {
                    $to = $_POST['test-email'];
                    $subject = __('Test e-mail', 'acary-cloud-helper');
                    $message = __('The e-mail has been sent correctly. <br><br>Please check that the sender is the one you entered in your site settings.', 'acary-cloud-helper');
                    $headers = array('Content-Type: text/html; charset=UTF-8');

                    wp_mail($to, $subject, $message, $headers);
                }
            ?>
        </div>
    </div>
    
    <?php
}