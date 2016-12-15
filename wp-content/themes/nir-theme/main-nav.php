<nav>
    <div id="mobile-menu-text">
        <span class="text open hide">Close Menu</span>
        <span class="text">Menu</span>
    </div>
    <div class="branding">
        <a href="<?php echo site_url(); ?>" title="<?php _e('Newport Integrated Resiliency Home', 'nir-theme');?>">
            <?php echo file_get_contents( get_template_directory_uri() . "/svg/nir-01.svg"); ?>
            <span class="hide-on-mobile"><?php _e('Newport Integrated', 'nir-theme');?><br /><?php _e('Resiliency', 'nir-theme'); ?></span>
        </a>
    </div>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class' => 'hide-on-mobile',
        'container'      => false
    ));
    ?>
</nav>