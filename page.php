<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package santella
 */

$sidebar_page_visibility = get_theme_mod('santella_sidebar_page_visibility', true);
 
if($sidebar_page_visibility === true){
function bl_body_classes($wp_classes,$extra_classes){
		$blacklist = array( 'sidebar-content','content-sidebar');
		$wp_classes = array_diff( $wp_classes, $blacklist );
	$classes[] = 'full-width-content';
		return array_merge( $wp_classes, (array) $extra_classes,$classes );
			}
add_filter( 'body_class', 'bl_body_classes', 10, 2 );
}

get_header();
?>
<div id="main-area" class="content-area">
<div class="main-outer">
<?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content', 'page' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>
</div>

 <?php 
	if($sidebar_page_visibility === true){}else{
	get_sidebar(); 
	}
	?>
</div>

<?php
get_footer();
