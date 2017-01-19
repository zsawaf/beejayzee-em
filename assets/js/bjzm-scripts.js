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

/**
 * scripts.js
 */

$(document).ready(function () {
	var slider = new Slider("s1");
	DoShit.someFunction();
});