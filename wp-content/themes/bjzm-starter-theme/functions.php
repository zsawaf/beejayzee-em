<?php



function bjzm_theme_setup() {


	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'bjzm' ),
		'social' => esc_html__( 'Social Menu', 'bjzm' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

}
add_action( 'after_setup_theme', 'bjzm_theme_setup' );

/**
 * Scripts & Styles
 */
if ( file_exists( dirname( __FILE__ ) . '/includes/bjzm-scripts-styles.php' ) ) {
	require_once( dirname(__FILE__).'/includes/bjzm-scripts-styles.php' );
}

/**
 * Theme Options
 */
if ( file_exists( dirname( __FILE__ ) . '/includes/bjzm-options.php' ) ) {
	require_once( dirname(__FILE__).'/includes/bjzm-options.php' );
}

/**
 * Instagram and Twitter API Feeds
 */
if ( file_exists( dirname( __FILE__ ) . '/includes/bjzm-social-feeds.php' ) ) {
	require_once( dirname(__FILE__).'/includes/bjzm-social-feeds.php' );
}

/**
 * Theme Functions
 */
if ( file_exists( dirname( __FILE__ ) . '/includes/bjzm-theme-functions.php' ) ) {
	require_once( dirname(__FILE__).'/includes/bjzm-theme-functions.php' );
}


if (file_exists(dirname(__FILE__).'/includes/social-media.php')) {
    require_once( dirname(__FILE__).'/includes/social-media.php' );
}

if (file_exists(dirname(__FILE__).'/includes/theme-helper-functions.php')) {
    require_once( dirname(__FILE__).'/includes/theme-helper-functions.php' );
}


if (file_exists(dirname(__FILE__).'/includes/theme-settings.php')) {
    require_once( dirname(__FILE__).'/includes/theme-settings.php' );
}

if (file_exists(dirname(__FILE__).'/includes/forms.php')) {
    require_once( dirname(__FILE__).'/includes/forms.php' );
}
