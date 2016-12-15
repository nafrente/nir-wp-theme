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
        'name'          => __('Project Page Sidebar Area', 'nir-theme'),
        'id'            => 'nir_internal_sidebar',
        'description'   => __('This is the sidebar area located on projects single page that contains the custom widgets.', 'nir-theme'),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="default-widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="default-title"><span>',
        'after_title'  => '</span></div><div class="default-body">'
    ));

    //Creating a custom widget for h2 tags links
    class NIR_Links_Widget extends WP_Widget{
        //Sets up the widgets name etc
        public function __construct() {
            $widget_ops = array(
                'classname' => 'links_widget',
                'description' => 'Widget that creates a link to each h2 tags on the content page',
            );
            parent::__construct( 'nir_links_widget', 'h2 Titles links widget', $widget_ops );
        }

        /**
         * Outputs the content of the widget
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
        public function form( $instance ) {
            // outputs the options form on admin

        }
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
        }
    }

    register_widget('NIR_Links_Widget');


    //Creating a custom widget for Innovation_Hub innovation_hub
    class NIR_Innovation_Hub_Widget extends WP_Widget{
        //Sets up the widgets name etc
        public function __construct() {
            $widget_ops = array(
                'classname' => 'innovation_hub_widget',
                'description' => 'Widget that creates a link to each h2 tags on the content page',
            );
            parent::__construct( 'nir_innovation_hub_widget', 'Innovation Hub links widget', $widget_ops );
        }

        /**
         * Outputs the content of the widget
         */
        public function widget( $args, $instance ) {
            // outputs the content of the internal custom widget
            global $post;
            $current_pot_id = $post->ID;
            $terms = get_the_terms( $post->ID , 'project-group' );
            $current_post_groups = array();
            if(isset($terms) && $terms != ''){
                foreach ($terms as $group) {
                    array_push( $current_post_groups , $group->term_taxonomy_id);
                }
            }

            ?>

            <div class="innovation-hub-sidebar">

                <div class="sidebar-title">
                    <h3><?php _e('Resiliency Innovation Hub', 'nir-theme')?></h3>
                </div>
                <div class="sidebar-content">
                    <?php
                    $has_links = false;
                    $args1 = array(
                        'post_type' => 'project',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                    );
                    $loop1 = new WP_Query( $args1 );
                    while ( $loop1->have_posts() ) : $loop1->the_post();
                        $post_id = get_the_ID();
                        $loop_terms = get_the_terms( $post_id , 'project-group' );

                        $already_added = array($current_pot_id);

                        if (isset($loop_terms) && $loop_terms != ''){

                            foreach ($loop_terms as $loop_group) {
                                //Check if the project group belongs on current project list of groups
                                if( in_array($loop_group->term_taxonomy_id, $current_post_groups ) && !in_array($post_id, $already_added ) ) {
                                    $has_links = true;
                                    echo '<a href="' . get_permalink() . '" class="sidebar-link">'. get_the_title() . '</a>';
                                }
                                array_push($already_added, $post_id);
                            }

                        }

                    endwhile;
                    if(!$has_links){
                        echo '<style>.innovation-hub-sidebar{display: none};</style>';
                    }
                    /* Restoring original Post Data */
                    wp_reset_postdata();

                    ?>

                </div>
            </div>

            <?php
        }
        public function form( $instance ) {
            // outputs the options form on admin

        }
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
        }
    }

    register_widget('NIR_Innovation_Hub_Widget');


    //Creating a custom widget for Additional_Reading additional_reading
    class NIR_Additional_Reading_Widget extends WP_Widget{
        //Sets up the widgets name etc
        public function __construct() {
            $widget_ops = array(
                'classname' => 'additional_reading_widget',
                'description' => 'Widget that creates a link to each h2 tags on the content page',
            );
            parent::__construct( 'nir_additional_reading_widget', 'Additional Reading widget', $widget_ops );
        }

        /**
         * Outputs the content of the widget
         */
        public function widget( $args, $instance ) {
            // outputs the content of the internal custom widget
            global $post;
            $additional_reading_data =  get_post_meta($post->ID, 'additional_reading' , true ) ;

            if (isset($additional_reading_data) && $additional_reading_data  != '') {
                ?>

                <div class="additional-reading-sidebar">

                    <div class="sidebar-title">
                        <h3><?php _e('Additional Reading', 'nir-theme') ?></h3>
                    </div>
                    <div class="sidebar-content">
                        <?php echo htmlspecialchars_decode($additional_reading_data);

                        ?>
                    </div>
                </div>

                <?php
            }
        }
        public function form( $instance ) {
            // outputs the options form on admin

        }
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
        }
    }

    register_widget('NIR_Additional_Reading_Widget');



    //Creating a custom widget for Project_Representative project_representative
    class NIR_Project_Representative_Widget extends WP_Widget{
        //Sets up the widgets name etc
        public function __construct() {
            $widget_ops = array(
                'classname' => 'project_representative_widget',
                'description' => 'Widget that creates a link to each h2 tags on the content page',
            );
            parent::__construct( 'nir_project_representative_widget', 'Project Representative widget', $widget_ops );
        }

        /**
         * Outputs the content of the widget
         */
        public function widget( $args, $instance ) {
            // outputs the content of the internal custom widget
            global $post;
            $project_representative_data =  get_post_meta($post->ID, 'project_representative' , true ) ;

            if(isset($project_representative_data) && $project_representative_data!= '' ) {
                ?>

                <div class="project-representative-sidebar">

                <div class="sidebar-title">
                    <h3><?php _e('Project Representative', 'nir-theme') ?></h3>
                </div>
                <div class="sidebar-content">
                    <?php echo htmlspecialchars_decode($project_representative_data);

                    ?>
                </div>

                <?php
            }
        }
        public function form( $instance ) {
            // outputs the options form on admin

        }
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
        }
    }

    register_widget('NIR_Project_Representative_Widget');

}