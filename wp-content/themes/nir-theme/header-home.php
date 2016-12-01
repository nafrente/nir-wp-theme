<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>

</head>

<body class="home-page">

<header name="top" class="customize" style="background-color: #26C1DC; background-image:url('<?php echo get_template_directory_uri(); ?>/img/homepage1.jpg');">
    <div class="container">
        <nav>
            <div class="branding"><a href="index.php"><?php echo file_get_contents( get_template_directory_uri() . "/svg/nir-01.svg"); ?><span>Newport Integrated <br />Resiliency</span></a></div>
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