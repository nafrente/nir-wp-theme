<?php
/*
  *
  */


get_header();

?>

<div class="single-project portfolio">
    <div class="container">
        <aside class="single-sidebar">
            <span class="sorting-title">sorting</span>
            <div class="sorting-links">
            <span href="#" class="sorting-link by-date selected" title="Date published order">Recent</span>
            <span href="#" class="sorting-link by-title" title="Alphabetical order">Categorical</span>
            </div>

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
            <div class="list-projects by-date">
                <?php

                $args1 = array(
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order'   => 'DESC',
                    );
                $loop1 = new WP_Query( $args1 );
                $how_many_projects = 200; //The number of projects that are featured to be shown
                while ( $loop1->have_posts() ) : $loop1->the_post();
                    $post_id = get_the_ID();
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                        $large_image_url = get_the_post_thumbnail_url();
                    }
                    else{
                        $large_image_url =  the_post_thumbnail_url() . '/default.jpg';
                    }
                    if( $how_many_projects > -1) {
                        echo '<div class="list-project" style="background-image: url(' . $large_image_url . ');">';
                        echo '<a href="' . get_permalink() . '" class="link-project">';
                        echo '<h2>' . get_the_title() . '</h2>';
                        echo '<p>' . get_the_date() . '</p>';
                        echo '</a>';
                        echo '<span class="categories">'; the_category( ', ' ); echo '</span>';
                        echo '</div>';
                    }
                    $how_many_projects = $how_many_projects - 1;
                endwhile;
                /* Restoring original Post Data */
                wp_reset_postdata();
                ?>
            </div>
            <div class="list-projects by-title hide">
                <?php
                $cat_args = array(
                    'orderby'          => 'name',
                    'parent'    => '7',
                );
                $args2 = array(
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order'   => 'ASC',
                );
                $categories = get_categories( $cat_args );
                $loop2 = new WP_Query( $args2 );
                $how_many_projects = 200; //The number of projects that are featured to be shown

                foreach ($categories as $cat){
                    echo '<h2 class="category-title"><span class="text">' . $cat->name . '</span><span class="border"></span></h2>';

                    echo '<div class="grouped-projects">';

                    while ( $loop2->have_posts() ) : $loop2->the_post();
                        $post_id = get_the_ID();
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            $large_image_url = get_the_post_thumbnail_url();
                        }
                        else{
                            $large_image_url =  the_post_thumbnail_url() . '/default.jpg';
                        }

                        if (in_category($cat->cat_ID, $post_id) ){
                            if( $how_many_projects > -1) {

                                echo '<div class="list-project" style="background-image: url(' . $large_image_url . ');">';
                                echo '<a href="' . get_permalink() . '" class="link-project">';
                                echo '<h2>' . get_the_title() . '</h2>';
                                echo '<p>' . get_the_date() . '</p>';
                                echo '</a>';
                                echo '<span class="categories">'; the_category( ', ' ); echo '</span>';
                                echo '</div>';
                            }
                            $how_many_projects = $how_many_projects - 1;
                        }
                    endwhile;
                    echo '</div>';
                }//End for each
                ?>


            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
