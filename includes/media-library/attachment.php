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

    global $wpdb;
           $credit = new Media_Credit( $post->ID );


    /** Field 1 - listing of available licenses */

    $results = $wpdb->get_results(
        "SELECT license_guid, license_name FROM {$wpdb->prefix}mdb_lm_licenses",
        'ARRAY_A'
    );

    if ( null !== $results ) {

        $html  = "<select id='mdb-lm-license-guid' name='attachments[{$post->ID}][mdb-lm-license-guid]'>";
        $html .= sprintf(
            '<option value="%1$s" disabled %3$s>%2$s</option>',
            '0',
            __( '--- please select ---', 'mdb-license-management' ),
            ( '' == $credit->get_license_guid() )? '' : 'selected'
        );

        foreach ( $results as $result ) {
            $html .= sprintf(
                '<option value="%1$s" %3$s>%2$s</option>',
                $result['license_guid'],
                $result['license_name'],
                ( $result['license_guid'] == $credit->get_license_guid() )? 'selected' : ''
            );
        }

        $html .= '</select>';

        $form_fields['mdb-license-guid'] = [
            'label' => __( 'License', 'mdb-license-management' ),
            'input' => 'html',
            'html'  => $html,
        ];
    }


    /** Field 2 - naming of the creator */

    $form_fields['mdb-lm-creator-credit'] = [
        'label' => __( 'Naming of the creator', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='text' size='128' class='widefat' value='" . esc_html( $credit->get_creator_credit() ) . "' name='attachments[{$post->ID}][mdb-lm-creator-credit]'>",
    ];


    /** Field 3 - link to the creator's website (if required) */

    $form_fields['mdb-lm-creator-url'] = [
        'label' => __( 'Link to the creator', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='url' size='128' class='widefat' value='" . esc_url( $credit->get_creator_url() ) . "' name='attachments[{$post->ID}][mdb-lm-creator-url]'>",
    ];


    /** Field 4 - link to the original image for your own documentation */

    $form_fields[ 'mdb-lm-media-source-url' ] = [
        'label' => __( 'Link to original file', 'mdb-license-management' ),
        'input' => 'html',
        'html'  => "<input type='url' size='128' class='widefat' value='" . esc_url( $credit->get_media_source_url() ) . "' name='attachments[{$post->ID}][mdb-lm-media-source-url]'>",
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
    $credit = new Media_Credit( $post['ID'] );

    $credit->set_media_source_url( sanitize_url( $attachment['mdb-lm-media-source-url'] ) );
    $credit->set_license_guid( $attachment['mdb-lm-license-guid'] );
    $credit->set_creator_credit( sanitize_text_field( $attachment['mdb-lm-creator-credit'] ) );
    $credit->set_creator_url( sanitize_url( $attachment['mdb-lm-creator-url'] ) );

    $credit->update_table_record();

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
    $credit = new Media_Credit( $id );

    $credit->remove_table_record();
}

add_action( 'delete_attachment', __NAMESPACE__ . '\delete_attachment_handler');
