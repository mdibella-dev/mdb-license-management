<?php
/**
 * API for theme integration (defunc)
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace MDB_License_Management\API;


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
   /*$record = new Media_Record( $id );**/
    return '';
}
