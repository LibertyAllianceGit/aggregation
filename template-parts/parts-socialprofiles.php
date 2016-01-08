<?php

    if( have_rows('wpdev_social_network_profiles', 'options') ):
        while ( have_rows('wpdev_social_network_profiles', 'options') ) : the_row();
    
            $socialnet = get_sub_field('wpdev_network', 'options');
            $sociallink = get_sub_field('wpdev_network_url', 'options');
    
            echo '<a href="' . $sociallink . '" target="_blank" class="wpdev-social-icon wpdev-' . $socialnet . '"><i class="fa fa-' . $socialnet . ' wpdev-social-net-icon"></i></a>';

        endwhile;

    else :

        // Nothing to see here.

    endif;

?>