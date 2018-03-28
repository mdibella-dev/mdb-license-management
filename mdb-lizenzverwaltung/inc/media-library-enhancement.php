<?php


function get_media_record( $id )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'mdb_lv_media';
    $table_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE media_id=$id", 'ARRAY_A' );

    return $table_data[ 0 ];
}


function get_license_record( $license_guid )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'mdb_lv_licenses';
    $table_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE license_guid='$license_guid'", 'ARRAY_A' );

    return $table_data[ 0 ];
}



function add_media_columns( $columns ) {
    $columns[ 'mdb_lv_credits' ] = __( 'Bildrechte', 'mdb_lv' );
    return $columns;
}

add_filter( 'manage_media_columns', 'add_media_columns');



function media_custom_column( $column, $id )
{
    if( $column == 'mdb_lv_credits' ) :
        $data = get_media_record( $id );

        switch( $data[ 'media_state' ] ) :
            case MEDIA_STATE_UNKNOWN:
                echo __( 'unbekannt/nicht erfasst', 'mdb_lv' );
            break;

            case MEDIA_STATE_NO_CREDIT:
                echo __( 'keine Angaben notwendig', 'mdb_lv' );
            break;

            case MEDIA_STATE_SIMPLE_CREDIT:
                echo $data[ 'by_name' ];
            break;

            case MEDIA_STATE_LICENSED:
                $data2 = get_license_record( $data[ 'license_guid' ] );
                echo sprintf( __( '%1$s %2$s', 'mdb_lv' ), $data[ 'by_name' ], $data2[ 'license_term' ] );
            break;
        endswitch;
    endif;
}

add_action( 'manage_media_custom_column', 'media_custom_column', 10, 2 );
