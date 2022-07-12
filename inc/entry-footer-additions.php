<?php

//POST PAGER
add_action('genesis_after_entry', 'santella_post_pager', 10 );
/**
 * @author    Brad Dalton
 * @link   http://wpsites.net/web-design/add-featured-images-to-previous-next-post-nav-links/
 */

//RELATED POSTS
function santella_related_posts($args = array()) {
$related_posts_visibility = get_theme_mod ('santella_related_posts_visibility', 'true');
$related_posts_title_visibility = get_theme_mod ('santella_related_posts_title_visibility', 'true');
$related_posts_heading_text = get_theme_mod ('santella_related_posts_heading_text', 'Similar Posts');
$related_posts_number = get_theme_mod ('santella_related_posts_number', 4);

	if($related_posts_number %3 === 0 && $related_posts_number %5 !== 0){
		$related_posts_style = 'three';
	}else if($related_posts_number == 2){
		$related_posts_style = 'two';
	}else if($related_posts_number %5 === 0){
		$related_posts_style = 'five';
	}else{
		$related_posts_style = '';
	}
   if ( is_singular('post') ) {
if ( $related_posts_visibility == 'true' ){
	?>
        <div class="related-posts <?php echo $related_posts_style ?>">
            <h4 class="widget-title">
			<?php echo $related_posts_heading_text ?></h4><?php

            global $post;
            // Default args
            $args = wp_parse_args($args, array(
                'post_id'         => !empty($post) ? $post->ID : '', // Exclude current post
                'taxonomy'         => 'category', // Show posts by category
                'limit'             => $related_posts_number, // How many items to display
                'post_type'         => !empty($post) ? $post->post_type : 'post',
                'orderby'         => 'rand', // Randomize the results
                'order'             => 'DESC'
            ));
            // Check taxonomy
            if (!taxonomy_exists($args['taxonomy'])) {
                return;
            }
            // Post taxonomies
            $taxonomies = wp_get_post_terms($args['post_id'], $args['taxonomy'], array('fields' => 'ids'));
            if (empty($taxonomies)) {
                return;
            }
            // Custom post query
            $related_posts = get_posts(array(
                'post__not_in' => (array) $args['post_id'],
                'post_type' => $args['post_type'],
                'tax_query' => array(
                    array(
                        'taxonomy' => $args['taxonomy'],
                        'field' => 'term_id',
                        'terms' => $taxonomies
                    ),
                ),
                'posts_per_page' => $args['limit'],
                'orderby' => $args['orderby'],
                'order' => $args['order']
            ));

            // Layout the loop
            if (!empty($related_posts)) { ?>
                <div class="related-posts-wrap">
                    <ul class="related-posts-list">
                        <?php
                        foreach ($related_posts as $post) {
                            setup_postdata($post);
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php
							if (has_post_thumbnail()) { ?>
                                <div class="thumb">
                                    <?php echo get_the_post_thumbnail(null, get_theme_mod( 'santella_related_posts_img_size', 'portrait' ), array('alt' => the_title_attribute(array('echo' => false)))); ?>
                                </div>
                                <?php }					?> </a> <?php
								if ( $related_posts_title_visibility == 'true' ){ ?>
							<a href="<?php the_permalink(); ?>"><p class="title"><?php the_title(); ?></p></a>
								<?php } else {} ?>

                        </li>
                        <?php } ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            <?php
            }
            wp_reset_postdata();
        ?></div><?php
} else {}
    }
}

//SHARE BUTTONS
function santella_share_buttons($content) {
	global $post;
	if(is_singular()){

		// Get current page URL
		$bfdshareURL = urlencode(get_permalink());

		// Get current page title
		$bfdshareTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');

		// Get Post Thumbnail for pinterest
		$bfdshareThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$bfdshareTitle.'&amp;url='.$bfdshareURL;
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$bfdshareURL;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$bfdshareURL.'&amp;media='.$bfdshareThumbnail[0].'&amp;description='.$bfdshareTitle;

		// Add sharing button at the end of page/page content
		$content .= '<span class="bfd-post-share">Share: ';
		$content .= '<a href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
		$content .= '<a href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
		$content .= '<a href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><i class="fab fa-pinterest-p"></i></a>';
		$content .= '</span>';
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
}

add_shortcode( 'share_buttons', 'santella_share_buttons');

//POST PAGER
function santella_post_pager() {
$post_pager_prev_text = get_theme_mod('santella_post_pager_next_txt', 'Next post');
$post_pager_next_text = get_theme_mod('santella_post_pager_prev_txt', 'Previous post');
$post_pager_visibility = get_theme_mod ('santella_post_pager_visibility', 'true');
$post_pager_title_visibility = get_theme_mod ('santella_post_pager_title_visibility', 'true');
$post_pager_img_visibility = get_theme_mod ('santella_post_pager_img_visibility', 'true');
if( !is_singular('post') ) 
      return;
	if ( $post_pager_visibility == 'true' ){
echo'<div class="post-pager">';

	if( $next_post = get_next_post() ): 
echo'<div class="single-post-nav next-post-link">';
		$nextpost = get_the_post_thumbnail( $next_post->ID, get_theme_mod( 'santella_post_pager_img_size', 'square' ), array('class' => 'pagination-next'));
	if ( $post_pager_img_visibility == 'true' ){ 
	echo '<div class="post-pager-img">';
	next_post_link( '%link', "$nextpost");
	echo '</div>';
	} else {}
	if ( $post_pager_img_visibility == 'true' ){
	echo '<div class="post-pager-info with-img">';
	}else{
	echo '<div class="post-pager-info">';
	}
	echo '<span>' . $post_pager_next_text . '</span>';
	if ( $post_pager_title_visibility == 'true' ){
	echo '<p>';
	next_post_link('%link', '%title');
	echo '</p>';
	} else {}
	echo'</div>';
echo'</div>';
endif; 
	
if( $prev_post = get_previous_post() ): 
echo'<div class="single-post-nav previous-post-link">';
	if ( $post_pager_img_visibility == 'true' ){
	echo '<div class="post-pager-info with-img">';
	}else{
	echo '<div class="post-pager-info">';
	}
	echo '<span>' . $post_pager_prev_text . '</span>';
	if ( $post_pager_title_visibility == 'true' ){
	echo '<p>';
	previous_post_link('%link', '%title');
	echo '</p>';
	} else {}
	echo'</div>';
		 $prevpost = get_the_post_thumbnail( $prev_post->ID, get_theme_mod( 'santella_post_pager_img_size', 'square' ), array('class' => 'pagination-previous'));
	if ( $post_pager_img_visibility == 'true' ){	
	echo '<div class="post-pager-img">';
	previous_post_link( '%link', "$prevpost");
	echo '</div>';
	} else {}
echo'</div>';
endif; 
	
	echo'</div>';
	} else {}
} 
