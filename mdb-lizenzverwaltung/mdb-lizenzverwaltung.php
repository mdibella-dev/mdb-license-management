<?php
/*
Plugin Name:     Lizenzverwaltung
Author:          Marco Di Bella
Author URI:      https://www.marcodibella.de
Description:     Ergänzt die Mediathek um Funktionen zur Verwaltung von Copyright-Lizenzen sowie zur Erstellung und Abfrage entsprechender Credits.
Version:         0.0.1
Text Domain:     mdb_lv
*/



// Check & Quit
defined( 'ABSPATH' ) OR exit;


// Dateien einbinden
require_once( __DIR__ . '/inc/mainpage.php' );


/**
 * Zentrale Aktivierungsfunktion für das Plugin
 *
 * @since 0.0.1
 */

function mdb_lv_plugin_activation()
{
    global $wpdb;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );


    /**
     * Tabelle für Lizenzen
     */

    $charset_collate = $wpdb->get_charset_collate();
    $table_name      = $wpdb->prefix . 'mdb_lv_licenses';

    if( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name) :

        /**
         * Tabelle installieren
         */

        $sql = "CREATE TABLE $table_name (
            license_id int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
            license_term varchar(50) DEFAULT '' NOT NULL,
            license_description text NOT NULL,
            license_link varchar(255) DEFAULT '' NOT NULL,
            license_version varchar(20) DEFAULT '' NOT NULL,
            PRIMARY KEY  (license_id)
        ) $charset_collate;";

        dbDelta( $sql );


        /**
         * Preset laden
         */

        if( ( $file_handle = fopen( __DIR__ . "/preset.csv", "r" ) ) !== FALSE ) :
            $file_row = 1;

            while( ( $file_data = fgetcsv( $file_handle, 1000, ",", "'" ) ) !== FALSE ) :
                if( $file_row != 1 ) :  // erste Zeile mit Titelfeldern ignorieren
                    $table_data   = array(
                                    'license_id'          => 0,
                                    'license_term'        => $file_data[1],
                                    'license_description' => $file_data[2],
                                    'license_link'        => $file_data[3],
                                    'license_version'     => $file_data[4]
                                    );

                    $table_format = array( '%d', '%s', '%s', '%s', '%s' );

                    $wpdb->insert( $table_name, $table_data, $table_format );
                endif;

                $file_row++;
            endwhile;
            fclose( $file_handle );
        endif;
    endif;


    /**
     * Tabelle für Medien
     */

    $table_name = $wpdb->prefix . 'mdb_lv_media';

    if( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name) :

        /**
         * Tabelle installieren
         */

        $sql = "CREATE TABLE $table_name (
            media_id bigint(20) UNSIGNED NOT NULL,
            media_link varchar(255) DEFAULT '' NOT NULL,
            license_id int(8) UNSIGNED NOT NULL,
            by_name varchar(255) DEFAULT '' NOT NULL,
            by_link varchar(255) DEFAULT '' NOT NULL,
            PRIMARY KEY  (media_id)
        ) $charset_collate;";

        dbDelta( $sql );
    endif;
}

register_activation_hook( __FILE__, 'mdb_lv_plugin_activation' );
