import $ from 'jquery';

class BjzmScripts {
	
	constructor() {
		 this.startMatchHeight();
		 this.do_hamburger();
	}

	do_hamburger() {
		$("a.hamburger").on("click", function(e){
			console.log("CLICKED");
			e.preventDefault();
			$("body").toggleClass("menu-active");
		})
	}

	startMatchHeight() {
	/*	$('.bjzm-match-height').matchHeight({
			byRow: false
		});*/
	}
	
}

module.exports = BjzmScripts;