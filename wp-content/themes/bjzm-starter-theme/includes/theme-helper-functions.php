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
	lt($cats);
	return $cats[0]->name;
}









