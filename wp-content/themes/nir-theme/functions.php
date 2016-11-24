<?php

// Setup

// Includes
include( get_template_directory() . '/includes/enqueue.php');

// Actions & Filters
add_action('wp_enqueue_scripts', 'nir_enqueue');

// Shortcodes