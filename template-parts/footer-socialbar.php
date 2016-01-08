<?php if(get_field('wpdev_enable_social_profiles', 'options') == 1 && have_rows('wpdev_social_network_profiles', 'options') && get_field('wpdev_social_display_location', 'options') == 0 || get_field('wpdev_social_display_location', 'options') == 2) { ?>

    <div class="col-md-12 wpdev-footer-social">
        <?php get_template_part('template-parts/parts-socialprofiles'); ?>
    </div>

<?php } else {
            // Nothing to see here.
      } ?>