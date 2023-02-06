<?php
/**
 * Funktionen zur Erweiterung der Mediathek
 *
 * @author  Marco Di Bella
 * @package mdb-lv
 */

namespace mdb_license_management;


defined( 'ABSPATH' ) or exit;



/**
 * Fügt in der Medienübersicht eine Spalte zum Urheberrecht hinzu.
 *
 * @since  0.0.1
 * @param  array $columns    Die in der Medienübersicht verfügbaren Spalten.
 * @return array             Die modifizierten Spalten.
 */

function mdb_lv_add_media_columns( $columns )
{
    $columns['mdb_lv_credits'] = __( 'Urheberrecht', 'mdb_lv' );
    return $columns;
}

add_filter( 'manage_media_columns', 'mdb_lv_add_media_columns');



/**
 * Stellt in der Medienübersicht die Spalte zum Urheberrecht dar
 *
 * @since 0.0.1
 *
 * @param string $column     Die darzustellende Seite
 * @param int    $id         Die ID des Datensatzes eines Mediums in der Medien-Tabelle des Plugins.
 */

function mdb_lv_media_custom_column( $column, $id )
{
    if( 'mdb_lv_credits' == $column  ) :

        $data = mdb_lv_get_media_record( $id );

        switch( $data['media_state'] ) :
            case MEDIA_STATE_UNKNOWN:
                echo __( 'unbekannt', 'mdb_lv' );
            break;

            case MEDIA_STATE_NO_CREDIT:
                echo __( 'keine Angaben notwendig', 'mdb_lv' );
            break;

            case MEDIA_STATE_SIMPLE_CREDIT:
                echo $data['by_name'];
            break;

            case MEDIA_STATE_LICENSED:
                $data2 = mdb_lv_get_license_record( $data['license_guid'] );
                echo sprintf( __( '%1$s<br>%2$s', 'mdb_lv' ), $data['by_name'], $data2['license_term'] );
            break;
        endswitch;

    endif;
}

add_action( 'manage_media_custom_column', 'mdb_lv_media_custom_column', 10, 2 );



/**
 * Fügt eine Reihe von zusätzlichen Formularfelder für Dateien in der Mediathek hinzu.
 *
 * @since  0.0.1
 * @param  array   $form_fields    Die verfügbaren Formularfelder des Medienanhangs.
 * @param  WP_Post $post           Das Medienanhangsobjekt.
 * @return array                   Die modifizierten Formularfelder.
 */

