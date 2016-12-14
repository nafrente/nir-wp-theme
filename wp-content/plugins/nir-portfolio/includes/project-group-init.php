<?php
function project_group_init() {
    // create a new taxonomy
    $labels = array(
        'name'              => __( 'Project groups', 'nir-plugin' ),
        'search_items'      => __( 'Search project groups', 'nir-plugin' ),
        'all_items'         => __( 'All project groups', 'nir-plugin' ),
        'parent_item'       => __( 'Parent project group', 'nir-plugin' ),
        'parent_item_colon' => __( 'Parent project group:', 'nir-plugin' ),
        'edit_item'         => __( 'Edit project group', 'nir-plugin' ),
        'update_item'       => __( 'Update project group', 'nir-plugin' ),
        'add_new_item'      => __( 'Add New project group', 'nir-plugin' ),
        'new_item_name'     => __( 'New project group name', 'nir-plugin' )
    );

    register_taxonomy(
        'project-group',
        'project',
        array(
            'labels' => $labels,
            'rewrite' => array( 'slug' => 'project-group' ),
            'capabilities' => array(
                'manage_terms' - 'manage_categories',
                'edit_terms' - 'manage_categories',
                'delete_terms' - 'manage_categories',
                'assign_terms' - 'edit_posts'
            )
        )
    );
}