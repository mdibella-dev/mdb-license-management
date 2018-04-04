<?php
/**
 * Funktionen zur Erweiterung der Mediathek
 *
 * @author Marco Di Bella <mdb@marcodibella.de>
 * @package mdb-lv
 * @since 0.0.1
 * @version 0.0.1
 */


// Check & Quit
defined( 'ABSPATH' ) OR exit;



/**
 * Speichert einen Datensatz zu einem Medium in die Medien-Tabelle des Plugins
 *
 * @since 0.0.1
 */

function mdb_lv_set_media_record( $id )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'mdb_lv_media';






    
    $table_data = $wpdb->get_results( "XXX * FROM $table_name WHERE media_id=$id", 'ARRAY_A' );

    return $table_data[ 0 ];
}



/**
 * Holt einen Datensatz zu einem Medium aus der Medien-Tabelle des Plugins
 *
 * @since 0.0.1
 */

function mdb_lv_get_media_record( $id )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'mdb_lv_media';
    $table_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE media_id=$id", 'ARRAY_A' );

    return $table_data[ 0 ];
}



/**
 * Holt Lizenzinformationen aus der entsprechenden Tabelle des Plugins
 *
 * @since 0.0.1
 */

function mdb_lv_get_license_record( $license_guid )
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'mdb_lv_licenses';
    $table_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE license_guid='$license_guid'", 'ARRAY_A' );

    return $table_data[ 0 ];
}



/**
 * Fügt in der Medienübersicht eine Spalte zu den Bildrechteinformationen hinzu
 *
 * @since 0.0.1
 * @return array $columns        modifizierte Spalten
 */


function mdb_lv_add_media_columns( $columns )
{
    $columns[ 'mdb_lv_credits' ] = __( 'Bildrechte', 'mdb_lv' );
    return $columns;
}

add_filter( 'manage_media_columns', 'mdb_lv_add_media_columns');



/**
 * Stellt die Bildrechteinformation eines Mediums in der Medienübersicht dar
 *
 * @since 0.0.1
 */

function mdb_lv_media_custom_column( $column, $id )
{
    if( $column == 'mdb_lv_credits' ) :
        $data = mdb_lv_get_media_record( $id );

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
                $data2 = mdb_lv_get_license_record( $data[ 'license_guid' ] );
                echo sprintf( __( '%1$s<br>%2$s', 'mdb_lv' ), $data[ 'by_name' ], $data2[ 'license_term' ] );
            break;
        endswitch;
    endif;
}

add_action( 'manage_media_custom_column', 'mdb_lv_media_custom_column', 10, 2 );



/**
 * Fügt eine Reihe von zusätzlichen Eingabefelder für Dateien in der Mediathek hinzu
 *
 * @since 0.0.1
 * @return array $form_fields   modifizierte Formularfelder
 */

