<?php
/**
 *
 * This file adds the landing page template to the Theme.
 *
 * Template Name: Landing
 *
 */
function bl_body_classes($wp_classes,$extra_classes){
		$blacklist = array( 'sidebar-content','content-sidebar');
		$wp_classes = array_diff( $wp_classes, $blacklist );
	    $classes[]='full-width-content';
		return array_merge( $wp_classes, (array) $extra_classes,$classes );
}
add_filter( 'body_class', 'bl_body_classes', 10, 2 );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js' type='text/javascript'></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
	<?php wp_head(); ?>
</head>
<body <?php body_class('no-js'); ?> id="site-container">
<?php wp_body_open(); ?>
<div id="page" class="site">

<div class='content-area'>

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
	</div>
	</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>