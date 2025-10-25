<?php
/**
 * API for theme integration (deprecated)
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\theme_integration;

use mdb_license_management\Media_Record;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Returns the creator's credit line.
 *
 * @since 0.0.1
 *
 * @param int $id The attachment's post_ID.
 *
 * @return string Output of the credits.
 */

function get_byline( $id ) {
    $record = new Media_Record( $id );

    return $record->get_by_name();
}
