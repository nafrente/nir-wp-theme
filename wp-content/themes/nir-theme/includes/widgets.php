<?php

function nir_widgets(){
    //Registering the default sidebar
    register_sidebar(array(
        'name'          => __('Default Page Sidebar Area', 'nir-theme'),
        'id'            => 'nir_default_sidebar',
        'description'   => __('Newport Custom Sidebar Area located on the right of the page for blog post and pages.', 'nir-theme'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="default-widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="default-title"><span>',
        'after_title'  => '</span></div><div class="default-body">'
    ));

    //Registering the sidebar for projects page
    register_sidebar(array(
        'name'          => __('Internal Page Sidebar Area', 'nir-theme'),
        'id'            => 'nir_internal_sidebar',
        'description'   => __('Newport Custom Sidebar Area located on the right of the page for blog post and pages.', 'nir-theme'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="default-widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="default-title"><span>',
        'after_title'  => '</span></div><div class="default-body">'
    ));
    //Creating a custom widget

    class NIR_Links_Widget extends WP_Widget{
        /**
         * Sets up the widgets name etc
         */
        public function __construct() {
            $widget_ops = array(
                'classname' => 'links_widget',
                'description' => 'Widget that creates a link to each h2 tags on the content page',
            );
            parent::__construct( 'nir_links_widget', 'h2 Titles links widget', $widget_ops );
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            // outputs the content of the internal custom widget
            ?>
            <script>
                jQuery( document ).ready(function() {
                    var $ = jQuery.noConflict();
                    if($('.single-main h2').length > 0){
                        $('.single-main h2').each(function(i) {
                            $(this).attr('id', 'h2-title-'+ i);
                            $('.h2-links-sidebar .sidebar-content').append('<a class="sidebar-link" href="#h2-title-'+ i +'">'+ $(this).text() +'</a>');
                            i++;
                        });
                    }else{
                        $('.sidebar-content').append('<a class="sidebar-link"><?php _e('No sections available...', 'nir-theme')?></a>');
                        $('.h2-links-sidebar').hide();
                    }
                });
            </script>
                <div class="h2-links-sidebar">

                    <div class="sidebar-title">
                        <h3><?php _e('Sections', 'nir-theme')?></h3>
                    </div>
                    <div class="sidebar-content">

                    </div>
                </div>

        <?php
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            // outputs the options form on admin

        }

        /**
         * Processing widget options on save
         *
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
        }
    }

    register_widget('NIR_Links_Widget');

}