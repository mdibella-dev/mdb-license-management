<?php
/**
 * API for theme integration.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Names the license of a medium (with link if necessary).
 *
 * @since 0.0.1
 *
 * @param int $id The ID of the record of a media in the media table of the plugin.
 *
 * @return string Output of the license details.
 */

function api_get_license( $id )
{
    $media  = get_media_record( $id );
    $output = '';

    if( $media['license_guid'] ) :
        $license = get_license_record( $media['license_guid'] );

        if( '' !== $license['license_link'] ) :
            $output = sprintf(
                '<a href="%1$s" target="_blank" rel="nofollow" name="%2$s">[%2$s]</a>',
                $license['license_link'],
                $license['license_term']
            );
        else :
            $output = sprintf(
                '[%1$s]',
                $license['license_term']
            );
        endif;
    endif;

    return $output;
}



/**
 * Gives the author of a medium (with link, if applicable).
 *
 * @since 0.0.1
 *
 * @param int $id The ID of the record of a media in the media table of the plugin.
 *
 * @return string Output of the author details.
 */

function api_get_byline( $id )
{
    $media  = get_media_record( $id );
    $output = '';

    if( '' !== $media['by_name'] ) :
        if( '' !== $media['by_link'] ) :
            $output = sprintf(
                '<a href="%1$s" target="_blank" rel="nofollow" name="%2$s">%2$s</a>',
                $media['by_link'],
                $media['by_name']
            );
        else :
            $output = $media['by_name'];
        endif;
    endif;

    return $output;
}
