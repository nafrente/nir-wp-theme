<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php wp_head(); ?>

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
    </style>

</head>

<body class="home-page">
<pre>
    <?php echo $_SESSION["header_bg"]; ?>
</pre>
<header name="top" class="customize">
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