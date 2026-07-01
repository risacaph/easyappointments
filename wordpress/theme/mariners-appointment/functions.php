<?php
/**
 * Mariners Appointment theme functions and definitions.
 *
 * @package MarinersAppointmentTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'MARINERS_THEME_VERSION' ) ) {
	define( 'MARINERS_THEME_VERSION', '1.0.0' );
}

if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

if ( ! function_exists( 'mariners_theme_setup' ) ) {
	/**
	 * Register theme support and features.
	 */
	function mariners_theme_setup() {
		load_theme_textdomain( 'mariners-appointment', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height'      => 96,
			'width'       => 96,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'mariners-appointment' ),
			'footer'  => __( 'Footer Menu', 'mariners-appointment' ),
		) );
	}
}
add_action( 'after_setup_theme', 'mariners_theme_setup' );

/**
 * Register widget areas.
 */
function mariners_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mariners-appointment' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar shown on posts and pages.', 'mariners-appointment' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'mariners-appointment' ),
		'id'            => 'footer-1',
		'description'   => __( 'Footer widget area.', 'mariners-appointment' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mariners_theme_widgets_init' );

/**
 * Enqueue theme styles and scripts.
 */
function mariners_theme_scripts() {
	wp_enqueue_style(
		'mariners-appointment-style',
		get_stylesheet_uri(),
		array(),
		MARINERS_THEME_VERSION
	);

	wp_enqueue_script(
		'mariners-appointment-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		MARINERS_THEME_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mariners_theme_scripts' );

/**
 * Whether the current view should render the sidebar.
 *
 * @return bool
 */
function mariners_theme_has_sidebar() {
	return is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'templates/full-width.php' );
}

if ( ! function_exists( 'mariners_theme_entry_meta' ) ) {
	/**
	 * Print the entry meta (date + author) for the current post.
	 */
	function mariners_theme_entry_meta() {
		printf(
			/* translators: 1: post date, 2: post author */
			esc_html__( 'Posted on %1$s by %2$s', 'mariners-appointment' ),
			'<time datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' . esc_html( get_the_date() ) . '</time>',
			'<span class="author">' . esc_html( get_the_author() ) . '</span>'
		);
	}
}

/**
 * Render the numeric pagination for archive/index views.
 */
function mariners_theme_pagination() {
	$links = paginate_links( array( 'type' => 'array' ) );

	if ( empty( $links ) ) {
		return;
	}

	echo '<nav class="pagination" aria-label="' . esc_attr__( 'Posts navigation', 'mariners-appointment' ) . '">';
	foreach ( $links as $link ) {
		echo wp_kses_post( $link );
	}
	echo '</nav>';
}
