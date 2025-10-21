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

namespace mdb_license_management\classes;

use const mdb_license_management\PLUGIN_URL;



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
     */

    function column_license_name( $item ) {
        ob_start();
        ?>
        <table class="table-license-name">
        <tr>
        <td style="width:150px"><?php

            switch ( $item['license_guid'] ) {
                case 'L001':
                    $logo_file = "cc-zero.svg";
                    break;

                case 'L002':
                case 'L003':
                case 'L004':
                case 'L005':
                case 'L006':
                case 'L007':
                case 'L008':
                case 'L009':
                case 'L010':
                case 'L011':
                    $logo_file = "cc-by.svg";
                    break;

                case 'L012':
                case 'L013':
                case 'L014':
                case 'L015':
                case 'L016':
                case 'L017':
                case 'L018':
                case 'L019':
                case 'L020':
                case 'L021':
                case 'L022':
                case 'L023':
                case 'L024':
                case 'L025':
                case 'L026':
                case 'L027':
                case 'L028':
                case 'L029':
                case 'L030':
                case 'L031':
                case 'L032':
                case 'L033':
                case 'L034':
                case 'L035':
                case 'L036':
                case 'L037':
                case 'L038':
                case 'L039':
                case 'L040':
                case 'L041':
                case 'L042':
                case 'L043':
                case 'L044':
                case 'L045':
                case 'L046':
                case 'L047':
                case 'L048':
                    $logo_file = "cc-by-sa.svg";
                    break;

                case 'L049':
                case 'L050':
                case 'L051':
                    $logo_file = "gfdl.svg";
                    break;

                case 'L052':
                case 'L053':
                    $logo_file = "lal.svg";
                    break;

                case 'L054':
                case 'L055':
                    $logo_file = "dreamstime.svg";
                    break;

                case 'L056':
                    $logo_file = "freeimages.svg";
                    break;

                case 'L057':
                    $logo_file = "publicdomain.svg";
                    break;

                case 'L058':
                case 'L059':
                case 'L060':
                case 'L061':
                case 'L062':
                case 'L063':
                case 'L064':
                case 'L065':
                case 'L066':
                case 'L067':
                case 'L068':
                case 'L069':
                case 'L070':
                    $logo_file = "cc-by-nc-sa.svg";
                    break;

                case 'L071':
                    $logo_file = "pixabay.svg";
                    break;

                case 'L072':
                    $logo_file = "pexels.svg";
                    break;

                case 'L073':
                    $logo_file = "unsplash.svg";
                    break;

                default:
                    $logo_file = "";
                    break;
            }

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
        return sprintf(
            '<a href="%1$s" title="%2$s" target="_blank">%3$s</a>',
            esc_url( $item['license_url']),
            __( 'Link to license terms', 'mdb-license-management' ),
            __( 'Read license terms', 'mdb-license-management' )
        );
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
