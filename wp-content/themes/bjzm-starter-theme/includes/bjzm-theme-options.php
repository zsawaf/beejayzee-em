<?php

/**
 * Class dedicated for theme settings
 */

class BJZM_ThemeSettings {
	public function __construct() {
		add_action('init', array($this, 'generate_entries'));
		// add_action('init', array($this, 'build_contact_form'));
	}

	public function generate_entries() {
		$labels = array(
			'name'                  => _x( 'Entries', 'Post Type General Name', 'bloor-dufferin' ),
			'singular_name'         => _x( 'Entry', 'Post Type Singular Name', 'bloor-dufferin' ),
			'menu_name'             => __( 'entries', 'bloor-dufferin' ),
			'name_admin_bar'        => __( 'Entry', 'bloor-dufferin' ),
			'archives'              => __( 'Entries', 'bloor-dufferin' ),
			'parent_item_colon'     => __( 'Parent Entry', 'bloor-dufferin' ),
			'all_items'             => __( 'All entries', 'bloor-dufferin' ),
			'add_new_item'          => __( 'Add New Entry', 'bloor-dufferin' ),
			'add_new'               => __( 'Add New', 'bloor-dufferin' ),
			'new_item'              => __( 'New Entry', 'bloor-dufferin' ),
			'edit_item'             => __( 'Edit Item', 'bloor-dufferin' ),
			'update_item'           => __( 'Update Entry', 'bloor-dufferin' ),
			'view_item'             => __( 'View Entry', 'bloor-dufferin' ),
			'search_items'          => __( 'Search Item', 'bloor-dufferin' ),
			'not_found'             => __( 'Not found', 'bloor-dufferin' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bloor-dufferin' ),
			'featured_image'        => __( 'Featured Image', 'bloor-dufferin' ),
			'set_featured_image'    => __( 'Set featured image', 'bloor-dufferin' ),
			'remove_featured_image' => __( 'Remove featured image', 'bloor-dufferin' ),
			'use_featured_image'    => __( 'Use as featured image', 'bloor-dufferin' ),
			'insert_into_item'      => __( 'Insert into item', 'bloor-dufferin' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bloor-dufferin' ),
			'items_list'            => __( 'Items list', 'bloor-dufferin' ),
			'items_list_navigation' => __( 'Items list navigation', 'bloor-dufferin' ),
			'filter_items_list'     => __( 'Filter items list', 'bloor-dufferin' ),
			);
		$args = array(
			'label'                 => __( 'Entry', 'bloor-dufferin' ),
			'description'           => __( 'Area entries', 'bloor-dufferin' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'custom-fields'),
			'taxonomies'            => array( 'area_title' ),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,   
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			);
		register_post_type( 'bjzm_form_entries', $args );
	}

	/* BUILD CONTACT FORM */
}

$theme_settings = new BJZM_ThemeSettings();

function build_contact_form() {
	$fields = array(
		array('title' => 'First Name', 'type' => 'text', 'class' => '', 'required' => true, 'options' => null),
		array('title' => 'Last Name', 'type' => 'text', 'class' => '', 'required' => true, 'options' => null),
		array('title' => 'Email', 'type' => 'text', 'class' => '', 'required' => true, 'options' => null),
		array('title' => 'Select Example', 'type' => 'select', 'class' => '', 'required' => true, 'options' => array('option 1', 'option 2', 'option 3')),
	);
	$args = array('title' => 'contact', 'id' => '1', 'fields' => $fields, 'confirmation' => 'Thank You', 'output' => 'bjzm_form_entries');
	bjzm_add_form($args);
}
add_action('init', 'build_contact_form');