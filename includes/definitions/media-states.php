<?php
/**
 * Definition of media states.
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
    MEDIA_STATE_UNKNOWN       => __( 'unknown', 'mdb-license-management' ),
    MEDIA_STATE_NO_CREDIT     => __( 'no copyright information necessary', 'mdb-license-management' ),
    MEDIA_STATE_SIMPLE_CREDIT => __( 'simple naming (with linking if necessary)', 'mdb-license-management' ),
    MEDIA_STATE_LICENSED      => __( 'copyright information according to license', 'mdb-license-management' ),
] );
