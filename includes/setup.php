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
 * @todo needs some version checking / options handling
 * @todo should initiate a recounting of all licensed media
 * @todo needs somer error handling
 *
 * @since 0.0.1
 */

function plugin_activation() {

    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }


    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    global $wpdb;
           $collate = $wpdb->get_charset_collate();

    /**
     *  Prepare database table TABLE_MEDIA.
     */

    $table_name = $wpdb->prefix . TABLE_MEDIA;

    if ( $table_name !== $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) ) {
        dbDelta( "CREATE TABLE $table_name (
            media_id BIGINT(20) UNSIGNED DEFAULT 0 NOT NULL,
            media_link VARCHAR(255) DEFAULT '' NOT NULL,
            media_state INT(8) UNSIGNED DEFAULT 0 NOT NULL,
            license_guid VARCHAR(4) DEFAULT '' NOT NULL,
            by_name VARCHAR(255) DEFAULT '' NOT NULL,
            by_link VARCHAR(255) DEFAULT '' NOT NULL,
            PRIMARY KEY (media_id)
            )
            COLLATE $collate;" );
    }

    /**
     *  Prepare database table TABLE_LICENSES.
     * @todo error handling! (e.g. missing file, db error)
     */

    $file = file_get_contents( PLUGIN_DIR . 'assets/build/json/licenses.json', false );

    if ( false !== $file ) {
        $preset     = json_decode( $file , true );
        $table_name = $wpdb->prefix . TABLE_LICENSES;

        error_log($table_name);

        // Remove existing table
        // @todo remove only if a newer version of the table exists
        // maybe add wpdb->prepare() / https://developer.wordpress.org/reference/classes/wpdb/prepare/
        $wpdb->query( "DROP TABLE IF EXISTS $table_name" );

        // Create table
        dbDelta( "CREATE TABLE IF NOT EXISTS $table_name (
            license_guid VARCHAR(4) DEFAULT '' NOT NULL,
            license_name VARCHAR(50) DEFAULT '' NOT NULL,
            license_description TEXT DEFAULT '' NOT NULL,
            license_link VARCHAR(255) DEFAULT '' NOT NULL,
            license_count SMALLINT UNSIGNED DEFAULT 0 NOT NULL,
            PRIMARY KEY (license_guid)
            )
            COLLATE $collate;" );

        // Update table with preset
        foreach ( $preset['Licenses'] as $guid => $content ) {
            $table_format = ['%s', '%s', '%s', '%s', '%s'];
            $table_data   = [
                'license_guid'        => $guid,
                'license_name'        => $content['license_name'],
                'license_description' => $content['license_description'],
                'license_link'        => $content['license_link'],
                'license_count'       => $content['license_count'],
            ];
            $wpdb->insert( $table_name, $table_data, $table_format );
        }
    }
    // No file found?
    else {
        // Do something!
    }
}



/**
 * The deactivation function for the plugin.
 *
 * @since 0.0.3
 */

function plugin_deactivation() {

    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }

    // Do something!
}



/**
 * The uninstall function for the plugin.
 *
 * @since 0.0.3
 *
 * @todo a routine to delete the tables.
 */

function plugin_uninstall() {

    if ( ! current_user_can( 'delete_plugins' ) ) {
        return;
    }

    // Do something!
    // Delete options!
    // Delete custom tables!
}
