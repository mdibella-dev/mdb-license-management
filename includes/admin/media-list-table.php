<?php
/**
 * Functions for extending the media list table.
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
    $columns['mdb_lm_creator'] = __( 'Creator', 'mdb-license-management' );
    $columns['mdb_lm_license'] = __( 'License', 'mdb-license-management' );

    //  linguistic correction
    $columns['author']         = __( 'Uploaded by', 'mdb-license-management' );
    $columns['date']           = __( 'Uploaded on', 'mdb-license-management' );
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


        switch ( $column ) {

   /*         case 'mdb_lm_creator':
                $creator_credit = trim( $credit->get_creator_credit() );

                if ( ! empty( $creator_credit ) ) {
                    echo $creator_credit;
                } else {
                    echo '—';
                }
                break;*/

            case 'mdb_lm_license':

                $licenses = get_the_terms( $id, 'media_license' );

                if ( ! empty( $licenses ) and ! is_wp_error( $licenses ) ) {
                    foreach ( $licenses as $license ) {
                        echo sprintf(
                            '<a href="upload.php?taxonomy=media_license&term=%1$s">%2$s</a><br>',
                            $license->slug,
                            $license->name
                        );
                    }
                } else {
                    echo '—';
                }
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
