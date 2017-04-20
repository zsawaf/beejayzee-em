import $ from 'jquery';

class BjzmScripts {
	
	constructor() {
		 this.startMatchHeight();
	}

	startMatchHeight() {
		$('.bjzm-match-height').matchHeight({
			byRow: false
		});
	}
	
}

module.exports = BjzmScripts;