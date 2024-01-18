<?php

/** Projects CPT */
function create_projects_cpt() {
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'kr1'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'kr1'),
        'menu_name'             => __('Projects', 'kr1'),
        'name_admin_bar'        => __('Project', 'kr1'),
        'add_new_item'          => __('Add New Project', 'kr1'),
    );

    $args = array(
        'label'                 => __('Project', 'kr1'),
        'description'           => __('Project information pages', 'kr1'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false, // Disable the archive
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('projects', $args);
}
/** Projects Categories */
function create_projects_taxonomy() {
    $labels = array(
        'name'                       => _x('Categories', 'Taxonomy General Name', 'kr1'),
        'singular_name'              => _x('Category', 'Taxonomy Singular Name', 'kr1'),
        'menu_name'                  => __('Categories', 'kr1'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true, // 'true' for category-like taxonomy, 'false' for tag-like
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );

    register_taxonomy('categories', array('projects'), $args);
}
add_action('init', 'create_projects_cpt', 0);
add_action('init', 'create_projects_taxonomy', 0);

/** Services CPT */
function create_services_cpt() {
    $labels = array(
        'name'                  => _x('Services', 'Post Type General Name', 'kr1'),
        'singular_name'         => _x('Service', 'Post Type Singular Name', 'kr1'),
        'menu_name'             => __('Services', 'kr1'),
        'name_admin_bar'        => __('Service', 'kr1'),
        'add_new_item'          => __('Add New Service', 'kr1'),
    );

    $args = array(
        'label'                 => __('Service', 'kr1'),
        'description'           => __('Service information pages', 'kr1'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('services', $args);
}

add_action('init', 'create_services_cpt', 0);
