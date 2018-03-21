<?php
/*
Plugin Name:     Bildrechte (mdb-image-rights)
Author:          Marco Di Bella
Author URI:      https://www.marcodibella.de
Description:     Implementiert eine Bildrechteverwaltung.
Version:         0.0.1
Text Domain:     mdb-image-rights
*/



// Check & Quit
defined('ABSPATH') OR exit;



// Wichtige Konstanten
define( 'PLUGIN_VERSION', '0.0.1' );
define( 'PLUGIN_DOMAIN', 'mdb-image-rights' );
define( 'TABLE_LICENSES', 'mdb_ir_licenses' );



/*
 * @source https://codex.wordpress.org/Creating_Tables_with_Plugins#Creating_or_Updating_the_Table
 * @since 0.0.1
 */

function plugin_activation()
{
    global $wpdb;

    // Tabelle für Lizenzen installieren
    $table_name      = $wpdb->prefix . TABLE_LICENSES;
    $charset_collate = $wpdb->get_charset_collate();

    if( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name) :

        //table not in database. Create new table
        $sql = "CREATE TABLE $table_name (
                id      mediumint(9) NOT NULL AUTO_INCREMENT,
                name    text NOT NULL,
                field_y text NOT NULL,
                PRIMARY KEY id (id)
                ) $charset_collate;";

                `id` int(11) NOT NULL AUTO_INCREMENT,
                	            `customer_id` int(11) NOT NULL,
                	            `project` varchar(50) NOT NULL,
                	            `description` TEXT DEFAULT '',
                  				`created_at` TIMESTAMP NOT NULL DEFAULT NOW(),
                				`created_by` int(11) NOT NULL,
                				`updated_at` TIMESTAMP NOT NULL DEFAULT NOW(),
                				`updated_by` int(11) NOT NULL,
                	            PRIMARY KEY (`id`)

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    else :
        //table in database. Check version and/or update
    endif;
}

register_activation_hook( __FILE__, 'plugin_activation' );