function mdb_lv_attachement_fields_to_edit( $form_fields, $post )
{
    $data = mdb_lv_get_media_record( $post->ID );

    extract( shortcode_atts( array(
                             'media_id'     => $post->ID,
                             'media_link'   => '',
                             'media_state'  => 0,
                             'license_guid' => '',
                             'by_name'      => '',
                             'by_link'      => '' ),
                             $data ) );

    /**
     * 1. Status der Medienerfassung bzw. Angabe zur Art & Weise der Urheberrechtsangabe
     */

    $html  = "<select id='mdb-lv-media-state' name='attachments[{$post->ID}][mdb-lv-media-state]'>";
    $html .= sprintf( '<option value="%1$s">%2$s</option>', MEDIA_STATE_UNKNOWN, __( 'unbekannt/nicht erfasst', 'mdb_lv' ) );
    $html .= sprintf( '<option value="%1$s">%2$s</option>', MEDIA_STATE_NO_CREDIT, __( 'keine Angaben notwendig', 'mdb_lv' ) );
    $html .= sprintf( '<option value="%1$s">%2$s</option>', MEDIA_STATE_SIMPLE_CREDIT, __( 'einfache Namensnennung (ggf. mit Verlinkung)', 'mdb_lv' ) );
    $html .= sprintf( '<option value="%1$s">%2$s</option>', MEDIA_STATE_LICENSED, __( 'Urheberrechtsangaben gemäß Lizenz', 'mdb_lv' ) );
    $html .= '</select>';

    $form_fields[ 'mdb-lv-media-state' ] = array(
		'label' => __( 'Art und Weise der Urheberrechtsangabe', 'mdb_lv' ),
		'input' => 'html',
		'html' 	=> $html,
	);


    /**
     * 2. Auflistung der verfügbaren Lizenzen
     */

    global $wpdb;

    $table_name  = $wpdb->prefix . 'mdb_lv_licenses';
    $table_data  = $wpdb->get_results( "SELECT license_guid, license_term FROM $table_name", 'ARRAY_A' );

    $html  = "<select id='mdb-lv-license-guid' name='attachments[{$post->ID}][mdb-lv-license-guid]'>";

    foreach ( $table_data as $data ) :
        $html .= sprintf( '<option value="%1$s">%2$s</option>', $data[ 'license_guid' ], $data[ 'license_term' ] );
    endforeach;
    $html .= '</select>';

    $form_fields[ 'mdb-lv-license-guid' ] = array(
		'label' => __( 'Lizenz', 'mdb_lv' ),
		'input' => 'html',
		'html' 	=> $html,
	);


    /**
     * 3. Benennung des Urhebers
     */

	$form_fields[ 'mdb-lv-by-name' ] = array(
		'label' => __( 'Benennung des Urhebers', 'mdb_lv' ),
		'input' => 'html',
		'html' 	=> "<input type='text' size='128' class='widefat' value='" . $by_name . "' name='attachments[{$post->ID}][mdb-lv-by-name]'>",
	);


    /**
     * 4. Link zur Webseite des Urhebers (wenn gefordert)
     */

    $form_fields[ 'mdb-lv-by-link' ] = array(
		'label' => __( 'Link zum Urheber', 'mdb_lv' ),
		'input' => 'html',
		'html' 	=> "<input type='url' size='128' class='widefat' value='" . esc_url( $by_link ) . "' name='attachments[{$post->ID}][mdb-lv-by-link]'>",
	);


    /**
     * 5. Link zum Original des Bildes zur eigenen Dokumentation
     */

    $form_fields[ 'mdb-lv-media-link' ] = array(
        'label' => __( 'Link zur Originaldatei', 'mdb_lv' ),
        'input' => 'html',
        'html' 	=> "<input type='url' size='128' class='widefat' value='" . esc_url( $media_link ) . "' name='attachments[{$post->ID}][mdb-lv-media-link]'>",
    );


	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'mdb_lv_attachement_fields_to_edit', null, 2 );



/**
 * Speichert die Werte der zusätzlichen Eingabefelder in die Datenbank ab
 *
 * @since 0.0.1
 * @return array $form_fields   modifizierte Formularfelder
 */

function mdb_lv_attachement_fields_to_save( $post, $attachment )
{
    // gespeicherte Daten
    $data = mdb_lv_get_media_record( $post['ID'] );

    echo $post['by_link'];

var_dump( $data );
var_dump( $attachment );
exit;
/*

	// 1. Credit
	if( isset( $attachment[ 'media-meta-credit' ] ) ) :
		update_post_meta( $post['ID'], '_media-meta-credit', $attachment['media-meta-credit'] );
	endif;

	// 2. Pfad zur Originaldatei
	if( ! empty( $attachment[ 'media-meta-source' ] ) ) :
		update_post_meta( $post['ID'], '_media-meta-source', $attachment['media-meta-source'] );
	endif;

    */

	return $post;
}

add_filter( 'attachment_fields_to_save', 'mdb_lv_attachement_fields_to_save', null, 2 );
