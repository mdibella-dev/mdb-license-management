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


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions */

define( __NAMESPACE__ . '\PLUGIN_VERSION', '0.0.2' );
define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'LICENSE_GUID_CC0', '0001' );
define( 'LICENSE_GUID_DREAMSTIME_RF', 'L054' );

define( 'MEDIA_STATE_UNKNOWN', 0 );
define( 'MEDIA_STATE_NO_CREDIT', 1 );
define( 'MEDIA_STATE_SIMPLE_CREDIT', 2 );
define( 'MEDIA_STATE_LICENSED', 3 );



/** Include files */

require_once( PLUGIN_DIR . '/includes/classes/class-main-table.php' );
require_once( PLUGIN_DIR . '/includes/core/core-indexing.php' );
require_once( PLUGIN_DIR . '/includes/core/core-media-record.php' );
require_once( PLUGIN_DIR . '/includes/core/core-license.php' );
require_once( PLUGIN_DIR . '/includes/media-library-enhancement.php' );
require_once( PLUGIN_DIR . '/includes/mainpage.php' );
require_once( PLUGIN_DIR . '/includes/setup.php' );
