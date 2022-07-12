<?php
/**
* Template Name: Blog
*
* @package santella
* @since santella 1.0
*/	

get_header(); ?>
<div id="main-area" class="content-area">

<div class="main-outer">
<?php	
	$blog_layout = get_theme_mod('santella_blog_posts_layout','regular');
		if($blog_layout === 'grid'){
			santella_blog_grid(); 
		}
		if($blog_layout === 'regular'){
			santella_blog_regular(); 
		}
		if($blog_layout === 'thumbnails'){
			santella_blog_thumbs(); 
		}
?>
</div>
<?php 
	get_sidebar(); 
	?>
</div>
<?php
get_footer();