<?php
/**
 * Class Credit_Record
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\classes;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



class Credit_Record {

    /**
     * The media id (post_id) of the corresponding attachment/table record.
     *
     * @var int
     */

    private $media_id = 0;


    /**
     * The original URL to the media source.
     *
     * @var string
     */

    private $media_source_url = '';


    /**
     * The guid of the license which is used by this media.
     *
     * @var string
     */

    private $license_guid = '';


    /**
     * The credit line of the original creator.
     *
     * @var string
     */

    private $creator_credit = '';


    /**
     * The URL to the creator's portfolio (if applicable).
     *
     * @var string
     */

    private $creator_url = '';


    /**
     * Constructor
     *
     * @param int $attachment_post_ID The post_ID of the attachment (media object).
     */

    public function __construct( $attachment_post_ID ) {

        // check if attachment exist
        // what happens if not?

        $this->media_id = $attachment_post_ID;

        if ( false === $this->get_table_record() ) {
            $this->update_table_record();
        }
    }


    /**
     * Sets the original URL of the media.
     *
     * @param string $url
     */

    public function set_media_source_url( $url ) {
        $this->media_source_url = sanitize_url( $url, [ 'http', 'https' ] );
    }


    /**
     * Gets the orginal URL of the media.
     *
     * @return string The URL
     */

    public function get_media_source_url() {
        return $this->media_source_url;
    }


    /**
     * Sets the license guid.
     *
     * @param string $license_guid
     */

    public function set_license_guid( $license_guid ) {

         $this->license_guid = $license_guid;

    /*    if ( true == array_key_exists( $license_guid, LICENSES ) ) {
            $this->license_guid = $license_guid;
        } */
    }


    /**
     * Gets the license guid.
     *
     * @return string The license guid
     */

    public function get_license_guid() {
        return $this->license_guid;
    }


    /**
     * Sets the credit line of the media creator.
     *
     * @param string $credit
     */

    public function set_creator_credit( $credit ) {
        $this->creator_credit = $credit;
    }


    /**
     * Gets the credit line of the media creator.
     *
     * @return string The credit line
     */

    public function get_creator_credit() {
        return $this->creator_credit;
    }


    /**
     * Sets the URL to the media creator's portfolio page.
     *
     * @param string $url
     */

    public function set_creator_url( $url ) {
        $this->creator_url = sanitize_url( $url, [ 'http', 'https' ] );
    }


    /**
     * Gets the URL to the media creator's portfolio page.
     *
     * @return string The URL
     */

    public function get_creator_url() {
        return $this->creator_url;
    }


    /**
     * Gets the corresponding in the media table and synchronizes the classes' variables
     *
     * @return bool true on success, otherwise false
     */

    private function get_table_record() {
        global $wpdb;

        $result = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mdb_lm_credits WHERE media_id=$this->media_id", 'ARRAY_A' );

        if ( null == $result ) {
            return false;
        }

        $this->media_source_url = $result[0]['media_source_url'];
        $this->license_guid     = $result[0]['license_guid'];
        $this->creator_credit   = $result[0]['creator_credit'];
        $this->creator_url      = $result[0]['creator_url'];

        return true;
    }


    /**
     * Updates the corresponding record in the media table.
     * If there is no record it creates a new record with the current settings.
     *
     * @see Credit_Record::__construct()
     */

    public function update_table_record() {
        global $wpdb;

        $table_name   = $wpdb->prefix . 'mdb_lm_credits';
        $table_data   = [
            'media_id'         => $this->media_id,
            'media_source_url' => $this->media_source_url,
            'license_guid'     => $this->license_guid,
            'creator_credit'   => $this->creator_credit,
            'creator_url'      => $this->creator_url
        ];
        $table_format = [
            '%d',
            '%s',
            '%s',
            '%s',
            '%s'
        ];

        if ( false === $this->get_table_record() ) {
            $wpdb->insert(
                $table_name,
                $table_data,
                $table_format
            );
        } else {
            $wpdb->replace(
                $table_name,
                $table_data,
                $table_format
            );
        }
    }


    /**
     * Removes the corresponding record from the media table
     */

    public function remove_table_record() {
        global $wpdb;

        $wpdb->delete(
            $wpdb->prefix . 'mdb_lm_credits',
            [
                'media_id' => $this->media_id
            ]
        );
    }
}
