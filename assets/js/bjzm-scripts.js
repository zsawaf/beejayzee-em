'use strict';

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/*
*
* Single Up Down 
* Jquery plugin for single page navigation
* Copyright (c) 2014 Matt McCullough matt@matticus.ca
* @Under Development
* Updated: Oct 1, 20114
*
*/

(function ($) {

	var SinglePageDown = {

		currentSlide: '',
		isScrolling: false,

		init: function init(options, container) {

			this.options = options;
			this.setScrollOffset();
			this.container = container;
			this.$links = container.find('a');

			this.setLoadSlide();
			this.clickNav();
			this.windowScroll();
		},

		clickNav: function clickNav() {

			var self = this;

			this.$links.not(self.options.ignore).on('click', function (e) {

				self.handleClick(e, $(this));
			});
		},

		parseUrlHash: function parseUrlHash(url) {
			var arr = url.split("#");
			anchor = arr[1];
			return anchor;
		},

		handleClick: function handleClick(event, obj) {

			if (this.options.preScroll) {
				this.options.preScroll();
			} else {}

			var anchor = this.parseUrlHash(obj.attr('href'));
			if (this.idExists(anchor)) {

				event.preventDefault();
				this.scrollToAnchor(anchor, 500);
			}
		},

		setScrollOffset: function setScrollOffset() {

			var offsetSettingsType = _typeof(this.options.offset);

			if ('number' === offsetSettingsType) {
				this.scrollOffset = this.options.offset;
			} else if ('object' === offsetSettingsType && this.options.offset.length > 0) {
				this.scrollOffset = this.options.offset.outerHeight();
			} else {
				this.scrollOffset = 0;
			}
		},

		setLoadSlide: function setLoadSlide() {

			var self = this;

			var hash = window.location.hash;

			if (hash) {

				var urlHash = hash.substring(1);

				console.log(urlHash);

				if (self.idExists(urlHash)) {

					self.scrollToAnchor(urlHash, 0);
				}
			}
		},

		windowScroll: function windowScroll() {

			var self = this;

			$(window).on('scroll', function (e) {
				if (self.isScrolling) {
					return false;
				} else {

					self.loopSlides();
				}
			});
		},

		loopSlides: function loopSlides() {

			var self = this;

			$(self.options.sectionSelector).each(function () {

				var $section = $(this);
				var id = $section.attr("id");

				if (self.isSectionCurrent(id)) {

					if (id != self.currentSlide) {

						self.setActiveNavLink(id);

						if (self.options.changeHash) self.changeUrlHash(id);

						self.currentSlide = id;
					}
				}
			});
		},

		idExists: function idExists(selector) {

			return $("#" + selector).length < 1 ? false : true;
		},

		setScrolling: function setScrolling(bool) {

			this.isScrolling = bool;
		},

		scrollToAnchor: function scrollToAnchor(anchor, speed) {

			var self = this;
			self.setScrolling(true);

			$('html, body').animate({
				scrollTop: $('#' + anchor).offset().top - self.scrollOffset
			}, speed, self.options.easing, function () {
				if ($.isFunction(self.options.callBack) && self.isScrolling) {
					self.options.callBack();
				}
				self.setScrolling(false);
				self.setActiveNavLink(anchor);
				self.changeUrlHash(anchor);
			});
		},

		goToAnchor: function goToAnchor(anchor) {

			$(window).scrollTop($('#' + anchor).offset().top - this.scrollOffset);
			this.setActiveNavLink(anchor);
			this.changeUrlHash(anchor);
		},

		changeUrlHash: function changeUrlHash(anchor) {

			history.pushState(null, null, '#' + anchor);
			if (history.pushState) {
				history.pushState(null, null, '#' + anchor);
			} else {
				location.hash = '#' + anchor;
			}
		},

		setActiveNavLink: function setActiveNavLink(anchor) {

			if (this.options.navContainer) {
				$(this.options.navContainer).find('a').removeClass(this.options.activeClass);
				$(this.options.navContainer).find('a[href*="' + anchor + '"]').addClass(this.options.activeClass);
			}
		},

		isSectionCurrent: function isSectionCurrent(anchor) {

			if (!anchor) return false;

			var $section = $("#" + anchor);
			// var $section = $("#mission");
			var distance = $section.offset().top;

			var isTopAboveWindow = $(window).scrollTop() >= distance - this.scrollOffset ? true : false;
			var isBottomABoveWindow = $(window).scrollTop() >= distance - this.scrollOffset + $section.outerHeight() ? true : false;

			if (isTopAboveWindow && !isBottomABoveWindow) {

				return true;
			} else {

				return false;
			}
		}

	};

	$.fn.singleUpDown = function (options) {

		var settings = $.extend({
			offset: $(".navbar-default"),
			activeClass: 'current',
			changeHash: false,
			secondaryPages: true,
			sectionSelector: 'section',
			navContainer: "ul.menu",
			easing: 'swing',
			callBack: false,
			preScroll: false,
			ignore: false
		}, options);

		SinglePageDown.init(settings, this);

		return this;
	};
})(jQuery);


