<?php

function nir_activate_plugin(){
    if ( version_compare( get_bloginfo('version'), '4.2', '<') ){
        wp_die( __('You must update your wordpress to use this plugin!', 'nir-plugin') );
    }
}