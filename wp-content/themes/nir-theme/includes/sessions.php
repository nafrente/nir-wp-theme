<?php
/**
 * File that manages session variables and functions
 */

// Session Setup
function style_session(){
    if( session_id() == '' || session_status() != PHP_SESSION_ACTIVE ){
        session_start();//Starting session only if hasn't been started yet
    }
    $_SESSION["link_color"] = isset($_SESSION["link_color"]) ? $_SESSION["link_color"] : "#35ba7c";
    $_SESSION["logo_color"] = isset($_SESSION["logo_color"]) ? $_SESSION["logo_color"] : "#FFFFFF";
    $_SESSION["header_bg"] = isset($_SESSION["header_bg"]) ? $_SESSION["header_bg"] : get_template_directory_uri() . '/img/default-header.jpg';
}
function set_link_color($nir_link_color) {
    $_SESSION["link_color"] = $nir_link_color;
}
function set_logo_color($nir_logo_color) {
    $_SESSION["logo_color"] = $nir_logo_color;
}
function set_header_bg($nir_header_bg) {
    $_SESSION["header_bg"] = $nir_header_bg;
}


function updating_styles($nir_project_id){
    $post_type = get_post_type($nir_project_id);
    if('project' != $post_type){
        return;
    }
    $nir_project_data = array();
    $nir_project_data = get_post_meta($nir_project_id , 'project_data', true );

    if ( !isset($nir_project_data) || $nir_project_data['nir_color'] == ''){
        $_SESSION["link_color"] = '#35ba7c';
    }else{
        $_SESSION["link_color"] = $nir_project_data['nir_color'];
    }
    if (!isset($nir_project_data) || $nir_project_data['nir_logo_color'] == ''){
        $_SESSION["link_color"] = '#ffffff';
    }else{
        $_SESSION["link_color"] = $nir_project_data['nir_logo_color'];
    }

    //Get the featured image
    $nir_thumbnail = the_post_thumbnail_url($nir_project_id);
    if (!$nir_thumbnail || $nir_project_data['header_bg'] == ''){
        $_SESSION["header_bg"] = get_template_directory_uri() . '/img/default-header.jpg';
    }else{
        $_SESSION["header_bg"] = $nir_thumbnail;
    }
    return $nir_project_data;
}