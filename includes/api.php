<?php
/**
 * API for theme integration (deprecated)
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace MDB_License_Management\API;

use MDB_License_Management\Classes\Media_Credit;



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
