<?php
/**
 * API for theme integration (deprecated)
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\theme_integration;

use mdb_license_management\classes\Media_Credit;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Returns the creator's credit line.
 *
 * @since 0.0.1
 *
 * @param int $id The media attachment ID
 *
 * @return string Output of the credits.
 */

function get_byline( $id ) {

    $credit = new Media_Credit( $id );

    return $credit->get_creator_credit();
}
