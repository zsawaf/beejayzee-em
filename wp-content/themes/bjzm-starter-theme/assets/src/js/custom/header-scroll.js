import $ from 'jquery';

class HeaderScroll  {

	constructor(args) {

		this.vw = $(window).width();
		this.isOpen = false;
		this.headerThreshold = args.threshold;
		this.header = args.header;
		this.class = args.class;

		this.init();

	}

	init() {

		if (this.vw >= 768) {
			this.handleScroll();
			this.doScroll();
		}
		else {
			this.header.addClass('open');
		}

	}

	doScroll() {

		$(window).on('scroll', () => {
			this.handleScroll();
		});

	}

	handleScroll() {

		this.scrollTop = $(window).scrollTop();

		if( this.scrollTop > this.headerThreshold  ) {
			if( !this.isOpen ) {
				this.isOpen = true;
				this.header.addClass( this.class );
			}
		}
		else {
			if( this.isOpen ) {
				this.isOpen = false;
				this.header.removeClass( this.class );
			}
		}

	}

}



module.exports = HeaderScroll;