<?php
/**
 * Class Media_License
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 *
 *
 * @todo: needs to be rewritten !!!!
 */

namespace mdb_license_management\classes;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



class Media_License {

    /**
     * The global unique identifier (guid) of the license.
     *
     * @var string
     */

    private $license_guid = '';


    /**
     * The name of the license.
     *
     * @var string
     */

    private $license_name = '';


    /**
     * The description of the license.
     *
     * @var string
     */

    private $license_description = '';


    /**
     * The URL to the license's terms (if applicable).
     *
     * @var string
     */

    private $license_url = '';



    /**
     * The number of media using this license.
     *
     * @var int
     */

    private $media_count = 0;


    /**
     * Constructor
     *
     * @param string $license_guid The license
     */

    public function __construct( $license_guid ) {

        // check if license_guid exist
        // what happens if not?

        $this->license_guid = $license_guid;

        if ( false === $this->get_table_record() ) {
            // what now?
        }
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
     * Gets the license name.
     *
     * @return string The name
     */

    public function get_license_name() {
        return $this->license_name;
    }


    /**
     * Gets the license description.
     *
     * @return string The description
     */

    public function get_license_description() {
        return $this->license_description;
    }


    /**
     * Gets the URL of the licencse terms.
     *
     * @return string The URL
     */

    public function get_license_url() {
        return $this->license_url;
    }


    /**
     * Gets the license count.
     *
     * @return int The count
     */

    public function get_media_count() {
        return $this->media_count;
    }



    /**
     * Gets the corresponding in the license table and synchronizes the classes' variables
     *
     * @return bool true on success, otherwise false
     */

    private function get_table_record() {
        global $wpdb;

        $result = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}mdb_lm_licenses WHERE license_id={$this->license_guid}", 'ARRAY_A' );

        if ( null == $result ) {
            return false;
        }

        $this->license_name        = $result[0]['license_name'];
        $this->license_description = $result[0]['license_description'];
        $this->license_url         = $result[0]['license_url'];
        $this->media_count         = $result[0]['media_count'];

        return true;
    }


    /**
     * Updates the corresponding record in the license table.
     * // If there is no record it creates a new record with the current settings.
     *
     * @see Media_Credit::__construct()
     */


     // needs to be rewritten!!!
    public function update_table_record() {
        global $wpdb;

        $table_name   = $wpdb->prefix . 'mdb_lm_licenses';
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

}
