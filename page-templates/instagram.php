<?php
/**
 *
 * This file adds the Instagram page template to the Theme.
 *
 * Template Name: Instagram
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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name='description' content="<?php bloginfo( 'description' ); ?>">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script src='//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js' type='text/javascript'></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class('no-js'); ?> id="site-container">
<?php wp_body_open(); ?>
<div id="page" class="site">
		<div class="header-inner">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$santella_description = get_bloginfo( 'description', 'display' );
			if ( $santella_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $santella_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif;?>
		</div>

<div class='content-area'>
<?php if ( is_active_sidebar( 'insta-widgets' ) ) : ?>
<div class="insta-page-widgets">
<?php dynamic_sidebar( 'insta-widgets' ); ?>
</div>
<?php endif; ?>
	</div>
	
</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>
