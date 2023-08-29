<?php
/**
 * Functions to handle the backend.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Load the backend scripts and styles.
 *
 * @since 0.0.3
 */

function plugin_backend_scripts() {
    $current_screen = get_current_screen();

    if( ( 'upload' === $current_screen->id ) or ( 'attachment' === $current_screen->id ) ):

        /**
         * Enqueue style settings for both upload and attachment page
         */

        wp_enqueue_style(
            'mdb_license_management-backend-style',
            PLUGIN_URL . 'assets/build/css/backend.min.css',
            [],
            PLUGIN_VERSION
        );


        /**
         * Enqueue script for upload page only
         */

        if( 'upload' === $current_screen->id ) :
            wp_enqueue_script(
                'mdb_license_management-backend-upload-script',
                PLUGIN_URL . 'assets/build/js/backend-upload.min.js',
                [
                    'jquery'
                ],
                PLUGIN_VERSION,
                true
            );
        endif;


        /**
         * Enqueue script for attachment page only
         */

        if( 'attachment' === $current_screen->id ) :
            wp_enqueue_script(
                'mdb_license_management-backend-attachment-script',
                PLUGIN_URL . 'assets/build/js/backend-attachment.min.js',
                [
                    'jquery'
                ],
                PLUGIN_VERSION,
                true
            );
        endif;

    endif;
}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\plugin_backend_scripts' );
