<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    global $post;
    $styles_array = updating_styles($post->ID);
    ?>
    <!-- Dynamic Custom Style -->
    <style>
        /*Logo and text colors*/
        header a, header a span{
            color: <?php echo $styles_array["logo_color"]; ?> !important;
        }
        body header .container nav #menu-main li a{
            color: <?php echo $styles_array["logo_color"]; ?> !important;
        }
        body header .container nav #menu-main li.current-menu-item {
            border-color: <?php echo $styles_array["logo_color"]; ?> !important;
        }
        body header .container nav .branding svg{
            fill: <?php echo $styles_array["logo_color"]; ?> !important;
        }
        body a{
            color: <?php echo $styles_array["link_color"]; ?> !important;
        }
        header.customize{
            background-image:url('<?php echo $styles_array["header_bg"]; ?>');
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

</head>

<body class="default-page">
<header name="top" class="customize">
    <div class="container">
        <?php include_once('main-nav.php'); ?>
    </div>
</header>
<!--<div class="paper-edge"></div>-->