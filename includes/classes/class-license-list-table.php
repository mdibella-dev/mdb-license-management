<?php
/**
 * Class License_List_Table
 *
 * @see http://wpengineer.com/2426/wp_list_table-a-step-by-step-guide/
 * @see https://wp.smashingmagazine.com/2011/11/native-admin-tables-wordpress/
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\classes;

use const mdb_license_management\TABLE_LICENSES;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}


class License_List_Table extends \WP_List_Table {

    function get_columns() {
        $columns = [
            'license_term'        => __( 'Name', 'mdb-license-management' ),
            'license_description' => __( 'Description', 'mdb-license-management' ),
            'license_link'        => __( 'License Text', 'mdb-license-management' ),
            'license_count'       => __( 'Number of Items', 'mdb-license-management' )
        ];

        return $columns;
    }


    function prepare_items() {
        $this->_column_headers = [
            $this->get_columns(),   // columns
            [],                     // hidden
            [],                     // sortable
        ];

        // Lade Daten aus der Datentabelle
        global $wpdb;

        $table_name  = $wpdb->prefix . TABLE_LICENSES;
        $table_data  = $wpdb->get_results( "SELECT * FROM $table_name", 'ARRAY_A' );
        $this->items = $table_data;
    }


    function column_default( $item, $column_name ) {

        $output = '';

        switch ( $column_name ) {
            case 'license_term':
                $output = '<strong>' . $item[$column_name] . '</strong>';
                break;

            case 'license_link':
                $output = sprintf(
                    '<a href="%1$s" title="%2$s" target="_blank">%3$s</a>',
                    $item[$column_name],
                    __( 'Link to License Text', 'mdb-license-management' ),
                    __( 'Read License Text', 'mdb-license-management' )
                );
                break;

            case 'license_count':
                $output = 'coming soon';
                break;

            default:
                $output = $item[$column_name];
                break;
        }

        return $output;
    }
}
