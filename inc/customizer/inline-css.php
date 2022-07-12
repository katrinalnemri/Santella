<?php
/* ---------------------------------------------
 *  This file adds the customize inline css to the theme.
 * --------------------------------------------- */

 function santella_inline_css() { ?>

<style type="text/css" id="inline-css">
	.content-area,
	.flexible-home-widgets,
	.bfd-profile,
	.enews{
		width:calc(<?php echo get_theme_mod('santella_content_width', '1030'); ?>px - 30px);
	}
	.content-sidebar .main-outer,
	.sidebar-content .main-outer{
		width:calc(<?php echo get_theme_mod('santella_content_width', '1030'); ?>px - <?php echo get_theme_mod('santella_sidebar_width', '270'); ?>px - 80px);
	}
	.sidebar-outer{
		width:<?php echo get_theme_mod('santella_sidebar_width', '270'); ?>px;
	}
	.instagram-page .content-area,
	.landing-page .content-area{
		width:<?php echo get_theme_mod('santella_insta_width', '750'); ?>px;
	}
	@media only screen and (max-width:<?php echo get_theme_mod('santella_content_width', '1030'); ?>px){
		.content-area{
		max-width:90%;
	}
	}
	body {
		color: <?php echo get_theme_mod('santella_body_text_color', '#000000'); ?>;
		background: <?php echo get_theme_mod('santella_body_bg', '#ffffff'); ?>;
	}
	ul.child-cats li a{
		color: <?php echo get_theme_mod('santella_body_text_color', '#000000'); ?>;
	}
	.widget_recent_entries ul li a,
	.site-info a{
		color: <?php echo get_theme_mod('santella_body_text_color', '#000000'); ?>;
	}
	tbody{
		border-bottom-color:<?php echo get_theme_mod('santella_table_border_color', '#f3f3f3'); ?>;
	}
	td{
		border-right-color:<?php echo get_theme_mod('santella_table_border_color', '#f3f3f3'); ?>;
	}
	td:first-child{
		border-left-color:<?php echo get_theme_mod('santella_table_border_color', '#f3f3f3'); ?>;
	}
	tr{
		border-top-color:<?php echo get_theme_mod('santella_table_border_color', '#f3f3f3'); ?>;
	}
			.woocommerce table.shop_table{
			border-color:<?php echo get_theme_mod('santella_table_border_color', '#f3f3f3'); ?>;
		}
	@media screen and (max-width: 860px) {
	.woocommerce table.shop_table td{
		border-top-color:<?php echo get_theme_mod('santella_table_border_color', '#f3f3f3'); ?>;
	}
	}
	a{
		color: <?php echo get_theme_mod('santella_body_links_color', '#b2b2f3'); ?>;
	}
	a:hover {
		color: <?php echo get_theme_mod('santella_body_links_color_hover', '#000000'); ?>;
	}
	.widget-title{
		color: <?php echo get_theme_mod('santella_widget_title_color', '#000000'); ?>;
	}
	a.back-to-top{
		color: <?php echo get_theme_mod('santella_btt_color', '#000000'); ?>;
	}
	a.back-to-top:hover{
		color: <?php echo get_theme_mod('santella_btt_color_hover', '#b2b2f3'); ?>;
	}
	::-webkit-scrollbar-thumb,
	::-webkit-scrollbar-thumb:window-inactive{
		background-color:<?php echo get_theme_mod('santella_scrollbar_thumb_color', '#dddddd'); ?>;
	}
	::-webkit-scrollbar-track{
		background-color:<?php echo get_theme_mod('santella_scrollbar_bg_color', '#f7f7f7'); ?>;
	}
	::selection{
		color:<?php echo get_theme_mod('santella_selection_color', '#000000'); ?>;
		background-color:<?php echo get_theme_mod('santella_selection_bg', '#eeeeee'); ?>;
	}
	input, 
    select, 
    textarea{
		border-color:<?php echo get_theme_mod('santella_fields_border','#f3f3f3');?>;
		background:<?php echo get_theme_mod('santella_fields_bg','transparent');?>;
		color:<?php echo get_theme_mod('santella_fields_color','#000000');?>;
	}
	button, 
    input[type="button"], 
    input[type="reset"], 
    input[type="submit"], 
    .site-container div.wpforms-container-full .wpforms-form input[type="submit"], 
    .site-container div.wpforms-container-full .wpforms-form button[type="submit"], 
    .button, 
    .site-container .wp-block-button .wp-block-button__link, 
    .entry-content .wp-block-button .wp-block-button__link,
	.wp-block-post-excerpt__more-link{
		color:<?php echo get_theme_mod('santella_buttons_color','#000000');?>;
		background:<?php echo get_theme_mod('santella_buttons_bg','#f3f3f3');?>;
	}
	button:hover, 
    input[type="button"]:hover, 
    input[type="reset"]:hover, 
    input[type="submit"]:hover, 
    .site-container div.wpforms-container-full .wpforms-form input[type="submit"]:hover, 
    .site-container div.wpforms-container-full .wpforms-form button[type="submit"]:hover, 
    .button:hover, 
    .site-container .wp-block-button .wp-block-button__link:hover, 
    .entry-content .wp-block-button .wp-block-button__link:hover,
	.wp-block-post-excerpt__more-link:hover{
		color:<?php echo get_theme_mod('santella_buttons_color_hover','#000000');?>;
		background:<?php echo get_theme_mod('santella_buttons_bg_hover','#f3f3f3');?>;
	}
	.wp-block-quote:before{
		background:<?php echo get_theme_mod('santella_blockquote_border','#f3f3f3');?>;
	}
	.site-header{
		background:<?php echo get_theme_mod('santella_header_bg','#ffffff');?>;
	}
	.site-title a,
	.site-title a:hover{
		color:<?php echo get_theme_mod('santella_header_color','#000000');?>;
	}
	.site-description{
		color:<?php echo get_theme_mod('santella_description_color','#000000');?>;
	}
	.primary-nav a,
	.primary-nav li{
		color:<?php echo get_theme_mod('santella_primary_nav_links_color','#000000');?>;
	}
	.menu-toggle span::before,
	.menu-toggle span::after,
	.menu-toggle span{
		background:<?php echo get_theme_mod('santella_primary_nav_links_color','#000000');?>;
	}
	.primary-nav a:hover{
		color:<?php echo get_theme_mod('santella_primary_nav_links_color_hover','#000000');?>;
	}
	.primary-nav .sub-menu{
		background:<?php echo get_theme_mod('santella_primary_nav_drop_down_bg','#f3f3f3');?>;
	}
	.primary-nav .sub-menu li,
	.primary-nav .sub-menu a{
		color:<?php echo get_theme_mod('santella_primary_nav_drop_down_links','#000000');?>;
	}
	.primary-nav .sub-menu a:hover{
		color:<?php echo get_theme_mod('santella_primary_nav_drop_down_links_hover','#000000');?>;
	}
	.secondary-nav{
		border-top-color:<?php echo get_theme_mod('santella_secondary_nav_border','#f7f7f7');?>;
		border-bottom-color:<?php echo get_theme_mod('santella_secondary_nav_border','#f7f7f7');?>;
		background:<?php echo get_theme_mod('santella_secondary_nav_bg','#ffffff');?>;
	}
	.secondary-nav a{
		color:<?php echo get_theme_mod('santella_secondary_nav_links_color','#000000');?>;
	}
	.secondary-nav a:hover{
		color:<?php echo get_theme_mod('santella_secondary_nav_links_color_hover','#000000');?>;
	}
	.secondary-nav .sub-menu{
		background:<?php echo get_theme_mod('santella_secondary_nav_drop_down_bg','#f3f3f3');?>;
	}
	.secondary-nav .sub-menu li,
	.secondary-nav .sub-menu a{
		color:<?php echo get_theme_mod('santella_secondary_nav_drop_down_links','#000000');?>;
	}
	.secondary-nav .sub-menu a:hover{
		color:<?php echo get_theme_mod('santella_secondary_nav_drop_down_links_hover','#000000');?>;
	}
	.header-outer .socialicons a,
	.header-outer .search-icon{
		color:<?php echo get_theme_mod('santella_primary_nav_social_icons_color','#000000');?>;
	}
	.header-outer .socialicons a:hover,
	.header-outer .search-icon:hover{
		color:<?php echo get_theme_mod('santella_primary_nav_social_icons_color_hover','#000000');?>;
	}
	.header-outer .search-icon{
		border-left-color:<?php echo get_theme_mod('santella_primary_nav_search_icon_border','#f3f3f3');?>;
	}
	.nav-socials .search-popup-outer:after{
		background:<?php echo get_theme_mod('santella_primary_nav_search_bg','#000000');?>;
	}
	.nav-socials .search-form{
		border-bottom-color:<?php echo get_theme_mod('santella_primary_nav_search_form_border','#ffffff');?>;
	}
	.nav-socials .search-form input[type="text"]{
		color:<?php echo get_theme_mod ('santella_primary_nav_search_form_color','#ffffff');?>;
	}
	.nav-socials .search-close{
		color:<?php echo get_theme_mod ('santella_primary_nav_search_form_close','#ffffff');?>;
	}
	
	@media screen and (max-width: 1030px) {
	.header-mobile-wrap{
	background:<?php echo get_theme_mod('santella_header_bg','#ffffff');?>;
	}
	}
	
	.slider-wrapper.slider-style-2 .slick-slide li:after,
	.slider-wrapper.slider-style-1 .slide-details:after{
		background:<?php echo get_theme_mod('santella_slider_slide_bg','#ffffff');?>;
	}
	.slide-title a,
	.slide-title a:hover,
	.slide-title a:focus{
		color:<?php echo get_theme_mod('santella_slider_title','#000000');?>;
	}
	.slide-snippet{
		color:<?php echo get_theme_mod('santella_slider_snippet','#000000');?>;
	}
	p.slide-date{
		color:<?php echo get_theme_mod('santella_slider_date','#000000');?>;
	}
	.slide-more a{
		color:<?php echo get_theme_mod('santella_slider_btn','#000000');?>;
		background:<?php echo get_theme_mod('santella_slider_btn_bg','#f3f3f3');?>;
	}
	.slide-more a:hover{
		color:<?php echo get_theme_mod('santella_slider_btn_hover','#000000');?>;
		background:<?php echo get_theme_mod('santella_slider_btn_bg_hover','#f3f3f3');?>;
	}
	.prev-slide, 
	.next-slide{
		color:<?php echo get_theme_mod('santella_slider_arrows','#000000');?>;
		background:<?php echo get_theme_mod('santella_slider_arrows_bg','#ffffff');?>;
	}
	.slick-dots li button:before,
	.slick-dots li.slick-active button:before{
		color:<?php echo get_theme_mod('santella_slider_dots','#000000');?>;
	}
	.flexible-home-widgets-inner:after{
		background:<?php echo get_theme_mod('santella_home_cols_bg','#f3f3f3');?>;
	}
	.home-flex-area .bfd-image .widget-title{
		color:<?php echo get_theme_mod('santella_home_cols_img_color','#000000');?>;
		text-shadow: 2px 2px <?php echo get_theme_mod('santella_home_cols_img_text_shadow','#ffffff');?>;
	}
	.footer-columns,
	.site-footer{
		background:<?php echo get_theme_mod('santella_footer_cols_bg','#f3f3f3');?>;
	}
	.site-footer:before{
		background:<?php echo get_theme_mod('santella_footer_cols_border','#ffffff');?>;
	}
	.bfd-profile .custom-img a:after{
		background:<?php echo get_theme_mod('santella_profile_widget_img_overlay','#ffffff');?>;
	}
	.bfd-profile .custom-img{
		background:<?php echo get_theme_mod('santella_profile_widget_img_bg','#f3f3f3');?>;
	}
	.bfd-profile .img-details:after{
		background:<?php echo get_theme_mod('santella_profile_widget_content_bg','#fefbff');?>;
	}
	.bfd-profile .custom-img a{
		border-color:<?php echo get_theme_mod('santella_profile_widget_img_border','#ffffff');?>;
	}
	.bfd-profile .img-details .widget-heading{
		color:<?php echo get_theme_mod('santella_profile_widget_heading_color','#000000');?>;
	}
	.bfd-profile .img-details .caption{
		color:<?php echo get_theme_mod('santella_profile_widget_text_color','#000000');?>;
	}
	.bfd-profile .img-details .img-btn a{
		color:<?php echo get_theme_mod('santella_profile_widget_btn_color','#000000');?>;
		background:<?php echo get_theme_mod('santella_profile_widget_btn_bg','#f3f3f3');?>;
	}
	.bfd-profile .img-details .img-btn a:hover{
		color:<?php echo get_theme_mod('santella_profile_widget_btn_color_hover','#000000');?>;
		background:<?php echo get_theme_mod('santella_profile_widget_btn_bg_hover','#f3f3f3');?>;
	}
	.enews-widget{
		background:<?php echo get_theme_mod('santella_enews_bg','#ffffff');?>;
	}
	.enews .enews-form input.enews-email{
		border-color:<?php echo get_theme_mod('santella_enews_field_border','#f3f3f3');?>;
	}
	.enews h3.widget-title,
	.enews p{
		color:<?php echo get_theme_mod('santella_enews_heading_color','#000000');?>;
	}
	.enews .enews-form input.enews-submit{
		color:<?php echo get_theme_mod('santella_enews_btn_color','#000000');?>;
		background:<?php echo get_theme_mod('santella_enews_btn_bg','#f3f3f3');?>;
	}
	.enews .enews-form input.enews-submit:hover{
		color:<?php echo get_theme_mod('santella_enews_btn_color_hover','#000000');?>;
		background:<?php echo get_theme_mod('santella_enews_btn_bg_hover','#f3f3f3');?>;
	}
	.entry-title,
	.entry-title a{
		color:<?php echo get_theme_mod('santella_entry_title','#000000');?>;
	}
	.entry-meta a{
		color:<?php echo get_theme_mod('santella_entry_meta','#000000');?>!important;
	}
	.single .entry-meta:after{
		background:<?php echo get_theme_mod('santella_entry_meta_line','#f3f3f3');?>;
	}
	.cat-links,
    .tags-links,
    .bfd-post-share,
	.cat-links a,
    .tags-links a,
	.bfd-post-share a{
		color:<?php echo get_theme_mod('santella_entry_footer','#000000');?>;
	}
	.entry-content p a{
		color:<?php echo get_theme_mod('santella_entry_links_color','#000000');?>;
		background-image: linear-gradient(to bottom, transparent 0, <?php echo get_theme_mod('santella_entry_links_bg', '#cdd1ed'); ?> 0);
	}
	.related-posts .widget-title{
		color:<?php echo get_theme_mod('santella_related_heading','#000000');?>;
	}
	.related-posts-wrap ul li a .title{
		color:<?php echo get_theme_mod('santella_related_titles','#000000');?>;
	}
	.post-pager .single-post-nav .post-pager-info span{
		color:<?php echo get_theme_mod('santella_post_pager_direction','#000000');?>;
	}
	.post-pager a{
		color:<?php echo get_theme_mod('santella_post_pager_titles','#000000');?>;
	}
	.comment-reply-title, 
	.comments-area h2{
		color:<?php echo get_theme_mod('santella_comment_headings','#000000');?>;
	}
	.comments-area .comment-author.vcard a, 
    .logged-in-as a,
	.comments-area a{
		color:<?php echo get_theme_mod('santella_comment_links','#000000');?>;
	}
	.comments-area .reply a{
		color:<?php echo get_theme_mod('santella_comment_reply','#000000');?>;
		background:<?php echo get_theme_mod('santella_comment_reply_bg','#f3f3f3');?>;
	}
	.comments-area .reply a:hover{
		color:<?php echo get_theme_mod('santella_comment_reply_hover','#000000');?>;
		background:<?php echo get_theme_mod('santella_comment_reply_bg_hover','#f3f3f3');?>;
	}
	.posts-navigation.buttons a{
		color:<?php echo get_theme_mod('santella_pagination_btn_color','#000000');?>;
		background:<?php echo get_theme_mod('santella_pagination_btn_bg','#f3f3f3');?>;
	}
	.posts-navigation.buttons a:hover{
		color:<?php echo get_theme_mod('santella_pagination_btn_color_hover','#000000');?>;
		background:<?php echo get_theme_mod('santella_pagination_btn_bg_hover','#f3f3f3');?>;
	}
	.posts-navigation.numeric a.page-numbers,
	.posts-navigation.numeric span.page-numbers{
		color:<?php echo get_theme_mod('santella_pagination_numeric_color','#000000');?>;
		background:<?php echo get_theme_mod('santella_pagination_numeric_bg','#f3f3f3');?>;
	}
	.posts-navigation.numeric span.page-numbers.current,
	.posts-navigation.numeric a.page-numbers:hover{
		color:<?php echo get_theme_mod('santella_pagination_numeric_color_hover','#000000');?>;
		background:<?php echo get_theme_mod('santella_pagination_numeric_bg_hover','#cfd3ed');?>;
	}
	.blog-container.thumbs article .entry-header .entry-meta{
		color:<?php echo get_theme_mod('santella_thumbnails_date_color','#000000');?>;
	}
	.blog-container.thumbs article .entry-title,
	.blog-container.thumbs article .entry-title a,
	.blog-container.thumbs article .entry-title a:hover{
		color:<?php echo get_theme_mod('santella_thumbnails_title_color','#000000');?>;
	}
	.blog-container.thumbs .entry-header:after{
		background:<?php echo get_theme_mod('santella_thumbnails_title_bg','#fefbff');?>;
	}
	.bfd-featured-posts .widget-title{
		color:<?php echo get_theme_mod('santella_featured_posts_heading_color','#000000');?>;
	}
	.bfd-featured-posts span{
			text-shadow:2px 2px <?php echo get_theme_mod('santella_featured_posts_heading_shadow','#ffffff');?>;
	}
	.bfd-featured-posts span:after{
		background:<?php echo get_theme_mod('santella_featured_posts_heading_bg','#f3f3f3');?>;
	}
	.featured-posts-container article .entry-title a,
	.featured-posts-container article .entry-title,
	.featured-posts-container article .entry-title a:hover{
		color:<?php echo get_theme_mod('santella_featured_posts_title_color','#000000');?>;
	}
	.bfd-featured-posts .featured-btn a,
	.bfd-featured-posts .featured-btn a:hover{
		color:<?php echo get_theme_mod('santella_featured_posts_btn_color','#000000');?>;
	}
	.wpp-post-title{
		color:<?php echo get_theme_mod('santella_popular_posts_title','#000000');?>;
	}
    .wpp-post-title:hover{
		color:<?php echo get_theme_mod('santella_popular_posts_title_hover','#000000');?>;
	}
	.socialicons a{
		color:<?php echo get_theme_mod('santella_social_icons_color','#000000');?>;
	}
	.socialicons a:hover{
		color:<?php echo get_theme_mod('santella_social_icons_color_hover','#000000');?>;
	}
	.widget_archive select,
	.widget_categories select{
		background:<?php echo get_theme_mod('santella_archive_cat_bg','#ffffff');?>;
	}
 	.widget_archive li a,
	.widget_categories li a,
	.widget_archive li,
    .widget_categories li{
		color:<?php echo get_theme_mod('santella_archive_cat_color','#000000');?>;
	}
	.widget_archive li a:hover,
	.widget_categories li a:hover{
		color:<?php echo get_theme_mod('santella_archive_cat_color_hover','#000000');?>;
	}
	.widget_nav_menu li a{
		color:<?php echo get_theme_mod('santella_nav_menu_color','#000000');?>;
	}
	.widget_nav_menu li a:hover{
		color:<?php echo get_theme_mod('santella_nav_menu_color_hover','#000000');?>;
	} 
	#sb_instagram .sbi_follow_btn a{
		color:<?php echo get_theme_mod('santella_insta_feed_btn_color','#000000');?>;
		background:<?php echo get_theme_mod('santella_insta_feed_btn_bg','#f3f3f3');?>!important;
	} 
	#sb_instagram .sbi_follow_btn a:hover{
		color:<?php echo get_theme_mod('santella_insta_feed_btn_color_hover','#000000');?>;
		background:<?php echo get_theme_mod('santella_insta_feed_btn_bg_hover','#f3f3f3');?>;
	}
	.instagram-page .site{
		background:<?php echo get_theme_mod('santella_insta_page_bg','#f3f3f3');?>;
	}
	.instagram-page .widget_nav_menu li a{
		color:<?php echo get_theme_mod('santella_insta_page_nav_links_color','#000000');?>;
		background:<?php echo get_theme_mod('santella_insta_page_nav_links_bg','#ffffff');?>;
	}
	.ewd-ufaq-faq-title-text, 
	div.ewd-ufaq-faq-title div.ewd-ufaq-post-margin-symbol{
		color:<?php echo get_theme_mod('santella_faq_question_color','#000000');?>;
	}
	.ewd-ufaq-faq-title{
		background:<?php echo get_theme_mod('santella_faq_question_bg','#f3f3f3');?>;
	}
	.woocommerce-store-notice{
		background:<?php echo get_theme_mod('santella_woo_notice_bg','#fefbff');?>;
		color:<?php echo get_theme_mod('santella_woo_notice_color','#000000');?>;
	}
	.woocommerce-store-notice__dismiss-link{
		background:<?php echo get_theme_mod('santella_woo_notice_btn_bg','#f3f3f3');?>;
		color:<?php echo get_theme_mod('santella_woo_notice_btn_color','#000000');?>;
	}
	.woocommerce ul.products li.product .woocommerce-loop-product__title, 
	.woocommerce div.product .product_title{
		color:<?php echo get_theme_mod('santella_woo_product_title_color','#000000');?>;
	}
	.woocommerce ul.products li.product .price{
		color:<?php echo get_theme_mod('santella_woo_product_price_color','#000000');?>;
	}
	.woocommerce-MyAccount-navigation{
		background:<?php echo get_theme_mod('santella_woo_my_acc_nav_bg','#f3f3f3');?>;
	}
	.woocommerce-MyAccount-navigation a{
		color:<?php echo get_theme_mod('santella_woo_my_acc_nav_links','#000000');?>;
	}
	.woocommerce .product_meta a{
		color:<?php echo get_theme_mod('santella_woo_product_cats_color','#000000');?>;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs{
		border-color:<?php echo get_theme_mod('santella_woo_product_tabs_border','#f3f3f3');?>;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li a{
		color:<?php echo get_theme_mod('santella_woo_product_tabs_color','#000000');?>;
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li a:focus, 
	.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, 
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active a{
		background:<?php echo get_theme_mod('santella_woo_product_tabs_active_bg','#f3f3f3');?>;
		color:<?php echo get_theme_mod('santella_woo_product_tabs_active_color','#000000');?>;
	}
  </style>

  <?php }
add_action( 'wp_head', 'santella_inline_css');
