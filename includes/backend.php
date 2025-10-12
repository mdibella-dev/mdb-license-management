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

    // $current_screen = get_current_screen();

    /** Enqueue styles */

    wp_enqueue_style(
        'mdb_license_management-backend-style',
        PLUGIN_URL . 'assets/build/css/backend.min.css',
        [],
        PLUGIN_VERSION
    );
}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\plugin_backend_scripts' );
