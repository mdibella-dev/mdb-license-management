<?php
/**
 * Functions to handle the backend.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace MDB_License_Management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Load the backend scripts and styles.
 *
 * @since 0.0.3
 */

function plugin_backend_scripts() {
    $current_screen = get_current_screen();
    $screens        = ['upload', 'attachment', 'edit-media_license'];

    if ( true == in_array( $current_screen->id, $screens ) ) {
        wp_enqueue_style(
            'mdb_license_management-backend-style',
            PLUGIN_URL . 'assets/build/css/backend.min.css',
            [],
            PLUGIN_VERSION
        );
    }
}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\plugin_backend_scripts' );
