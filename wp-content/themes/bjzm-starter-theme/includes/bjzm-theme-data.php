<?php

/**
 * Generate Custom Post Types & Taxonomies
 */

?>


<?php

// News Custom Post Type
function generate_news_posts() {

	$labels = array(
		'name'                  => _x( 'News Posts', 'Post Type General Name', 'yongestclair' ),
		'singular_name'         => _x( 'News Post', 'Post Type Singular Name', 'yongestclair' ),
		'menu_name'             => __( 'News Posts', 'yongestclair' ),
		'name_admin_bar'        => __( 'News Post', 'yongestclair' ),
		'archives'              => __( 'Item Archives', 'yongestclair' ),
		'parent_item_colon'     => __( 'Parent Item:', 'yongestclair' ),
		'all_items'             => __( 'All Items', 'yongestclair' ),
		'add_new_item'          => __( 'Add New Post', 'yongestclair' ),
		'add_new'               => __( 'Add New', 'yongestclair' ),
		'new_item'              => __( 'New Post', 'yongestclair' ),
		'edit_item'             => __( 'Edit Post', 'yongestclair' ),
		'update_item'           => __( 'Update Post', 'yongestclair' ),
		'view_item'             => __( 'View Post', 'yongestclair' ),
		'search_items'          => __( 'Search Posts', 'yongestclair' ),
		'not_found'             => __( 'Not found', 'yongestclair' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'yongestclair' ),
		'featured_image'        => __( 'Featured Image', 'yongestclair' ),
		'set_featured_image'    => __( 'Set featured image', 'yongestclair' ),
		'remove_featured_image' => __( 'Remove featured image', 'yongestclair' ),
		'use_featured_image'    => __( 'Use as featured image', 'yongestclair' ),
		'insert_into_item'      => __( 'Insert into item', 'yongestclair' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'yongestclair' ),
		'items_list'            => __( 'Items list', 'yongestclair' ),
		'items_list_navigation' => __( 'Items list navigation', 'yongestclair' ),
		'filter_items_list'     => __( 'Filter items list', 'yongestclair' ),
	);
	$args = array(
		'label'                 => __( 'News Post', 'yongestclair' ),
		'description'           => __( 'News Post', 'yongestclair' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'revisions', 'editor' , 'page-attributes'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'taxonomies' => array('news_category'),
		'rewrite' => array('slug' => 'news')
	);
	register_post_type( 'news_post', $args );

}
add_action( 'init', 'generate_news_posts', 0 );

// News Category Taxonomy
function create_travel_category_taxonomy() {

	$labels = array(
		'name' => _x( 'News Categories', 'taxonomy general name' ),
		'singular_name' => _x( 'News Category', 'taxonomy singular name' ),
		'all_items' => __( 'All News Categories' ),
		'separate_items_with_commas' => __( 'Separate news categories with commas' ),
		'add_or_remove_items' => __( 'Add or remove news categories' ),
		'menu_name' => __( 'News Categories' ),
	); 

	register_taxonomy('news_category','post',array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
	));

}
add_action( 'init', 'create_travel_category_taxonomy', 0 );