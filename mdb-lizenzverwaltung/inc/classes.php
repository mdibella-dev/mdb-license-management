<?php

// http://wpengineer.com/2426/wp_list_table-a-step-by-step-guide/
// https://wp.smashingmagazine.com/2011/11/native-admin-tables-wordpress/

if( ! class_exists( 'WP_List_Table' ) ) :
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
endif;


class MDB_main_table extends WP_List_Table {

    function get_columns(){
  $columns = array(
    'booktitle' => 'Title',
    'author'    => 'Author',
    'isbn'      => 'ISBN'
  );
  return $columns;
}



function prepare_items() {
  $columns = $this->get_columns();
  $hidden = array();
  $sortable = array();
  $this->_column_headers = array($columns, $hidden, $sortable);
  $this->items = $this->example_data;;
}

function column_default( $item, $column_name ) {
  switch( $column_name ) {
    case 'booktitle':
    case 'author':
    case 'isbn':
      return $item[ $column_name ];
    default:
      return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
  }
}

$myListTable = new My__List_Table();


..
