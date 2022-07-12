<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package santella
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function santella_body_classes( $classes ) {

	// sidebar settings
	$sidebar_setting = get_theme_mod('santella_sidebar_position', 'left');

	if($sidebar_setting === 'hidden'){
	$classes[] = 'full-width-content';
	}
	if ($sidebar_setting === 'left'){
		$classes[] = 'sidebar-content';
	}
	if($sidebar_setting === 'right'){
		$classes[] = 'content-sidebar';
	}


	// Page templates body classes
	if( is_page_template('page-templates/landing.php') ){
		$classes[] = 'landing-page';
	}
	
	if( is_page_template('page-templates/instagram.php') ){
		$classes[] = 'instagram-page';
	}
	
	if( is_page_template('page-templates/blog.php') ){
		$classes[] = 'blog';
	}
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'santella_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function santella_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'santella_pingback_header' );
