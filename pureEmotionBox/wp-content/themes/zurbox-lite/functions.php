<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zurbox Lite
 */
// Set the default content width.
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'zurbox_content_width' ) ) :
	function zurbox_content_width() {
		global $content_width;

		if ( is_front_page() || is_page_template( 'page-templates/full-width.php' ) ) {
			$content_width = 1200;
		}
	}
endif;
add_action( 'template_redirect', 'zurbox_content_width' );

if ( ! function_exists( 'zurbox_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zurbox_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Zurbox, use a find and replace
	 * to change 'zurbox-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'zurbox-lite', get_template_directory() . '/languages' );

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
	 * Add Logo support
	 */
	add_theme_support( 'custom-logo', array(
		'height' => 150,
		'width' => 400,
		'flex-height' => true,
		'flex-width' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set default thumbnail size
	set_post_thumbnail_size( 350, 350 );

	/**
	 * Set the Custom Image Sizes
	 */
	add_image_size( 'zurbox-square', 550, 550, true );
	add_image_size( 'zurbox-entry', 800, 450, true );
	add_image_size( 'zurbox-post', 1020, 860, true );
	add_image_size( 'zurbox-featured', 1400, 950, true );
	add_image_size( 'zurbox-large', 9999, 1000, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top-bar-r' => esc_html__( 'Main Right', 'zurbox-lite' ),
		'top-bar-l' => esc_html__( 'Main Left', 'zurbox-lite' ),
		'mobile-nav' => esc_html__( 'Mobile', 'zurbox-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', array( 'wp-head-callback' => 'zurbox_custom_background', 'default-color' => 'ffffff' ) );
	// callback func find in extras.php

}
endif;
add_action( 'after_setup_theme', 'zurbox_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zurbox_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'zurbox-lite' ),
		'id'            => 'sidebar-main',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Extra Area', 'zurbox-lite' ),
		'id'            => 'top-extra',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="column widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area', 'zurbox-lite' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="column widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	if ( 'page' == get_option( 'show_on_front' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Frontpage Area Wide', 'zurbox-lite' ),
			'id'            => 'widgets-wide',
			'description'   => esc_html__( 'Widgets section in the full width of the screen.', 'zurbox-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Frontpage Area Columns', 'zurbox-lite' ),
			'id'            => 'widgets-columns',
			'description'   => esc_html__( 'Widgets section with columns. The number of columns is set in the Customizer.', 'zurbox-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s column">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Frontpage Area Box', 'zurbox-lite' ),
			'id'            => 'widgets-boxes',
			'description'   => esc_html__( 'Widgets section of limited width (main layout width).', 'zurbox-lite' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'zurbox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function zurbox_scripts() {
	// Enqueue Foundation
	wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/vendor/foundation/css/foundation.min.css', array(), '6.3', 'all' );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/vendor/foundation/js/foundation.min.js', array('jquery'), '6.3', true );
    
    	// Adding scripts file in the footer
	wp_enqueue_script('what-input', get_template_directory_uri() . '/vendor/foundation/js/what-input.js', array('jquery'),'6.3', true);
    wp_enqueue_script( 'zurbox-init-foundation-js', get_template_directory_uri() . '/js/init-foundation.js', array('jquery'), '6.3', true );

    	// Main style
	wp_enqueue_style( 'zurbox-style', get_stylesheet_uri() );

    	// Fonts style
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css?v=4.2' );
	wp_enqueue_style( 'etlinefont', get_template_directory_uri() . '/css/etlinefont.css?v=4.2' );

	wp_enqueue_script( 'zurbox-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if( 'masonry' == get_theme_mod( 'home_layout' ) || 'masonry' == get_theme_mod( 'archive_layout' ) ) {
		//wp_enqueue_script( 'jquery-masonry' );
		wp_enqueue_script( 'zurbox-init-masonry', get_template_directory_uri() . '/js/init-masonry.js', array('jquery-masonry'), '22102016', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
		if ( 'grid' == get_theme_mod( 'home_layout' ) && is_home() || 'grid' == get_theme_mod( 'archive_layout' ) && is_archive() ) {
			wp_enqueue_script( 'infinity', get_template_directory_uri() . '/js/infinity.js', array(), '22102016', true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'zurbox_scripts' );

/** Required for Foundation to work properly */
require_once(get_template_directory().'/library/foundation.php' );

/** Navigations tweaks */
require_once(get_template_directory().'/library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once(get_template_directory().'/library/menu-walkers.php' );

/** Change WP's sticky post class */
require_once(get_template_directory().'/library/sticky-posts.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Template hooks for this theme.
 * @see template-tags.php
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Theme Customizer.
 */
require get_template_directory() . '/customizer/config.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme Widgets
 */
// Check for files
$files = glob( get_template_directory() .'/inc/widgets/*.php' );

// Load files if they exist
if ( $files ) {
	foreach ( $files as $file ) {
		require_once( $file );
	}
}

/**
 * Add extra lines to the custom css which is generate by customizer
 * @see css_output()
 */
function zurbox_add_customize_css( $output ) {
	if ( get_theme_mod( 'zurbox_site_title_hide' ) == true ) {
		$output .= 'li.site-title-menu, .site-title-menu{display: none;}';
   	}
	if ( get_theme_mod( 'zurbox_site_tagline_hide' ) == true ) {
		$output .= 'li.site-description-menu, .site-description-menu{display: none;}';
   	}

   	return $output;
}
add_filter( 'zurbox_customizer_css_output', 'zurbox_add_customize_css' );