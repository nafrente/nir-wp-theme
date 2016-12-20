<?php get_header(); ?>

<div class="category">
    <div class="container">
        <section class="single-main">
            <h1><?php single_cat_title('Category: '); ?></h1>
        </section>


        <section class="category-body">

            <div class="posts-list">
                <?php
                //Getting category
                $cat_ID = get_query_var('cat');
                $post_types = array('post', 'project');
                $args2 = array( 'posts_per_page' => -1, 'cat' => $cat_ID, 'post_type' => $post_types );
                $loop2 = new WP_Query( $args2 );
                while ( $loop2->have_posts() ) : $loop2->the_post();

                    echo '<div class="single-list">';
                    echo '<h2>'.  get_the_title() . '</h2>';
                    echo '<p>'.  get_the_excerpt() .  '</p>';
                    echo '<a href="' . get_permalink() . '" class="btn">'. __('Read More', 'nir-theme') .'</a>';
                    echo '</div>';

                endwhile;

                ?>

            </div>

        </section>

        <aside class="single-sidebar">
            <?php get_sidebar('categories'); ?>

        </aside>
    </div>
</div>

<?php get_footer(); ?>
