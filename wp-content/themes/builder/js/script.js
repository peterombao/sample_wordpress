(function($) {
	
	"use strict";
	
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(2000).fadeOut(500);
		}
	}
	
	//Fix / Unfix Header
	function fixHeader() {
		var topbarHeight = $('.main-header .top-bar').height();
		var windowpos = $(window).scrollTop();
		if (windowpos >= topbarHeight) {
			$('.main-header').addClass('fixed');
			$('.main-banner').addClass('changed');
		} else {
			$('.main-header').removeClass('fixed');
			$('.main-banner').removeClass('changed');
		}
	}
	
	
	//Update Header Class
	function updateHeader() {
		var topbarHeight = $('.main-header .top-bar').height();
		if ($(window).scrollTop() > topbarHeight){
			$('.main-header').addClass('fixed');
			$('.main-banner').addClass('changed');
		}
	}
	
	//Hide / Show Go-to-top Button
	function scrollButton() {
		var windowpos = $(window).scrollTop();
		if (windowpos >= 200) {
			$('.go-to-top').fadeIn(300);
		} else {
			$('.go-to-top').fadeOut(300);
		}
	}
	
	
	//Jquery Prettyphoto Lightbox
	function prettyPhoto() {
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			animation_speed:'normal',
			slideshow:3000,
			autoplay_slideshow: false,
			fullscreen: true,
			social_tools: false
		});
	}
	
	//Projects Portfolio Mixit Up
	if($('.filter-list').length){
		$('.filter-list').mixitup({});
	}
	
	//Testimonial Slider
	if($('.testimonials').length) {
		$('.testimonials .slider').owlCarousel({
			items: 2,
			loop:true,
			autoplay:true,
			margin: 40,
			responsive:{   
			0:{
			items:1
			},
			480:{
			items:1
			},
			 
			600:{
			items:1
			},
			 
			768:{
			items:2
			},
			
			1024:{
			items:2
			},
			 
			1200:{
			items:2
			},
			 
			1600:{
			items:3
			}
			
			}
		});
	}
	//Testimonial Slider
	if($('.testimonials').length) {
		$('.client-carsoule').owlCarousel({
			items: 5,
			loop:true,
			autoplay:true,
			margin: 10,
			autoWidth: true,
			autoHeight: true,
			dots: false,
			responsive:{   
			0:{
			items:1
			},
			480:{
			items:2
			},
			 
			600:{
			items:2
			},
			 
			768:{
			items:3
			},
			
			1024:{
			items:4
			},
			 
			1200:{
			items:5
			},
			 
			1600:{
			items:5
			}
			
			}
		});
	}
	
	//Image Tabs On Single Project page
	if($('.tabs-box').length){
		$('.tabs-box .tab-btn').on('click', function(e) {
			var target = $($(this).attr('href'));
			e.preventDefault();
			$('.tabs-box .tab-btn').removeClass('active');
			$(this).addClass('active');
			$('.tabs-box .tab').hide(0);
			$(target).fadeIn(500);
		});
	}
	
	//Form Validation
	if($('#contact-form').length){
		$('#contact-form').validate({ // initialize the plugin
			rules: {
				name: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: false
				}
			},
			submitHandler: function (form) { 
				alert('Form Submitted');
				return true; 
			}
		});
	}
	
	// Google Map Settings
	if($('#our-location').length){
		var map;
		 map = new GMaps({
			el: '#our-location',
			zoom: 18,
			scrollwheel:false,
			//Set Latitude and Longitude Here
			lat: -37.817085,
			lng: 144.955631
			
		  });
		  
		  //Add map Marker
		  map.addMarker({
			lat: -37.817085,
			lng: 144.955631,
			infoWindow: {
			  content: '<p><b>Envato</b> <br> Melbourne VIC 3000, Australia</p>'
			}
		 
		});
	}
	
	//Full Width Masonary Isotope
	function enableMasonry() {
		if($('.masonary-layout').length){
	
			var winDow = $(window);
			// Needed variables
			var $container=$('.isotope-container');
			var $filter=$('.filter');
	
			$container.isotope({
				filter:'*',
				layoutMode:'masonry',
				animationOptions:{
					duration:1000,
					easing:'linear'
				}
			});
	
			// Isotope Filter 
			$filter.find('a').on('click', function(){
				var selector = $(this).attr('data-filter');
	
				try {
					$container.isotope({ 
						filter	: selector,
						animationOptions: {
							duration: 1000,
							easing	: 'linear',
							queue	: false
						}
					});
				} catch(err) {
	
				}
				return false;
			});
	
	
			var filterItemA	= $('.filter li a');
	
			filterItemA.on('click', function(){
				var $this = $(this);
				if ( !$this.hasClass('active')) {
					filterItemA.removeClass('active');
					$this.addClass('active');
				}
			});
		}
	}
	
	//Dropdown menu hide/show
	if($('li.dropdown').length){
		$('.main-navigation li.dropdown').prepend('<span class="toggle-button"></span>');
		$('.main-navigation li.dropdown .toggle-button').on('click', function() {
			var target = $($(this).parent('.dropdown').children('.dropdown-menu'));
			$(target).slideToggle(500);
		});
	}
	
	// Go to Top
	function smoothScroll() {
		$(".go-to-top").on('click', function() {
		   // animate
		   $('html, body').animate({
			   scrollTop: $('.banner').offset().top
			 }, 1500);
	
		});
	}
	
	// Elements Animation
	function elementsAnimations() {
		$('.animated').appear(function(){
			var el = $(this);
			var anim = el.data('animation');
			var animDelay = el.data('delay');
			if (animDelay) {
	
				setTimeout(function(){
					el.addClass( anim + ' in' );
					el.removeClass('out');
				}, animDelay);
	
			}
	
			else {
				el.addClass( anim + ' in' );
				el.removeClass('out');
			}    
		},{accY: -100});
	}
	

/* ==========================================================================
   When document is ready, do
   ========================================================================== */
   
	$(document).ready(function() {
		prettyPhoto();
		updateHeader();
		smoothScroll();
		elementsAnimations();
	});

/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).scroll(function() {
		fixHeader();
		scrollButton();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	$(window).load(function() {
		handlePreloader();
		enableMasonry();
	});

})(window.jQuery);


