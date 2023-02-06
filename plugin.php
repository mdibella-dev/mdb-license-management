<?php
/*
 * Plugin Name:     Marco Di Bella &mdash; License management
 * Plugin URI:
 * Description:     Adds functions to the WordPress media library for managing copyright licenses and creating and querying corresponding credits.
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * Version:         0.0.2
 * Text Domain:     mdb-license-management
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;

defined( 'ABSPATH' ) or exit;



/** Variables and definitions */

define( 'LICENSE_GUID_CC0', '0001' );
define( 'LICENSE_GUID_DREAMSTIME_RF', 'L054' );

define( 'MEDIA_STATE_UNKNOWN', 0 );
define( 'MEDIA_STATE_NO_CREDIT', 1 );
define( 'MEDIA_STATE_SIMPLE_CREDIT', 2 );
define( 'MEDIA_STATE_LICENSED', 3 );


/** Include files */

require_once( __DIR__ . '/includes/classes/class-main-table.php' );
require_once( __DIR__ . '/includes/core/core-indexing.php' );
require_once( __DIR__ . '/includes/core/core-media-record.php' );
require_once( __DIR__ . '/includes/core/core-license.php' );
require_once( __DIR__ . '/includes/media-library-enhancement.php' );
require_once( __DIR__ . '/includes/mainpage.php' );
require_once( __DIR__ . '/includes/setup.php' );
