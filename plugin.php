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

 namespace MDB_License_Management;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/** Variables and definitions */

define( __NAMESPACE__ . '\PLUGIN_VERSION', '1.1.0' );
define( __NAMESPACE__ . '\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );



const TABLE_MEDIA = 'mdb_lv_media'; // deprecated

const METAKEY_LICENSE_URL      = 'mdb_lm_license_url';
const METAKEY_LICENSE_IMG      = 'mdb_lm_license_img';
const METAKEY_CREATOR_CREDIT   = 'mdb-lm-creator-credit';
const METAKEY_CREATOR_URL      = 'mdb-lm-creator-url';
const METAKEY_MEDIA_SOURCE_URL = 'mdb-lm-media-source-url';


/** Include files */

require_once PLUGIN_DIR . 'vendor/autoload.php';

require_once PLUGIN_DIR . 'includes/classes/index.php';
require_once PLUGIN_DIR . 'includes/taxonomies/index.php';
require_once PLUGIN_DIR . 'includes/admin/index.php';

require_once PLUGIN_DIR . 'includes/api.php';
require_once PLUGIN_DIR . 'includes/backend.php';
require_once PLUGIN_DIR . 'includes/setup.php';



/** Register hooks */

register_activation_hook( __FILE__ , __NAMESPACE__ . '\plugin_activation' );
register_uninstall_hook( __FILE__, __NAMESPACE__ . '\plugin_uninstall' );
