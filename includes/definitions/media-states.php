<?php
/**
 * Definition of media states. (Deprecated)
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



const MEDIA_STATE_UNKNOWN       = 0;
const MEDIA_STATE_NO_CREDIT     = 1;
const MEDIA_STATE_SIMPLE_CREDIT = 2;
const MEDIA_STATE_LICENSED      = 3;


define( 'MEDIA_STATES', [
    MEDIA_STATE_UNKNOWN,
    MEDIA_STATE_NO_CREDIT,
    MEDIA_STATE_SIMPLE_CREDIT,
    MEDIA_STATE_LICENSED,
] );


/**
 * Returns a (translated) description of the given media state.
 *
 * @since  1.1.0
 *
 * @param int $media_state The media state.
 *
 * @return string The media state description.
 */

function get_media_state_description( $media_state ) {

    switch( $media_state ) {

        case MEDIA_STATE_NO_CREDIT:
            $description = __( 'no copyright information necessary', 'mdb-license-management' );
            break;

        case MEDIA_STATE_SIMPLE_CREDIT:
            $description = __( 'simple naming (with linking if necessary)', 'mdb-license-management' );
            break;

        case MEDIA_STATE_LICENSED:
            $description = __( 'copyright information according to license', 'mdb-license-management' );
            break;

        case MEDIA_STATE_UNKNOWN:
        default:
            $description = __( 'unknown', 'mdb-license-management' );
            break;

    }

    return $description;

}
