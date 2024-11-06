<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

function acary_cloud_helper_sendmail_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Envoi des courriels</h1>
        <p>
            Vous permet de configurer la façon dont les courriels sont envoyés de votre site.
        </p>
        <form method="post" action="options.php" id="acarycloud_mail_form">
            <?php settings_fields('acarycloud_mail'); ?>
            <?php do_settings_sections('acarycloud_mail'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Type</th>
                    <td>
                        <select name="acarycloud_mail_type" style="width: 300px;max-width:100%;">
                            <option value="" <?php echo get_option('acarycloud_mail_type') === '' ? 'selected' : ''; ?>>Aucun</option>
                            <option value="sitemail" <?php echo get_option('acarycloud_mail_type') === 'sitemail' ? 'selected' : ''; ?>>SiteMail</option>
                            <option value="smtp" <?php echo get_option('acarycloud_mail_type') === 'smtp' ? 'selected' : ''; ?>>SMTP</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top" class="for_sitemail">
                    <th scope="row">Clé SiteMail</th>
                    <td><input type="text" name="acarycloud_mail_sitemail_key" style="width: 400px;max-width:100%;" value="<?php echo get_option('acarycloud_mail_sitemail_key'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_sitemail">
                    <th scope="row">Nom de l'expéditeur</th>
                    <td><input type="text" name="acarycloud_mail_sitemail_from_name" style="width: 400px;max-width:100%;" value="<?php echo get_option('acarycloud_mail_sitemail_from_name'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row">Hôte SMTP</th>
                    <td><input type="text" name="acarycloud_mail_smtp_host" style="width: 400px;max-width:100%;" value="<?php echo get_option('acarycloud_mail_smtp_host'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row">Port SMTP</th>
                    <td><input type="text" name="acarycloud_mail_smtp_port" style="width: 400px;max-width:100%;" value="<?php echo get_option('acarycloud_mail_smtp_port'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row">Type de chiffrement</th>
                    <td>
                        <select name="acarycloud_mail_smtp_encryption" style="width: 300px;max-width:100%;">
                            <option value="none" <?php echo get_option('acarycloud_mail_smtp_encryption') === 'none' ? 'selected' : ''; ?>>None</option>
                            <option value="ssl" <?php echo get_option('acarycloud_mail_smtp_encryption') === 'ssl' ? 'selected' : ''; ?>>SSL</option>
                            <option value="tls" <?php echo get_option('acarycloud_mail_smtp_encryption') === 'tls' ? 'selected' : ''; ?>>TLS</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row">Nom d'utilisateur (courriel)</th>
                    <td><input type="text" name="acarycloud_mail_smtp_username" style="width: 400px;max-width:100%;" value="<?php echo get_option('acarycloud_mail_smtp_username'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row">Mot de passe</th>
                    <td><input type="password" name="acarycloud_mail_smtp_password" style="width: 400px;max-width:100%;" value="<?php echo get_option('acarycloud_mail_smtp_password'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row">Nom de l'expéditeur</th>
                    <td><input type="text" name="acarycloud_mail_smtp_from_name" style="width: 400px;max-width:100%;" value="<?php echo get_option('acarycloud_mail_smtp_from_name'); ?>" /></td>
                </tr>
                <tr valign="top" class="for_smtp">
                    <th scope="row">Courriel de l'expéditeur</th>
                    <td><input type="text" name="acarycloud_mail_smtp_from_email" style="width: 400px;max-width:100%;" value="<?php echo get_option('acarycloud_mail_smtp_from_email'); ?>" /></td>
                </tr>
            </table>
            <p class="for_aucun" style="color: red;">
                <strong>Remarque:</strong> Si aucun système d'envoi de courriel n'est configuré. Les courriels de ce site ne seront pas envoyés.
            </p>
            <?php submit_button(); ?>

            <script>
                jQuery(document).ready(function($){
                    $('#acarycloud_mail_form').submit(function(e) {
                        e.preventDefault();

                        $('#acarycloud_mail_form input[type="submit"]').val('Enregistrement...');
                        $('#acarycloud_mail_form input[type="submit"]').prop('disabled', true);
                        $('#acarycloud_mail_form input[type="submit"]').css('cursor', 'not-allowed');
                        $('#acarycloud_mail_form input[type="submit"]').css('opacity', '0.7');
                        $('#acarycloud_mail_form input[type="submit"]').css('pointer-events', 'none');

                        var form = $(this);
                        $.ajax({
                            type: "POST",
                            url: form.attr('action'),
                            data: form.serialize(),
                            success: function(data) {
                                setTimeout(function() {
                                    //reload the page
                                    location.reload();
                                }, 100);
                                
                            }
                        });
                    });
                });
            </script>
        </form>
    
        <style>
            .for_sitemail, .for_smtp, .for_aucun {
                display: none;
            }
        </style>
        <script>
            jQuery(document).ready(function($) {
                $('select[name="acarycloud_mail_type"]').change(function() {
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
                $('select[name="acarycloud_mail_type"]').trigger('change');
            });
        </script>


        <div style="margin-top:100px;">
            <h1>Tester l'envoi de courriel</h1>
            <p>
                Vous pouvez tester l'envoi de courriel en utilisant le formulaire ci-dessous.
            </p>
            <form method="post" action="" id="testing-form">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Courriel du destinataire</th>
                        <td><input type="text" id="test-email" name="test-email" style="width: 400px;max-width:100%;" value="" /></td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Envoyer un test" spellcheck="false">
                </p>
            </form>

            <script>
                jQuery(document).ready(function($){
                    $('#testing-form').submit(function(e) {
                        e.preventDefault();

                        $('#testing-form input[type="submit"]').val('Envoi en cours...');
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
                //SEND A TEST EMAIL
                if(isset($_POST['test-email'])) {
                    $to = $_POST['test-email'];
                    $subject = 'Ça marche!';
                    $message = 'Le courriel a été envoyé correctement.<br><br>Veuillez vérifier si l\'expéditeur est bien celui que vous avez entré dans les paramètres de votre site.';
                    $headers = array('Content-Type: text/html; charset=UTF-8');

                    wp_mail($to, $subject, $message, $headers);
                }
            ?>
        </div>
    </div>
    
    <?php
}