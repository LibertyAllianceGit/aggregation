<?php if(get_field('wpdev_ad_slot_2', 'options')) {
    echo get_field('wpdev_ad_slot_2', 'options');
} else { ?>
<div class="ad-homepage-336x280">
    <img src="http://placehold.it/336x280/" />
</div>
<?php } ?>