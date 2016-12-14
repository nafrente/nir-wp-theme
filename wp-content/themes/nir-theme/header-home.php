<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
    <?php include_once('dynamic-styles.php'); ?>

</head>

<body class="home-page">
<header name="top" class="customize">
    <div class="container">
        <nav>
            <div class="branding">
                <a href="<?php echo site_url(); ?>" title="<?php _e('Newport Integrated Resiliency Home', 'nir-theme');?>"><?php echo file_get_contents( get_template_directory_uri() . "/svg/nir-01.svg"); ?>
                    <span><?php _e('Newport Integrated', 'nir-theme');?><br /><?php _e('Resiliency', 'nir-theme'); ?></span>
                </a>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false
            ));
            ?>
        </nav>
    </div>
</header>
<!--<div class="paper-edge"></div>-->