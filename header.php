<?php
/**
 * Theme Header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package santella
 */

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class('no-js'); ?> id="site-container">
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'santella' ); ?></a>
    <header id="masthead" class="site-header">
<div class="header-outer">
				<div class="header-mobile-wrap">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span></span></button>
					<div class="search-icon"><i class="fa fa-search"></i></div>
	</div>
		
<?php if ( has_nav_menu( 'menu-1' ) ) { ?>
	<nav id="site-nav" class="primary-nav">		
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container'      => '',
					'fallback_cb' => false,
				)
			);
			?>
		</nav> <?php } ?>
<?php	if ( is_active_sidebar( 'nav-socials' ) ) : ?>
		<div class="nav-socials">
		<?php dynamic_sidebar( 'nav-socials' ); ?>
		</div>
	<?php endif; ?>
	</div>
</header>
<div class="header-inner">
			<?php
			the_custom_logo();
			$description_visibility = get_theme_mod('santella_description_visibility','true');
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
			if($description_visibility === 'true'){
			if ( $santella_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $santella_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif;
		}else{}?>
		</div>
<?php	if ( get_header_image_tag() ) : ?>
<div class="header-img">
		<?php the_header_image_tag(); ?>
	</div>
<?php endif;

	if ( has_nav_menu( 'menu-2' ) ) { ?>
<nav id="site-nav" class="secondary-nav">
  <?php
  wp_nav_menu(
    array(
      'theme_location' => 'menu-2',
      'menu_id'        => 'secondary-menu',
      'container'      => '',
      'fallback_cb' => false,
    )
  );
  ?>
</nav> <?php }
