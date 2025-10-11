<?php
/**
 * Functions for extending the media library.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;

use mdb_license_management\classes\Media_Credit;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Adds a number of additional form fields for files in the library.
 *
 * @since  0.0.1
 *
 * @param array   $form_fields The available form fields of the media attachment.
 * @param WP_Post $post        The media attachment.
 *
 * @return array The modified form fields.
 */

function add_attachment_fields( $form_fields, $post ) {

    $record = new Media_Credit( $post->ID );



    /** Field 2 - listing of available licenses */
/*
    $html  = "<select id='mdb-lv-license-guid' name='attachments[{$post->ID}][mdb-lv-license-guid]'>";
    $html .= sprintf(
        '<option value="%1$s" disabled %3$s>%2$s</option>',
        '0',
        __( '--- please select ---', 'mdb-license-management' ),
        ( '' == $record->get_license_guid() )? 'selected' : ''
    );

    foreach( LICENSES as $license_guid => $license ) {
        $html .= sprintf(
            '<option value="%1$s" %3$s>%2$s</option>',
            $license_guid,
            $license['license_term'],
            ( $license_guid == $record->get_license_guid() )? 'selected' : ''
        );
    }

    $html .= '</select>';

    $form_fields['mdb-lv-license-guid'] = [
        'label' => __( 'License', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => $html,
    ];

*/
    /** Field 3 - naming of the creator */

    $form_fields['mdb-lv-by-name'] = [
        'label' => __( 'Naming of the creator', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='text' size='128' class='widefat' value='" . esc_html( $record->get_creator_credit() ) . "' name='attachments[{$post->ID}][mdb-lv-by-name]'>",
    ];


    /** Field 4 - link to the creator's website (if required) */

    $form_fields['mdb-lv-by-link'] = [
        'label' => __( 'Link to the creator', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='url' size='128' class='widefat' value='" . esc_url( $record->get_creator_url() ) . "' name='attachments[{$post->ID}][mdb-lv-by-link]'>",
    ];


    /** Field 5 - link to the original image for your own documentation */

    $form_fields[ 'mdb-lv-media-link' ] = [
        'label' => __( 'Link to original file', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='url' size='128' class='widefat' value='" . esc_url( $record->get_media_source_url() ) . "' name='attachments[{$post->ID}][mdb-lv-media-link]'>",
    ];

    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', __NAMESPACE__ . '\add_attachment_fields', null, 2 );



/**
 * Stores the values of the additional form fields in the database.
 *
 * @since 0.0.1
 *
 * @param array $post       An array with post data.
 * @param array $attachment An array of metadata about the attachment.
 *
 * @return array The $post array.
 */

function save_attachment_fields( $post, $attachment ) {
    $record = new Media_Credit( $post['ID'] );

    $record->set_media_source_url( sanitize_url( $attachment['mdb-lv-media-link'] ) );
    $record->set_license_guid( $attachment['mdb-lv-license-guid'] );
    $record->set_creator_credit( sanitize_text_field( $attachment['mdb-lv-by-name'] ) );
    $record->set_creator_url( sanitize_url( $attachment['mdb-lv-by-link'] ) );

    $record->update_table_record();

    return $post;
}

add_filter( 'attachment_fields_to_save', __NAMESPACE__ . '\save_attachment_fields', null, 2 );



/**
 * Deletes a media from the media table of the plugin.
 *
 * @since 0.0.1
 *
 * @param int $id   The media attachment ID
 */

function delete_attachment_handler( $id ) {
    $record = new Media_Credit( $id );

    $record->remove_table_record();
}

add_action( 'delete_attachment', __NAMESPACE__ . '\delete_attachment_handler');
