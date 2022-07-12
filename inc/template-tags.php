<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blog_flair_design
 */

if ( ! function_exists( 'santella_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function santella_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>'; // add 'updated' after 'published' if the lines below are not commented.
		//if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			//$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		//}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			//esc_attr( get_the_modified_date( DATE_W3C ) ),
			//esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'santella' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'santella_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function santella_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'santella' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'santella_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function santella_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'santella' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in: %1$s', 'santella' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'santella' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged in: %1$s', 'santella' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			echo do_shortcode('[share_buttons]');
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'santella' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'santella' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/** 
 * Create numeric pagination in WordPress
 */
 function santella_pagination(){
	 $post_pagination_style = get_theme_mod('santella_nav_style', 'numeric');
	 $prev_btn_nav_txt = get_theme_mod('santella_prev_btn_nav_txt', '&lt; less');
	 $next_btn_nav_txt = get_theme_mod('santella_next_btn_nav_txt', 'more &gt;');
	 
// Get total number of pages
if($post_pagination_style === 'numeric'): ?>
<nav class="navigation posts-navigation numeric">
<?php global $wp_query,$paged;
$total = $wp_query->max_num_pages;
// Only paginate if we have more than one page
if ( $total > 1)  {
     // Structure of "format" depends on whether we’re using pretty permalinks
    $format = empty( get_option('permalink_structure') ) ? '?paged=%#%' : 'page/%#%/';

     echo paginate_links(array(
          'base' => get_pagenum_link(1) . '%_%',
          'format' => $format,
          'current' => $paged,
          'total' => $total,
          'mid_size' => 4,
          'type' => 'list',
		 'prev_text' => __($prev_btn_nav_txt),
		 'next_text' => __($next_btn_nav_txt),
     ));
} ?>
</nav>
	 <?php endif;
	 
if($post_pagination_style === 'buttons'): ?>
<nav class="navigation posts-navigation buttons">	
	<?php
	 global $wp_query, $paged;
	echo previous_posts_link($prev_btn_nav_txt);
    echo next_posts_link($next_btn_nav_txt, $wp_query->max_num_pages);
	 ?>
</nav>
<?php endif;
	 
 }
								 
if ( ! function_exists( 'santella_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function santella_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
