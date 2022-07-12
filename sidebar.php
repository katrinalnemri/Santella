<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package santella
 */
 $body_css_classes = get_body_class();

if ( ! is_active_sidebar( 'sidebar-1' ) || in_array( 'full-width-content', $body_css_classes ) ) {
	return;
} if ( is_active_sidebar( 'sidebar-1' )){
?>
<div class="sidebar-outer">
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
</div>
<?php }