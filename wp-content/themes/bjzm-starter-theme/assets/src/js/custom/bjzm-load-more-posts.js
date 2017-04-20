import $ from 'jquery';

class BjzmLoadMorePosts {

	constructor(args) {
		this.query_vars = JSON.parse(args.query_vars);
		this.post_loop = args.post_loop;
		this.ajax_url = args.ajax_url;
		
		this.page = ( this.query_vars.paged < 1 ) ? 1 : this.query_vars.paged;

		this.setButton();
		this.addButton();
		this.clickEvents();

	}

	setButton() {
		this.button = $('<a href="#" class="load-more__button button bjzm-load-more-button">Load More Posts</a>');
	}

	init() {
		// console.log(this.query_vars);
	}

	addButton() {
		this.post_loop.append(this.button);
	}

	clickEvents() {
		// $(document).on('click', '.bjzm-load-more-button', (e) => {
		this.button.on('click', (e) => {
			e.preventDefault();
			console.log('click is ' + this.page);
			this.page ++;
			this.doAjax();
		});
	}

	doAjax() {

		$.ajax({
			url: this.ajax_url,
			type: 'post',
			data: {
				action: 'bjzm_next_posts',
				query_vars: this.query_vars,
				page: this.page
			},
			success: (response)  => {
				 this.setHtml(response);
				 this.button.data('page', 'asdf asdf sadf').html('Load to page ' + this.page);
			}
		});

	}

	setHtml(html) {
		// var html = JSON.parse(data);
		this.post_loop.append(html);
	}

}

module.exports = BjzmLoadMorePosts;