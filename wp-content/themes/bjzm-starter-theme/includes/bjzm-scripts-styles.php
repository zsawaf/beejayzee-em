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

		wp_register_script('bjzm-vendors', get_template_directory_uri() . '/assets/js/bjzm-vendors.min.js', array('jquery'));
		wp_enqueue_script('bjzm-vendors');

	/*	wp_register_script('bjzm-vendors', get_template_directory_uri() . '/assets/js/bjzm-vendors.min.js', array('jquery'));
		wp_enqueue_script('bjzm-vendors');*/

		wp_register_script('bjzm-scripts', get_template_directory_uri() . '/assets/js/bjzm-scripts.min.js');
		wp_enqueue_script('bjzm-scripts');

		wp_register_script('bjzm-social-feeds', get_template_directory_uri() . '/assets/js/custom/bjzm-social-feeds.js', array('jquery'), null, true); 
			wp_localize_script('bjzm-social-feeds', ASSETS, array(
				'assets_url' => get_template_directory_uri().'/assets/img',
				'ajaxurl' => admin_url('admin-ajax.php'),
				'current_page_info' => get_the_ID()
			));
		wp_enqueue_script('bjzm-social-feeds');

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

