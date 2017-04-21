import $ from 'jquery';

class BjzmLoadMorePosts {

	constructor(args) {
		this.query_vars = JSON.parse(args.query_vars);
		this.post_loop = args.post_loop;
		 console.log(args.current_url) ;
	}

	init() {
		 console.log('you called me');
		  console.log(this.query_vars);
	}

}

module.exports = BjzmLoadMorePosts;