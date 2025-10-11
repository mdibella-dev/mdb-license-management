<?php

namespace mdb_license_management;



/**
 * Installs all tables and fill them with default values.
 *
 * @since 2.0.0
 */

function database_install() {

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    global $wpdb;
           $collate = $wpdb->get_charset_collate();


    /**
     * Install necessary tables into the database.
     */

    dbDelta(
        "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}mdb_lm_licenses (
        license_guid VARCHAR(4) DEFAULT '' NOT NULL,
        license_name VARCHAR(50) DEFAULT '' NOT NULL,
        license_description TEXT DEFAULT '' NOT NULL,
        license_url VARCHAR(255) DEFAULT '' NOT NULL,
        media_count SMALLINT UNSIGNED DEFAULT 0 NOT NULL,
        PRIMARY KEY (license_guid)
        )
        COLLATE $collate;"
    );

    dbDelta(
        "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}mdb_lm_credits (
        media_id BIGINT(20) UNSIGNED DEFAULT 0 NOT NULL,
        media_source_url VARCHAR(255) DEFAULT '' NOT NULL,
        license_guid VARCHAR(4) DEFAULT '' NOT NULL,
        creator_credit VARCHAR(255) DEFAULT '' NOT NULL,
        creator_url VARCHAR(255) DEFAULT '' NOT NULL,
        PRIMARY KEY (media_id)
        )
        COLLATE $collate;"
    );


    /**
     * Preset credits table.
     *
     * Scan for attachments and add their post IDs as media_id to the table.
     */

    $wpdb->query(
        "INSERT IGNORE INTO {$wpdb->prefix}mdb_lm_credits (media_id)
        SELECT ID
        FROM {$wpdb->prefix}posts
        WHERE post_type='attachment'"
    );


    /**
     * Presets licenses table.
     *
     * Import the preset data stored in licenses.json.
     *
     * @todo Add file version check
     */

    $file = file_get_contents( PLUGIN_DIR . 'assets/build/json/licenses.json', false );

    if ( false !== $file ) {
        $preset = json_decode( $file , true );

        foreach ( $preset['Licenses'] as $guid => $content ) {

            $wpdb->query(
                "INSERT IGNORE INTO {$wpdb->prefix}mdb_lm_licenses
                (license_guid, license_name, license_description, license_url, media_count)
                VALUES ( %s, %s, %s, %s, %d )",
                $guid,
                $content['license_name'],
                $content['license_description'],
                $content['license_url'],
                $content['media_count']
            );
        }
    } else {
        // do something?
    }
}



/**
 * Migrate credit data from version 1.1.0
 *
 * @since 2.0.0
 */

function database_migrate() {

    global $wpdb;

    if ( "{$wpdb->prefix}mdb_lv_media" == $wpdb->get_var( "SHOW TABLES LIKE '{$wpdb->prefix}mdb_lv_media'" ) ) {

        $results = $wpdb->get_results(
            "SELECT {$wpdb->prefix}mdb_lv_media.media_id, {$wpdb->prefix}mdb_lv_media.media_link, {$wpdb->prefix}mdb_lv_media.license_guid, {$wpdb->prefix}mdb_lv_media.by_name, {$wpdb->prefix}mdb_lv_media.by_link
             FROM {$wpdb->prefix}mdb_lv_media, {$wpdb->prefix}mdb_lm_credits
             WHERE {$wpdb->prefix}mdb_lm_credits.media_id = {$wpdb->prefix}mdb_lv_media.media_id AND ( ( {$wpdb->prefix}mdb_lv_media.by_name != '' ) OR ( {$wpdb->prefix}mdb_lv_media.license_guid != '' ) )",
            'ARRAY_A'
        );

        if ( null == $results ) {
            return;
        }

        foreach ( $results as $result ) {
            $wpdb->query(
               "UPDATE {$wpdb->prefix}mdb_lm_credits
                SET media_source_url = '{$result['media_link']}', license_guid = '{$result['license_guid']}', creator_credit = '{$result['by_name']}', creator_url = '{$result['by_link']}'
                WHERE media_id = '{$result['media_id']}'"
           );
        }
    }

    $wpdb->query(
        "DROP TABLE IF EXISTS {$wpdb->prefix}mdb_lv_licenses, {$wpdb->prefix}mdb_lv_media"
    );
}
