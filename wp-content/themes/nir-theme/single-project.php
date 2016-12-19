<?php get_header('project'); ?>

<div class="single-project">
    <div class="container">
        <aside class="single-sidebar">
            <?php get_sidebar('internal'); ?>
        </aside>
        <section class="single-main">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
                //Setting up the styles to persist
                $post_id = get_the_ID();
                //$current_session = $_SESSION;
                $update_styles = updating_styles($post_id);
                //$new_session = $_SESSION;
                $large_image_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/img/default-header.jpg';
                $nir_project_data = get_post_meta($post_id , 'project_data', true );
            ?>

                <!-- Dynamic Custom Style -->
                <style>
                    /*Logo and text colors*/
                    header a, header a span, body header .container nav #menu-main li a{
                        color: <?php echo $_SESSION["logo_color"]; ?> !important;
                    }
                    body header .container nav .branding svg{
                        fill: <?php echo $_SESSION["logo_color"]; ?> !important;
                    }
                    body a{
                        color: <?php echo $_SESSION["link_color"]; ?> !important;
                    }
                    header.customize{
                        background-image:url('<?php echo $_SESSION["header_bg"]; ?>');
                    }
                    @media screen and (max-width: 660px) {
                        header a, header a span{
                            color: #ffffff !important;
                        }
                        body header .container nav #menu-main li a{
                            color: #ffffff !important;
                        }
                    }
                </style>

            <h1><?php the_title(); ?></h1>

                <?php the_content(); ?>


            <?php // End of the loop.
            endwhile; ?>
        </section>

    </div>
</div>

<?php get_footer(); ?>
