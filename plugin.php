<?php
/*
 * Plugin Name:     Marco Di Bella &mdash; License Management
 * Plugin URI:      https://github.com/mdibella-dev/mdb-license-management
 * Description:     Adds functions to the WordPress media library for managing copyright licenses and creating and querying corresponding credits.
 * Author:          Marco Di Bella
 * Author URI:      https://www.marcodibella.de
 * License:         MIT License
 * Version:         1.1.0
 * Text Domain:     mdb-license-management
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions */

define( __NAMESPACE__ . '\PLUGIN_VERSION', '1.1.0' );
define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );


//const TABLE_LICENSES = 'mdb_lv_licenses';
//const TABLE_MEDIA    = 'mdb_lv_media';

const TABLE_LICENSES = 'mdb_lm_license';
const TABLE_CREDIT   = 'mdb_lm_credit';

const MENU_SLUG      = 'mdb_lm_available_licenses';


/** Include files */

require_once PLUGIN_DIR . 'includes/definitions/media-states.php';
require_once PLUGIN_DIR . 'includes/definitions/licenses.php';

require_once PLUGIN_DIR . 'includes/classes/class-media-record.php';
require_once PLUGIN_DIR . 'includes/classes/class-license-list-table.php';

require_once PLUGIN_DIR . 'includes/media-library/media-list-table.php';
require_once PLUGIN_DIR . 'includes/media-library/attachment.php';

require_once PLUGIN_DIR . 'includes/admin/page-available-licenses.php';


require_once PLUGIN_DIR . 'includes/deprecated.php';
require_once PLUGIN_DIR . 'includes/backend.php';
require_once PLUGIN_DIR . 'includes/database.php';
require_once PLUGIN_DIR . 'includes/setup.php';


/** Register hooks */

register_activation_hook( __FILE__ , __NAMESPACE__ . '\plugin_activation' );
register_deactivation_hook( __FILE__ , __NAMESPACE__ . '\plugin_deactivation' );
register_uninstall_hook( __FILE__, __NAMESPACE__ . '\plugin_uninstall' );
