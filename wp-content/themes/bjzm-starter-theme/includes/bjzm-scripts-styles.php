<?php
/**
* Enqueue Scripts and Styles
*/

if ( ! defined( 'WPINC' ) ) { die; }


function bjzm_scripts()
{

	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js');

		global $wp_query;

		wp_register_script('main-scripts', get_template_directory_uri() . '/assets/dist/js/main-bundle.js');

			wp_localize_script('main-scripts', ASSETS, array(
				'assets_url' => get_template_directory_uri().'/assets/img',
				'ajaxurl' => admin_url('admin-ajax.php'),
				'current_page_info' => get_the_ID(),
				'query_vars' => json_encode( $wp_query->query_vars ),
				'current_url' => home_url(add_query_arg(array(),$wp_query->request)),
				'max_num_pages' => $wp_query->max_num_pages
			));
			
		wp_enqueue_script('main-scripts');

		wp_register_style( 'ie_html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
		wp_enqueue_style( 'ie_html5shiv');
		wp_style_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );

		wp_register_style( 'ie_respond', get_template_directory_uri() . '/js/respond.min.js' );
		wp_enqueue_style( 'ie_respond');
		wp_style_add_data( 'ie_respond', 'conditional', 'lt IE 9' );

	}

}
add_action('wp_enqueue_scripts', 'bjzm_scripts');

function bjzm_styles()
{

	wp_register_style('bjzm-styles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
	wp_enqueue_style('bjzm-styles');

}
add_action('wp_enqueue_scripts', 'bjzm_styles');

