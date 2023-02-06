<?php
/**
 * Indizierungsfunktion
 *
 * @author  Marco Di Bella
 * @package mdb-lv
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Liest ein Medium (attachement) aus und bereitet einen Eintrag für die Medien-Tabelle vor.
 *
 * @since 0.0.1
 * @param int    $id   Die ID des Mediums.
 */

function mdb_lv_indexing( $id )
{
    global $wpdb;

    $media_link   = '';
    $media_state  = MEDIA_STATE_UNKNOWN;
    $by_name      = '';
    $license_guid = '';


    /**
     * Kompatibilität:  Suche nach Medien-Credits die über das Theme "mdb-bs-rdg"/"mdb-rechtsdepesche" angelegt worden sind
     */

    // _media-meta-source => media_link
    if( in_array( '_media-meta-source', get_post_custom_keys( $id ) ) ) :
        $media_link = get_post_meta( $id, '_media-meta-source', true );

        if( false !== strpos( strtolower( $media_link), 'dreamstime' ) ) :
            $license_guid = LICENSE_GUID_DREAMSTIME_RF;
            $media_state  = MEDIA_STATE_LICENSED;
        elseif( false !== strpos( strtolower( $media_link), 'pixabay' ) ) :
            $license_guid = LICENSE_GUID_CC0;
            $media_state  = MEDIA_STATE_LICENSED;
        endif;
    endif;

    // _media-meta-credit => media_credit
    if( in_array( '_media-meta-credit', get_post_custom_keys( $id ) ) ) :
        $by_name = get_post_meta( $id, '_media-meta-credit', true );
    endif;


    /**
     * Tabelle beschreiben
     */

    $table_name   = $wpdb->prefix . 'mdb_lv_media';
    $table_format = array( '%d', '%s', '%s', '%s', '%s', '%s' );
    $table_data   = array(
        'media_id'     => $id,
        'media_link'   => $media_link,
        'media_state'  => $media_state,
        'license_guid' => $license_guid,
        'by_name'      => $by_name,
        'by_link'      => ''
    );

    $wpdb->insert( $table_name, $table_data, $table_format );
}
