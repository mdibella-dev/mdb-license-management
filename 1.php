<?php

function wpse142997_wp_enqueue_scripts() {
    wp_enqueue_script( 'wpse142997', get_stylesheet_directory_uri() . '/wpse142997.js', array( 'jquery', 'media-views' ), '1.0' );
    $params = array(
        'is_dup_nonce' => wp_create_nonce( 'wpse142997_is_dup_submit_' ),
    );
    wp_localize_script( 'wpse142997', 'wpse142997_params', $params );
    ob_start();
    ?>
<style>
.attachment-dmc { float:left; overflow:hidden; position:relative; }
.attachment-dmc div { background-color:#FFEBE7; border:1px solid #CB9495; border-radius:5px; margin-top:16px; padding:6px; }
.attachment-dmc div h3 { margin-top:0; }
.attachment-dmc div h3 span { background-color:#E70000; border-radius:5px; color:white; margin-top:0; padding:0 6px; }
</style>
    <?php
    wp_add_inline_style( 'media-views', str_replace( array( '<style>', '</style>' ), '', ob_get_clean() ) );
}

function wpse142997_print_media_templates() {
?>
<script type="text/html" id="tmpl-attachment-dmc">
    <# if ( data.dup_original ) { #>
        <div>
            <h3><span><?php _e( 'Duplicate file detected' ); ?></span></h3>
            <p>
                <?php _e( 'This file appears to be a duplicate of <a href="{{ data.dup_original.attributes.editLink }}&amp;image-editor" target="_blank">{{ data.dup_original.attributes.filename }}</a> uploaded on {{ data.dup_original.attributes.dateFormatted }}' ); ?>
            </p>
            <button id="run_dmc" class="dmc" name="dmc"><?php _e( 'Remove duplicate and select original' ); ?></button>
        </div>
    <# } #>
</script>
<?php
}

function wpse142997_is_dup() {
    $ret = array( 'error' => false );

    if ( ! check_ajax_referer( 'wpse142997_is_dup_submit_', 'nonce', false /*die*/ ) ) {
        $ret['error'] = __( 'Permission error' );
    } else {
        $dup_id = isset( $_POST['dup_id'] ) ? $_POST['dup_id'] : '';
        if ( ! $dup_id || ! ( $post = get_post( $dup_id ) ) ) {
            $ret['error'] = __( 'Bad dup_id' );
        } else {
            $post_name = preg_replace( '/-[0-9]+$/', '', $post->post_name );
            global $wpdb;
            $sql = $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->posts . ' WHERE'
                . ' post_title = %s AND post_type = %s AND post_mime_type = %s AND post_status = %s AND post_name = %s ORDER BY post_date ASC LIMIT 1',
                $post->post_title, $post->post_type, $post->post_mime_type, $post->post_status, $post_name
            );
            if ( $original_id = $wpdb->get_var( $sql ) ) {
                $ret['original_id'] = $original_id;
                $ret['dup_id'] = $dup_id;
            }
        }
    }

    wp_send_json( $ret );
}

add_action( 'admin_enqueue_scripts', 'wpse142997_wp_enqueue_scripts' );
add_action( 'print_media_templates', 'wpse142997_print_media_templates' );
add_action( 'wp_ajax_wpse142997_is_dup', 'wpse142997_is_dup' );
