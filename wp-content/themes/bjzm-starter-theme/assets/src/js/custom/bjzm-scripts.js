import $ from 'jquery';

class BjzmScripts {
	
	constructor() {
		 console.log('just bjzm scripts');
		 this.startMatchHeight();
	}

	startMatchHeight() {
		$('.bjzm-match-height').matchHeight({
			byRow: false
		});
	}
	
}

module.exports = BjzmScripts;