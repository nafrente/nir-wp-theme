<?php get_header(); ?>

<div class="category">
    <div class="container">
        <section class="single-main">
            <h1><?php single_cat_title('Category: '); ?></h1>
        </section>

        <aside class="single-sidebar">
            <?php get_sidebar('categories'); ?>

        </aside>
        <section class="category-body">

            <div class="posts-list">
                <?php

                $args2 = array( 'posts_per_page' => -1);
                $loop2 = new WP_Query( $args2 );
                $how_many_projects = 10; //The number of posts to be shown
                while ( $loop2->have_posts() ) : $loop2->the_post();
                    $post_id = get_the_ID();
                    /*if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                        $large_image_url = get_the_post_thumbnail_url();
                    }
                    else{
                        $large_image_url =  the_post_thumbnail_url() . '/default.jpg';
                    }
                    */

                    echo '<div class="single-list">';
                    echo '<h2>'.  get_the_title() . '</h2>';
                    echo '<p>'.  get_the_excerpt() .  '</p>';
                    echo '<a href="' . get_permalink() . '" class="btn">'. __('Read More', 'nir-theme') .'</a>';
                    echo '</div>';
                    $how_many_projects = $how_many_projects - 1;


                endwhile;

                ?>

            </div>

           </section>

    </div>
</div>

<?php get_footer(); ?>
