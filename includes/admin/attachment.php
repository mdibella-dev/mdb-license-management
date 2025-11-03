<?php
/**
 * Functions for extending the media library.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace MDB_License_Management;

use const MDB_License_Management\METAKEY_CREATOR_CREDIT;
use const MDB_License_Management\METAKEY_CREATOR_URL;
use const MDB_License_Management\METAKEY_MEDIA_SOURCE_URL;


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


    /** Field 1 - listing of available licenses */
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
    ]; */


    /** Field 2 - naming of the creator */

    $form_fields['mdb-lm-creator-credit'] = [
        'label' => __( 'Naming of the creator', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='text' size='128' class='widefat' value='" . esc_html( get_post_meta( $post->ID, METAKEY_CREATOR_CREDIT, true ) ) . "' name='attachments[{$post->ID}][mdb-lm-creator-credit]'>"
    ];


    /** Field 3 - link to the creator's website (if required) */

    $form_fields['mdb-lm-creator-url'] = [
        'label' => __( 'Link to the creator', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='url' size='128' class='widefat' value='" . esc_url( get_post_meta( $post->ID, METAKEY_CREATOR_URL, true ) ) . "' name='attachments[{$post->ID}][mdb-lm-creator-url]'>",
    ];


    /** Field 4 - link to the original image for your own documentation */

    $form_fields[ 'mdb-lm-media-source-url' ] = [
        'label' => __( 'Link to original file', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='url' size='128' class='widefat' value='" . esc_url( get_post_meta( $post->ID, METAKEY_MEDIA_SOURCE_URL, true ) ) . "' name='attachments[{$post->ID}][mdb-lm-media-source-url]'>",
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
    update_post_meta( $post['ID'], METAKEY_CREATOR_CREDIT, sanitize_text_field( $attachment['mdb-lm-creator-credit'] ) );
    update_post_meta( $post['ID'], METAKEY_CREATOR_URL, sanitize_url( $attachment['mdb-lm-creator-url'] ) );
    update_post_meta( $post['ID'], METAKEY_MEDIA_SOURCE_URL, sanitize_url( $attachment['mdb-lm-media-source-url'] ) );
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
/*    $record = new Media_Record( $id );

    $record->remove_table_record(); */
}

add_action( 'delete_attachment', __NAMESPACE__ . '\delete_attachment_handler');
