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
		this.loadMoreSection = $('<div class="bjzm-load-more"> <a href="#" class="load-more__button button bjzm-load-more__button button--flat">Load More Posts</a>  </div> ');
	}

	addButton() {
		this.post_loop.append(this.loadMoreSection);
	}

	clickEvents() {
		$(document).on('click', '.bjzm-load-more a', (e) => {
			e.preventDefault();
			this.page ++;
			var $button = $(e.currentTarget);
			$button.html('Loading...');
			this.doAjax( $button );
		});
	}

	doAjax($button) {

		$.ajax({
			url: this.ajax_url,
			type: 'post',
			data: {
				action: 'bjzm_next_posts',
				query_vars: this.query_vars,
				page: this.page
			},
			success: (response)  => {
				this.handleResponse(response);
				$button.html('Load More Posts');
			}
		});

	}

	handleResponse(html) {

		this.loadMoreSection.remove();
		this.post_loop.append(html);
		var newLoadMoreSection = this.loadMoreSection.clone();
		
		if( this.page < this.max_num_pages ) {
			this.post_loop.append(this.loadMoreSection);
		}	

	}

}

module.exports = BjzmLoadMorePosts;