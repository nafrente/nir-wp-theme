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
                    ?>
                    <!--
                    <div class="single" style="background-image:url(<?php //echo get_template_directory_uri(); ?>/img/picture.jpg);">
                        <a href="#">
                            <span>Resilience Innovation Hub</span>
                        </a>
                    </div>
                    -->
                </div>
            <a href="#" class="btn">All Projects</a>
            
            <div class="mission">
                <h2>The Newport Integrated Resiliency Model</h2>
                <p>Newport’s model of integrated resiliency is a response to challenges, and synergy of opportunities among the built/natural environment, economics, social/political, educational, health and cultural sub-systems.</p>
                <a href="model.php" class="btn">Read Model Details</a>
            </div>
            
            <div class="about-newport">
                <h2>About Newport, RI</h2>
                <p>Newport, a world famous historic city, located on the New England coast between New York City and Boston, is poised to offer itself as a demonstration location for the development and implementation of a national resilience model.  Newport’s goal is to use the next 25 years, in preparation for its 400th Anniversary, to position itself as the representative ecosystem for global thought leadership and the applied innovation center for integrated resilience.</p>
                <a href="#" class="btn">Model Residency</a>
            </div>
        </section>

    </div>
</div>

<?php get_footer(); ?>
