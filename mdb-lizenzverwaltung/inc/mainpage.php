<?php
/**
 * Hauptseite des Plugins
 *
 * @author Marco Di Bella <mdb@marcodibella.de>
 * @package mdb-lv
 * @since 0.0.1
 * @version 0.0.1
 */



// Check & Quit
defined( 'ABSPATH' ) OR exit;


/**
 * Integriert die Hauptseite in das 'Medien'-Menü
 *
 * @since 0.0.1
 */

function mdb_lv_add_mainpage()
{
    add_media_page( __( 'Lizenzverwaltung', LOCALIZED ),
                    __( 'Lizenzverwaltung', LOCALIZED ),
                    'manage_options',
                    __FILE__,
                    'mdb_lv_show_mainpage' );
}

add_action( 'admin_menu', 'mdb_lv_add_mainpage' );



/**
 * Anzeige der Hauptseite
 *
 * @since 0.0.1
 */

function mdb_lv_show_mainpage()
{
    echo 'yeah';
}
