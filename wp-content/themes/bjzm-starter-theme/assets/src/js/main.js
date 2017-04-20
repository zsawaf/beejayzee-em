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


/**
 * Vendors
 */
import matchHeight from './vendors/jquery.matchHeight';

$(document).ready(function() {

	new BjzmScripts;

	var LoadMorePosts = new BjzmLoadMorePosts({
		query_vars: ASSETS.query_vars,
		ajax_url: ASSETS.ajaxurl,
		max_num_pages: ASSETS.max_num_pages,
		post_loop: $(".home-posts-loop")
	});

	var slider = new Slider("home_slider", {
		dots: true,
		customPaging : function(slider, i) {
 			return '<a href="#" class="slider__dots"></a>';
 		}
 	});

});