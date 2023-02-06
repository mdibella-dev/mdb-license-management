<?php
/**
 * The administration page of the plugin.
 *
 * @author  Marco Di Bella
 * @package mdb-lv
 */

namespace mdb_license_management;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Integrates the administration page into the 'Media' menu.
 *
 * @since 0.0.1
 */

function mdb_lv_add_mainpage()
{
    add_media_page(
        __( 'Lizenzverwaltung', 'mdb-license-management' ),
        __( 'Lizenzverwaltung', 'mdb-license-management' ),
        'manage_options',
        'mdb_lizenzverwaltung',
        'mdb_lv_show_mainpage'
    );
}

add_action( 'admin_menu', __NAMESPACE__ . '\mdb_lv_add_mainpage' );



/**
 * Display of the administration page.
 *
 * @since 0.0.1
 *
 * @source http://qnimate.com/add-tabs-using-wordpress-settings-api/
 */

function mdb_lv_show_mainpage()
{
?>
<div class="wrap">
<h1 class="wp-heading-inline"><?php echo __( 'Lizenzverwaltung', 'mdb-license-management' )?></h1>
<?php
    $active_tab = 'tab-01';

    if( isset( $_GET['tab'] ) ) :

        switch( $_GET['tab'] ) :

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
<a href="?page=mdb_lizenzverwaltung&tab=tab-01" class="nav-tab <?php if( $active_tab == 'tab-01'){ echo 'nav-tab-active'; } ?>"><?php echo __( 'Indizierung', 'mdb-license-management'); ?></a>
<a href="?page=mdb_lizenzverwaltung&tab=tab-02" class="nav-tab <?php if( $active_tab == 'tab-02'){ echo 'nav-tab-active'; } ?>"><?php echo __( 'Verfügbare Lizenzen', 'mdb-license-management'); ?></a>
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
 * Display of the 'available licenses' tab.
 *
 * @since 0.0.1
 */

function mdb_lv_show_licenses_tab()
{
?>
<h2><?php echo __( 'Verfügbare Lizenzen', 'mdb-license-management' )?></h2>
<?php
    $maintable = new MDB_main_table();
    $maintable->prepare_items();
    $maintable->display();
}



/**
 * Display of the 'indexing of media' tab.
 *
 * @since 0.0.1
 */

function mdb_lv_show_indexing_tab()
{
?>
<h2><?php echo __( 'Indizierung der Medien', 'mdb-license-management' )?></h2>
<?php
    global $wpdb;
           $total = $wpdb->get_var( "SELECT COUNT(ID) FROM $wpdb->posts WHERE (post_type='attachment') AND (post_mime_type LIKE '%%image%%')" );

    if( $total == 0 ) :
        echo '<p>';
        echo __( 'In der Mediathek befinden sich derzeit keine Bilder.', 'mdb-license-management' );
        echo '</p>';
    else :
        echo '<p>';
        echo sprintf( __( 'In der Mediathek befinden sich derzeit %1$s Bilder.', 'mdb-license-management' ), $total );
        echo '<br>';
        echo __( 'Bevor Sie mit der Erfassung der Bildlizenzen fortfahren, führen Sie bitte einmalig den Indizierungsvorgang durch.', 'mdb-license-management' );
        echo '</p>';
        echo '<form action="" method="post">';
        echo '<input name="mdb_lv_index" type="hidden" value="go">';
        echo '<input type="submit" class="button" value="'. __( 'Starten', 'mdb-license-management' ) . '">';
        echo '</form>';

        if( $_POST['mdb_lv_index'] == 'go' ):
            $data = $wpdb->get_results( "SELECT ID, post_title FROM $wpdb->posts WHERE (post_type='attachment') AND (post_mime_type LIKE '%%image%%')" );

            echo '<p>';
            foreach( $data as $image ) :
                mdb_lv_indexing( $image->ID );
                echo( sprintf(
                        __( 'Bearbeite Bild mit ID #%1$s: %2$s', 'mdb-license-management'),
                        $image->ID,
                        $image->post_title )
                    );
                echo '<br>';
            endforeach;
            echo '</p>';
            echo '</p>';
            echo __( 'Indizierungsvorgang beendet.', 'mdb-license-management' );
            echo '</p>';
        endif;
    endif;
}
