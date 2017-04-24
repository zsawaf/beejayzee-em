<?php
	function bjzm_add_thumbnail_sizes() {
	
	/*post/page content*/
	add_image_size( 'full-width', 1920, 1100, false );
	add_image_size( 'full-width-content', 1170, 850, true );
	
	/*hero*/
	add_image_size( 'hero-image', 1920, 840, true );
	add_image_size( 'hero-image-tablet', 991, 500, true );
	add_image_size( 'hero-image-mobile', 480, 242, true );

	/*post galleries*/
	add_image_size( 'gallery-thumbnail', 720, 497, true );	
	add_image_size( 'gallery-thumbnail-tall', 720, 600, true );	

	/*single featured images*/
	add_image_size( 'single-featured-image', 1170, 700, true );
	add_image_size( 'single-featured-image-tablet', 768, 500, true );
	add_image_size( 'single-featured-image-mobile', 480, 300, true );

	/*post loopts*/
	add_image_size( 'masonry-featured-image', 991, 700, false );
	add_image_size( 'card-featured-image', 991, 700, true );

}
bjzm_add_thumbnail_sizes();


function wpshout_custom_sizes( $sizes ) {

	return array_merge( $sizes, array(
		'full-width' => __( 'Full Width' ),
		'full-width-content' => __( 'Full Width Content' ),
		'hero-image' => __( 'Hero Image' ),
		'gallery-thumbnail' => __( 'Gallery Thumbnail' ),
		'gallery-thumbnail-tall' => __( 'Gallery Thumbnail Tall' ),
	) );
}



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' => 'BJZM Theme Options'
	));
	
}