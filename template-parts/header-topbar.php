<?php 
global $wpdevbbpressactive;

if(get_field('wpdev_enable_social_profiles', 'options') == 1 && have_rows('wpdev_social_network_profiles', 'options') && $wpdevbbpressactive = '' && get_field('wpdev_social_display_location', 'options') == 0 || get_field('wpdev_social_display_location', 'options') == 1) { ?>

    <div class="col-md-6 wpdev-top-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'topmenu', 'menu_id' => 'top-menu' ) ); ?>
    </div>
    <div class="col-md-6 wpdev-top-social">
        <?php get_template_part('template-parts/parts-socialprofiles'); ?>
    </div>

<?php } elseif(get_field('wpdev_enable_social_profiles', 'options') == 1 && have_rows('wpdev_social_network_profiles', 'options') && $wpdevbbpressactive = '1' && get_field('wpdev_social_display_location', 'options') == 0 || get_field('wpdev_social_display_location', 'options') == 1) { ?>

    <div class="col-md-6 wpdev-top-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'topmenu', 'menu_id' => 'top-menu' ) ); ?>
    </div>
    <div class="col-md-3 wpdev-top-social">
        <?php get_template_part('template-parts/parts-socialprofiles'); ?>
    </div>
    <div class="col-md-3 wpdev-top-social">
        <?php echo do_shortcode('[wpdevbbpress]'); ?>
    </div>

<?php } else { ?>

        <?php wp_nav_menu( array( 'theme_location' => 'topmenu', 'menu_id' => 'top-menu' ) ); ?>

<?php } ?>