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

	$(".bjzm-slider__list").slick();

	var LoadMorePosts = new BjzmLoadMorePosts({
		query_vars: ASSETS.query_vars,
		current_url: ASSETS.current_url
	});
	LoadMorePosts.init();

	/*var slider = new Slider("home-slider", {
		dots: true,
		customPaging : function(slider, i) {
 			return '<a href="#" class="slider__dots"></a>';
 		}
 	});
*/
});