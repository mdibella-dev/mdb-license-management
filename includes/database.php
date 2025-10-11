<?php

namespace mdb_license_management;



function database_install() {

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    global $wpdb;
           $collate = $wpdb->get_charset_collate();


    /**
     *  Install necessary tables into the database.
     */

    dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}mdb_lm_licenses (
        license_guid VARCHAR(4) DEFAULT '' NOT NULL,
        license_name VARCHAR(50) DEFAULT '' NOT NULL,
        license_description TEXT DEFAULT '' NOT NULL,
        license_url VARCHAR(255) DEFAULT '' NOT NULL,
        media_count SMALLINT UNSIGNED DEFAULT 0 NOT NULL,
        PRIMARY KEY (license_guid)
        )
        COLLATE $collate;" );

    dbDelta( "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}mdb_lm_credits (
        media_id BIGINT(20) UNSIGNED DEFAULT 0 NOT NULL,
        media_source_url VARCHAR(255) DEFAULT '' NOT NULL,
        license_guid VARCHAR(4) DEFAULT '' NOT NULL,
        creator_credit VARCHAR(255) DEFAULT '' NOT NULL,
        creator_url VARCHAR(255) DEFAULT '' NOT NULL,
        PRIMARY KEY (media_id)
        )
        COLLATE $collate;" );
}




function database_migrate() {

    global $wpdb;

    if ( "{$wpdb->prefix}mdb_lv_media" == $wpdb->get_var( "SHOW TABLES LIKE '{$wpdb->prefix}mdb_lv_media'" ) ) {

        $wpdb->query(
            "INSERT INTO {$wpdb->prefix}mdb_lm_credits (media_id, media_source_url, license_guid, creator_credit, creator_url)
             SELECT media_id, media_link, license_guid, by_name, by_link
             FROM {$wpdb->prefix}mdb_lv_media
             WHERE {$wpdb->prefix}mdb_lm_credits.media_id = {$wpdb->prefix}mdb_lv_media.media_id" );

/*        $wpdb->query(
            "DROP TABLE {$wpdb->prefix}mdb_lv_media" ); */
    }

    $wpdb->query(
        "DROP TABLE IF EXISTS {$wpdb->prefix}mdb_lv_licenses" );
}



function database_preset_credits() {

     global $wpdb;

     $wpdb->query(
        "INSERT IGNORE INTO {$wpdb->prefix}mdb_lm_credits (media_id)
         SELECT ID
         FROM {$wpdb->prefix}posts
         WHERE post_type='attachment'"
         );

         // maybe @getresults
}


function database_preset_licenses() {

    $file = file_get_contents( PLUGIN_DIR . 'assets/build/json/licenses.json', false );

    if ( false !== $file ) {
        global $wpdb;
               $preset = json_decode( $file , true );

        foreach ( $preset['Licenses'] as $guid => $content ) {

            $wpdb->query( $wpdb->prepare(
                "INSERT IGNORE INTO {$wpdb->prefix}mdb_lm_licenses
                (license_guid, license_name, license_description, license_url, media_count)
                VALUES ( %s, %s, %s, %s, %d )",
                $guid,
                $content['license_name'],
                $content['license_description'],
                $content['license_url'],
                $content['media_count']
                ) );
        }
    } else {
        // do something
    }
}
