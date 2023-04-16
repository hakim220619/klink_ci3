 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

(function($) {

	"use strict";

	// initFiturSlider();

	// stellar
	$(window).stellar({
    	responsive: true,
    	parallaxBackgrounds: true,
    	parallaxElements: true,
    	horizontalScrolling: false,
    	hideDistantElements: false,
    	scrollProperty: 'scroll',
    	horizontalOffset: 0,
    	verticalOffset: 0
    });


    // Smooth scrolling using jQuery easing
  	$('a.js-scroll[href*="#"]:not([href="#"])').click(function() {
    	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      		var target = $(this.hash);
      		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      		if (target.length) {
      			$('html, body').animate({
      				scrollTop: target.offset().top
      			}, 1000, "easeInOutExpo");
      			return false;
      		}
      	}
    });


	// navbar
    $(window).on('scroll load', function() {
		if ($(".navbar").offset().top > 20) 
		{
			$(".fixed-top").addClass("top-nav-collapse");
		}
		else 
		{
			$(".fixed-top").removeClass("top-nav-collapse");
		}
    });

    // closes the responsive menu on menu item click
    $(".navbar-nav li a").on("click", function(event) {
    	if (!$(this).parent().hasClass('dropdown'))
        $(".navbar-collapse").collapse('hide');
    });

    // jQuery for page scrolling feature - requires jQuery Easing plugin
	$(function() {
		$(document).on('click', 'a.page-scroll', function(event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1200, 'easeOutBack');
			event.preventDefault();
		});
	});


	// Scrollax
   	$.Scrollax();


	var carousel = function() {
		$('.fitur-slider').owlCarousel({
		    loop:true,
		    center:false,
		    autoplay:true,
		    autoplayTimeout:8000,
		    autoplayHoverPause: false,
		    nav:false,
			dots:true,
			// dotsContainer: '.fitur-dots',
			autoWidth:false,
		    margin:40,
		    stagePadding:0,
		    items:1
		});
	};
	carousel();


})(jQuery);