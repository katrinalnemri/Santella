<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package santella
 */

function bl_body_classes($wp_classes,$extra_classes){
		$blacklist = array( 'sidebar-content','content-sidebar');
		$wp_classes = array_diff( $wp_classes, $blacklist );
	$classes[] = 'full-width-content';
		return array_merge( $wp_classes, (array) $extra_classes,$classes);
			}
add_filter( 'body_class', 'bl_body_classes', 10, 2 );
	

 get_header();
?>

	<main id="primary" class="site-main">

<div id="main-area" class="content-area">

			<header class="page-header">
				<h1 class="page-title"><?php 
					if($wp_query->found_posts === 0){
						/* translators: %s: search query. */
						_e( 'Nothing found for', 'santella' ); ?> : <b><?php the_search_query(); ?> </b> 
					<?php }else if($wp_query->found_posts === 1){
						/* translators: %s: search query. */
						_e( '1 result for', 'santella' ); ?> : <b><?php the_search_query(); ?> </b>
				<?php	}else{
					echo $wp_query->found_posts; 
							/* translators: %s: search query. */
					 _e( ' results for', 'santella' ); ?> : <b><?php the_search_query(); ?> </b>
				<?php	} ?>
					
				</h1>
			</header><!-- .page-header -->
<div class="main-outer">
			<?php	
 if ( have_posts() ) : 
	if ( get_query_var('paged') ) { 
		$paged = get_query_var('paged'); 
	} else if ( get_query_var('page') ) {
		$paged = get_query_var('page'); 
	} else {
		$paged = 1; 
	}

	$args = array(
		'post_type'   => 'post',
		'post_status' => 'publish',
		'paged'       => $paged,
		'orderby'     => 'post_date',
		'order'       => 'DESC',
	);
	
	echo '<div class="blog-container thumbs">';
	while ( have_posts() ) :
	the_post();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
			if ( has_post_thumbnail() ) :
				echo '<div class="post-thumbnail"><a href="'. get_the_permalink() .'">';
						echo the_post_thumbnail(get_theme_mod( 'santella_thumbs_layout_img_size', 'square' ) ) ;
					echo '</a></div>';
				endif;
		echo '<div class="post-info">';
    echo '<header class="entry-header">';
	echo '<p class="entry-meta">';
	echo santella_posted_on();
	echo '</p>';
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    echo '</header>';
			echo '</div>'; ?>
	</article>
<?php	endwhile;
	echo '</div>';
santella_pagination();
else :
get_template_part( 'template-parts/content', 'none' );
	
	endif; ?>
	</div>

		</div>
	</main><!-- #main -->

<?php
get_footer(); 
