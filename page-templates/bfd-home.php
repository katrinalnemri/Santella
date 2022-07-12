<?php
/**
* Template Name: Home
*
* @package santella
* @since santella 1.0
*/

if ( !is_paged() ) {
$sidebar_home_visibility = get_theme_mod('santella_sidebar_home_visibility', false);

if($sidebar_home_visibility === true){
function bl_body_classes($wp_classes,$extra_classes){
		$blacklist = array( 'sidebar-content','content-sidebar');
	    $classes[] = 'full-width-content';
		$wp_classes = array_diff( $wp_classes, $blacklist );
		return array_merge( $wp_classes, (array) $extra_classes, $classes );
			}
add_filter( 'body_class', 'bl_body_classes', 10, 2 );
}	
}
   
get_header(); ?>
    <div id="primary" class="site-main">
  <?php 
	if ( !is_paged() ) {
		
		?>
    <div class="home-container">

<?php
if ( is_active_sidebar( 'home-before-flex' ) ) : ?>
<div class="bfd-home-before">
<?php dynamic_sidebar( 'home-before-flex' ); ?>
</div>
<?php endif;

if ( is_active_sidebar( 'home-flex-1' ) || is_active_sidebar( 'home-flex-2' ) || is_active_sidebar( 'home-flex-3' ) ) : ?>
	<div class="flexible-home-widgets">
    <div class="flexible-home-widgets-inner">
		<?php if ( is_active_sidebar( 'home-flex-1' ) ) : ?>
			<div class="home-flex-area">
				<?php dynamic_sidebar( 'home-flex-1' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'home-flex-2' ) ) : ?>
			<div class="home-flex-area">
				<?php dynamic_sidebar( 'home-flex-2' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'home-flex-3' ) ) : ?>
			<div class="home-flex-area">
				<?php dynamic_sidebar( 'home-flex-3' ); ?>
			</div>
		<?php endif; ?>
  </div>
	</div><!-- .footer-widgets -->
<?php endif;

if ( is_active_sidebar( 'home-after-flex' ) ) : ?>
<div class="bfd-home-after">
      <?php dynamic_sidebar( 'home-after-flex' ); ?>
    </div>
<?php endif; ?>

<div id="main-area" class="content-area">

<div class="main-outer">
  <?php if ( is_active_sidebar( 'home-before-content' ) ) : ?>
    <div class="home-before-content">
      <?php dynamic_sidebar( 'home-before-content' ); ?>
    </div>
  <?php endif;

		$home_blog_layout = get_theme_mod('santella_home_posts_layout','grid');
		if($home_blog_layout === 'grid'){
			santella_blog_grid(); 
		}
		if($home_blog_layout === 'regular'){
			santella_blog_regular(); 
		}
		if($home_blog_layout === 'thumbnails'){
			santella_blog_thumbs(); 
		}
	
	?>

<?php if ( is_active_sidebar( 'home-after-content' ) ) : ?>
  <div class="home-after-content">
    <?php dynamic_sidebar( 'home-after-content' ); ?>
  </div>
<?php endif; ?>
</div>
	 <?php
if($sidebar_home_visibility === true){}else{	
 get_sidebar();
}
	?>

</div>

    </div>
<?php }

else{
  get_template_part('page-templates/blog');
}

?>
    </div><!-- #primary -->
    <?php get_footer(); ?>
