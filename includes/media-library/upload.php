<?php
/**
 * Functions for extending the media library.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Adds a column on copyright in the media overview.
 *
 * @since 0.0.1
 *
 * @param array $columns The columns available in the media overview.
 *
 * @return array The modified columns.
 */

function add_custom_column( $columns ) {
    $columns['mdb_lv_credits'] = __( 'Creator', 'mdb-license-management' );
    return $columns;
}

add_filter( 'manage_media_columns', __NAMESPACE__ . '\add_custom_column');



/**
 * Displays the copyright column in the media overview.
 *
 * @since 0.0.1
 *
 * @param string $column The column to be displayed.
 * @param int    $id     The post_ID of the media attachment.
 */

function show_custom_column( $column, $id ) {
    if ( 'mdb_lv_credits' == $column  ) {

        $record = new Media_Record( $id );

        if ( true == array_key_exists( $record->get_media_state(), MEDIA_STATES ) ) {

            if ( ( $record->get_media_state() >= MEDIA_STATE_SIMPLE_CREDIT ) and ! empty( trim( $record->get_by_name() ) ) ) {
                echo $record->get_by_name();
            }
            else {
                echo '—';
            }
        }
    }
}

add_action( 'manage_media_custom_column', __NAMESPACE__ . '\show_custom_column', 10, 2 );
