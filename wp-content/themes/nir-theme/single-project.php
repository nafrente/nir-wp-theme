<?php get_header('project'); ?>

<div class="single-project">
    <div class="container">

        <section class="single-main">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post(); ?>

            <h1><?php the_title(); ?></h1>

                <?php the_content(); ?>

            <?php // End of the loop.
            endwhile; ?>
        </section>
        <aside class="single-sidebar">
            <?php get_sidebar('internal'); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
