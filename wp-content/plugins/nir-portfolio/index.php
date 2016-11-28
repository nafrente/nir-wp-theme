<?php
/**
 * Plugin Name: Projects Content Type
 * Description: A simple plugin to add a custom content type for Integrated Resiliency Projects
 * Version: 1.0
 * Author: Simplyphp
 * Author URI: http://simplyphp.com
 * Text Domain: nir-plugin
 */

// Setup

// Includes
include('includes/activate.php');

// Hooks
register_activation_hook(__FILE__, 'nir_activate_plugin');

// Shortcodes