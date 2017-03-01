"use strict";
var scrollDirection, $ = jQuery;

// for scrolling to targeted sections

(function ($) {
	$.fn.scrollingTo = function (opts) {
		var defaults = {
			animationTime: 0.3,
			easing: '',
			topSpace: 0,
			callbackBeforeTransition: function () { },
			callbackAfterTransition: function () { }
		};

		var config = $.extend({}, defaults, opts);

		$(this).on('click', function (e) {
			var eventVal = e;
			e.preventDefault();

			var $section = $(document).find($(this).data('section'));
			if ($section.length < 1) {
				return false;
			}

			if ($('html, body').is(':animated')) {
				$('html, body').stop(true, true);
			}

			var scrollPos = $section.offset().top;

			if ($(window).scrollTop() == (scrollPos + config.topSpace)) {
				return false;
			}

			config.callbackBeforeTransition(eventVal, $section);

			var newScrollPos = (scrollPos - config.topSpace);

			$('html, body').animate({
				'scrollTop': (newScrollPos + 'px')
			}, config.animationTime, config.easing, function () {
				config.callbackAfterTransition(eventVal, $section);
			});

			return $(this);
		});

		$(this).data('scrollOps', config);
		return $(this);
	};
}(jQuery));

$(document).ready(function ($) {
	$('.menu-smooth-scroll').scrollingTo({
		easing: 'easeOutQuart',
		animationTime: 1800,
		callbackBeforeTransition: function (e) {
			if (e.currentTarget.hash !== "") {
				if (e.currentTarget.hash !== '#home') {
					$(e.currentTarget).parent().addClass('current').siblings().removeClass('current');
				}
			}

			$('.button-collapse').sideNav('hide');
		},
		callbackAfterTransition: function (e) {
			if (e.currentTarget.hash !== "") {
				if (e.currentTarget.hash === '#home') {
					window.location.hash = '';
				} else {
					window.location.hash = e.currentTarget.hash;
				}

			}
		}
	});



	$('.section-call-to-btn').scrollingTo({
		easing: 'easeOutQuart',
		animationTime: 1800,
		callbackBeforeTransition: function (e) {

		},
		callbackAfterTransition: function (e) {
		}
	});

	// Animate scrolling on hire me button
	$('.hire-me-btn').on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: $("#contact").offset().top }, 500);
	});
});

$(window).load(function () {

	// section calling
	$('.section-call-to-btn.call-to-home').waypoint({
		handler: function (event, direction) {
			var $this = $(this);
			$this.fadeIn(0).removeClass('btn-hidden');
			var showHandler = setTimeout(function () {
				$this.addClass('btn-show').removeClass('btn-up');
				clearTimeout(showHandler);
			}, 1500);
		},
		offset: '90%'
	});


	$('.section-call-to-btn.call-to-about').delay(1000).fadeIn(0, function () {
		var $this = $(this);
		$this.removeClass('btn-hidden');
		var showHandler = setTimeout(function () {
			$this.addClass('btn-show').removeClass('btn-up');
			clearTimeout(showHandler);
		}, 1600);
	});
});