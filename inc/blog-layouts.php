<?php

//GRID LAYOUT
// Blog loop.

function santella_blog_grid() {
	// The excerpt length
	function santella_blog_grid_excerpt_length( $length ) {
	return get_theme_mod( 'santella_grid_layout_excerpt_length', 20 );
	}
	add_filter( 'excerpt_length', 'santella_blog_grid_excerpt_length', 999 );
	global $wp_query,$paged;
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

	$wp_query = new WP_Query( $args );	
	if ( $wp_query->have_posts() ) :		
	$blog_grid_post_excerpt_visibility = get_theme_mod( 'santella_grid_layout_excerpt_visibility', 'true');
	$blog_grid_post_button = get_theme_mod('santella_grid_layout_btn_visibility', 'true');
	$blog_grid_post_button_text = get_theme_mod('santella_grid_layout_btn_text', 'read more');
	echo '<div class="blog-container grid">';
	$post_count = 1;
	while ( $wp_query->have_posts() ) :
	$wp_query->the_post();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
if ( $post_count == 1 ) :
	if ( has_post_thumbnail() ) :
		echo '<div class="post-thumbnail"><a href="'. get_the_permalink() .'">';
				echo the_post_thumbnail(get_theme_mod( 'santella_grid_layout_first_img_size', 'full' ) ) ;
			echo '</a></div>';
	endif;
	else:
			if ( has_post_thumbnail() ) :
				echo '<div class="post-thumbnail"><a href="'. get_the_permalink() .'">';
						echo the_post_thumbnail(get_theme_mod( 'santella_grid_layout_img_size', 'portrait' ) ) ;
					echo '</a></div>';
				endif;
		endif;
		echo '<div class="post-info">';
    echo '<header class="entry-header">';
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		echo '<p class="entry-meta">';
	echo santella_posted_on();
	echo '</p>';
    echo '</header>';
		if ( $blog_grid_post_excerpt_visibility == 'false' ) {};
		if ( $blog_grid_post_excerpt_visibility == 'true' ) {
			echo '<div class="post-snippet">';
			echo get_the_excerpt();
			echo '</div>';
		}
		if ( $blog_grid_post_button == 'false' ) {} ;
		if ( $blog_grid_post_button == 'true' ) {
			echo '<span class="post-button"><a class="button" href="'. get_the_permalink() .'">';
			echo $blog_grid_post_button_text;
			echo '</a></span>';
		}
			echo '</div>';
	echo '</article>';
	$post_count++;
	endwhile;
	echo '</div>';
santella_pagination();
else :
get_template_part( 'template-parts/content', 'none' );
	wp_reset_query();
	endif;
}

//REGULAR LAYOUT
// Blog loop.

function santella_blog_regular() {
	// The excerpt length
	function santella_blog_regular_excerpt_length( $length ) {
	return get_theme_mod( 'santella_regular_layout_excerpt_length', 20 );
	}
	add_filter( 'excerpt_length', 'santella_blog_regular_excerpt_length', 999 );
	global $wp_query,$paged;
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

	$wp_query = new WP_Query( $args );	
	if ( $wp_query->have_posts() ) :
	$blog_regular_image_position = get_theme_mod( 'santella_regular_layout_image_position', 'below');
	$blog_regular_post_excerpt_visibility = get_theme_mod( 'santella_regular_layout_excerpt_visibility', 'true');
	$blog_regular_post_button = get_theme_mod('santella_regular_layout_btn_visibility', 'true');
	$blog_regular_post_button_text = get_theme_mod('santella_regular_layout_btn_text', 'read more');
	echo '<div class="blog-container regular">';
	$post_count = 1;
	while ( $wp_query->have_posts() ) :
	$wp_query->the_post();
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	if($blog_regular_image_position === "below"){
    echo '<header class="entry-header above">';
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		echo '<p class="entry-meta">';
	echo santella_posted_on();
	echo '</p>';
    echo '</header>';
		}else{}
			if ( has_post_thumbnail() ) :
				echo '<div class="post-thumbnail"><a href="'. get_the_permalink() .'">';
						echo the_post_thumbnail(get_theme_mod( 'santella_regular_layout_img_size', 'original' ) ) ;
					echo '</a></div>';
				endif;
		echo '<div class="post-info">';
if($blog_regular_image_position === "above"){
    echo '<header class="entry-header below">';
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		echo '<p class="entry-meta">';
	echo santella_posted_on();
	echo '</p>';
    echo '</header>';
		}else{}
		if ( $blog_regular_post_excerpt_visibility == 'false' ) {};
		if ( $blog_regular_post_excerpt_visibility == 'true' ) {
			echo '<div class="post-snippet">';
			echo get_the_excerpt();
			echo '</div>';
		}
		if ( $blog_regular_post_button == 'false' ) {} ;
		if ( $blog_regular_post_button == 'true' ) {
			echo '<span class="post-button"><a class="button" href="'. get_the_permalink() .'">';
			echo $blog_regular_post_button_text;
			echo '</a></span>';
		}
			echo '</div>';
	echo '</article>';
	endwhile;
	echo '</div>';
santella_pagination();
else :
get_template_part( 'template-parts/content', 'none' );
	wp_reset_query();
	endif;
}

//THUMBS LAYOUT
// Blog loop.

function santella_blog_thumbs() {
	global $wp_query,$paged;
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

	$wp_query = new WP_Query( $args );	
	if ( $wp_query->have_posts() ) :
	echo '<div class="blog-container thumbs">';
	while ( $wp_query->have_posts() ) :
	$wp_query->the_post();
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
			echo '</div>';
	echo '</article>';
	endwhile;
	echo '</div>';
santella_pagination();
else :
get_template_part( 'template-parts/content', 'none' );
	wp_reset_query();
	endif;
}
