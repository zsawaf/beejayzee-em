<?php

/**
 * Create a picture element tag given different image dimensions. 
 * 
 * @param  [string] $full_width   [full width image url]
 * @param  [string] $tablet_width [tablet width image url]
 * @param  [string] $mobile_width [mobile width image url]
 * @return [io]               [the picture tag]
 */
function srcset($full_width, $tablet_width, $mobile_width) {
	echo "
		<picture>
			<source media='(min-width: 991px)'
				srcset='$full_width'>
			<source media='(min-width: 480px)'
				srcset='$tablet_width'>
			<img srcset='$mobile_width' alt=''>
		</picture>
	";
}


function my_secondary_menu_classes( $classes, $item, $args ) {

	$classes[] = 'navigation__item';
	return $classes;

}
add_filter( 'nav_menu_css_class', 'my_secondary_menu_classes', 	10, 3 ); 


function bjzm_get_post_category() {

	$cats = get_the_category();
	return $cats[0]->name;

}

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
add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );

function filter_ptags_on_images($content) {
	return preg_replace('/<p\b[^>]*>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'filter_ptags_on_images', 10);



