<?php

function nir_enqueue(){
    //Main styles
    wp_register_style('nir_style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('nir_style');

    //Google fonts
    wp_register_style('nir_work', 'https://fonts.googleapis.com/css?family=Work+Sans:400,300');
    wp_enqueue_style('nir_work');

}