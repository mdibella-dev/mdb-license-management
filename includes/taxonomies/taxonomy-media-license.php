<?php
/**
 * Custom taxonomy to group publikation-posts.
 *
 * @author  Marco Di Bella
 * @package mdb-license-management
 */


namespace mdb_license_management\taxonomies;

use const mdb_license_management\LICENSE_METAKEY_LINK as LICENSE_METAKEY_LINK;



/** Prevent direct access */

defined( 'ABSPATH' ) or exit;



/**
 * Registers the custom taxonomy.
 *
 * @since 2.0.0
 */

function register() {

    $labels = [
        'name'                  => __( 'Media license', 'mdb-license-management' ),
        'singular_name'         => __( 'Media license', 'mdb-license-management' ),
        'menu_name'             => __( 'Media licenses', 'mdb-license-management' ),
        'all_items'             => __( 'All licenses', 'mdb-license-management' ),
        'search_items'          => __( 'Search licenses', 'mdb-license-management' ),
        'choose_from_most_used' => __( 'Popular licenses', 'mdb-license-management' ),
        'not_found'             => __( 'Nothing found', 'mdb-license-management' ),
    ];

    $args = [
        'label'                 => __( 'Media license', 'mdb-license-management' ),
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => false,
        'query_var'             => true,
        'rewrite'               => [
            'slug'          => 'media_license',
            'with_front'    => true,
        ],
        'capabilities'          => [
            'assign_terms' => 'manage_options',
            'edit_terms'   => 'god',
        ],
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'show_tagcloud'         => true,
        'rest_base'             => 'media_license',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'rest_namespace'        => 'wp/v2',
        'show_in_quick_edit'    => false,  //maybe?
        'sort'                  => true,
        'show_in_graphql'       => false,
    ];

    register_taxonomy( 'media_license', ['attachment'], $args );
}



/**
 * Inserts a preset of licenses as new terms to the taxonomy.
 *
 * @since 2.0.0
 *
 * @todo Add an error routine in case licenses.php does not exist.
 */

function setup() {
    $preset = include "licenses.php";

    foreach ( $preset['licenses'] as $license ) {

        wp_insert_term(
            $license['term'],
            'media_license',
            [
                'description' => $license['description'],
                'slug'        => $license['slug']
            ]
        );

        $result = term_exists( $license['term'], 'media_license' );

        if ( (0 !== $result) and (NULL !== $result) ) {
            update_term_meta( $result['term_id'], LICENSE_METAKEY_LINK, $license['link'] );
        }
    }
}



/**
 * Fires the taxonomy registration and initial setup.
 *
 * @since 2.0.0
 */

function init() {
    register();
    setup();
}

add_action( 'init', __NAMESPACE__ . '\init' );



/**
 * Filters the edit link for a term.
 *
 * This filter removes any edit link of a given term of taxonomy media_license.
 *
 * @see https://developer.wordpress.org/reference/functions/get_edit_term_link/
 *
 * @since 2.0.0
 *
 * @param string $location    The edit link
 * @param int    $term_id     Term ID
 * @param string $taxonomy    Taxonomy name
 * @param string $object_type The object type
 */

function media_license_get_edit_term_link( $location, $term_id, $taxonomy, $object_type ) {

    if ( 'media_license' == $taxonomy ) {
        $location = '';
    }

    return $location;
}

add_filter( 'get_edit_term_link', __NAMESPACE__ . '\media_license_get_edit_term_link', 10, 4 );
