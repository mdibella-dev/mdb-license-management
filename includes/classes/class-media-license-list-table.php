<?php
/**
 * Class Media_License_List_Table
 *
 * @see https://wpengineer.com/2426/wp_list_table-a-step-by-step-guide/
 * @see https://wp.smashingmagazine.com/2011/11/native-admin-tables-wordpress/
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace MDB_License_Management\Classes;

use const MDB_License_Management\PLUGIN_URL;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}


class Media_License_List_Table extends \WP_List_Table {

    /**
     * Gets a list of columns.
     *
     * @see https://developer.wordpress.org/reference/classes/wp_list_table/get_columns/
     *
     * @return array
     */

    public function get_columns() {
        $columns = [
            'license_name'        => __( 'Name', 'mdb-license-management' ),
            'license_description' => __( 'Description', 'mdb-license-management' ),
            'license_terms'       => __( 'License terms', 'mdb-license-management' ),
            'media_count'         => __( 'Number of items', 'mdb-license-management' )
        ];

        return $columns;
    }


    /**
     * Gets a list of sortable columns.
     *
     * @see https://developer.wordpress.org/reference/classes/wp_list_table/get_sortable_columns/
     *
     * @return array
     */

    protected function get_sortable_columns() {
        return [
            'license_name'        => ['license_name', true ],
            'license_description' => ['license_description'],
            'media_count'         => ['media_count']
        ];
    }


    /**
     * Prepares the list of items for displaying.
     *
     * @see https://developer.wordpress.org/reference/classes/wp_list_table/prepare_items/
     */

    function prepare_items() {
        $this->_column_headers = [
            $this->get_columns(),            // columns
            [],                              // hidden
            $this->get_sortable_columns()    // sortable
        ];

        // Prepare sorting
        $orderby = ( ! empty( $_REQUEST['orderby'] ) ) ? trim( wp_unslash( $_REQUEST['orderby'] ) ) : 'license_name';
        $order   = ( ! empty( $_REQUEST['order'] ) ) ? trim( wp_unslash( $_REQUEST['order'] ) ) : 'asc';

        // Retrieving the data from the database
        global $wpdb;

        $table_data  = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mdb_lm_licenses ORDER BY $orderby $order", 'ARRAY_A' );
        $this->items = $table_data;
    }


    /**
     * Handles the license_name column output.
     *
     * @param array $item The row item
     *
     * @return string The output
     *
     * @todo needs cleanup
     */

    function column_license_name( $item ) {
        ob_start();
        ?>
        <table class="table-license-name">
        <tr>
        <td style="width:150px"><?php
            $logo_file = $item['extra_image'];

            if ( ! empty( $logo_file ) ) {
                $logo_url  = PLUGIN_URL ."assets/build/svg/" . $logo_file;

                echo sprintf(
                    '<img src="%1$s">',
                    esc_url( $logo_url)
                );
            }
        ?></td>
        <td><strong><?php echo $item['license_name']; ?></strong></td>
        </tr>
        </table>
        <?php

        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }


    /**
     * Handles the license_terms column output.
     *
     * @param array $item The row item
     *
     * @return string The output
     */

    function column_license_terms( $item ) {
        $output = '—';
        $url    = trim( $item['license_terms_url'] );

        if ( ! empty( $url ) ) {
            $output = sprintf(
                '<a href="%1$s" title="%2$s" target="_blank">%3$s</a>',
                esc_url( $url ),
                __( 'Link to license terms', 'mdb-license-management' ),
                __( 'Read license terms', 'mdb-license-management' )
            );
        }
        return $output;
    }


    /**
     * Handles the license_description column output.
     *
     * @param array $item The row item
     *
     * @return string The output
     */

    function column_license_description( $item ) {
        return $item['license_description'];
    }


    /**
     * Handles the media_count column output
     *
     * Currently a placeholder!
     *
     * @param array $item The row item
     *
     * @return string The output
     */

    function column_media_count( $item ) {
        return $item['media_count'];
    }
}
