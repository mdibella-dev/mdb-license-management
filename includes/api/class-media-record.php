<?php
/**
 * Class Media Record
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */


namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



class Media_Record {

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

    private $media_link = '';


    /**
     * The media state.
     *
     * @var int
     */

    private $media_state = MEDIA_STATE_UNKNOWN;


    /**
     * The guid of the license which is used by this media.
     *
     * @var string
     */

    private $license_guid = 0;


    /**
     * The credit line of the original creator.
     *
     * @var string
     */

    private $by_name = '';


    /**
     * The URL to the creator's portfolio (if applicable).
     *
     * @var string
     */

    private $by_link = '';


    /**
     * Constructor
     *
     * @param int $attachment_post_ID   The post_ID of the attachment (media object).
     */

    public function __construct( $attachment_post_ID ) {

        // check if attachment exist
        // what happens if not?

        $media_id = $attachment_post_ID;

        if( false == $this->get_table_record() ) :
            $this->update_table_record();
        endif;
    }


    /**
     * Sets the original URL of the media.
     *
     * @param string $media_link    The URL
     */

    public function set_media_link( $media_link ) {
        $this->media_link = sanitize_url( $media_link, [ 'http', 'https' ] );
    }


    /**
     * Gets the orginal URL of the media.
     *
     * @return string   The URL
     */

    public function get_media_link() {
        return $this->media_link;
    }


    /**
     * Sets the credit line of the media creator.
     *
     * @param string $by_name    The credit line
     */

    public function set_by_name( $by_name ) {
        $this->by_name = $by_name;
    }


    /**
     * Gets the credit line of the media creator.
     *
     * @return string   The credit line
     */

    public function get_by_name() {
        return $this->by_name;
    }


    /**
     * Sets the URL to the media creator's portfolio page.
     *
     * @param string $by_link    The URL
     */

    public function set_by_link( $by_link ) {
        $this->by_link = sanitize_url( $by_link, [ 'http', 'https' ] );
    }


    /**
     * Gets the URL to the media creator's portfolio page.
     *
     * @return string   The URL
     */

    public function get_by_link() {
        return $this->by_link;
    }


    /**
     * Gets the corresponding in the media table and synchronizes the classes' variables
     */

    private function get_table_record() {
        global $wpdb;

        $query = $wpdb->prepare(
            "SELECT * FROM %1$s WHERE `media_id` = %2$d",
            [
                $wpdb->prefix . TABLE_MEDIA,
                $this->media_id
            ]
        );

        $result = $wpdb->get_results( $query, 'ARRAY_A' );

        if( null == $result ) :
            return false;
        endif;

        $this->media_link   = $result[0]['media_link'];
        $this->media_state  = $result[0]['media_state'];
        $this->license_guid = $result[0]['license_guid'];
        $this->by_name      = $result[0]['by_name'];
        $this->by_link      = $result[0]['by_link'];

        return true;
    }


    /**
     * Updates the corresponding record in the media table.
     * If there is no record it creates a new record with the current settings.
     *
     * @see Media_Record::__construct()
     */

    protected function update_table_record() {
        global $wpdb;

        $wpdb->insert(
            $wpdb->prefix . TABLE_MEDIA,
            [
                'media_id'     => $this->media_id,
                'media_link'   => $this->media_link,
                'media_state'  => $this->media_state,
                'license_guid' => $this->license_guid,
                'by_name'      => $this->by_name,
                'by_link'      => $this->by_link,
            ],
            [
                '%d',
                '%s',
                '%d',
                '%s',
                '%s',
                '%s'
            ]
        );
    }


    /**
     * Removes the corresponding record from the media table
     */

    protected function remove_table_record() {
        global $wpdb;

        $wpdb->delete(
            $wpdb->prefix . TABLE_MEDIA,
            [ 'media_id' => $this->media_id ]
        );
    }
}
