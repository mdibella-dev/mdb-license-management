<?php
/**
 * Core-Funktionen
 *
 * @author  Marco Di Bella
 * @package mdb-lv
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Aktualisiert den Datensatz eines Mediums in der Medien-Tabelle des Plugins.
 *
 * @since 0.0.1
 * @param array $table_data    Die zu aktualiserenden Daten.
 */

function mdb_lv_update_media_record( $table_data )
{
    global $wpdb;

    $table_name   = $wpdb->prefix . 'mdb_lv_media';
    $table_where  = array( 'media_id' => $table_data['media_id'] );
    $wpdb->update( $table_name, $table_data, $table_where );
}



/**
 * Holt einen Datensatz zu einem Medium aus der Medien-Tabelle des Plugins.
 *
 * @since  0.0.1
 * @param  int    $id   Die ID des Datensatzes eines Mediums in der Medien-Tabelle des Plugins.
 * @return array        Der angeforderte Datensatz.
 */

function mdb_lv_get_media_record( $id )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'mdb_lv_media';
    $table_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE media_id=$id", 'ARRAY_A' );

    return $table_data[ 0 ];
}



/**
 * Holt Lizenzinformationen aus der entsprechenden Tabelle des Plugins.
 *
 * @since 0.0.1
 *
 * @param  int    $license_guid    Die ID des Lizenzeintrags in der entsprechenden Tabelle des Plugins.
 * @return array                   Der angeforderte Datensatz.
 */

function mdb_lv_get_license_record( $license_guid )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'mdb_lv_licenses';
    $table_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE license_guid='$license_guid'", 'ARRAY_A' );

    return $table_data[ 0 ];
}
