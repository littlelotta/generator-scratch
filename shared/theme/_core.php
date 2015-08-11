<?php

/**
 * <%= opts.projectTitle %> functions and definitions
 *
 * @package <%= opts.projectTitle %>
 */

if ( ! function_exists( '<%= opts.funcPrefix %>_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function <%= opts.funcPrefix %>_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on <%= opts.projectTitle %>, use a find and replace
	 * to change 'sfcc' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sfcc', <%= opts.funcPrefix.toUpperCase() %>_PATH . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'sfcc' ),
		'social' => esc_html__( 'Social Menu', 'sfcc' )
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
	add_theme_support( 'custom-background', apply_filters( '<%= opts.funcPrefix %>_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}
endif; // <%= opts.funcPrefix %>_setup
add_action( 'after_setup_theme', '<%= opts.funcPrefix %>_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function <%= opts.funcPrefix %>_content_width() {
	$GLOBALS['content_width'] = apply_filters( '<%= opts.funcPrefix %>_content_width', 640 );
}
add_action( 'after_setup_theme', '<%= opts.funcPrefix %>_content_width', 0 );