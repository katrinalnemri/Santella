jQuery(document).ready(function () {
// Slick slider - one slide.

var $sliderClass = $(".slider-outer");
var autoPlay = true;
var dotsS = true;
var arrowsS = true;
var slidesToShow = 0;
var centerMode = false;
var centerPadding = 0;
var responsive1 = 1;
var responsive2 = 1;
var responsive3 = 1;
var responsive = 1;
var responsivePadding = 0;
var responsivePadding1 = 0; 
var responsivePadding2 = 0; 
var responsivePadding3 = 0;
	
if ( $sliderClass.hasClass("autoplay-disabled") ) {
    autoPlay = false;
}
if ( $sliderClass.hasClass("one") ) {
    slidesToShow = 1;
	responsive1 = 1;
	responsive2 = 1;
	responsive3 = 1;
}
if ( $sliderClass.hasClass("one-center") ) {
    slidesToShow = 1;
	centerMode = true;
	centerPadding = '350px';
	responsive1 = 1;
	responsive2 = 1;
	responsive3 = 1;
	responsivePadding3 = '270px';
	responsivePadding2 = '200px';
	responsivePadding1 = '100px';
}
if ( $sliderClass.hasClass("two") ) {
    slidesToShow = 2;
	responsive1 = 2;
	responsive2 = 2;
	responsive3 = 2;
}
if ( $sliderClass.hasClass("two-center") ) {
    slidesToShow = 2;
	centerMode = true;
	centerPadding = '200px';
	responsive1 = 1;
	responsive2 = 2;
	responsive3 = 2;
	responsivePadding3 = '150px';
	responsivePadding2 = '70px';
	responsivePadding1 = '30px';
}
if ( $sliderClass.hasClass("three") ) {
    slidesToShow = 3;
	responsive3 = 3;
	responsive2 = 3;
	responsive1 = 2;
}
if ( $sliderClass.hasClass("four") ) {
    slidesToShow = 4;
	responsive3 = 4;
	responsive2 = 3;
	responsive1 = 2;
}
if ( $sliderClass.hasClass("five") ) {
    slidesToShow = 5;
	responsive3 = 4;
	responsive2 = 3;
	responsive1 = 2;
}
if ( $sliderClass.hasClass("has-arrows-nav") ) {
    dotsS = false;
}
if ( $sliderClass.hasClass("has-dots-nav") ) {
    arrowsS = false;
}
if ( $sliderClass.hasClass("has-no-nav") ) {
    arrowsS = false;
	dotsS = false;
}
	
jQuery('.slider-outer').slick({
	fade: false,
	autoplay: autoPlay,
	slidesToShow: slidesToShow,
	slidesToScroll: 1,
	dots:dotsS,
	arrows:arrowsS,
	centerMode: centerMode,
	centerPadding: centerPadding,
	prevArrow: $('.prev-slide'),
	nextArrow: $('.next-slide'),
	appendDots: $('.slick-dots'),
    speed: 1000,
	infinite: true,
	responsive: [
		{
		breakpoint: 1800,
		settings: {
			centerPadding: responsivePadding3,
		}
	},
		{
		breakpoint: 1400,
		settings: {
			slidesToShow: responsive3,
			centerPadding: responsivePadding2,
		}
	},
	{
		breakpoint: 1200,
		settings: {
			slidesToShow: responsive2,
			centerPadding: responsivePadding2,
		}
	},
	{
		breakpoint: 1050,
		settings: {
			slidesToShow: responsive1,
			centerPadding: responsivePadding1,
		}
	},
	{
		breakpoint: 800,
		settings: {
			slidesToShow: responsive,
			centerPadding: responsivePadding,
	}
	}]
});


});
