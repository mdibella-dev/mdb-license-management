<?php
/*
 * Plugin Name:     Marco Di Bella &mdash; License Management
 * Plugin URI:      https://github.com/mdibella-dev/mdb-license-management
 * Description:     Adds functions to the WordPress media library for managing copyright licenses and creating and querying corresponding credits.
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * Version:         0.0.3
 * Text Domain:     mdb-license-management
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions */

define( __NAMESPACE__ . '\PLUGIN_VERSION', '0.0.3' );
define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'MEDIA_STATE_UNKNOWN', 0 );
define( 'MEDIA_STATE_NO_CREDIT', 1 );
define( 'MEDIA_STATE_SIMPLE_CREDIT', 2 );
define( 'MEDIA_STATE_LICENSED', 3 );

define( __NAMESPACE__ . '\TABLE_MEDIA', 'mdb_lv_media' );
define( __NAMESPACE__ . '\TABLE_LICENSES', 'mdb_lv_licenses' );



/** Include files */

require_once( PLUGIN_DIR . 'includes/classes/index.php' );
require_once( PLUGIN_DIR . 'includes/core/index.php' );

require_once( PLUGIN_DIR . 'includes/theme-integration.php' );
require_once( PLUGIN_DIR . 'includes/mainpage.php' );
require_once( PLUGIN_DIR . 'includes/backend.php' );
require_once( PLUGIN_DIR . 'includes/setup.php' );
