<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

function bl_body_classes($wp_classes,$extra_classes){
		$blacklist = array( 'sidebar-content','content-sidebar');
		$wp_classes = array_diff( $wp_classes, $blacklist );
	    $classes[]='full-width-content';
		return array_merge( $wp_classes, (array) $extra_classes,$classes );
}
add_filter( 'body_class', 'bl_body_classes', 10, 2 );

 get_header();
 ?>

 	<main id="primary" class="site-main">
	
 		<section class="error-404 not-found">
			<div id="main-area" class="content-area">
 			<header class="page-header">
 				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'santella' ); ?></h1>
 			</header><!-- .page-header -->
<div class="main-outer">
 			<div class="page-content">
 				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'santella' ); ?></p>

 					<?php
 					get_search_form();

 					the_widget( 'WP_Widget_Recent_Posts' );
 					?>

 			</div><!-- .page-content -->
			</div>
			</div>
 		</section><!-- .error-404 -->
		
 	</main><!-- #main -->

 <?php
 get_footer();
