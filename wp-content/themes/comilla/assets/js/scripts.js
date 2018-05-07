/*
Author       : Syed Ekram.
Template Name: Comilla - Digital Agency One Page Template
Version      : 1.0
*/
(function($) {
	'use strict';
	
	jQuery(document).ready(function(){
	
		/*PRELOADER JS*/
		$(window).load(function() { 
			$('.status').fadeOut();
			$('.preloader').delay(350).fadeOut('slow'); 
		}); 
		/*END PRELOADER JS*/

			// one page nav
			$('#nav').onePageNav({
				currentClass: 'current',
				changeHash: true,
				scrollSpeed: 1500,
				scrollThreshold: 0.5,
				filter: ':not(.external)',
				easing: 'swing',
				begin: function() {
					//I get fired when the animation is starting
				},
				end: function() {
					//I get fired when the animation is ending
				},
				scrollChange: function(jQuerycurrentListItem) {
					//I get fired when you enter a section and I pass the list item of the section
				}
			});
			
			$(window).scroll(function() {
			  if ($(this).scrollTop() > 100) {
				$('.menu-top').addClass('menu-shrink');
			  } else {
				$('.menu-top').removeClass('menu-shrink');
			  }
			});
			
			// one page nav
			$('#nav').onePageNav({
				currentClass: 'current',
				changeHash: true,
				scrollSpeed: 1500,
				scrollThreshold: 0.5,
				filter: ':not(.external)',
				easing: 'swing',
				begin: function() {
					//I get fired when the animation is starting
				},
				end: function() {
					//I get fired when the animation is ending
				},
				scrollChange: function(jQuerycurrentListItem) {
					//I get fired when you enter a section and I pass the list item of the section
				}
			});
			
			$(document).on('click','.navbar-collapse.in',function(e) {
			if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
				$(this).collapse('hide');
			}
			});				
		/*END MENU JS*/ 

		/*START MIXITUP JS*/
			$('.work_all_item').mixItUp();
			// jQuery Lightbox
			$('.lightbox').venobox({
				numeratio: true,
				infinigall: true
			});	
		/*END MIXITUP JS*/
		
		/*START SLIDER JS*/
		$('.carousel').carousel({
			interval:5000,
			pause:'false',
		});
		/*END SLIDER JS*/
		
		/*START TESTIMONIAL JS*/
			$('.testi-slider').flexslider({
				animation: "slide",
				direction: "fade",
				prevText: "<i class='fa fa-long-arrow-left'></i>",
				nextText: "<i class='fa fa-long-arrow-right'></i>"
			});
		/*END TESTIMONIAL JS*/

		/*START PARTNER LOGO*/
		$('.partner').owlCarousel({
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
		  items : 4,
		  itemsDesktop : [1199,3],
		  itemsDesktopSmall : [979,3]
		});
		/*END PARTNER LOGO*/		

		
	}); 	
	
	/*START WOW ANIMATION JS*/
	  new WOW().init();	
	/*END WOW ANIMATION JS*/	
				
})(jQuery);


  

