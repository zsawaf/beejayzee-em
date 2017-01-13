<?php
/**
* Enqueue Scripts and Styles
*/

if ( ! defined( 'WPINC' ) ) { die; }


function bjzm_scripts()
{

	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

		wp_register_script('bjzm-vendors', get_template_directory_uri() . '/assets/js/bjzm-vendors.min.js');
		wp_enqueue_script('bjzm-vendors');

		wp_register_script('bjzm-custom-scripts', get_template_directory_uri() . '/assets/js/bjzm-custom-scripts.min.js');
		wp_enqueue_script('bjzm-custom-scripts');

		wp_register_script('bjzm-social-feed', get_template_directory_uri() . '/assets/js/custom/social-media.js', array('jquery'), null, true); 
		wp_localize_script('bjzm-social-feed', ASSETS, array(
			'assets_url' => get_template_directory_uri().'/assets/img',
			'ajaxurl' => admin_url('admin-ajax.php')
		));
		wp_enqueue_script('bjzm-social-feed');

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

