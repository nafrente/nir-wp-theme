<?php
/*
  * Template Name: Home Page
  */


get_header('home');

?>

<div class="main">
    <div class="container">

        <section class="home">
            <div class="abstract">
                <h1>We envision a bright future where today’s local solutions are tomorrow’s foundation for global sustainability.</h1>
            </div>
            
            <div class="portfolio-carousel">
                <h2>The Newport Integrated Resiliency Portfolio</h2>
                <div class="the-carousel">
                    <?php

                    $args = array( 'post_type' => 'project', 'posts_per_page' => 10 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $post_id = get_the_ID();
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            $large_image_url = get_the_post_thumbnail_url();
                        }
                        else{
                            $large_image_url =  the_post_thumbnail_url() . '/default.jpg';
                        }

                        echo '<div class="single" style="background-image:url(' . $large_image_url . ');">';
                        echo '<a href="' . get_permalink() . '"><span>'.  get_the_title() . '</span></a>';
                        echo '</div>';
                    endwhile;
                    /* Restoring original Post Data */
                    wp_reset_postdata();
                    ?>
                    <!--
                    <div class="single" style="background-image:url(<?php //echo get_template_directory_uri(); ?>/img/picture.jpg);">
                        <a href="#">
                            <span>Resilience Innovation Hub</span>
                        </a>
                    </div>
                    -->
                </div>
            <a href="<?php echo site_url('portfolio'); ?>" class="btn">All Projects &rsaquo;</a>

            <div class="featured-projects">
                <?php

                $args2 = array( 'post_type' => 'project', 'posts_per_page' => -1);
                $loop2 = new WP_Query( $args2 );
                $how_many_projects = 2; //The number of projects that are featured to be shown
                while ( $loop2->have_posts() ) : $loop2->the_post();
                    $post_id = get_the_ID();
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                        $large_image_url = get_the_post_thumbnail_url();
                    }
                    else{
                        $large_image_url =  the_post_thumbnail_url() . '/default.jpg';
                    }
                    $nir_project_data = get_post_meta($post_id , 'project_data', true );
                    if( isset($nir_project_data['nir_featured']) && $nir_project_data['nir_featured'] == 'featured' && $how_many_projects > -1 ){
                        echo '<div class="featured-project" style_="background-image:url(' . $large_image_url . ');">';
                        echo '<h2>'.  get_the_title() . '</h2>';
                        echo '<p>'.  get_the_excerpt() .  '</p>';
                        echo '<a href="' . get_permalink() . '" class="btn">'. $nir_project_data['nir_text'] .'</a>';
                        echo '</div>';
                    }
                    $how_many_projects = $how_many_projects - 1;
                endwhile;

                ?>

                <!--
                <div class="featured-project">
                    <h2>About Newport, RI</h2>
                    <p>Newport, a world famous historic city, located on the New England coast between New York City and Boston, is poised to offer itself as a demonstration location for the development and implementation of a national resilience model.  Newport’s goal is to use the next 25 years, in preparation for its 400th Anniversary, to position itself as the representative ecosystem for global thought leadership and the applied innovation center for integrated resilience.</p>
                    <a href="#" class="btn">Model Residency</a>
                </div>
                -->
            </div>
        </section>

    </div>
</div>

<?php get_footer(); ?>
