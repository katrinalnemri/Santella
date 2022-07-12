<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package santella
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */


remove_action( 'wp_footer', 'woocommerce_demo_store' );

function my_hide_notice() {
  if( function_exists('is_woocommerce') ) {
    remove_action( 'wp_head', 'woocommerce_demo_store' );
    if( is_woocommerce() || is_cart() || is_checkout() ) { 
      add_action( 'wp_head', 'woocommerce_demo_store' ); 
    } 
  } 
} 
add_action( 'wp', 'my_hide_notice' );



 function santella_woocommerce_setup() { 
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 600,
			'single_image_width'    => 655,
			'product_grid'          => array(
				'default_rows'    => 4,
				'min_rows'        => 1,
				'max_rows' => 6,
				'min_columns'     => 1,
				'max_columns'     => 6,
		)
	)
		);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'santella_woocommerce_setup' );

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 150,
        'height' => 150,
        'crop' => 1,
    );
} );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function santella_woocommerce_scripts() {
	wp_enqueue_style( 'santella-woocommerce-style', get_template_directory_uri() . '/WooCommerce/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'santella-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'santella_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */

 add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag and hide sidebar on request.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function santella_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';
	if(is_woocommerce()){
			$sidebar_woo_visibility = get_theme_mod('santella_sidebar_woo_visibility', true);
		 if ($sidebar_woo_visibility === true){
			 $classes[] = 'full-width-content';
	}
	}
	return $classes;
}
add_filter( 'body_class', 'santella_woocommerce_active_body_class' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'santella_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function santella_woocommerce_wrapper_before() {
		?>
<div id="main-area" class="content-area">
			<div class="main-outer">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'santella_woocommerce_wrapper_before' );	

if ( ! function_exists( 'santella_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function santella_woocommerce_wrapper_after() {
		?>
	</div>
	<?php 
		$sidebar_woo_visibility = get_theme_mod('santella_sidebar_woo_visibility', true);
		 if($sidebar_woo_visibility === true ){}else{
		get_sidebar();
		 }	

	?>
			</div><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'santella_woocommerce_wrapper_after' );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
