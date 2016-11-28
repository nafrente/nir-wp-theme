<?php

function nir_widgets(){
    register_sidebar(array(
        'name'          => __('Newport Page Sidebar Area', 'nir_theme'),
        'id'            => 'nir_default_sidebar',
        'description'   => __('Newport Custom Sidebar Area located on the right of the page for blog post and pages.'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="default-widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="default-title"><span>',
        'after_title'  => '</span></div><div class="default-body">'
    ));
}