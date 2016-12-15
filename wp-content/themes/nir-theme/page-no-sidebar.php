<?php
/*
* Template Name: No Sidebar Page
*/
get_header();

?>

<div class="default-page">
    <div class="container">
        <aside class="single-sidebar">

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