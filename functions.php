<?php
/**
 * Aggregation functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aggregation
 */

if ( ! function_exists( 'aggregation_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aggregation_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aggregation, use a find and replace
	 * to change 'aggregation' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'aggregation', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'topmenu' => esc_html__( 'Top Menu', 'aggregation' ),
		'mainmenu' => esc_html__( 'Main Menu', 'aggregation' ),
        'footermenu' => esc_html__( 'Footer Menu', 'aggregation' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aggregation_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'aggregation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aggregation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aggregation_content_width', 640 );
}
add_action( 'after_setup_theme', 'aggregation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aggregation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aggregation' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'aggregation' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'aggregation' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
     register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'aggregation' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
     register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'aggregation' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'aggregation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aggregation_scripts() {
    wp_enqueue_style( 'bootstrap-min-css', get_template_directory_uri() . '/inc/bootstrap.min.css' );
    wp_enqueue_style( 'fontawesome-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'aggregation-style', get_stylesheet_uri() );
    if(get_field('wpdev_heading_font', 'options')) {
        $headingfont = get_field('wpdev_heading_font', 'options');
    } else {
        $headingfont = 'Lato';
    }
    if(get_field('wpdev_body_font', 'options', 'options')) {
        $bodyfont = get_field('wpdev_body_font', 'options');
    } else {
        $bodyfont = 'Lato';
    }
    if(get_field('wpdev_menu_font', 'options', 'options')) {
        $menufont = get_field('wpdev_menu_font', 'options');
    } else {
        $menufont = 'Lato';
    }
    wp_enqueue_style( $headingfont . '-font', '//fonts.googleapis.com/css?family=' . $headingfont . ':400,700');
    wp_enqueue_style( $bodyfont . '-font', '//fonts.googleapis.com/css?family=' . $bodyfont . ':400,700');
    wp_enqueue_style( $menufont . '-font', '//fonts.googleapis.com/css?family=' . $headingfont . ':400,700');
	wp_enqueue_script( 'aggregation-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20120206', true );
    wp_enqueue_script( 'aggregation-masonry-js', get_template_directory_uri() . '/js/masonry.min.js', array('jquery'), true );
	wp_enqueue_script( 'aggregation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aggregation_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 */
add_action( 'tgmpa_register', 'aggregation_register_required_plugins' );
function aggregation_register_required_plugins() {

	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Advanced Custom Fields Pro', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory_uri() . '/plugins/advanced-custom-fields-pro.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.3.2.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
        array(
			'name'               => 'Github Updater', // The plugin name.
			'slug'               => 'github-updater', // The plugin slug (typically the folder name).
			'source'             => get_template_directory_uri() . '/plugins/github-updater.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
        array(
			'name'               => 'Easy Social Share Buttons', // The plugin name.
			'slug'               => 'easy-social-share-buttons', // The plugin slug (typically the folder name).
			'source'             => get_template_directory_uri() . '/plugins/easy-social-share-buttons.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '3.2.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
		array(
			'name'      => 'bbPress',
			'slug'      => 'bbpress',
			'required'  => false,
		),
        array(
			'name'      => 'Swifty Bar',
			'slug'      => 'swifty-bar',
			'required'  => false,
		),
        array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
		),
        array(
			'name'      => 'Disqus Conditional Load',
			'slug'      => 'disqus-conditional-load',
			'required'  => false,
		),
        array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),
        array(
			'name'      => 'Post Thumbnail Editor',
			'slug'      => 'post-thumbnail-editor',
			'required'  => false,
		),
        array(
			'name'      => 'The Publisher Desk',
			'slug'      => 'the-publisher-desk',
			'required'  => false,
		),);

	// Array of configuration settings. Amend each line as needed.

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'theme-slug'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'theme-slug'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'theme-slug'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
	);

	tgmpa( $plugins, $config );
}

/**
 * ACF Options Pages.
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'manage_options',
        'icon_url'      => 'dashicons-admin-customizer',
		'redirect'		=> false,
        'position'      => 61
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Homepage',
		'menu_title'	=> 'Homepage',
		'parent_slug'	=> 'site-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Typography',
		'menu_title'	=> 'Typography',
		'parent_slug'	=> 'site-settings',
	));
	
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Colors',
		'menu_title'	=> 'Colors',
		'parent_slug'	=> 'site-settings',
	));
    
}

/**
 * Custom Header Codes
 */
function wpdev_custom_header_codes() {
    include 'inc/custom-css.php';
    if(get_field('wpdev_custom_header_code', 'options')) {
        echo get_field('wpdev_custom_header_code', 'options');
    }
    if(get_field('wpdev_favicon', 'options')) {
        echo '<link rel="shortcut icon" href="' . get_field('wpdev_favicon', 'options') . '" />';
    }
}
add_action('wp_head', 'wpdev_custom_header_codes', 40);


/**
 * Custom Footer Code
 */
function wpdev_custom_footer_codes() {
    if(get_field('wpdev_custom_footer_code', 'options')) {
        echo get_field('wpdev_custom_footer_code', 'options');
    }
    echo '<script type="text/javascript">
           jQuery(function($) {
                $(document).ready(function($) {
                    var $container = $(\'ul.post_item_list\');
                    var $contwidth = $(\'ul.post_item_list\').width();
                    $container.imagesLoaded(function(){
                      $container.masonry({
                        itemSelector : \'.post_item_item\',
                        isFitWidth: true,
                        transitionDuration: \'0.4s\'
                      });
                    });
                });
            });
        </script>';
}
add_action('wp_footer', 'wpdev_custom_footer_codes', 20);

/**
 * bbPress Settings
 */

// Custom Login Menu
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if(is_plugin_active('bbpress/bbpress.php')) {
    $wpdevbbpressactive = '1';
    function wpdev_bbpress_menu() {
        
        $current_user = wp_get_current_user();
        
        if(!is_user_logged_in()) {
            echo '<ul id="top-menu-user" class="menu">';
            echo '<li class="menu-item menu-item-type-custom menu-item-object-custom wpdev-login">';
            echo '<a href="/wp-login.php">Login</a>';
            echo '</li><li class="menu-item menu-item-type-custom menu-item-object-custom wpdev_register">';
            echo '<a href="/wp-login.php?action=register">Register</a>';
            echo '</li></ul>';
        } elseif(is_user_logged_in()) {
            echo '<ul id="top-menu-user" class="menu">';
            echo '<li class="menu-item menu-item-type-custom menu-item-object-custom wpdev-profile" aria-haspopup="true">';
            echo '<a href="/forums/user/' .  $current_user->user_login . '"><i class="fa fa-user"></i> Hello, ' . $current_user->display_name . '</a>';
            echo '<ul class="sub-menu">';
            echo '<li class="menu-item menu-item-type-custom menu-item-object-custom wpdev-profile-item">';
            echo '<a href="/forums/user/' .  $current_user->user_login . '/edit">Edit Profile</a>';
            echo '</li>';
            echo '<li class="menu-item menu-item-type-custom menu-item-object-custom wpdev-profile-item">';
            echo '<a href="/forums/user/' .  $current_user->user_login . '/topics/">Topics</a>';
            echo '</li>';
            echo '<li class="menu-item menu-item-type-custom menu-item-object-custom wpdev-profile-item">';
            echo '<a href="/forums/user/' .  $current_user->user_login . '/replies/">Replies</a>';
            echo '</li>';
            echo '<li class="menu-item menu-item-type-custom menu-item-object-custom wpdev-profile-item">';
            echo '<a href="/forums/user/' .  $current_user->user_login . '/favorites/">Favorites</a>';
            echo '</li>';
            echo '<li class="menu-item menu-item-type-custom menu-item-object-custom wpdev-profile-item">';
            echo '<a href="/forums/user/' .  $current_user->user_login . '/subscriptions/">Subscriptions</a>';
            echo '</li>';
            echo '<li class="menu-item menu-item-type-custom menu-item-object-custom wpdev-profile-item">';
            echo '<a href="' . wp_logout_url() . '">Log Out</a>';
            echo '</li>';
            echo '</ul></li></ul>';
        }
    }
    add_shortcode('wpdevbbpress', 'wpdev_bbpress_menu');
}

global $current_user; 
get_currentuserinfo(); 
if ( user_can( $current_user, "subscriber" ) && ! '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ){ 
    show_admin_bar(false);
    wp_redirect( '/forums/user/' .  $current_user->user_login );
} 

// Custom Login Styles
/*if(is_plugin_active('bbpress/bbpress.php')) {
    if(get_field('wpdev_logo', 'options')) {
    function wpdev_login_logo() { 
        $maincolor = get_field('wpdev_main_color', 'options');?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_field('wpdev_logo', 'options'); ?>);
            padding-bottom: 30px;
            background-size: contain;
            width: 100%;
            height: auto;
        }
        .wp-core-ui .button-primary {
            background: <?php echo $maincolor; ?> !important;
            border: none;
            font-weight: 900 !important;
            text-transform: uppercase;
            font-size: 0.9rem;
        }
    </style>
<?php }
    }
add_action( 'login_enqueue_scripts', 'wpdev_login_logo' );
}*/

/**
 * Aggregation Shortcode
 */

add_shortcode( 'aggregation_rss', 'aggregation_rss_func' );

function aggregation_rss_func( $atts, $content = null ){
	extract( shortcode_atts( array(
		'url' => '#',
		'items' => '10',
        'orderby' => 'default',
        'title' => 'true',
		'excerpt' => '0',
		'read_more' => 'true',
		'new_window' => 'true',
        'thumbnail' => 'false',
        'randomthumbnail' => 'false',
        'source' => 'true',
        'date' => 'true',
        'cache' => '43200'
	), $atts ) );

    update_option( 'wp_rss_cache', $cache );

    //multiple urls
    $urls = explode(',', $url);

    add_filter( 'wp_feed_cache_transient_lifetime', 'aggregation_rss_cache' );

    $postcount = 0;
    
    $itemdivide = $items / 5;
    $itemround = round($itemdivide);
    $adposition = range(2, $items, $itemround);
    $adfiles = range(1,5);
    shuffle($adfiles);
    
    $rss = fetch_feed( $urls );

    remove_filter( 'wp_feed_cache_transient_lifetime', 'aggregation_rss_cache' );

    if ( ! is_wp_error( $rss ) ) :

        if ($orderby == 'date' || $orderby == 'date_reverse') {
            $rss->enable_order_by_date(true);
        }
        $maxitems = $rss->get_item_quantity( $items ); 
        $rss_items = $rss->get_items( 0, $maxitems );
        if ( $new_window != 'false' ) {
            $newWindowOutput = 'target="_blank" ';
        } else {
            $newWindowOutput = NULL;
        }

        if ($orderby == 'date_reverse') {
            $rss_items = array_reverse($rss_items);
        }

    endif;
    $output = '<div class="post_item">';
        $output .= '<ul class="post_item_list">';
            if ( !isset($maxitems) ) : 
                $output .= '<li>' . _e( 'No items', 'wp-rss-retriever' ) . '</li>';
            else : 
                //loop through each feed item and display each item.
                foreach ( $rss_items as $item ) :
                    //variables
                    $content = $item->get_content();
                    $the_title = $item->get_title();
                    $enclosure = $item->get_enclosure();
                    $postcount++;

                    //build output
                    $output .= '<li class="post_item_item"><div class="post_item_item_wrapper">';
                        //random thumbnail
                        $randnums = range(1,$items);
                        $maxnums = $items * 0.5;
                        shuffle($randnums);
                        $maximumnums = round($maxnums);
                        $arraynums = array_slice($randnums, 0, $maximumnums);
    
                        if ($randomthumbnail != 'false' && $enclosure && in_array($postcount, $arraynums)) {
                            $thumbnail_image = $enclosure->get_thumbnail();                     
                            if ($thumbnail_image) {
                                //use thumbnail image if it exists
                                $resize = aggregation_rss_resize_thumbnail($thumbnail);
                                $class = aggregation_rss_get_image_class($thumbnail_image);
                                $output .= '<div class="post_item_image"' . $resize . '><a ' . $newWindowOutput . ' href="' . esc_url( $item->get_permalink() ) . '"><img' . $class . ' src="' . $thumbnail_image . '" alt="' . $title . '"></a></div>';
                            $hasrandthumbnail = 'wpdev-has-thumb';
                            } else {
                                //if not than find and use first image in content
                                preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $first_image);
                                if ($first_image){    
                                    $resize = aggregation_rss_resize_thumbnail($thumbnail);                                
                                    $class = aggregation_rss_get_image_class($first_image["src"]);
                                    $output .= '<div class="post_item_image"' . $resize . '><a ' . $newWindowOutput . ' href="' . esc_url( $item->get_permalink() ) . '"><img' . $class . ' src="' . $first_image["src"] . '" alt="' . $title . '"></a></div>';
                            $hasrandthumbnail = 'wpdev-has-thumb';
                                }
                            }
                        } else {
                            $hasrandthumbnail = '';
                        }
    
                        //title
                        if ($title == 'true') {
                            $output .= '<a class="post_item_title ' . $hasrandthumbnail . '" ' . $newWindowOutput . 'href="' . esc_url( $item->get_permalink() ) . '"
                                title="' . $the_title . '"><h1>';
                                $output .= $the_title;
                            $output .= '</h1></a>';   
                        }
                        //thumbnail
                        if ($thumbnail != 'false' && $enclosure) {
                            $thumbnail_image = $enclosure->get_thumbnail();                     
                            if ($thumbnail_image) {
                                //use thumbnail image if it exists
                                $resize = aggregation_rss_resize_thumbnail($thumbnail);
                                $class = aggregation_rss_get_image_class($thumbnail_image);
                                $output .= '<div class="post_item_image"' . $resize . '><a ' . $newWindowOutput . ' href="' . esc_url( $item->get_permalink() ) . '"><img' . $class . ' src="' . $thumbnail_image . '" alt="' . $title . '"></a></div>';
                            } else {
                                //if not than find and use first image in content
                                preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $first_image);
                                if ($first_image){    
                                    $resize = aggregation_rss_resize_thumbnail($thumbnail);                                
                                    $class = aggregation_rss_get_image_class($first_image["src"]);
                                    $output .= '<div class="post_item_image"' . $resize . '><a ' . $newWindowOutput . ' href="' . esc_url( $item->get_permalink() ) . '"><img' . $class . ' src="' . $first_image["src"] . '" alt="' . $title . '"></a></div>';
                                }
                            }
                        }
                        //content
                        $output .= '<div class="post_item_container">';
                        if ( $excerpt != 'none' ) {
                            if ( $excerpt > 0 ) {
                                $output .= esc_html(implode(' ', array_slice(explode(' ', strip_tags($content)), 0, $excerpt))) . "...";
                            } else {
                                $output .= $content;
                            }
                            if( $read_more == 'true' ) {
                                $output .= ' <div class="post_item_readmore_cont"><a class="post_item_readmore" ' . $newWindowOutput . 'href="' . esc_url( $item->get_permalink() ) . '"
                                        title="' . sprintf( __( 'Posted %s', 'wp-rss-retriever' ), $item->get_date('j F Y | g:i a') ) . '">';
                                        $output .= __( 'Read more <i class="fa fa-angle-right"></i>', 'wp-rss-retriever' );
                                $output .= '</a></div>';
                            }
                        }
                        //metadata
                        if ($source == 'true' || $date == 'true') {
                            $output .= '<div class="post_item_metadata">';
                                $source_title = $item->get_feed()->get_title();
                                $time = $item->get_date('F j, Y - g:i a');
                                if ($source == 'true' && $source_title) {
                                    $output .= '<span class="post_item_source">' . sprintf( __( 'Source: %s', 'wp-rss-retriever' ), $source_title ) . '</span>';
                                }
                                if ($source == 'true' && $date == 'true') {
                                    $output .= '';
                                }
                                if ($date == 'true' && $time) {
                                    $output .= '<span class="post_item_date">' . sprintf( __( '%s', 'wp-rss-retriever' ), $time ) . '</span>';
                                }
                            $output .= '</div>';
                        }
                        // Randomly Placed in Loop Ads

                        if($postcount == $adposition[0]) {
                            ob_start();
                            get_template_part('template-parts/ad-' . $adfiles[0]);
                            $adoutput = ob_get_contents();
                            ob_end_clean();
                        } elseif($postcount == $adposition[1]){
                            ob_start();
                            get_template_part('template-parts/ad-' . $adfiles[1]);
                            $adoutput = ob_get_contents();
                            ob_end_clean();
                        } elseif($postcount == $adposition[2]){
                            ob_start();
                            get_template_part('template-parts/ad-' . $adfiles[2]);
                            $adoutput = ob_get_contents();
                            ob_end_clean();
                        } elseif($postcount == $adposition[3]){
                            ob_start();
                            get_template_part('template-parts/ad-' . $adfiles[3]);
                            $adoutput = ob_get_contents();
                            ob_end_clean();
                        } elseif($postcount == $adposition[4]){
                            ob_start();
                            get_template_part('template-parts/ad-' . $adfiles[4]);
                            $adoutput = ob_get_contents();
                            ob_end_clean();
                        } else {
                            $adoutput = '';
                        }
    
                    $output .= $adoutput . '</div></div></li>';
                endforeach;
            endif;
        $output .= '</ul>';
    $output .= '</div>';
    return $output;
}

add_option( 'wp_rss_cache', 43200 );

function aggregation_rss_cache() {
    //change the default feed cache
    $cache = get_option( 'wp_rss_cache', 43200 );
    return $cache;
}

function aggregation_rss_get_image_class($image_src) {
    list($width, $height) = getimagesize($image_src);
    if ($height > $width) {
        $class = ' class="portrait"';
    } else {
        $class = '';
    }
    return $class;
}

function aggregation_rss_resize_thumbnail($thumbnail) {
    if (is_numeric($thumbnail)){
        $resize = ' style="width:' . $thumbnail . 'px; height:' . $thumbnail . 'px;"';
    } else {
        $resize = '';
    }
    return $resize;
}

/**
 * ACF Field Export
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5671d6d91b3af',
	'title' => 'Colors',
	'fields' => array (
		array (
			'key' => 'field_5671d7ae47869',
			'label' => 'Site Colors',
			'name' => 'site_colors',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671d6e647863',
			'label' => 'Main Color',
			'name' => 'wpdev_main_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#A80000',
		),
		array (
			'key' => 'field_5671d71547864',
			'label' => 'Secondary Color',
			'name' => 'wpdev_secondary_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#202020',
		),
		array (
			'key' => 'field_5671d7bb4786a',
			'label' => 'Header Colors',
			'name' => '_copy',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671d74b47865',
			'label' => 'Main Menu Background Color',
			'name' => 'wpdev_main_menu_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#202020',
		),
		array (
			'key' => 'field_5671d7ee4786d',
			'label' => 'Footer Colors',
			'name' => '_copy',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671d7f94786e',
			'label' => 'Footer Background Color',
			'name' => 'wpdev_background_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#202020',
		),
		array (
			'key' => 'field_5671d8114786f',
			'label' => 'Footer Font Color',
			'name' => 'wpdev_footer_font_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#FFFFFF',
		),
		array (
			'key' => 'field_5671d82847870',
			'label' => 'Footer Link Color',
			'name' => 'wpdev_footer_link_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#A80000',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-colors',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5671cc19ad38e',
	'title' => 'Homepage Content',
	'fields' => array (
		array (
			'key' => 'field_567323c4d6c33',
			'label' => 'Home Columns',
			'name' => 'home_columns',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671cc2306b53',
			'label' => 'Content',
			'name' => 'wpdev_column_1_content',
			'type' => 'wysiwyg',
			'instructions' => 'Enter the shortcode for the RSS feeds.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 0,
		),
		array (
			'key' => 'field_567323d5d6c34',
			'label' => 'Aggregation Shortcode',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_567323e3d6c35',
			'label' => 'Documentation',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'In order to embed RSS feeds, please use the shortcode. The base shortcode requires and URL setting and is like this:

<code>[aggregation_rss url="http://feeds.feedburner.com/TechCrunch/"]</code>

Add additionally RSS feeds by placing commas between the feed URLs, like so:

<code>[aggregation_rss url="http://feeds.feedburner.com/TechCrunch/,http://feeds.feedburner.com/TechCrunch/"]</code>

<hr/>

Additional shortcode properties include:
<ul>
		<li><strong>items</strong> - Number of items from the feed you wish to fetch. Default is 10.</li>
		<li><strong>orderby</strong> - Order the items by date or reverse date <em>(date or reverse_date)</em>.</li>
		<li><strong>title</strong> - Choose whether to display the title or not <em>(true or false, defaults to true)</em>.</li> 
		<li><strong>excerpt</strong> - How many words you want to display for each item\'s excerpt <em>(default is 0 or infinite, use \'none\' to remove the excerpt)</em>.</li> 
		<li><strong>read_more</strong> - Choose whether to display a read more link or not <em>(true or false, defaults to true)</em>.</li>
		<li><strong>new_window</strong> - Choose whether to open the title link and read more link in a new window <em>(true or false, defaults to true)</em>.</li>
		<li><strong>thumbnail</strong> - Choose whether or not you want to display a thumbnail, and if so, what size you want it to be <em>(true or false, defaults to true, inserting a number will change the size, default is 150)</em>.</li> 
		<li><strong>source</strong> - Choose whether to display the source or note <em>(true or false, defaults to true)</em>.</li> 
		<li><strong>date</strong> - Choose whether to display the publish date of the post or not <em>(true or false, defaults to true)</em>.</li>
		<li><strong>cache</strong> - Choose how long you want the feed to cache in seconds<em>(default is 43200, which is 12 hours)</em>.</li>
</ul>

<hr/>
Full Example:

<code>[aggregation_rss url="http://feeds.feedburner.com/TechCrunch/,http://feeds.feedburner.com/TechCrunch/" items="10" excerpt="50" read_more="true" new_window="true" thumbnail="200" cache="7200"]</code>',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-homepage',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5671c52c02f12',
	'title' => 'Site Settings',
	'fields' => array (
		array (
			'key' => 'field_5671d9bb4cd9b',
			'label' => 'General',
			'name' => '_copy',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671d9c74cd9c',
			'label' => 'Layout',
			'name' => 'wpdev_layout',
			'type' => 'radio',
			'instructions' => 'Please select a layout.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Fullwidth',
				0 => 'Boxed',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 1,
			'layout' => 'horizontal',
		),
		array (
			'key' => 'field_5671d9f54cd9d',
			'label' => 'Boxed Background',
			'name' => 'wpdev_boxed_background',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5671d9c74cd9c',
						'operator' => '==',
						'value' => '0',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				0 => 'Color',
				1 => 'Image',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
		),
		array (
			'key' => 'field_5671da2b4cd9e',
			'label' => 'Background Color',
			'name' => 'wpdev_boxed_background_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5671d9c74cd9c',
						'operator' => '==',
						'value' => '0',
					),
					array (
						'field' => 'field_5671d9f54cd9d',
						'operator' => '==',
						'value' => '0',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#FFFFFF',
		),
		array (
			'key' => 'field_5671da494cd9f',
			'label' => 'Background Image',
			'name' => 'wpdev_boxed_background_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5671d9c74cd9c',
						'operator' => '==',
						'value' => '0',
					),
					array (
						'field' => 'field_5671d9f54cd9d',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_5671da8f4cda3',
			'label' => 'Background Repeat',
			'name' => 'wpdev_boxed_background_repeat',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5671d9c74cd9c',
						'operator' => '==',
						'value' => '0',
					),
					array (
						'field' => 'field_5671d9f54cd9d',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				0 => 'Disable',
				1 => 'Enable',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 0,
			'layout' => 'horizontal',
		),
		array (
			'key' => 'field_5671c57750c6e',
			'label' => 'Header',
			'name' => 'header',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671c58150c6f',
			'label' => 'Logo',
			'name' => 'wpdev_logo',
			'type' => 'image',
			'instructions' => 'Please upload a logo.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => 'jpg, png, gif',
		),
		array (
			'key' => 'field_5671c5a250c70',
			'label' => 'Logo Location',
			'name' => 'wpdev_logo_location',
			'type' => 'radio',
			'instructions' => 'Select an alignment for the logo. Default is left alignment.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				0 => 'Left',
				1 => 'Center',
				2 => 'Right',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 0,
			'layout' => 'horizontal',
		),
		array (
			'key' => 'field_5671c5de50c71',
			'label' => 'Favicon',
			'name' => 'wpdev_favicon',
			'type' => 'image',
			'instructions' => 'Please upload a favicon for the site.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => 'ico, png, gif, jpg',
		),
		array (
			'key' => 'field_5671c60d50c72',
			'label' => 'Custom Code',
			'name' => 'wpdev_custom_header_code',
			'type' => 'textarea',
			'instructions' => 'Please enter any custom code for the head of the site.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5671c62850c73',
			'label' => 'Footer',
			'name' => '_copy',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671c63c50c75',
			'label' => 'Widget Layout',
			'name' => 'wpdev_widget_layout',
			'type' => 'select',
			'instructions' => 'Please select a widget column layout. Default is 3.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'One Column',
				2 => 'Two Columns',
				3 => 'Three Columns',
				4 => 'Four Columns',
			),
			'default_value' => array (
				3 => 3,
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5671c68f50c76',
			'label' => 'Copyright Text',
			'name' => 'copyright_text',
			'type' => 'textarea',
			'instructions' => 'Enter a copyright message. NOTE: Copyright © *YEAR* is already generated. So, for example, the footer currently says, "Copyright © 2016.". You can add "Site Name is a member of Liberty Alliance", with links to the end of that.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5671c72f50c77',
			'label' => 'Custom Code',
			'name' => 'wpdev_custom_footer_code',
			'type' => 'textarea',
			'instructions' => 'Please enter any custom code for the footer of the site.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5671c63650c74',
			'label' => 'Social Profiles',
			'name' => '_copy',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671ca3e60be5',
			'label' => 'Enable Social Profiles',
			'name' => 'wpdev_enable_social_profiles',
			'type' => 'radio',
			'instructions' => 'Enable or disable the social profiles.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
				0 => 'Disable',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 1,
			'layout' => 'horizontal',
		),
		array (
			'key' => 'field_5671c98a50c7b',
			'label' => 'Display Location',
			'name' => 'wpdev_social_display_location',
			'type' => 'radio',
			'instructions' => 'Select the location for the social network profiles to display. Default is header and footer.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5671ca3e60be5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				0 => 'Header & Footer',
				1 => 'Header',
				2 => 'Footer',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 0,
			'layout' => 'horizontal',
		),
		array (
			'key' => 'field_5671c77f50c78',
			'label' => 'Social Network Profiles',
			'name' => 'wpdev_social_network_profiles',
			'type' => 'repeater',
			'instructions' => 'Please add networks, select the network it\'s for, and place the URL to that profile.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5671ca3e60be5',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5671c7a350c79',
			'min' => '',
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Add Social Network',
			'sub_fields' => array (
				array (
					'key' => 'field_5671c7a350c79',
					'label' => 'Network',
					'name' => 'wpdev_network',
					'type' => 'select',
					'instructions' => 'Select a network.',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'android' => 'Android',
						'apple' => 'Apple',
						'delicious' => 'Delicious',
						'digg' => 'Digg',
						'dropbox' => 'Dropbox',
						'facebook' => 'Facebook',
						'flickr' => 'Flickr',
						'google-plus' => 'Google+',
						'instagram' => 'Instagram',
						'linkedin' => 'LinkedIn',
						'medium' => 'Medium',
						'paypal' => 'PayPal',
						'pinterest' => 'Pinterest',
						'reddit-alien' => 'Reddit',
						'rss' => 'RSS',
						'skype' => 'Skype',
						'slack' => 'Slack',
						'soundcloud' => 'SoundCloud',
						'spotify' => 'Spotify',
						'stumbleupon' => 'StumbleUpon',
						'tumblr' => 'Tumblr',
						'twitter' => 'Twitter',
						'vimeo' => 'Vimeo',
						'vine' => 'Vine',
						'wordpress' => 'WordPress',
						'youtube' => 'YouTube',
					),
					'default_value' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'disabled' => 0,
					'readonly' => 0,
				),
				array (
					'key' => 'field_5671c95c50c7a',
					'label' => 'URL',
					'name' => 'wpdev_network_url',
					'type' => 'url',
					'instructions' => 'Please insert the network URL.',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'site-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5671cc74129bf',
	'title' => 'Typography',
	'fields' => array (
		array (
			'key' => 'field_5671cdc4f61fe',
			'label' => 'Heading',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671cde5f61ff',
			'label' => 'Font',
			'name' => 'wpdev_heading_font',
			'type' => 'select',
			'instructions' => 'Please select a heading font. Default is Lato.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Arimo' => 'Arimo',
				'Arvo' => 'Arvo',
				'Bitter' => 'Bitter',
				'Droid+Sans' => 'Droid Sans',
				'Droid+Serif' => 'Droid Serif',
				'Lato' => 'Lato',
				'Libre+Baskerville' => 'Libre Baskerville',
				'Lora' => 'Lora',
				'Merriweather' => 'Merriweather',
				'Montserrat' => 'Montserrat',
				'Open+Sans' => 'Open Sans',
				'Oswald' => 'Oswald',
				'Oxygen' => 'Oxygen',
				'Playfair+Display' => 'Playfair Display',
				'PT+Sans' => 'PT Sans',
				'PT+Serif' => 'PT Serif',
				'Raleway' => 'Raleway',
				'Roboto' => 'Roboto',
				'Source+Sans+Pro' => 'Source Sans Pro',
				'Titillium+Web' => 'Titillium Web',
				'Ubuntu' => 'Ubuntu',
				'Vollkorn' => 'Vollkorn',
			),
			'default_value' => array (
				'Lato' => 'Lato',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5671d5aef6201',
			'label' => 'Bold',
			'name' => 'wpdev_heading_bold',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 20,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5671d5eaf6202',
			'label' => 'Italicized',
			'name' => 'wpdev_heading_italic',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 20,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5671d60df6204',
			'label' => 'Underline',
			'name' => 'wpdev_heading_underline',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 20,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5671d628f6206',
			'label' => 'Colored Box',
			'name' => 'wpdev_heading_colored_box',
			'type' => 'checkbox',
			'instructions' => 'Note: Changes heading color to #fff;.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 20,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5671d64cf6207',
			'label' => 'Uppercase',
			'name' => 'wpdev_heading_uppercase',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 20,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5681a629b615a',
			'label' => 'Aggregation Post Heading',
			'name' => 'aggregation_post_heading',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5681a639b615b',
			'label' => 'Font',
			'name' => 'wpdev_aggregation_heading_font',
			'type' => 'select',
			'instructions' => 'Please select a heading font. Default is Lato.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Arimo' => 'Arimo',
				'Arvo' => 'Arvo',
				'Bitter' => 'Bitter',
				'Droid+Sans' => 'Droid Sans',
				'Droid+Serif' => 'Droid Serif',
				'Lato' => 'Lato',
				'Libre+Baskerville' => 'Libre Baskerville',
				'Lora' => 'Lora',
				'Merriweather' => 'Merriweather',
				'Montserrat' => 'Montserrat',
				'Open+Sans' => 'Open Sans',
				'Oswald' => 'Oswald',
				'Oxygen' => 'Oxygen',
				'Playfair+Display' => 'Playfair Display',
				'PT+Sans' => 'PT Sans',
				'PT+Serif' => 'PT Serif',
				'Raleway' => 'Raleway',
				'Roboto' => 'Roboto',
				'Source+Sans+Pro' => 'Source Sans Pro',
				'Titillium+Web' => 'Titillium Web',
				'Ubuntu' => 'Ubuntu',
				'Vollkorn' => 'Vollkorn',
			),
			'default_value' => array (
				'Lato' => 'Lato',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5681b0767b2a9',
			'label' => 'Font Color',
			'name' => 'wpdev_aggregation_head_font_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '#A80000',
		),
		array (
			'key' => 'field_5681a692b6161',
			'label' => 'Font Size',
			'name' => 'wpdev_aggregation_heading_font_size',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 16,
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5681a6c1b6162',
			'label' => 'Line Height',
			'name' => 'wpdev_aggregation_heading_line_height',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5681ab1538756',
			'label' => 'Side Borders',
			'name' => 'wpdev_aggregation_heading_side_borders',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5681ab4338757',
			'label' => 'Side Borders Color',
			'name' => 'wpdev_aggregation_heading_side_borders_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5681ab1538756',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '#E7E7E7',
		),
		array (
			'key' => 'field_5681a63fb615c',
			'label' => 'Bold',
			'name' => 'wpdev_aggregation_heading_bold',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5681a643b615d',
			'label' => 'Italicized',
			'name' => 'wpdev_aggregation_heading_italic',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5681a648b615e',
			'label' => 'Underline',
			'name' => 'wpdev_aggregation_heading_underline',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5681a651b6160',
			'label' => 'Uppercase',
			'name' => 'wpdev_aggregation_heading_uppercase',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 25,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5671d662f6208',
			'label' => 'Body',
			'name' => 'body',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5671d66ff6209',
			'label' => 'Font',
			'name' => 'wpdev_body_font',
			'type' => 'select',
			'instructions' => 'Please select a heading font. Default is Lato.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Arimo' => 'Arimo',
				'Arvo' => 'Arvo',
				'Bitter' => 'Bitter',
				'Droid+Sans' => 'Droid Sans',
				'Droid+Serif' => 'Droid Serif',
				'Lato' => 'Lato',
				'Libre+Baskerville' => 'Libre Baskerville',
				'Lora' => 'Lora',
				'Merriweather' => 'Merriweather',
				'Montserrat' => 'Montserrat',
				'Open+Sans' => 'Open Sans',
				'Oswald' => 'Oswald',
				'Oxygen' => 'Oxygen',
				'Playfair+Display' => 'Playfair Display',
				'PT+Sans' => 'PT Sans',
				'PT+Serif' => 'PT Serif',
				'Raleway' => 'Raleway',
				'Roboto' => 'Roboto',
				'Source+Sans+Pro' => 'Source Sans Pro',
				'Titillium+Web' => 'Titillium Web',
				'Ubuntu' => 'Ubuntu',
				'Vollkorn' => 'Vollkorn',
			),
			'default_value' => array (
				'Lato' => 'Lato',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5671d682f620a',
			'label' => 'Font Size',
			'name' => 'wpdev_body_font_size',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => 14,
			'placeholder' => '',
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5681a6dcb6163',
			'label' => 'Line Height',
			'name' => 'wpdev_body_line_height',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5671d6b2f620b',
			'label' => 'Font Color',
			'name' => 'wpdev_body_font_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '#000000',
		),
		array (
			'key' => 'field_5672e56f3d1be',
			'label' => 'Menus',
			'name' => 'menus',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5672e5903d1c0',
			'label' => 'Font',
			'name' => 'wpdev_menu_font',
			'type' => 'select',
			'instructions' => 'Please select a menu font. Default is Lato.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Arimo' => 'Arimo',
				'Arvo' => 'Arvo',
				'Bitter' => 'Bitter',
				'Droid+Sans' => 'Droid Sans',
				'Droid+Serif' => 'Droid Serif',
				'Lato' => 'Lato',
				'Libre+Baskerville' => 'Libre Baskerville',
				'Lora' => 'Lora',
				'Merriweather' => 'Merriweather',
				'Montserrat' => 'Montserrat',
				'Open+Sans' => 'Open Sans',
				'Oswald' => 'Oswald',
				'Oxygen' => 'Oxygen',
				'Playfair+Display' => 'Playfair Display',
				'PT+Sans' => 'PT Sans',
				'PT+Serif' => 'PT Serif',
				'Raleway' => 'Raleway',
				'Roboto' => 'Roboto',
				'Source+Sans+Pro' => 'Source Sans Pro',
				'Titillium+Web' => 'Titillium Web',
				'Ubuntu' => 'Ubuntu',
				'Vollkorn' => 'Vollkorn',
			),
			'default_value' => array (
				'Lato' => 'Lato',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5672e5c63d1c1',
			'label' => 'Font Size',
			'name' => 'wpdev_menu_font_size',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => 14,
			'placeholder' => '',
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5672e5d53d1c2',
			'label' => 'Font Color',
			'name' => 'wpdev_menu_font_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'default_value' => '#A80000',
		),
		array (
			'key' => 'field_5673046a34837',
			'label' => 'Bold',
			'name' => 'wpdev_menu_bold',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
		array (
			'key' => 'field_5673048034838',
			'label' => 'Uppercase',
			'name' => 'wpdev_menu_uppercase',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				1 => 'Enable',
			),
			'default_value' => array (
			),
			'layout' => 'horizontal',
			'toggle' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-typography',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

/**
 * Hide ACF Menu Item
 */
function wpdev_remove_menus(){
  
  remove_menu_page( 'edit.php?post_type=acf-field-group' );                  // ACF
  
}
//add_action( 'admin_menu', 'wpdev_remove_menus' );