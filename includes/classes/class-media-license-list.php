<?php
/**
 * Class Media_License_List
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\classes;

use const mdb_license_management\PLUGIN_URL;
use const mdb_license_management\METAKEY_LICENSE_URL;
use const mdb_license_management\METAKEY_LICENSE_IMG;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * A class for the implementation of the admin taxonomy list for the taxonomy "media_license".
 *
 * @since 2.1.0
 */

class Media_License_List extends \wordpress_helper\classes\Admin_Taxonomy_List {

    /**
     * The taxonomy.
     *
     * @var string
     */

    protected $taxonomy = 'media_license';



    /**
     * Filters the action links displayed for each term in the taxonomy list table.
     *
     * @see https://wordpress.stackexchange.com/questions/78211/remove-quick-edit-for-custom-post-type
     * @see https://developer.wordpress.org/reference/hooks/taxonomy_row_actions/
     *
     * @param array   $actions  An array of action links to be displayed
     * @param WP_Term $term     A term object.
     *
     * @return array The modified list of action links
     */

    public function manage_row_actions( $actions, $tag ) {
        unset( $actions['edit'] );
        unset( $actions['delete'] );
        unset( $actions['view'] );
        unset( $actions['quick edit'] );
        unset( $actions['inline hide-if-no-js'] );
        return $actions;
    }



    /**
     * Determines the columns of the admin taxonomy list.
     *
     * @param array $default The defaults for columns
     *
     * @return array An associative array describing the columns to use
     */

    public function manage_columns( $default ) {
        $columns = [
            'image'         => '',
            'name'          => $default['name'],
            'description'   => __( 'Name (full)', 'mdb-license-management' ),
            'terms'         => __( 'License text', 'mdb-license-management' ),
            'media_count'   => __( 'Number of media', 'mdb-license-management' ),
        ];
        return $columns;
    }



    /**
     * Generates the column output.
     *
     * @see https://developer.wordpress.org/reference/hooks/manage_this-screen-taxonomy_custom_column/
     *
     * @param string $output      Custom column output. Default empty
     * @param string $column_name Designation of the column to be output
     * @param int    $term_id     The term ID
     */

    public function manage_custom_column( $output, $column_name, $term_id ) {
        $term = get_term( $term_id, 'media_license' );

        switch( $column_name ) {

            case 'image':
                $logo_file = get_term_meta( $term_id, METAKEY_LICENSE_IMG, true );

                if ( ! empty( $logo_file ) ) {
                    $output = sprintf(
                        '<img src="%1$s">',
                        esc_url( PLUGIN_URL . "assets/build/svg/" . $logo_file )
                    );
                } else {
                    $output = '&mdash;';
                }
                break;


            case 'terms':
                $link = get_term_meta( $term_id, METAKEY_LICENSE_URL, true );

                if ( ! empty( $link ) ) {
                    $output = sprintf(
                        '<a href="%1$s" target="_blank">%2$s</a>',
                        esc_url( $link ),
                        __( 'Read license text', 'mdb-license-management' )
                    );
                }
                else {
                    $output = '&mdash;';
                }
                break;


            case 'media_count':
                $posts = get_posts( [
                    'post_type'   => 'attachment',
                    'post_status' => 'any',
                    'numberposts' => -1,
                    'tax_query'   => [ [
                        'taxonomy' => 'media_license',
                        'terms'    => $term_id,
                    ] ],
                ] );
                $count = sizeof( $posts );

                if ( 0 !== $count ) {
                    $args = [
                        'media_license' => $term->slug,
                        'post_type'     => 'attachment'
                    ];
                    $output = sprintf(
                        '<a href="%1$s">%2$s</a><br>',
                        esc_url( add_query_arg( $args, 'upload.php' ) ),
                        $count
                    );
                }
                else {
                    $output = '0';
                }
                break;

            default:
                break;
        }

        return $output;
    }



    /**
     * Returns the primary column
     *
     * @param string $default Column name default for the specific list table, e.g. 'name'.
     * @param string $screen  Screen ID for specific list table, e.g. 'plugins'.
     */

    public function list_table_primary_column( $default, $screen ) {

        if ( 'edit-media_license' === $screen ) {
            $default = 'name';
        }

        return $default;
    }


    /**
     * Registers sortable columns (by assigning appropriate orderby parameters).
     *
     * @param array columns The columns
     *
     * @return array An associative array
     */

    public function manage_sortable_columns( $columns ) {
        $columns['media_count']  = 'media_count';
        return $columns;
    }

}

new Media_License_List();
