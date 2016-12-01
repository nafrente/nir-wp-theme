<?php get_header(); ?>

<div class="default-page 404">
    <div class="container">
        <aside class="single-sidebar">
            <?php get_sidebar(); ?>
        </aside>
        <section class="single-main">

                <h1><?php _e('404 error', 'nir-theme'); ?></h1>

                <div class="basic">
                    <?php _e('The page you tried to reach does not exist or was moved, please use the main navigation.', 'nir-theme'); ?>
                </div>

        </section>

    </div>
</div>

<?php get_footer(); ?>
