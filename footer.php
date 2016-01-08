<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aggregation
 */

?>
            </div>
        </div>
    </div><!-- #content -->
    <div class="container-fluid aggregation-footer-cont">
        <div class="container aggregation-footer">
            <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="row wpdev-footer-widgets">
                    <?php get_template_part('template-parts/footer-widgetarea'); ?>
                </div>
                <div class="wpdev-footer-socialbar">
                    <?php get_template_part('template-parts/footer-socialbar'); ?>
                </div>
                <div class="site-info">
                    Copyright &copy; <?php echo date('Y'); ?>. <?php if(get_field('copyright_text', 'options')) { echo get_field('copyright_text', 'options') . '.'; } ?> All Rights Reserved. Proudly Built by <a href="//wpdevelopers.com" target="_blank">WPDevelopers</a>.
                </div><!-- .site-info -->
            </footer><!-- #colophon -->
        </div>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
