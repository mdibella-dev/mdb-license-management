<?php
/*
Plugin Name:     Bildrechte (mdb-image-rights)
Author:          Marco Di Bella
Author URI:      https://www.marcodibella.de
Description:     Implementiert eine Bildrechteverwaltung.
Version:         0.0.1
Text Domain:     mdb-image-rights
*/


// Wichtige Konstanten
define( 'PLUGIN_VERSION', '0.0.1' );
define( 'PLUGIN_DOMAIN', 'mdb-image-rights' );



function plugin_activation()
{
    //do something
}

register_activation_hook( __FILE__, 'plugin_activation' );
