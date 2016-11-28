<?php get_header(); ?>

<div class="category">
    <div class="container">
        <section class="top-box">
            <h1>Portfolio</h1>
            <p>Mus et qui sum recaes ratenestori officil maximinus ad mos
                utem. Nimpore ssusand aecatum volore volupta tiunt. Nem in
                rerae dolendanda aut adisque lit laborum rerovit Lorem Ipsum
                Sil Dolor Rhoncus amet sil toroid.</p>
        </section>
        <section class="category-body">
            <?php

            if( have_posts() ){
                while( have_posts() ){
                    the_post();

                    $img_url = get_template_directory() . '/img/default-banner.jpg';
                    if( has_post_thumbnail() )
                        $img_url = get_the_post_thumbnail_url();
                    ?>
                    <article class="category-box" style="background: url(<?php echo $img_url; ?>)">
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            <p>
                                <span class="category-date">
                                <?php the_time('M Y'); ?>
                                </span>
                                <span class="category-tags">
                                <?php the_category(','); ?>
                                </span>
                                <span class="view-text">
                                    <?php __('View Project', 'nir-theme'); ?>
                                </span>
                            </p>
                        </a>
                    </article>
                    <?php
                }
            }

            ?>
           </section>

    </div>
</div>

<?php get_footer(); ?>
