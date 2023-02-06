<?php
/**
 * Class for displaying the license overview.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Include files */

if( ! class_exists( '\WP_List_Table' ) ) :
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
endif;



/**
 * MDB_main_table
 *
 * @see http://wpengineer.com/2426/wp_list_table-a-step-by-step-guide/
 * @see https://wp.smashingmagazine.com/2011/11/native-admin-tables-wordpress/
 */

class MDB_main_table extends \WP_List_Table {

    function get_columns() {
        $columns = array(
            'license_term'        => __( 'License', 'mdb-license-management' ),
            'license_description' => __( 'Description', 'mdb-license-management' ),
            'license_link'        => __( 'Source link', 'mdb-license-management' )
        );

        return $columns;
    }


    function prepare_items() {
        $this->_column_headers = array(
            $this->get_columns(),       // columns
            array(),                    // hidden
            array(),                    // sortable
        );

        // Load data from the data table
        global $wpdb;

        $table_name  = $wpdb->prefix . TABLE_LICENSES;
        $table_data  = $wpdb->get_results( "SELECT * FROM $table_name", 'ARRAY_A' );
        $this->items = $table_data;
    }


    function column_default( $item, $column_name ) {
        switch( $column_name ) :
            case 'license_term':
            case 'license_description':
                return $item[$column_name];
            break;

            case 'license_link':
                return sprintf(
                    '<a href="%1$s" title="%2$s" target="_blank">%3$s</a>',
                    $item[$column_name],
                    __( 'Source link', 'mdb-license-management' ),
                    __( 'View', 'mdb-license-management' )
                );
            break;

            default:
                // Data output in case of errors
                return print_r( $item, true ) ;
        endswitch;
    }
}
