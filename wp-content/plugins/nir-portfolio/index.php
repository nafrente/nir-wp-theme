<?php
/**
 * Plugin Name: Projects Content Type
 * Description: A simple plugin to add a custom content type for Integrated Resiliency Projects
 * Version: 1.0
 * Author: Simplyphp
 * Author URI: http://simplyphp.com
 * Text Domain: nir-plugin
 */

//Basic security measures to forbid direct call of this plugin
if( !function_exists('add_action') ){
    echo 'Not allowed...';
    exit();
}

// Setup


// Includes
include('includes/activate.php');
include('includes/init.php');

// Hooks
register_activation_hook(__FILE__, 'nir_activate_plugin');
add_action('init', 'project_init');

// Shortcodes