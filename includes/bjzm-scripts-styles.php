<?php
/**
* Enqueue Scripts and Styles
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

add_action('wp_enqueue_scripts', 'bjzm_scripts');
function bjzm_scripts()
{
	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

		wp_register_script('bjzm-vendors', get_template_directory_uri() . '/assets/js/bjzm-vendors.min.js'); // Custom scripts
		wp_enqueue_script('bjzm-vendors');

		wp_register_script('aa_customJs', get_template_directory_uri() . '/assets/js/custom.min.js'); // Custom scripts
		wp_enqueue_script('aa_customJs');


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


/**
*
* Styles: Frontend with no conditions, Add Custom styles to wp_head
*
* @since  1.0
*
*/
add_action('wp_enqueue_scripts', 'aa_styles'); // Add Theme Stylesheet
function aa_styles()
{

/**
*
* Minified and Concatenated styles
*
*/
wp_register_style('aa_style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
wp_enqueue_style('aa_style');


/**
*
* Google fonts
*     Must be included this way to avoid Firefox issues
*
*/
// wp_register_style('aa_gfonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,800,400', array(), '1.0', 'all');
// wp_enqueue_style('aa_gfonts');


/**
*
* Non-minified or non-concatenated styles
*
*/

// wp_register_style('aa_xyz_css', get_template_directory_uri() . '/assets/css/vendor/xyz.css', array(), '1.0', 'all');
// wp_enqueue_style('aa_xyz_css');



}

/**
*
* Comment Reply js to load only when thread_comments is active
*
* @since  1.0.0
*
*/
add_action( 'wp_enqueue_scripts', 'aa_enqueue_comments_reply' );
function aa_enqueue_comments_reply() {
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
