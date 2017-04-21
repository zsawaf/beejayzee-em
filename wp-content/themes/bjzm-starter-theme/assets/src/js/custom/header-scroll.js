import $ from 'jquery';

class HeaderScroll  {

	constructor(args) {

		this.vw = $(window).width();
		this.isOpen = false;
		this.headerThreshold = args.threshold;
		this.header = args.header;
		this.class = args.class;

		this._init();

	}

	_init() {

		if (this.vw >= 768) {
			this._doScroll();
			this.doScroll();
		}
		else {
			this.header.addClass('open');
		}

	}

	doScroll() {

		$(window).on('scroll', () => {
			this._doScroll();
		});

	}

	_doScroll() {

		this.scrollTop = $(window).scrollTop();

		if( this.scrollTop > this.headerThreshold  ) {
			if( !this.isOpen ) {
				this.isOpen = true;
				 console.log('yous collapse bitches');
				this.header.addClass( this.class );
			}
		}
		else {
			if( this.isOpen ) {
				this.isOpen = false;
				 console.log('back to normal') ;
				this.header.removeClass( this.class );
			}
		}

	}

}



module.exports = HeaderScroll;