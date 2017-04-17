import $ from 'jquery';

/**
 * Custom Scripts
 */
import updown from './custom/single-page-updown';
import Form from './custom/forms';
import BzjmSocialFeed from './custom/bjzm-social-feeds';
import BjzmScripts from './custom/bjzm-scripts';


/**
 * Vendors
 */
import slick from  './vendors/slider.min';
import matchHeight from './vendors/jquery.matchHeight';

$(document).ready(function() {
	

	var MyForm = new Form;

	new BjzmScripts;

	$(".slider").slick();

});