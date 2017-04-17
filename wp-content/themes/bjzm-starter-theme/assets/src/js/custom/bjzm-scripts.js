import $ from 'jquery';

class BjzmScripts {
	
	constructor() {
		 console.log('just bjzm scripts');
		 this.startMatchHeight();
	}

	startMatchHeight() {
		$('.some-section').matchHeight({
			byRow: false
		});
	}
	
}

module.exports = BjzmScripts;