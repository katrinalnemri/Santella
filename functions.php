<?php
/**
 * Theme's functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package santella
 */

 if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'santella_setup' ) ) :
	/*
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function santella_setup() {

$widgets_block = get_theme_mod('santella_widgets_block', false);
  if($widgets_block === true){
      // add widgets block support
      add_theme_support( 'widgets-block-editor' );
    }else{
      // remove widgets block support
      remove_theme_support( 'widgets-block-editor' );
    }

   // wide and full width support
   add_theme_support( 'align-wide' );

		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'santella', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Header', 'santella' ),
				'menu-2' => esc_html__( 'After header', 'santella'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

    // Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'santella_custom_background_args',
				array(
          'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 80,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		// Adds image sizes.
add_image_size( 'landscape', 1200, 900, true );
add_image_size( 'square', 900, 900, true );
add_image_size( 'portrait', 900, 1200, true );
add_image_size( 'original', 1024, 9999, false );
	}
endif;
add_action( 'after_setup_theme', 'santella_setup' );


/**
 * Content width.
**/
function santella_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'santella_content_width', 700 );
}
add_action( 'after_setup_theme', 'santella_content_width', 0 );

//Remove edit link
add_filter( 'edit_post_link', '__return_false' );

//=============================================================
// Remove Colors option from theme customizer.
//=============================================================
add_action( "customize_register", "santella_customize_remove" );
function santella_customize_remove( $wp_customize ) {
$wp_customize->remove_section("colors");
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function santella_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'santella' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'santella' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'santella_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function santella_scripts() {
    wp_enqueue_style( 'santella-style', get_stylesheet_uri() , array(), _S_VERSION );
    wp_enqueue_script( 'santella-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/css/slick.css', array(), _S_VERSION );
    wp_enqueue_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/css/slick-theme.css', array(), _S_VERSION );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Cormorant:300,300i,700,700i|Mulish:300,300i,400,400i,700,700i' );
    wp_enqueue_script( 'slider-script', get_template_directory_uri() . '/js/slick-slider.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'slider-min', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'santella_scripts' );

/**
 * Implement TGM.
 */
require get_template_directory() . '/tgm/reg-tgm.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Blog layouts file.
 */
require get_template_directory() . '/inc/blog-layouts.php';

/**
 * Implement the Custom widgets files.
 */
require get_template_directory() . '/inc/widgets/bfd-profile-widget.php';
require get_template_directory() . '/inc/widgets/bfd-image-widget.php';
require get_template_directory() . '/inc/widgets/slider-widget.php';
require get_template_directory() . '/inc/widgets/bfd-featured-posts.php';

/**
 * Implement theEntry footer additions file.
 */
require get_template_directory() . '/inc/entry-footer-additions.php';

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
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/inline-css.php';
require get_template_directory() . '/inc/customizer/customizer-extend.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/WooCommerce/woocommerce.php';
}

/**
 * Posts per page for archives.
 **/

function prefix_archive_query( $query ) {
	
if ( ! is_admin()
&& $query->is_archive() 
&& $query->is_main_query()) {
if (function_exists('is_woocommerce') && is_woocommerce()){}else{
$query->set( 'posts_per_page', get_theme_mod( 'archive_posts_per_page', '9' ) );
}
}
return $query;
	}
add_action( 'pre_get_posts', 'prefix_archive_query' );



/**
 * Remove pages from search results and change posts per page.
 **/
function prefix_remove_pages_from_search( $query ) {
if ( ! is_admin()
&& $query->is_search) {
$query->set( 'post_type', 'post' );
$query->set( 'posts_per_page', get_theme_mod( 'archive_posts_per_page', '9' ) );
}
return $query;
}
add_filter( 'pre_get_posts', 'prefix_remove_pages_from_search' );

// Excerpt ellipsis
function santella_post_excerpt_ellipsis( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'santella_post_excerpt_ellipsis' );

