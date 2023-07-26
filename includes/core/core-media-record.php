<?php
/**
 * Functions for processing data sets.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Updates the record of a media in the media table of the plugin.
 *
 * @since 0.0.1
 *
 * @param array $table_data The data to be updated.
 */

function update_media_record( $table_data )
{
    global $wpdb;

    $table_name  = $wpdb->prefix . TABLE_MEDIA;
    $table_where = array( 'media_id' => $table_data['media_id'] );

    $wpdb->update( $table_name, $table_data, $table_where );
}



/**
 * Fetches a record for a media from the media table of the plugin.
 *
 * @since 0.0.1
 *
 * @param int $id The ID of the record of a media in the media table of the plugin.
 *
 * @return array The requested data set.
 */

function get_media_record( $id )
{
    global $wpdb;

    $table_name = $wpdb->prefix . TABLE_MEDIA;
    $result     = $wpdb->get_results( "SELECT * FROM $table_name WHERE media_id=$id", 'ARRAY_A' );

    if( null == $result ) :
        return null;
    else :
        return $result[0];
    endif;
}



/**
 * Fetches license information from the corresponding table of the plugin.
 *
 * @since 0.0.1
 *
 * @param int $license_guid The ID of the license entry in the corresponding table of the plugin.
 *
 * @return array The requested data set.
 */

function get_license_record( $license_guid )
{
    global $wpdb;

    $table_name = $wpdb->prefix . TABLE_LICENSES;
    $result     = $wpdb->get_results( "SELECT * FROM $table_name WHERE license_guid='$license_guid'", 'ARRAY_A' );

    if( null == $result ) :
        return null;
    else :
        return $result[0];
    endif;
}
