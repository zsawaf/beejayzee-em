import $ from 'jquery';

class BjzmLoadMorePosts {

	constructor(args) {
		this.query_vars = JSON.parse(args.query_vars);
		this.post_loop = args.post_loop;
		this.ajax_url = args.ajax_url;
		this.max_num_pages = args.max_num_pages;
		
		this.page = ( this.query_vars.paged < 1 ) ? 1 : this.query_vars.paged;


		this.setButton();
		this.addButton();
		this.clickEvents();

	}

	setButton() {
		this.loadMoreSection = $('<div class="bjzm-load-more"> <a href="#" class="load-more__button button bjzm-load-more__button">Load More Posts</a>  </div> ');
	}

	init() {
		// console.log(this.query_vars);
	}

	addButton() {
		this.post_loop.append(this.loadMoreSection);
	}

	clickEvents() {
		$(document).on('click', '.bjzm-load-more a', (e) => {
			e.preventDefault();
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
				this.loadMoreSection.remove();
				if( this.page <= this.max_num_pages ) {
				 this.setHtml(response);
				 var newLoadMoreSection = this.loadMoreSection.clone();
				 
				 	this.post_loop.append(this.loadMoreSection);
				 }	
			}
		});

	}

	setHtml(html) {
		this.post_loop.append(html);
	}

}

module.exports = BjzmLoadMorePosts;