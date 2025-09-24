<?php
/**
 * API for theme integration (deprecated)
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\theme_integration;

use mdb_license_management\Media_Record;
use const mdb_license_management\LICENSES;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Names the license of a media (with link if applicable).
 *
 * @since 0.0.1
 *
 * @param int $id The attachment's post_ID.
 *
 * @return string Output of the license details.
 */

function get_license( $id ) {
    $output       = '';
    $record       = new Media_Record( $id );
    $license_guid = $record->get_license_guid();

    if ( ! empty( $license_guid ) and ( true == array_key_exists( $license_guid, LICENSES ) ) ) {
        if ( ! empty( LICENSES[$license_guid]['license_link'] ) ) {
            $output = sprintf(
                '<a href="%1$s" target="_blank" rel="noopener" name="%2$s">[%2$s]</a>',
                LICENSES[$license_guid]['license_link'],
                LICENSES[$license_guid]['license_term']
            );
        } else {
            $output = sprintf(
                '[%1$s]',
                LICENSES[$license_guid]['license_term']
            );
        }
    }
    return $output;
}



/**
 * Returns the creator's credit line.
 *
 * @since 0.0.1
 *
 * @param int $id The attachment's post_ID.
 *
 * @return string Output of the credits.
 */

function get_byline( $id ) {
    $record = new Media_Record( $id );

    return $record->get_by_name();
}
