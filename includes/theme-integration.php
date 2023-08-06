<?php
/**
 * API for theme integration (deprecated)
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\theme_integration;


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

    if( ! empty( $license_guid ) and ( true == array_key_exists( $license_guid, LICENSES ) ) ) :

        if( ! empty( LICENSES[$license_guid]['license_link'] ) ) :
            $output = sprintf(
                '<a href="%1$s" target="_blank" rel="nofollow" name="%2$s">[%2$s]</a>',
                LICENSES[$license_guid]['license_link'],
                LICENSES[$license_guid]['license_term']
            );
        else :
            $output = sprintf(
                '[%1$s]',
                LICENSES[$license_guid]['license_term']
            );
        endif;

    endif;

    return $output;
}



/**
 * Returns the creator's credit line (with link to his portfolio, if applicable).
 *
 * @since 0.0.1
 *
 * @param int $id The attachment's post_ID.
 *
 * @return string Output of the credits.
 */

function get_byline( $id ) {
    $output = '';
    $record = new Media_Record( $id );

    if( ! empty( $record->by_name ) ) :

        if( ! empty( $record->by_link ) ) :
            $output = sprintf(
                '<a href="%1$s" target="_blank" rel="nofollow" name="%2$s">%2$s</a>',
                $record->by_link,
                $record->by_name
            );
        else :
            $output = $record->by_name;
        endif;

    endif;

    return $output;
}
