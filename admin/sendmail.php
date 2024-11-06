<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

function acary_cloud_helper_sendmail_render_settings_page() {
    ?>
    <div class="acary_cloud_helper__container">
        <h1><?php echo __('Sending e-mails', 'acary-cloud-helper'); ?></h1>
        <p>
            <?php echo __('This page allows you to configure the sending of e-mails from your site.', 'acary-cloud-helper'); ?>
        </p>
        <p class="for_aucun" style="color: red;">
            <strong><?php echo __('Note:', 'acary-cloud-helper'); ?></strong> <?php echo __('If no e-mail system is configured, e-mails from this site may not be sent.', 'acary-cloud-helper'); ?>
        </p>
        <form method="post" action="options.php" class="acary_cloud_helper__block">
            <?php settings_fields(ACARYCLOUDHELPER_PREFIX . 'sendmail'); ?>
            <?php do_settings_sections(ACARYCLOUDHELPER_PREFIX . 'sendmail'); ?>

            <div class="acary_cloud_helper__block-header">
                <h3><?php echo __('Settings', 'acary-cloud-helper'); ?></h3>
            </div>
            <div class="acary_cloud_helper__block-content">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Type</th>
                        <td>
                            <select name="<?php echo(ACARYCLOUDHELPER_PREFIX . 'sendmail_type'); ?>" style="width: 300px;max-width:100%;">
                                <option value="" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === '' ? 'selected' : ''; ?>>Aucun</option>
                                <option value="smtp" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === 'smtp' ? 'selected' : ''; ?>>SMTP</option>
                                <option value="sitemail" <?php echo get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === 'sitemail' ? 'selected' : ''; ?>>SiteMail</option>
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
            </div>
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

        <form method="post" action="" id="testing-form" class="acary_cloud_helper__block">
            <div class="acary_cloud_helper__block-header">
                <h3><?php echo __('Test the e-mail delivery', 'acary-cloud-helper'); ?></h3>
            </div>
            <div class="acary_cloud_helper__block-content">
                <p>
                    <?php echo __('You can test the configuration using the form below.', 'acary-cloud-helper'); ?>
                </p>
                
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php echo __('Recipient\'s e-mail', 'acary-cloud-helper'); ?></th>
                        <td><input type="text" id="test-email" name="test-email" style="width: 400px;max-width:100%;" value="" /></td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo __('Send', 'acary-cloud-helper'); ?>" spellcheck="false">
                </p>
            </div>
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
    
    <?php
}

add_action('phpmailer_init', function($phpmailer) {
    if(get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === 'smtp') {
        $phpmailer->isSMTP();
        $phpmailer->Host = get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_host');
        $phpmailer->Port = get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_port');
        $phpmailer->SMTPAuth = true;
        $phpmailer->Username = get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_username');
        $phpmailer->Password = get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_password');
        $phpmailer->SMTPSecure = get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_encryption');
        $phpmailer->From = get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_email');
        $phpmailer->FromName = get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_name');
        $phpmailer->Sender = get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_smtp_from_email');
    }

    if(get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_type') === 'sitemail') {
        // Attachments
        $attachments = array();
        if (!empty($phpmailer->getAttachments())) {
            foreach ($phpmailer->getAttachments() as $attachment) {
                $attachments[] = array(
                    'filename' => $attachment[2],
                    'content' => base64_encode(file_get_contents($attachment[0])),
                    'encoding' => 'base64',
                );
            }
        }
 
        $url = 'https://api.sitemail.ca/send/';
        $data = array(
            'key' => get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_sitemail_key'),
            'host' => $_SERVER['HTTP_HOST'],
            'from' => get_option(ACARYCLOUDHELPER_PREFIX . 'sendmail_sitemail_from_name'),
            'to' => $phpmailer->getToAddresses(),
            'subject' => $phpmailer->Subject,
            'message' => $phpmailer->Body,
            'replyTo' => $phpmailer->getReplyToAddresses(),
            'attachments' => $attachments
        );

        // Conversion des données en JSON
        $jsonData = json_encode($data);

        // Configuration des options HTTP
        $response = wp_remote_post($url, array(
            'body'    => $jsonData,
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ));

        if (is_wp_error($response)) {
            error_log('Sitemail request failed: ' . $response->get_error_message());
        } else {
            $body = wp_remote_retrieve_body($response);
            error_log('Sitemail response: ' . $body);
        }
    }
});

//send test email
add_action('wp_ajax_acary_cloud_helper_sendmail_send_test_email', function() {
    $email = $_POST['email'];
    $subject = 'Test de courriel';
    $message = 'Ceci est un test de courriel.';

    $result = wp_mail($email, $subject, $message);

    if($result) {
        echo 'Le courriel a été envoyé avec succès.';
    } else {
        echo 'Une erreur est survenue lors de l\'envoi du courriel.';
    }

    wp_die();
});
add_action('wp_ajax_acary_cloud_helper_sendmail_send_test_email', 'acary_cloud_helper_sendmail_send_test_email');