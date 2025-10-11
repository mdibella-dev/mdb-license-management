<?php
/**
 * Functions for extending the media list table.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;

use mdb_license_management\classes\Media_Credit;
use mdb_license_management\classes\Media_License;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Adds custom columns and update the author column.
 *
 * @since 0.0.1
 *
 * @param array $columns The columns available in the media list table.
 *
 * @return array The modified columns.
 */

function add_custom_column( $columns ) {
    $columns['mdb_lm_creator'] = __( 'Creator', 'mdb-license-management' );
    $columns['mdb_lm_license'] = __( 'License', 'mdb-license-management' );
    $columns['author']         = __( 'Uploaded by', 'mdb-license-management' );
    return $columns;
}

add_filter( 'manage_media_columns', __NAMESPACE__ . '\add_custom_column');



/**
 * Handles the custom columns.
 *
 * @since 0.0.1
 *
 * @param string $column The column to be displayed.
 * @param int    $id     The post_ID of the media attachment.
 */

function handle_custom_columns( $column, $id ) {

    if ( in_array( $column, ['mdb_lm_creator', 'mdb_lm_license'] ) ) {

        $credit = new Media_Credit( $id );

        switch ( $column ) {
            case 'mdb_lm_creator':
                $creator_credit = trim( $credit->get_creator_credit() );

                if ( ! empty( $creator_credit ) ) {
                    echo $creator_credit;
                } else {
                    echo '—';
                }
                break;

            case 'mdb_lm_license':
            // !!!
                $license = new Media_License( $credit->get_license_guid() );
                echo $license->get_license_name();
                /*if ( ( MEDIA_STATE_LICENSED == $record->get_media_state() ) and ( true == array_key_exists( $record->get_license_guid(), LICENSES ) ) ) {
                    echo LICENSES[$record->get_license_guid()]['license_term'];
                } else {
                    echo '—';
                }
                */
                break;
        }
    }
}

add_action( 'manage_media_custom_column', __NAMESPACE__ . '\handle_custom_columns', 10, 2 );




/**
 * Make columns sortable.
 *
 * @since 0.0.1
 *
 * @param array $columns The columns.
 *
 * @return array The modified columns.
 */

function manage_sortable_columns( $columns ) {
    $columns['mdb_lm_creator'] = 'mdb_lm_creator';
    $columns['mdb_lm_license'] = 'mdb_lm_license';
    return $columns;

}

add_action( 'manage_upload_sortable_columns', __NAMESPACE__ . '\manage_sortable_columns', 10, 1 );



/**
 * Trigger the sorting if the last query was made in the backend and it was related to our post type.
 *
 * @param WP_Query $query A data object of the last query made
 *
 * @todo not working!
 */
/*
function manage_pre_get_posts( $query ) {
    if ( is_admin() and $query->is_main_query() ) { /*and ( 'attachment' === $query->get( 'post_type' ) ) ) {

        $orderby = $query->get( 'orderby' );
        $order   = $query->get( 'order' );

        switch ( $orderby ) {
            case 'mdb_lm_creator':
                $query->set( 'orderby', 'mdb_lm_creator' );
                break;

            case 'mdb_lm_license':
                $query->set( 'orderby', 'mdb-lm-license' );
                break;
        }

       // Default
       $query->set( 'order', ( '' === $order )? 'ASC' : $order );
   }
}

add_action( "pre_get_posts", __NAMESPACE__ . '\manage_pre_get_posts' );
*/
