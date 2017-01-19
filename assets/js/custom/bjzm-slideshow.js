/* --------------------------------------------
 *
 * Initialize sliders utilizing slick.js
 *
 * Dependencies:
 * 	- Jquery
 * 	- Slick
 *
 * Parameters:
 * 	- id: id of slider
 * 	- settings: settings to use on slider. 
 * 	
 * Methods Supported:
 * 	- initialize: initialize the slider with given id and settings
 * 	- destroy: destroy the slider.
 * 	- add: given html string, add slide to slider
 * 	- remove: given index, remove slide in that index
 * 	- play: play slideshow
 * 	- pause: pause slideshow
 * 	- next: go to next slide
 * 	- prev: go to prev slide
 * 	- goto: given index, go to that slide
 *
 * - getCurrentSlide: return current slide
 * 	
 * -------------------------------------------- */


class Slider {
	constructor(id=null, settings=null) {
		if (id == null) {
			return false; // we need an id for the slider
		}

		this.id = id;
		this.selector = "#"+id;
		this.settings = settings;

		this.initialize();
	}

	initialize() {
		$(this.selector).slick(this.settings);
	}

	destroy() {
		$(this.selector).slick('unslick');
	}

	add(html) {
		$(this.selector).slick('slickAdd', html);
	}

	remove(index) {
		$(this.selector).slick('slickRemove', index);
	}

	play() {
		$(this.selector).slick('slickPlay');
	}

	pause() {
		$(this.selector).slick('slickPause');
	}

	next() {
		$(this.selector).slick('slickNext');
	}

	prev() {
		$(this.selector).slick('slickPrev');
	}

	gotto(index) {
		$(this.selector).slick('slickGoTo', index);
	}

	getCurrentSlide() {
		return $(this.selector).slick('slickCurrentSlide');
	}
}






