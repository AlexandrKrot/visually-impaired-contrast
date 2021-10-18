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
                    <td><textarea name="wic_css" id="customcss" cols="50" rows="10"><?php echo htmlspecialchars_decode($wic_css); ?></textarea>
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
<?php
global $pagenow;

if ( ( 'admin.php' === $pagenow ) && ( 'v-i-contrast' === $_GET['page'] ) ) {

    $custom_css = wp_enqueue_code_editor( array( 'type' => 'text/css' ) );
    $header_js  = wp_enqueue_code_editor( array( 'type' => 'application/javascript' ) );
    $footer_js  = wp_enqueue_code_editor( array( 'type' => 'application/javascript' ) );

    wp_add_inline_script(
        'code-editor',
        sprintf(
            'jQuery( function() {
//                    wp.codeEditor.initialize( jQuery( "#customcss" ), %1$s );
//                    wp.codeEditor.initialize( jQuery( "#customcss" ), %2$s );
                    wp.codeEditor.initialize( jQuery( "#customcss" ), %3$s );
                });',
            wp_json_encode( $custom_css ),
            wp_json_encode( $header_js ),
            wp_json_encode( $footer_js )
        )
    );
}