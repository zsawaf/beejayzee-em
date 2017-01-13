<?php



function bjzm_theme_setup() {


	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'neat' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

}
add_action( 'after_setup_theme', 'bjzm_theme_setup' );


if ( file_exists( dirname( __FILE__ ) . '/includes/bjzm-scripts-styles.php' ) ) {
	require_once( dirname(__FILE__).'/includes/bjzm-scripts-styles.php' );
}


if ( file_exists( dirname( __FILE__ ) . '/includes/bjzm-options.php' ) ) {
	require_once( dirname(__FILE__).'/includes/bjzm-options.php' );
}


if ( file_exists( dirname( __FILE__ ) . '/includes/bjzm-social-feeds.php' ) ) {
	require_once( dirname(__FILE__).'/includes/bjzm-social-feeds.php' );
}


