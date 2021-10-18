<?php


$message = (get_option('no_login_message')) ? get_option('no_login_message') : '';
?>
    <div class="wrap">
        <h2>Visually impaired contrast</h2>

        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>

            <table class="form-table">
                <tr>
                    <th scope="row">Custom css<br />

                    </th>
                    <td><textarea name="tel_pub_html" id="" cols="50" rows="10"><?php echo htmlspecialchars_decode(get_option('wic_css')); ?></textarea>
                    </td>
                </tr>

            </table>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="wic_css" />
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>

        </form>
    </div>
