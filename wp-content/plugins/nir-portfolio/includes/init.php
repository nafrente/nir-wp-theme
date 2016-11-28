<?php

function project_init(){

    $labels = array(
        'name'               => __( 'Portfolio', 'nir-plugin' ),
        'singular_name'      => __( 'Project', 'nir-plugin' ),
        'menu_name'          => __( 'Projects', 'nir-plugin' ),
        'name_admin_bar'     => __( 'Projects', 'nir-plugin' ),
        'add_new'            => __( 'Add New', 'nir-plugin' ),
        'add_new_item'       => __( 'Add New Project', 'nir-plugin' ),
        'new_item'           => __( 'New Project', 'nir-plugin' ),
        'edit_item'          => __( 'Edit Project', 'nir-plugin' ),
        'view_item'          => __( 'View Portfolio', 'nir-plugin' ),
        'all_items'          => __( 'Portfolio', 'nir-plugin' ),
        'search_items'       => __( 'Search Project', 'nir-plugin' ),
        'parent_item_colon'  => __( 'Parent Project:', 'nir-plugin' ),
        'not_found'          => __( 'No Project found.', 'nir-plugin' ),
        'not_found_in_trash' => __( 'No Project found in Trash.', 'nir-plugin' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Content type for Integrated Resiliency Project.', 'nir-plugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'project' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag')
    );

    register_post_type( 'project', $args );
}