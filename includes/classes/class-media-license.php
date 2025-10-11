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
     * @param string $license_guid The license identifier
     */

    public function __construct( $license_guid ) {

        global $wpdb;

        $results = $wpdb->get_results(
            "SELECT * FROM {$wpdb->prefix}mdb_lm_licenses WHERE license_guid='{$license_guid}'",
            'ARRAY_A'
        );

        if ( null !== $results ) {
            $this->license_guid = $results[0]['license_guid'];
            $this->license_name = $results[0]['license_name'];
            $this->license_description = $results[0]['license_description'];
            $this->license_url = $results[0]['license_url'];
            $this->media_count = $results[0]['media_count'];
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

}
