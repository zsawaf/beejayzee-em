import $ from 'jquery';

/**
 * Custom Scripts
 */
import singleUpDown from './custom/single-page-updown';
import Form from './custom/forms';
import BzjmSocialFeed from './custom/bjzm-social-feeds';
import BjzmScripts from './custom/bjzm-scripts';
import Slider from './custom/bjzm-slideshow.js';

import BjzmLoadMorePosts from './custom/bjzm-load-more-posts';
import HeaderScroll from './custom/header-scroll';

/**
 * Vendors
 */
import matchHeight from './vendors/jquery.matchHeight';
import magnificPopup from 'magnific-popup';

$(document).ready(function() {

	new BjzmScripts();


	/* Load More Posts */
	var LoadMorePosts = new BjzmLoadMorePosts({
		query_vars: ASSETS.query_vars,
		ajax_url: ASSETS.ajaxurl,
		max_num_pages: ASSETS.max_num_pages,
		post_loop: $(".posts-loop")
	});


	/* Homepage Slideshow*/
	var HomeSlider = new Slider("home_slider", {
		dots: true,
		customPaging : function(slider, i) {
 			return '<a href="#" class="slider__dots"></a>';
 		}
 	});


	/* Header Scroll */
	var MainHeaderScroll = new HeaderScroll({
		header: $(".header-main--collapse"),
		threshold: 300,
		class: 'header-main--collapsed'
	});

	/*privacy policy*/
	$('.open-inline-lightbox').magnificPopup({
 		type: 'inline',
		midClick: true,
		removalDelay: 300,
		mainClass: 'mfp-fade mfp-wrap--privacy-policy'
	});


});