/* --------------------------------------------
 *
 * Initialize sliders utilizing slick.js
 *
 * Dependencies:
 * 	- Jquery
 * 	- Slick
 *
 * Parameters:
 * 	- id: id of slider
 * 	- settings: settings to use on slider. 
 * 	
 * Methods Supported:
 * 	- initialize: initialize the slider with given id and settings
 * 	- destroy: destroy the slider.
 * 	- add: given html string, add slide to slider
 * 	- remove: given index, remove slide in that index
 * 	- play: play slideshow
 * 	- pause: pause slideshow
 * 	- next: go to next slide
 * 	- prev: go to prev slide
 * 	- goto: given index, go to that slide
 *
 * - getCurrentSlide: return current slide
 * 	
 * -------------------------------------------- */

var Slider = function () {
	function Slider() {
		var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
		var settings = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

		_classCallCheck(this, Slider);

		if (id == null) {
			return false; // we need an id for the slider
		}

		this.id = id;
		this.selector = "#" + id;
		this.settings = settings;

		this.initialize();
	}

	_createClass(Slider, [{
		key: 'initialize',
		value: function initialize() {
			$(this.selector).slick(this.settings);
		}
	}, {
		key: 'destroy',
		value: function destroy() {
			$(this.selector).slick('unslick');
		}
	}, {
		key: 'add',
		value: function add(html) {
			$(this.selector).slick('slickAdd', html);
		}
	}, {
		key: 'remove',
		value: function remove(index) {
			$(this.selector).slick('slickRemove', index);
		}
	}, {
		key: 'play',
		value: function play() {
			$(this.selector).slick('slickPlay');
		}
	}, {
		key: 'pause',
		value: function pause() {
			$(this.selector).slick('slickPause');
		}
	}, {
		key: 'next',
		value: function next() {
			$(this.selector).slick('slickNext');
		}
	}, {
		key: 'prev',
		value: function prev() {
			$(this.selector).slick('slickPrev');
		}
	}, {
		key: 'gotto',
		value: function gotto(index) {
			$(this.selector).slick('slickGoTo', index);
		}
	}, {
		key: 'getCurrentSlide',
		value: function getCurrentSlide() {
			return $(this.selector).slick('slickCurrentSlide');
		}
	}]);

	return Slider;
}();

$(document).ready(function () {
	// var socialmedia = new SocialMedia();
	// socialmedia.get_instagram();
	// socialmedia.get_twitter();
});

/**
 * Extend String class to include replaceAll. 
 *
 * Replace all instances that match the given regex
 */
String.prototype.replaceAll = function (search, replacement) {
	var self = this;
	return self.replace(new RegExp(search), replacement);
};

/**
 * Instagram class: 
 *
 * Only run on page when instagram elements exist.
 *
 * Fetches data from instagram API and displays them in html list elements. 
 */

