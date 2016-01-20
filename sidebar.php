<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aggregation
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col-md-4">
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    	<?php get_template_part('template-parts/ad-1'); ?>
    	<?php get_template_part('template-parts/ad-2'); ?>
    	<?php get_template_part('template-parts/ad-3'); ?>
    	<?php get_template_part('template-parts/ad-4'); ?>
    </aside><!-- #secondary -->
</div>
