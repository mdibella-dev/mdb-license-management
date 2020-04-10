<?php
/*
Plugin Name:     Marco Di Bella - Lizenzverwaltung
Author:          Marco Di Bella
Author URI:      https://www.marcodibella.de
Description:     Ergänzt die Mediathek um Funktionen zur Verwaltung von Copyright-Lizenzen sowie zur Erstellung und Abfrage entsprechender Credits.
Version:         0.0.2
Text Domain:     mdb_lv
*/


// Check & Quit
defined( 'ABSPATH' ) OR exit;



/**
 * Konstanten
 **/

define( 'LICENSE_GUID_CC0', '0001' );
define( 'LICENSE_GUID_DREAMSTIME_RF', 'L054' );

define( 'MEDIA_STATE_UNKNOWN', 0 );
define( 'MEDIA_STATE_NO_CREDIT', 1 );
define( 'MEDIA_STATE_SIMPLE_CREDIT', 2 );
define( 'MEDIA_STATE_LICENSED', 3 );



/**
 * Funktionsbibliothek einbinden
 **/

require_once( __DIR__ . '/inc/core.php' );
require_once( __DIR__ . '/inc/api.php' );
require_once( __DIR__ . '/inc/class-main-table.php' );
require_once( __DIR__ . '/inc/media-library-enhancement.php' );
require_once( __DIR__ . '/inc/indexing.php' );
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
            license_guid varchar(4) DEFAULT '' NOT NULL,
            license_term varchar(50) DEFAULT '' NOT NULL,
            license_description text NOT NULL,
            license_link varchar(255) DEFAULT '' NOT NULL,
            license_version varchar(20) DEFAULT '' NOT NULL,
            PRIMARY KEY  (license_guid)
            )
            COLLATE utf8_general_ci;";

        dbDelta( $sql );


        /**
         * Preset laden
         */

        if( ( $file_handle = fopen( __DIR__ . "/assets/csv/preset.csv", "r" ) ) !== FALSE ) :
            $file_row = 1;

            while( ( $file_data = fgetcsv( $file_handle, 1000, ",", "'" ) ) !== FALSE ) :
                if( $file_row != 1 ) :  // erste Zeile mit Titelfeldern ignorieren
                    $table_format = array( '%s', '%s', '%s', '%s', '%s' );
                    $table_data   = array(
                        'license_guid'        => $file_data[0],
                        'license_term'        => $file_data[1],
                        'license_description' => $file_data[2],
                        'license_link'        => $file_data[3],
                        'license_version'     => $file_data[4]
                        );

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
            media_state int(8) UNSIGNED DEFAULT 0,
            license_guid varchar(4) DEFAULT '' NOT NULL,
            by_name varchar(255) DEFAULT '' NOT NULL,
            by_link varchar(255) DEFAULT '' NOT NULL,
            PRIMARY KEY  (media_id)
            )
            COLLATE utf8_general_ci;";

        dbDelta( $sql );
    endif;
}

register_activation_hook( __FILE__, 'mdb_lv_plugin_activation' );



/**
 * Lädt Plugin-Scripts
 *
 * @since 0.0.1
 */

function mdb_lv_upload()
{
    $currentScreen = get_current_screen();

    if( 'upload' === $currentScreen->id ) :

        global $mode;

        if( 'grid' === $mode ) :

            wp_enqueue_style( 'mdb_lizenzverwaltung', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css' );
            wp_enqueue_script( 'mdb_lizenzverwaltung', plugin_dir_url( __FILE__ ) . 'assets/js/admin.js', array( 'jquery' ), false, true );
        endif;

    endif;
}

add_action( 'admin_enqueue_scripts', 'mdb_lv_upload' );