function mdb_lv_attachment_fields_to_edit( $form_fields, $post )
{
    $data = mdb_lv_get_media_record( $post->ID );
    extract( $data );

    // Status der Medienerfassung bzw. Angabe zur Art & Weise der Urheberrechtsangabe
    $states = array(
        array( MEDIA_STATE_NO_CREDIT, __( 'keine Angaben notwendig', 'mdb_lv' ) ),
        array( MEDIA_STATE_SIMPLE_CREDIT, __( 'einfache Namensnennung (ggf. mit Verlinkung)', 'mdb_lv' ) ),
        array( MEDIA_STATE_LICENSED, __( 'Urheberrechtsangaben gemäß Lizenz', 'mdb_lv' ) )
    );

    $html  = "<select id='mdb-lv-media-state' name='attachments[{$post->ID}][mdb-lv-media-state]'>";
    $html .= sprintf(
        '<option value="0" disabled %2$s>%1$s</option>',
        __( '--- bitte auswählen ---', 'mdb_lv' ),
        ( MEDIA_STATE_UNKNOWN == $media_state )? 'selected' : ''
    );

    foreach ( $states as $state ) :
        $html .= sprintf(
            '<option value="%1$s" %3$s>%2$s</option>',
            $state[0],
            $state[1],
            ( $state[0] == $media_state )? 'selected' : ''
        );
    endforeach;

    $html .= '</select>';

    $form_fields['mdb-lv-media-state'] = array(
		'label' => __( 'Art und Weise der Urheberrechtsangabe', 'mdb_lv' ),
		'input' => 'html',
		'html'  => $html,
	);


    // Auflistung der verfügbaren Lizenzen
    global $wpdb;

    $table_name = $wpdb->prefix . 'mdb_lv_licenses';
    $table_data = $wpdb->get_results( "SELECT license_guid, license_term FROM $table_name", 'ARRAY_A' );

    $html  = "<select id='mdb-lv-license-guid' name='attachments[{$post->ID}][mdb-lv-license-guid]'>";
    $html .= sprintf(
        '<option value="%1$s" disabled %3$s>%2$s</option>',
        '0',
        __( '--- bitte auswählen ---', 'mdb_lv' ),
        ( 0 == $license_guid )? 'selected' : ''
    );

    foreach ( $table_data as $data ) :
        $html .= sprintf(
            '<option value="%1$s" %3$s>%2$s</option>',
            $data['license_guid'],
            $data['license_term'],
            ( $data['license_guid'] == $license_guid )? 'selected' : ''
        );
    endforeach;

    $html .= '</select>';

    $form_fields['mdb-lv-license-guid'] = array(
		'label' => __( 'Lizenz', 'mdb_lv' ),
		'input' => 'html',
		'html' 	=> $html,
    );


    // Benennung des Urhebers
	$form_fields['mdb-lv-by-name'] = array(
		'label' => __( 'Benennung des Urhebers', 'mdb_lv' ),
		'input' => 'html',
		'html'  => "<input type='text' size='128' class='widefat' value='" . $by_name . "' name='attachments[{$post->ID}][mdb-lv-by-name]'>",
    );


    // Link zur Webseite des Urhebers (wenn gefordert)
    $form_fields['mdb-lv-by-link'] = array(
		'label' => __( 'Link zum Urheber', 'mdb_lv' ),
		'input' => 'html',
		'html'  => "<input type='url' size='128' class='widefat' value='" . esc_url( $by_link ) . "' name='attachments[{$post->ID}][mdb-lv-by-link]'>",
    );


    // Link zum Original des Bildes zur eigenen Dokumentation
    $form_fields[ 'mdb-lv-media-link' ] = array(
        'label' => __( 'Link zur Originaldatei', 'mdb_lv' ),
        'input' => 'html',
        'html'  => "<input type='url' size='128' class='widefat' value='" . esc_url( $media_link ) . "' name='attachments[{$post->ID}][mdb-lv-media-link]'>",
    );

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'mdb_lv_attachment_fields_to_edit', null, 2 );



/**
 * Speichert die Werte der zusätzlichen Formularfelder in der Datenbank ab.
 *
 * @since  0.0.1
 * @param  array $post          Ein Array mit Beitragsdaten.
 * @param  array $attachment    Ein Array mit Metadaten zum Anhang.
 * @return array                Das $post-Array.
 */

function mdb_lv_attachment_fields_to_save( $post, $attachment )
{
    $data['media_id']     = $post['ID'];
    $data['media_link']   = $attachment['mdb-lv-media-link'];
    $data['media_state']  = $attachment['mdb-lv-media-state'];
    $data['license_guid'] = $attachment['mdb-lv-license-guid'];
    $data['by_name']      = $attachment['mdb-lv-by-name'];
    $data['by_link']      = $attachment['mdb-lv-by-link'];

    mdb_lv_update_media_record( $data );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'mdb_lv_attachment_fields_to_save', null, 2 );



/**
 * Erzeugt einen neuen Datensatz in der Medien-Tabelle des Plugins, nachdem ein Medium in die Mediathek geladen wurde.
 *
 * @since 0.0.1
 * @param int $id     Die ID des Medienanhangs.
 */

function mdb_lv_add_attachment( $id )
{
    $mime = get_post_mime_type( $id );

    if( 0 === strpos( $mime, 'image' ) ) :
        global $wpdb;

        $table_name   = $wpdb->prefix . 'mdb_lv_media';
        $table_format = array( '%d', '%s', '%d', '%s', '%s', '%s' );
        $table_data   = array(
            'media_id'     => $id,
            'media_link'   => '',
            'media_state'  => 0,
            'license_guid' => '',
            'by_name'      => '',
            'by_link'      => ''
        );

        $wpdb->insert( $table_name, $table_data, $table_format );
    endif;
}

add_action( 'add_attachment', 'mdb_lv_add_attachment');



/**
 * Löscht ein Medium aus der Medien-Tabelle des Plugins.
 *
 * @since 0.0.1
 * @param int $id     Die ID des Medienanhangs.
 */

function mdb_lv_delete_attachment( $id )
{
    global $wpdb;

    $table_name  = $wpdb->prefix . 'mdb_lv_media';
    $table_where = array( 'media_id' => $id );
    $wpdb->delete( $table_name, $table_where );
}

add_action( 'delete_attachment', 'mdb_lv_delete_attachment');