var SocialMedia = function () {
	function SocialMedia() {
		_classCallCheck(this, SocialMedia);

		var self = this;
		if ($('.socialmedia').length <= 0) {
			return false;
		}
	}

	_createClass(SocialMedia, [{
		key: 'get_instagram',
		value: function get_instagram() {
			$.ajax({
				url: ASSETS["ajaxurl"],
				data: {
					'action': 'get_instagram'
				},
				success: function success(res) {
					// append each instagram post to ul
					var instagrams = JSON.parse(res);
					$.each(instagrams.data, function () {
						var instagram = $(this)[0];

						// regex instagram         
						var hash_regex = instagram.caption.text.replaceAll(/(?:@)([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)/g, "<span>@$1</span>");
						var at_regex = hash_regex.replaceAll(/(?:#)([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)/g, "<span>#$1</span>");
						var caption = at_regex.length > 200 ? at_regex.substr(0, 200) + '...' : at_regex;

						var img = '<img src="' + instagram.images.standard_resolution.url + '" />';
						var text_overlay = '<div class="text-overlay"><p>' + caption + '</p><span></div>';
						var a = '<a href="http://www.instagram.com/signaturecommunities" target="_blank">' + img + '</a>';
						var li = '<li>' + a + '</li>';
						$('.socialmedia__instagramlist').append(li);
					});
				}
			});
		}
	}, {
		key: 'get_twitter',
		value: function get_twitter() {
			$.ajax({
				url: ASSETS["ajaxurl"],
				data: {
					'action': 'get_twitter'
				},
				success: function success(res) {
					var tweets = JSON.parse(res);
					$.each(tweets, function () {
						var text = this.text;
						var urlPattern = /(https?:\/\/[\w-]+\.[\w-]+[\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-]?)/;
						var reg_text = text.replaceAll(urlPattern, "<a href='$1' target='_blank'>$1</a>");
						var li = "<li><p>" + reg_text + "</p></li>";
						$('.socialmedia__twitterlist').append(li);
					});
				}
			});
		}
	}]);

	return SocialMedia;
}();

var Form = function () {
	function Form() {
		_classCallCheck(this, Form);

		$(".honeypot").hide();

		this.validate_form();
		this.float_labels();
		this.error = false;
	}

	_createClass(Form, [{
		key: 'validate_form',
		value: function validate_form() {
			$("input.submit_form").on("click", function (e) {
				e.preventDefault();

				var _this = this;
				this.error = false;

				// reset error fields
				$('.form__field').removeClass('field--error');

				// select form
				var $form = $(this).parents('form');
				var form_json = {}; // start json data

				$.each($form.children('.form__field'), function (index, val) {

					var is_required = $(val).hasClass('required');
					var input = $(val).children('input');
					if (is_required) {
						// check that all inputs are not empty
						if (input.val().length == 0) {
							$(val).addClass('field--error');
							_this.error = true;
						}

						// email regex
						if (input.attr('type') == 'email') {
							var email = input.val();
							var pattern = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
							var res = pattern.test(email);
							if (!res) {
								$(val).addClass('field--error');
								_this.error = true;
							}
						}
					}

					form_json[input.attr('name')] = input.val();
				});

				if (!_this.error) {
					$.ajax({
						url: ASSETS["ajaxurl"],
						method: 'POST',
						data: {
							'form_data': form_json,
							'action': 'post_form',
							'security': ASSETS['ajax_nonce']
						},
						success: function success(res) {
							if (res == "200") {
								$(".form__wrapper").addClass("form--success");
								$(".form").fadeOut(300, function () {
									$(".form__response").html("<h4>Thank you</h4>");
								});
							}
						}
					});
				}
			});
		}
	}, {
		key: 'float_labels',
		value: function float_labels() {
			$(document).on("focusin", ".form__field", function (e) {
				$(this).addClass('float--label');
			});

			$(document).on("focusout", ".form__field", function (e) {
				var input = $(this).children('input');
				if (input.val().length == 0) {
					$(this).removeClass('float--label');
				}
			});
		}
	}]);

	return Form;
}();
/**
 * scripts.js
 */

$(document).ready(function () {
	var slider = new Slider("s1");
	new Form();
});