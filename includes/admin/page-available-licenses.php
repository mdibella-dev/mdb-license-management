<?php
/**
 * A admin page to show all available licenses.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */

namespace mdb_license_management\admin\available_licenses;

use mdb_license_management\classes\Media_License_List_Table;


/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Integrates the page into the 'Media' menu.
 *
 * @since 0.0.1
 */

function add_page() {
    add_media_page(
        __( 'Licenses', 'mdb-license-management' ),
        __( 'Licenses', 'mdb-license-management' ),
        'manage_options',
        'mdb-lm-available-licenses',
        __NAMESPACE__ . '\show_page'
    );
}

add_action( 'admin_menu', __NAMESPACE__ . '\add_page' );



/**
 * Displays the page.
 *
 * @since 0.0.1
 *
 * @source http://qnimate.com/add-tabs-using-wordpress-settings-api/
 */

function show_page() {
?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo __( 'Available licenses', 'mdb-license-management' )?></h1>
    <?php
    $license_list = new Media_License_List_Table();
    $license_list->prepare_items();
    $license_list->display();
    ?>
</div>
<?php
}
