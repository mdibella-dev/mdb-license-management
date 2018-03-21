<?php
/*
Plugin Name:     Bildrechte (mdb-image-rights)
Author:          Marco Di Bella
Author URI:      https://www.marcodibella.de
Description:     Implementiert eine Bildrechteverwaltung.
Version:         0.0.1
Text Domain:     mdb_ir
*/



// Check & Quit
defined( 'ABSPATH' ) OR exit;



// Wichtige Konstanten
define( 'MDB_IR_PLUGIN_VERSION', '0.0.1' );
define( 'MDB_IR_PLUGIN_DATABASE_VERSION', '0.0.1' );
define( 'MDB_IR_PLUGIN_DOMAIN', 'mdb_ir' );

define( 'MDB_IR_TABLE_LICENSES', 'mdb_ir_licenses' );



/*
 * @source https://codex.wordpress.org/Creating_Tables_with_Plugins#Creating_or_Updating_the_Table
 * @since 0.0.1
 */

function mdb_ir_plugin_activation()
{
    global $wpdb;

    /**
     * Tabelle für Lizenzen installieren
     */

    $charset_collate = $wpdb->get_charset_collate();
    $table_name      = $wpdb->prefix . MDB_IR_TABLE_LICENSES;

    if( $wpdb->get_var( "SHOW TABLES LIKE `$table_name`" ) != $table_name) :

        $wpdb->query( "CREATE TABLE `$table_name` (
          `id` int(8)() UNSIGNED NOT NULL AUTO_INCREMENT,
          `term` varchar(200) DEFAULT '' NOT NULL,
          `short term` varchar(50) DEFAULT '' NOT NULL,
          `description` text NOT NULL,
          `link` varchar(255) DEFAULT '' NOT NULL,
          PRIMARY KEY (`id`)
        ) $charset_collate;";

        add_option( 'MDB_IR_DATABASE_VERSION', MDB_IR_PLUGIN_DATABASE_VERSION );
    else :
        //table in database. Check version and/or update
    endif;
}

register_activation_hook( __FILE__, 'plugin_activation' );
