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

function updating_styles($nir_project_id){
    //Setup
    $post_type = get_post_type($nir_project_id);
    if('project' != $post_type){
        return;
    }
    //Getting meta data
    $nir_project_data = $nir_return_data = array();
    $nir_project_data = get_post_meta($nir_project_id , 'project_data', true );

    //Setting link color
    $_SESSION["link_color"] = isset($nir_project_data['nir_color']) ? $nir_project_data['nir_color'] : "#35ba7c";
    $nir_return_data['link_color'] = $_SESSION["link_color"];

    //Setting logo color
    $_SESSION["logo_color"] = isset($nir_project_data['nir_logo_color']) ? $nir_project_data['nir_logo_color'] : "#FFFFFF";
    $nir_return_data['logo_color'] = $_SESSION["logo_color"];

    //Setting featured image
    $nir_thumbnail = get_the_post_thumbnail_url($nir_project_id);
    $_SESSION["header_bg"] = isset($nir_thumbnail) ? $nir_thumbnail : $_SESSION["header_bg"];
    $nir_return_data['header_bg'] = $_SESSION["header_bg"];

    return $nir_return_data;
}