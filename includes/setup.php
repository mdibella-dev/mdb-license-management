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
    global $wpdb;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );


    $table_name = $wpdb->prefix . table_media;


    if ( $table_name == $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) ) {

        // Add an update procedure here (looping through all media_ids aso)
        // !! Make sure taxonomy media_license already exist to this point!

        /*
        $sql = "CREATE TABLE $table_name (
            media_id bigint(20) UNSIGNED NOT NULL,
            media_link varchar(255) DEFAULT '' NOT NULL,
            media_state int(8) UNSIGNED DEFAULT 0,
            license_guid varchar(4) DEFAULT '' NOT NULL,
            by_name varchar(255) DEFAULT '' NOT NULL,
            by_link varchar(255) DEFAULT '' NOT NULL,
            PRIMARY KEY  (media_id)
            )
            COLLATE utf8_general_ci;";

        dbDelta( $sql );
        */

        // Remove existing table

    }
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\plugin_activation' );



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

register_uninstall_hook( __FILE__, __NAMESPACE__ . '\plugin_uninstall' );
