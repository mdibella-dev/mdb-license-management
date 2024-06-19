<?php
/*
 * Plugin Name:     Marco Di Bella &mdash; License Management
 * Plugin URI:      https://github.com/mdibella-dev/mdb-license-management
 * Description:     Adds functions to the WordPress media library for managing copyright licenses and creating and querying corresponding credits.
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * License:         MIT License
 * Version:         1.0.0
 * Text Domain:     mdb-license-management
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions */

define( __NAMESPACE__ . '\PLUGIN_VERSION', '1.0.1' );
define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );


const TABLE_LICENSES = 'mdb_lv_licenses';
const TABLE_MEDIA    = 'mdb_lv_media';


/** Include files */

require_once PLUGIN_DIR . 'includes/definitions/media-states.php';
require_once PLUGIN_DIR . 'includes/definitions/licenses.php';

require_once PLUGIN_DIR . 'includes/classes/class-media-record.php';

require_once PLUGIN_DIR . 'includes/media-library/upload.php';
require_once PLUGIN_DIR . 'includes/media-library/attachment.php';

require_once PLUGIN_DIR . 'includes/theme-integration.php';
require_once PLUGIN_DIR . 'includes/backend.php';
require_once PLUGIN_DIR . 'includes/setup.php';
