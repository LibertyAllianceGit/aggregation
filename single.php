<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aggregation
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="col-md-8">
                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', get_post_format() );

                    the_post_navigation();

						echo do_shortcode('[wpdevfb]');
						echo do_shortcode('[js-disqus]');
                        // comments_template();

                endwhile; // End of the loop.
                ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
