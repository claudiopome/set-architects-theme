<?php
/**
 * Nemesis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nemesis
 */

if ( !defined( 'NEMESIS_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( 'NEMESIS_VERSION', '1.0.8' );
}

if ( ! function_exists( 'nemesis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nemesis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Nemesis, use a find and replace
		 * to change 'nemesis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nemesis', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'nemesis' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nemesis_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'nemesis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nemesis_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nemesis_content_width', 640 );
}
add_action( 'after_setup_theme', 'nemesis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */ 
function nemesis_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nemesis' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nemesis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nemesis_widgets_init' ); 

/**
 * Enqueue scripts and styles.
 */
function nemesis_scripts() {
	
	/* Bootstrap CSS */
	/* Imported from Sass */

	/* Slick CSS */
	wp_enqueue_style( 'nemesis-slick-css', get_template_directory_uri() . '/assets/build/node_modules/slick-carousel/slick/slick.css' );

	/* Fancybox CSS */
	wp_enqueue_style( 'nemesis-fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css' );
	
	/* Custom CSS */
    wp_enqueue_style( 'nemesis-style', get_template_directory_uri() . '/assets/build/css/style.css', array(), NEMESIS_VERSION );

	/* jQuery JS */
	wp_enqueue_script( 'nemesis-jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), false, true );

	/* Bootstrap JS */
	wp_enqueue_script( 'nemesis-bootstrap-js', get_template_directory_uri() . '/assets/build/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array(), false, true );

	/* Slick JS */
	wp_enqueue_script( 'nemesis-slick-js', get_template_directory_uri() . '/assets/build/node_modules/slick-carousel/slick/slick.min.js', array(), false, true );

	/* Fancybox JS */
	wp_enqueue_script( 'nemesis-fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), false, true );

	/* Mixitup JS */
	wp_enqueue_script( 'nemesis-mixitup-js', get_template_directory_uri() . '/assets/build/node_modules/mixitup/dist/mixitup.min.js', array(), false, true );

	/* Lazyload JS */
	wp_enqueue_script( 'nemesis-lazyload-js', get_template_directory_uri() . '/assets/build/node_modules/vanilla-lazyload/dist/lazyload.min.js', array(), false, true );

	/* Marquee3000 JS */
	wp_enqueue_script( 'nemesis-marquee-js', get_template_directory_uri() . '/assets/build/js/marquee3k.min.js', array(), false, true );

	/* Custom JS */
	wp_enqueue_script( 'nemesis-scripts', get_template_directory_uri() . '/assets/build/js/app.js', array(), NEMESIS_VERSION, true );

	/* Navigation */
	wp_enqueue_script( 'nemesis-navigation', get_template_directory_uri() . '/assets/build/js/navigation.js', array(), '20151215', true );

	/* Skip link focus fix */
	wp_enqueue_script( 'nemesis-skip-link-focus-fix', get_template_directory_uri() . '/assets/build/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	} 
}
add_action( 'wp_enqueue_scripts', 'nemesis_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* SVG SUPPORT */

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* OPTIONS PAGE */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

/* MOVE YOAST TO BOTTOM */

function yoasttobottom() { 
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/* REMOVE WORDPRESS EDITOR */

function remove_editor() {
	remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

/* REMOVE DEFAULT POST */

add_action( 'admin_menu', 'remove_default_post_type' );
function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

/* REMOVE UNNECESSARY FUNCTIONS, SCRIPTS AND STYLES */

function remove_unnecessary_functions() {
	// Remove emojis
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'emoji_svg_url', '__return_false' );
	// Remove Really Simple Discovery
	remove_action('wp_head', 'rsd_link');
	// Remove Windows Live Writer
	remove_action('wp_head', 'wlwmanifest_link');
	// Remove WordPress version generator
	remove_action('wp_head', 'wp_generator');
	// Remove post relational links
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');
	// Remove shortlink
	remove_action( 'wp_head', 'wp_shortlink_wp_head');
	// Remove api.w.org relation link
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
	remove_action('template_redirect', 'rest_output_link_header', 11, 0);
	// Remove wp-embed
	wp_deregister_script('wp-embed');
	// Remove inline Recent Comments widget css
	add_filter( 'show_recent_comments_widget_style', '__return_false', 99 );
	// Remove canonical relation link
	remove_action('wp_head', 'rel_canonical');
}
add_action( 'init', 'remove_unnecessary_functions' );

// Remove Gutenberg block library
/* function remove_unnecessary_styles() { 
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' );
    wp_deregister_style( 'dashicons' ); 
    wp_deregister_style( 'admin-bar-style' );  
}
add_action( 'wp_enqueue_scripts', 'remove_unnecessary_styles' ); */

// Disable rss feeds
function disable_feeds() {
	wp_redirect( home_url() );
	die;
}
add_action( 'do_feed',      'disable_feeds', -1 );
add_action( 'do_feed_rdf',  'disable_feeds', -1 );
add_action( 'do_feed_rss',  'disable_feeds', -1 );
add_action( 'do_feed_rss2', 'disable_feeds', -1 );
add_action( 'do_feed_atom', 'disable_feeds', -1 );
add_action( 'do_feed_rss2_comments', 'disable_feeds', -1 );
add_action( 'do_feed_atom_comments', 'disable_feeds', -1 );
add_action( 'feed_links_show_posts_feed',    '__return_false', -1 );
add_action( 'feed_links_show_comments_feed', '__return_false', -1 );
remove_action( 'wp_head', 'feed_links',       2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

function marce_remove_woocommerce_smallscreen_css( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', 'marce_remove_woocommerce_smallscreen_css' );

/* CPT: NEWS */

function news_cpt() {
    register_post_type('news', array(
        'labels' => array(
            'name' => __('News'),
            'singular_name' => __('News')
        ),
        'public' => true, // Changed to true for proper single post access
        'publicly_queryable' => true, // Ensure single posts are accessible
        'has_archive' => 'custom-slug', // Archive at /custom-slug/
        'rewrite' => array('slug' => 'news'), // Single posts at /news/project-name/
        'show_in_rest' => true,
        'show_ui' => true,
        'supports' => ['title', 'custom-fields']
    ));
}
add_action('init', 'news_cpt');

add_action('init', function () {
    add_rewrite_rule(
        '^news/?$', // Match exactly /news/
        'index.php?pagename=news', // Load page with slug 'news'
        'top' // Highest priority
    );
});

/* CPT: PRESS */

function press_cpt() {
    register_post_type('press', array(
        'labels' => array(
            'name' => __('Press'),
            'singular_name' => __('Press')
        ),
        'public' => true, // Changed to true for proper single post access
        'publicly_queryable' => true, // Ensure single posts are accessible
        'has_archive' => 'custom-slug', // Archive at /custom-slug/
        'rewrite' => array('slug' => 'press'), // Single posts at /press/project-name/
        'show_in_rest' => true,
        'show_ui' => true,
        'supports' => ['title', 'custom-fields']
    ));
}
add_action('init', 'press_cpt');

add_action('init', function () {
    add_rewrite_rule(
        '^press/?$', // Match exactly /press/
        'index.php?pagename=press', // Load page with slug 'press'
        'top' // Highest priority
    );
});


/* CPT: PROJECTS */

function projects_cpt() {
    register_post_type('projects', array(
        'labels' => array(
            'name' => __('Projects'),
            'singular_name' => __('Project')
        ),
        'public' => true, // Changed to true for proper single post access
        'publicly_queryable' => true, // Ensure single posts are accessible
        'has_archive' => false, // Archive at /custom-slug/
        'rewrite' => ['slug' => 'projects'], // Single posts at /projects/project-name/
        'show_in_rest' => true,
        'show_ui' => true,
        'supports' => ['title', 'custom-fields']
    ));
}
add_action('init', 'projects_cpt');

add_action('init', function () {
    add_rewrite_rule(
        '^projects/?$', 
        'index.php?pagename=projects', 
        'top'
    );
});


/* CT: TYPE */

function project_type() {
    $labels = array(
        'name'              => _x('Types', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Type', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Types', 'textdomain'),
        'all_items'         => __('All Types', 'textdomain'),
        'parent_item'       => __('Parent Type', 'textdomain'),
        'parent_item_colon' => __('Parent Type:', 'textdomain'),
        'edit_item'         => __('Edit Type', 'textdomain'),
        'update_item'       => __('Update Type', 'textdomain'),
        'add_new_item'      => __('Add New Type', 'textdomain'),
        'new_item_name'     => __('New Type Name', 'textdomain'),
        'menu_name'         => __('Types', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // true = like categories, false = like tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'type'),
    );

    register_taxonomy('type', array('projects'), $args);
}
add_action('init', 'project_type');

/* CT: LOCATION */

function project_location() {
    $labels = array(
        'name'              => _x('Locations', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Location', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Locations', 'textdomain'),
        'all_items'         => __('All Locations', 'textdomain'),
        'parent_item'       => __('Parent Location', 'textdomain'),
        'parent_item_colon' => __('Parent Location:', 'textdomain'),
        'edit_item'         => __('Edit Location', 'textdomain'),
        'update_item'       => __('Update Location', 'textdomain'),
        'add_new_item'      => __('Add New Location', 'textdomain'),
        'new_item_name'     => __('New Location Name', 'textdomain'),
        'menu_name'         => __('Locations', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // true = like categories, false = like tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'location'),
    );

    register_taxonomy('location', array('projects'), $args);
}
add_action('init', 'project_location');

/* CT: YEAR */

function project_year() {
    $labels = array(
        'name'              => _x('Years', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Year', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Years', 'textdomain'),
        'all_items'         => __('All Years', 'textdomain'),
        'parent_item'       => __('Parent Year', 'textdomain'),
        'parent_item_colon' => __('Parent Year:', 'textdomain'),
        'edit_item'         => __('Edit Year', 'textdomain'),
        'update_item'       => __('Update Year', 'textdomain'),
        'add_new_item'      => __('Add New Year', 'textdomain'),
        'new_item_name'     => __('New Year Name', 'textdomain'),
        'menu_name'         => __('Years', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // true = like categories, false = like tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'year'),
    );

    register_taxonomy('year', array('projects'), $args);
}
add_action('init', 'project_year');

/* CT: CLIENT */

function project_client() {
    $labels = array(
        'name'              => _x('Clients', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Client', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Clients', 'textdomain'),
        'all_items'         => __('All Clients', 'textdomain'),
        'parent_item'       => __('Parent Client', 'textdomain'),
        'parent_item_colon' => __('Parent Client:', 'textdomain'),
        'edit_item'         => __('Edit Client', 'textdomain'),
        'update_item'       => __('Update Client', 'textdomain'),
        'add_new_item'      => __('Add New Client', 'textdomain'),
        'new_item_name'     => __('New Client Name', 'textdomain'),
        'menu_name'         => __('Clients', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // true = like categories, false = like tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'client'),
    );

    register_taxonomy('client', array('projects'), $args);
}
add_action('init', 'project_client');

/* CT: STATUS */

function project_status() {
    $labels = array(
        'name'              => _x('Status', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Status', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Status', 'textdomain'),
        'all_items'         => __('All Status', 'textdomain'),
        'parent_item'       => __('Parent Status', 'textdomain'),
        'parent_item_colon' => __('Parent Status:', 'textdomain'),
        'edit_item'         => __('Edit Status', 'textdomain'),
        'update_item'       => __('Update Status', 'textdomain'),
        'add_new_item'      => __('Add New Status', 'textdomain'),
        'new_item_name'     => __('New Status Name', 'textdomain'),
        'menu_name'         => __('Status', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // true = like categories, false = like tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'status'),
    );

    register_taxonomy('status', array('projects'), $args);
}
add_action('init', 'project_status');