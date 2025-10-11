<?php
/**
 * API for theme integration (deprecated)
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\theme_integration;

use mdb_license_management\classes\Media_Credit;
use mdb_license_management\classes\Media_License;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Names the license of a media (with link if applicable).
 *
 * @since 0.0.1
 *
 * @param int $id The media attachment ID
 *
 * @return string Output of the license details.
 */

function get_license( $id ) {
    $output       = '';
    $credit       = new Media_Credit( $id );

/*
    if ( ! empty( $license_guid ) and ( true == array_key_exists( $license_guid, LICENSES ) ) ) {
        if ( ! empty( LICENSES[$license_guid]['license_url'] ) ) {
            $output = sprintf(
                '<a href="%1$s" target="_blank" rel="noopener" name="%2$s">[%2$s]</a>',
                LICENSES[$license_guid]['license_url'],
                LICENSES[$license_guid]['license_term']
            );
        } else {
            $output = sprintf(
                '[%1$s]',
                LICENSES[$license_guid]['license_term']
            );
        }
    }*/
    return $output;
}



/**
 * Returns the creator's credit line.
 *
 * @since 0.0.1
 *
 * @param int $id The media attachment ID
 *
 * @return string Output of the credits.
 */

function get_byline( $id ) {
    $credit = new Media_Credit( $id );

    return $credit->get_creator_credit();
}
