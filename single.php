<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package santella
 */
	
	$sidebar_post_visibility = get_theme_mod('santella_sidebar_post_visibility', false);
if ($sidebar_post_visibility === true){
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
	 if ( is_active_sidebar( 'before-content' ) ) : ?>
 <div class="before-content-outer">
       <?php dynamic_sidebar( 'before-content' ); ?>
     </div>
 <?php endif;
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
	echo santella_related_posts();
    echo santella_post_pager();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
	
	if ( is_active_sidebar( 'after-content' ) ) : ?>
<div class="after-content-outer">
			<?php dynamic_sidebar( 'after-content' ); ?>
		</div>
<?php endif;
		?>

	</div>
	 <?php 
	if ($sidebar_post_visibility === true){}else{
	get_sidebar(); 
	}
	?>
	</div>

<?php
get_footer();
