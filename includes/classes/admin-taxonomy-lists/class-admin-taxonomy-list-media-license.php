<?php
/**
 * Class Admin_Taxonomy_List_Media_License
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */


namespace mdb_license_management\classes;

use const mdb_license_management\LICENSE_METAKEY_LINK as LICENSE_METAKEY_LINK;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * A class for the implementation of the admin taxonomy list for the taxonomy "media_license".
 *
 * @since 2.1.0
 */

class Admin_Taxonomy_List_Media_License extends \wordpress_helper\Admin_Taxonomy_List {

    /**
     * The post type.
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
            'name'          => $default['name'],
            'description'   => $default['description'],
            'link'          => __( 'License text', 'mdb-license-management' ),
            'number'   => __( 'Number of media', 'mdb-license-management' ),
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

        switch( $column_name ) {
            case 'link':
                $link = get_term_meta( $term_id, LICENSE_METAKEY_LINK, true );

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

            case 'number':
                $posts = get_posts( [
                    'post_type'   => 'attachment',
                    'post_status' => 'any',
                    'numberposts' => -1,
                    'tax_query'   => [[
                        'taxonomy' => 'media_license',
                        'terms'    => $term_id,
                    ]],
                ] );
                $term  = get_term( $term_id, 'media_license' );
                $count = sizeof( $posts );

                if ( 0 !== $count ) {
                    $args = [
                        'media_license' => $term->slug,
                        'post_type'     => 'attachment'
                    ];

                    $output = "<a href='" . esc_url( add_query_arg( $args, 'upload.php' ) ) . "'>$count</a>";
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
}


new Admin_Taxonomy_List_Media_License();
