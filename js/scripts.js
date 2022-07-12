/**
 * File scripts.js.
 *
 */

 ( function ( jQuery ) {
     "use strict";
     jQuery(document).ready( function() {

 		// Menu.
 		jQuery( '.menu-toggle' ).click( function() {
 			var _this = jQuery(this);
 			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
 			_this.attr( 'aria-pressed', _this.attr( 'aria-pressed' ) === 'false' ? 'true' : 'false' );
 			jQuery( '#site-nav .menu' ).slideToggle();
 			jQuery( '.menu-toggle' ).toggleClass( 'activated' );
 		});

 		// Submenu.
 		jQuery( '.sub-menu' ).before( '<button class="submenu-toggle"><span class="submenu-arrow"></span></button>' );
 		jQuery( '.submenu-toggle' ).click( function() {
 			jQuery(this).next( '.sub-menu' ).slideToggle();
 			jQuery(this).next( '.sub-menu' ).toggleClass( 'is-open' );
 		});
		 
 	});
 })(jQuery);

 jQuery( function($) {
$( '.search-icon').appendTo('.nav-socials .socialicons');
 	// Combine menus.
 	setupMenus();
 	$(window).resize( function() {
 	  setupMenus();
 	});
 	function setupMenus() {
 		if ( window.innerWidth <= 1029 ) {
 			$( '.secondary-nav ul.menu > li' ).addClass('menu-2-moved-item');
 			$( '.secondary-nav ul.menu > li' ).appendTo( '.primary-nav ul.menu' );
 			$( '.secondary-nav, .sub-menu' ).hide();
			$('.header-mobile-wrap').show();
			$( '.nav-socials .socialicons').appendTo('.header-mobile-wrap');
			$('.header-inner').insertBefore('.site-header');
 		}
 		if ( window.innerWidth > 1030 ) {
 			$( '.primary-nav, .secondary-nav' ).removeAttr( 'style' ).show();
 			$( '.primary-nav ul.menu > li.menu-2-moved-item' ).appendTo( '.secondary-nav ul.menu' );
			$('.header-mobile-wrap').hide();	
 		}
 	}

 });

  jQuery( function($) {
    /* If this line runs, it means Javascript is enabled in the browser
     * so replace no-js class with js for the body tag
     */
    document.body.className = document.body.className.replace("no-js","js");
  });

// Back to top arrow.
jQuery(document).ready(function($) {
	var offset = 100,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.back-to-top');
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('top-is-visible') : $back_to_top.removeClass('top-is-visible top-fade-out');
		if ( $(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('top-fade-out');
		}
	});
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		}, scroll_top_duration );
	});
});

//Show/Hide on Click
		jQuery( document ).ready( function( $ ) {
			$('.search-icon').click(function(){
			$('.nav-socials .search-popup-outer').toggleClass('search-open');
            $('.nav-socials .search-form-input').focus();
		  });
			$('.search-close').click(function(){
            $('.nav-socials .search-popup-outer').removeClass('search-open');
		  });
		});

