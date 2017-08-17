jQuery(function($) {
	$(window).load(function() {
		//sliders
		$('.slider').flexslider({
			directionNav: false,
			controlNav: false,
			slideshowSpeed: 3000
		});

		$('.main-img').flexslider({
			slideshow: false,
			directionNav: false,
			manualControls: ".thumbs ul li"
		});

		$('p:empty').remove();
	});
});