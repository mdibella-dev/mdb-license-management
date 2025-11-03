<?php
/**
 * Functions to activate, initiate and deactivate the plugin.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * The init function for the plugin.
 *
 * @since 0.0.3
 */

function plugin_init() {
    // Load text domain, use relative path to the plugin's language folder
    load_plugin_textdomain( 'mdb-license-management', false, plugin_basename( PLUGIN_DIR ) . '/languages' );
}

add_action( 'init', __NAMESPACE__ . '\plugin_init', 9 );



/**
 * The activation function for the plugin.
 *
 * @since 0.0.1
 */

function plugin_activation() {
    // Do something!
}



/**
 * The uninstall function for the plugin.
 *
 * @since 0.0.3
 *
 * @todo a routine to delete the media table.
 */

function plugin_uninstall() {
    // Do something!
    // Delete options!
    // Delete custom tables!
}
