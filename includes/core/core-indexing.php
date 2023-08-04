<?php
/**
 * Indexing function.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Reads out a media (attachment) and prepares a (largely empty) entry for the media table.
 *
 * @since 0.0.1
 *
 * @todo Checking if a media is already in the media table.
 *
 * @param int $id The ID of the medium.
 */

function process_media_indexing( $id )
{
    global $wpdb;

    $table_name   = $wpdb->prefix . table_media;
    $table_format = array( '%d', '%s', '%s', '%s', '%s', '%s' );
    $table_data   = array(
        'media_id'     => $id,
        'media_link'   => '',
        'media_state'  => MEDIA_STATE_UNKNOWN,
        'license_guid' => '',
        'by_name'      => '',
        'by_link'      => ''
    );

    $wpdb->insert( $table_name, $table_data, $table_format );
}
