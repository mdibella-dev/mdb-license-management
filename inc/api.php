<?php
/**
 * API für Themeintegration
 *
 * @author  Marco Di Bella <mdb@marcodibella.de>
 * @package mdb-lv
 */


defined( 'ABSPATH' ) or exit;



/**
 * Benennt die Lizenz eines Mediums (ggf. mit Link)
 *
 * @since 0.0.1
 */

function mdb_lv_get_license( $id ) {
    $media  = mdb_lv_get_media_record( $id );
    $output = '';

    if( $media[ 'license_guid' ] ) :
        $license = mdb_lv_get_license_record( $media[ 'license_guid' ] );

        if( $license[ 'license_link' ] !== '' ) :
            $output = sprintf(
                            '<a href="%1$s" target="_blank" rel="nofollow" name="%2$s">[%2$s]</a>',
                            $license[ 'license_link' ],
                            $license[ 'license_term' ]
                      );
        else :
            $output = sprintf(
                            '[%1$s]',
                            $license[ 'license_term' ]
                      );
        endif;
    endif;

    return $output;
}



/**
 * Gibt den Urheber eines Mediums (ggf. mit Link)
 *
 * @since 0.0.1
 */

function mdb_lv_get_byline( $id ) {
    $media  = mdb_lv_get_media_record( $id );
    $output = '';

    if( $media[ 'by_name' ] !== '' ) :
        if( $media[ 'by_link' ] !== '' ) :
            $output = sprintf(
                '<a href="%1$s" target="_blank" rel="nofollow" name="%2$s">%2$s</a>',
                $media[ 'by_link' ],
                $media[ 'by_name' ]
            );
        else :
            $output = $media[ 'by_name' ];
        endif;
    endif;

    return $output;
}
