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
    add_media_page( __( 'Lizenzverwaltung', 'mdb_lv' ),
                    __( 'Lizenzverwaltung', 'mdb_lv' ),
                    'manage_options',
                    __FILE__,
                    'mdb_lv_show_mainpage' );
}

add_action( 'admin_menu', 'mdb_lv_add_mainpage' );



/**
 * Anzeige der Hauptseite
 *
 * @since 0.0.1
 * @source http://qnimate.com/add-tabs-using-wordpress-settings-api/
 */

function mdb_lv_show_mainpage()
{
?>
<div class="wrap">
<h1 class="wp-heading-inline"><?php _e( 'Lizenzverwaltung', 'mdb_lv' )?></h1>
<?php
    $active_tab = 'tab-01';

    if( isset( $_GET[ 'tab' ] ) ) :
        switch( $_GET[ 'tab' ] ) :
            // Tab mit Indizierungsfunktionen
            case 'tab-01' :
                $active_tab = 'tab-01';
            break;

            // Tab mit Lizenzübersicht
            case 'tab-02' :
                $active_tab = 'tab-02';
            break;
        endswitch;
    endif;
?>
<h2 class="nav-tab-wrapper">
<a href="?page=mdb-lizenzverwaltung%2Finc%2Fmainpage.php&tab=tab-01" class="nav-tab <?php if( $active_tab == 'tab-01'){ echo 'nav-tab-active'; } ?>"><?php _e( 'Indizierung', 'mdb_lv'); ?></a>
<a href="?page=mdb-lizenzverwaltung%2Finc%2Fmainpage.php&tab=tab-02" class="nav-tab <?php if( $active_tab == 'tab-02'){ echo 'nav-tab-active'; } ?>"><?php _e( 'Verfügbare Lizenzen', 'mdb_lv'); ?></a>
</h2>
<?php
    switch( $active_tab ) :
        case 'tab-01' :
            mdb_lv_show_indexing_tab();
        break;

        case 'tab-02' :
            mdb_lv_show_licenses_tab();
        break;
    endswitch
?>
</div>
<?php
}



/**
 * Anzeige des Tabs 'Verfügbare Lizenzen'
 *
 * @since 0.0.1
 */

function mdb_lv_show_licenses_tab()
{
?>
<h2><?php _e( 'Verfügbare Lizenzen', 'mdb_lv' )?></h2>
<?php
    $maintable = new MDB_main_table();
    $maintable->prepare_items();
    $maintable->display();
}



/**
 * Anzeige des Tabs 'Indizierung der Medien'
 *
 * @since 0.0.1
 */

function mdb_lv_show_indexing_tab()
{
?>
<h2><?php _e( 'Indizierung der Medien', 'mdb_lv' )?></h2>
<?php

}
