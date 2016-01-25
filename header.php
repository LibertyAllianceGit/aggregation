<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aggregation
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!-- START Quantcast Tag, part 1 of 2 -->
<script type="text/javascript">
    var _qevents = _qevents || [];
    (function() {
        var elem = document.createElement('script');
        elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge")  
                    + ".quantserve.com/quant.js";
        elem.async = true;
        elem.type = "text/javascript";
        var scpt = document.getElementsByTagName('script')[0];
        scpt.parentNode.insertBefore(elem, scpt);  
    })();
</script>
<!-- END Quantcast Tag, part 1 of 2 -->

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <div class="container-fluid aggregation-topbar-cont">
        <div class="container aggregation-topbar">
            <?php get_template_part('template-parts/header-topbar'); ?>
        </div>
    </div>
	<header id="masthead" class="site-header" role="banner">
        <div class="container-fluid aggregation-branding-cont">
            <div class="container aggregation-branding">
                <div class="site-branding">
                    <a href="/">
                        <?php if(get_field('wpdev_logo', 'options')) {
                            $image = get_field('wpdev_logo', 'options');
                            $location = get_field('wpdev_logo_location', 'options');
                            if($location == 0) {
                                $locationclass = 'left';
                            } elseif($location == 1) {
                                $locationclass = 'center';
                            } elseif($location == 2) {
                                $locationclass = 'right';
                            } else {
                                $locationclass = 'center';
                            }
                            echo '<div class="logo-' . $locationclass . '">';
                            echo '<img src="' . $image . '" alt="' . get_bloginfo('name') . '" />';
                            echo '</div>';
                        } else {
                            $location = get_field('wpdev_logo_location', 'options');
                            if($location == 0) {
                                $locationclass = 'left';
                            } elseif($location == 1) {
                                $locationclass = 'center';
                            } elseif($location == 2) {
                                $locationclass = 'right';
                            } else {
                                $locationclass = 'center';
                            }
                            echo '<div class="logo-' . $locationclass . '">';
                            echo '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
                            echo '</div>';
                        } ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid aggregation-menu-cont">
            <div class="container aggregation-menu">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php /*?><button class="menu-toggle" aria-controls="main-menu" aria-expanded="false"><i class="fa fa-bars"></i> <?php esc_html_e( 'Menu', 'aggregation' ); ?></button><?php */?>
					<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_id' => 'main-menu' ) ); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
        <div class="container-fluid aggregation-site-content-cont">
            <div class="container aggregation-site-content">