//* Wrap search form in a custom div
add_filter( 'get_search_form', 'search_f',40);
function search_f($form) {
	$form = '<div class="search-popup-outer"><div class="search-close"><i class="fa fa-times"></i></div><div class="search-popup-inner"><form role="search" method="get" id="searchform" class="search-form" action="' . home_url( '/' ) . '" ><label class="screen-reader-text" for="s">' . __( 'Search:' ) . '</label>
    <input type="text" name="s" onblur="if(this.value==&#39;&#39;)this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value=&#39;&#39;;" value="'. get_theme_mod('santella_search_text', 'Type some keywords...' ) .'" itemprop="query-input"/>  
		<input type="submit" id="searchsubmit" value="'. get_theme_mod('santella_search_btn_text', 'search' ) .'" />
      </form></div></div>';
	return $form;	
}

function santella_widget_areas(){

  // Adding social nav widget area
  register_sidebar( array(
  'id' => 'nav-socials',
  'name' => esc_html__( 'Social Icons', 'santella' ),
  'description' => esc_html__( 'Navigation Socials widget area.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );

  // Adding homepage before flexible widgets area
  register_sidebar( array(
  'id' => 'home-before-flex',
  'name' => esc_html__( 'Before columns (homepage)', 'santella' ),
  'description' => esc_html__( 'Use this area to add widgets before the columns on the homepage.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );
		
  // Adding homepage columns widget areas
  register_sidebar( array(
  	'name'          => esc_html__( 'Homepage column 1', 'santella' ),
		'id'            => 'home-flex-1',
		'description'   => esc_html__( 'Add widgets here for the first column in the flexible widgets area (homepage).', 'santella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage column 2', 'santella' ),
		'id'            => 'home-flex-2',
		'description'   => esc_html__( 'Add widgets here for the second column in the flexible widgets area (homepage).', 'santella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage column 3', 'santella' ),
		'id'            => 'home-flex-3',
		'description'   => esc_html__( 'Add widgets here for the third column in the flexible widgets area (homepage)', 'santella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

  // Adding homepage after content widget area
  register_sidebar( array(
  'id' => 'home-after-flex',
  'name' => esc_html__( 'After columns (homepage)', 'santella' ),
  'description' => esc_html__( 'Use this area to add widgets after the columns on the homepage.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );

  // Adding widgets area before the content (homepage)
  register_sidebar( array(
  'id' => 'home-before-content',
  'name' => esc_html__( 'Before content (homepage)', 'santella' ),
  'description' => esc_html__( 'Use this area to add widgets before the content on the homepage.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );

  // Adding widgets area after the content (homepage)
  register_sidebar( array(
  'id' => 'home-after-content',
  'name' => esc_html__( 'After content (homepage)', 'santella' ),
  'description' => esc_html__( 'Use this area to add widgets after the content on the homepage.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );

  // Adding widgets area before the content (single post pages)
  register_sidebar( array(
  'id' => 'before-content',
  'name' => esc_html__( 'Before content (single post pages)', 'santella' ),
  'description' => esc_html__( 'Use this area to add widgets before the content on the single post pages.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );

  // Adding widgets area after the content (single post pages)
  register_sidebar( array(
  'id' => 'after-content',
  'name' => esc_html__( 'After content (single post pages)', 'santella' ),
  'description' => esc_html__( 'Use this area to add widgets after the content on the single post pages.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );

  // Adding footer widget area
  register_sidebar( array(
  'id' => 'bfd-footer',
  'name' => esc_html__( 'Footer', 'santella' ),
  'description' => esc_html__( 'Use this area to add widgets to the footer.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );

  // Adding footer columns widget areas
  register_sidebar( array(
  	'name'          => esc_html__( 'Footer column 1', 'santella' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here for the first column from the footer columns.', 'santella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer column 2', 'santella' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here for the second column from the footer columns.', 'santella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer column 3', 'santella' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here for the third column from the footer columns', 'santella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	// Adding Instagram page widget area
  register_sidebar( array(
  'id' => 'insta-widgets',
  'name' => esc_html__( 'Instagram Page Widgets', 'santella' ),
  'description' => esc_html__( 'Use this area to add widgets to the Instagram page template.', 'santella' ),
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
  ) );

}
add_action('widgets_init', 'santella_widget_areas');

// Update stylesheet.
add_filter( 'stylesheet_uri', 'child_stylesheet_uri' );
function child_stylesheet_uri( $stylesheet_uri ) {
    return add_query_arg( 'v', filemtime( get_stylesheet_directory() . '/style.css' ), $stylesheet_uri );
}
