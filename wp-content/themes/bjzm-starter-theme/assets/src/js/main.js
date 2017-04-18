import $ from 'jquery';

/**
 * Custom Scripts
 */
import singleUpDown from './custom/single-page-updown';
import Form from './custom/forms';
import BzjmSocialFeed from './custom/bjzm-social-feeds';
import BjzmScripts from './custom/bjzm-scripts';
import Slider from './custom/bjzm-slideshow.js';


/**
 * Vendors
 */
import matchHeight from './vendors/jquery.matchHeight';

$(document).ready(function() {

	new BjzmScripts;

	var slider = new Slider("slider", {
		dots: true,
		customPaging : function(slider, i) {
 			return '<a href="#" class="slider__dots"></a>';
 		}
 	});

});