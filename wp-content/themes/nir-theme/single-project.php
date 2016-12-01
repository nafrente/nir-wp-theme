<?php get_header(); ?>

<div class="single-project">
    <div class="container">
        <aside class="single-sidebar">
            <?php get_sidebar('internal'); ?>
        </aside>
        <section class="single-main">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
            ?>

            <h1><?php the_title(); ?></h1>

            <div class="basic">
                <?php the_content(); ?>
            </div>

            <?php // End of the loop.
            endwhile; ?>
        </section>

    </div>
</div>

<?php get_footer(); ?>
