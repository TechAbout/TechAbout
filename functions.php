<?php
/**
 * TechAbout functions and definitions
 *
 * @package techabout
 */

define( 'TechAbout', '1.0.0' );

if ( ! function_exists( 'techabout_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function techabout_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TechAbout, use a find and replace
		 * to change 'techabout' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'techabout', get_template_directory() . '/languages' );

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

		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 100,
		) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'techabout' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters(
				'TechAbout_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
	}
endif; // techabout_wp_setup
add_action( 'after_setup_theme', 'techabout_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function techabout_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'techabout_content_width', 640 );
}

add_action( 'after_setup_theme', 'techabout_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function techabout_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'techabout' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s card-panel">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'techabout' ),
			'id'            => 'footer-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'techabout' ),
			'id'            => 'footer-2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'techabout' ),
			'id'            => 'footer-3',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'techabout_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function techabout_scripts() {
	// Global
	
	wp_enqueue_style('Materialize-css', get_template_directory_uri() . '/assets/css/materialize.min.css', array() );

	wp_enqueue_style( 'TechAbout-css', get_stylesheet_uri(), array() );

	wp_enqueue_style( 'Icon', 'https://fonts.googleapis.com/icon?family=Material+Icons', array() );

	wp_enqueue_script( 'Materialize-js', get_template_directory_uri() . '/assets/js/materialize.min.js', array( 'jquery' ) );

	wp_enqueue_script( 'TechAbout-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(
		'jquery',
		'Materialize-js'
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'techabout_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


function techabout_excerpt_length( $length ) {
	if( is_admin() ){
		return $length;
	}
    return 40;
}

add_filter( 'excerpt_length', 'techabout_excerpt_length', 999 );