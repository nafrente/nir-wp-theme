<?php
/*
  *
  */


get_header('home');

?>

<div class="single-project">
    <div class="container">
        <aside class="single-sidebar">
            sorting
        </aside>
        <section class="single-main">
                <h1>Portfolio</h1>
            <div class="basic">
                <p class="">Mo occabo. Nam arumqua speria culpa quatur? Quiant poreriae molores tiosand
                    unturi nos et volum ipicius, venim rem fuga. Ut rempore velecul luptatiatin
                    pelendero optatiusae. Fugia quiae min eos adi ut repudis am fugitium apiet
                    elit, to molorion natem quo tes magnihil estia doluptas maximin venderrum qui
                    ipsum eaquatiusae.</p>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="full-width">
            <?php

            $args2 = array(
                'post_type' => 'project',
                'posts_per_page' => -1,
                'orderby' => 'ID',
                'order'   => 'DESC',
                );
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

                echo '<a href="' . get_permalink() . '"class="featured-project" style_="background-image:url(' . $large_image_url . ');">';
                echo '<h2>'.  get_the_title() . '</h2>';
                echo '</a>';

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
    </div>
</div>

<?php get_footer(); ?>
