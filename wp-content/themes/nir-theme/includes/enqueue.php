<?php

function nir_enqueue(){
    //Main styles
    wp_register_style('nir_style' , get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('nir_style');

    //Google fonts
    wp_register_style('nir_roboto' , 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,400i,700');
    wp_enqueue_style('nir_roboto');

    //Grid system
    wp_register_style('nir_grid' , get_template_directory_uri() . '/css/grid/gridlex.css');
    wp_enqueue_style('nir_grid');

    //Font awesome
    wp_register_style('nir_font_awesome' , get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('nir_font_awesome');


    //Slider styles
    wp_register_style('nir_css1_slick' ,get_template_directory_uri() . '/slick/slick.css');
    wp_enqueue_style('nir_css1_slick');
    wp_register_style('nir_css2_slick' ,get_template_directory_uri() . '/slick/slick-theme.css');
    wp_enqueue_style('nir_css2_slick');


    //Including jquery
    wp_enqueue_script('jquery');

    //Slider scripts
    wp_register_script('nir_js_slick' ,get_template_directory_uri() . '/slick/slick.js', array(), false, true );
    wp_enqueue_script('nir_js_slick');


    //Including Main scripts
    wp_register_script('nir_scripts' ,get_template_directory_uri() . '/js/main.js', array(), false, true );
    wp_enqueue_script('nir_scripts');

}