<?php
/**
 * Function that manages style variable
 */

// Session Setup

function updating_styles($nir_project_id){
    //Return default styles
    if ($nir_project_id == 'default'){
        $nir_return_data["logo_color"] = "#FFFFFF";
        $nir_return_data["link_color"] = "#35ba7c";
        $nir_return_data['header_bg'] = get_template_directory_uri() . '/img/default-header.jpg';
        return $nir_return_data;
    }
    //If the argument is an ID
    if( is_int($nir_project_id) ){
        //Get the post type from the id if set
        $post_type = get_post_type($nir_project_id);
        if('project' == $post_type){
            //Getting meta data
            $nir_project_data = $nir_return_data = array();
            $nir_project_data = get_post_meta($nir_project_id , 'project_data', true );

            $dynamic_styles = array();
            //Setting link color
            $nir_return_data["link_color"] = isset($nir_project_data['nir_color']) ? $nir_project_data['nir_color'] : "#35ba7c";

            //Setting logo color
            $nir_return_data["logo_color"] = isset($nir_project_data['nir_logo_color']) ? $nir_project_data['nir_logo_color'] : "#FFFFFF";

            //Setting featured image
            $nir_thumbnail = get_the_post_thumbnail_url($nir_project_id);
            $nir_return_data['header_bg'] = isset($nir_thumbnail) ? $nir_thumbnail : get_template_directory_uri() . '/img/default-header.jpg';

            return $nir_return_data;
        }if('post' == $post_type) {
            //Post setup
            return;
        }
    }else{ //Default styles in case an error with the argument passed on the function
        $nir_return_data["logo_color"] = "#FFFFFF";
        $nir_return_data["link_color"] = "#35ba7c";
        $nir_return_data['header_bg'] = get_template_directory_uri() . '/img/default-header.jpg';
        return $nir_return_data;
    }

}