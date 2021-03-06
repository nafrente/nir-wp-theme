<?php

// Setup
add_theme_support('menus');
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

// Includes
include( get_template_directory() . '/includes/enqueue.php');
include( get_template_directory() . '/includes/setup.php');
include( get_template_directory() . '/includes/widgets.php');
include( get_template_directory() . '/includes/posts-custom-fields.php');
include( get_template_directory() . '/includes/dynamic-styles-function.php');


// Actions & Filters
add_action('wp_enqueue_scripts', 'nir_enqueue');
add_action('after_setup_theme', 'nir_setup_theme');
add_action('widgets_init', 'nir_widgets');
add_action('init', 'updating_styles');
add_action('add_meta_boxes_post', 'nir_post_add_meta_box');
add_action('save_post', 'nir_saving_post_meta_box', 10, 3);


add_action( 'wp_default_scripts', function( $scripts ) { /* Removing MIGRATE: Migrate is installed, version 1.4.1 message */
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
    }
} );

// Shortcodes
