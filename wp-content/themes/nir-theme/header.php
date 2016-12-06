<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php wp_head(); ?>

    <?php
    if(!isset($_SESSION["style"])) { echo "not set...";?>
        <meta session="Not set">
        <?php
    } else {echo $_SESSION["style"];
        ?>
        <meta session="<?php echo $_SESSION["style"]; ?>">
        <?php
    }
    ?>

</head>

<body class="default-page">

<header name="top" class="customize" style="background-color: #26C1DC; background-image:url('<?php echo get_template_directory_uri(); ?>/img/homepage1.jpg');">
    <div class="container">
        <nav>
            <div class="branding">
                <a href="/" title="<?php _e('Newport Integrated Resiliency Home', 'nir-theme');?>"><?php echo file_get_contents( get_template_directory_uri() . "/svg/nir-01.svg"); ?>
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