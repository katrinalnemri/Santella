<?php
/**
 * Theme footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package santella
 */

if ( is_active_sidebar( 'bfd-footer' ) ) : ?>
  <div class="footer-outer">
<?php dynamic_sidebar( 'bfd-footer' ); ?>
</div>
<?php endif;

if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
	<div class="footer-columns">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-col">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div class="footer-col">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			<div class="footer-col">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
		<?php endif; ?>
	</div><!-- .footer-widgets -->
<?php endif; ?>

 <footer id="colophon" class="site-footer">
   <div class="site-info">

     <span><a href="<?php echo get_home_url() ?>"> <?php bloginfo() ?></a> &copy;  <?php  echo date("Y") ?>. All rights reserved! </span>
       <span><?php
       /* translators: 1: Theme name, 2: Theme author. */
       printf( esc_html__( 'Design by %2$s.', 'santella' ), 'santella', '<a href="https://www.fourcones.com">4cones</a>.' );
       ?></span>
   </div><!-- .site-info -->
 </footer><!-- #colophon -->

</div><!-- #page -->
<a class="back-to-top" href="#"><i class="fas fa-angle-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>
