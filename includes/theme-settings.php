<?php
	
	/**
	 * Class dedicated for theme settings
	 */
	
	class BJZM_ThemeSettings {
		public function __construct() {
			add_action('init', array($this, 'generate_registrations'));
		}

		public function generate_registrations() {
			$labels = array(
				'name'                  => _x( 'Registrations', 'Post Type General Name', 'bloor-dufferin' ),
				'singular_name'         => _x( 'Registration', 'Post Type Singular Name', 'bloor-dufferin' ),
				'menu_name'             => __( 'Registrations', 'bloor-dufferin' ),
				'name_admin_bar'        => __( 'Registration', 'bloor-dufferin' ),
				'archives'              => __( 'Registrations', 'bloor-dufferin' ),
				'parent_item_colon'     => __( 'Parent Registration', 'bloor-dufferin' ),
				'all_items'             => __( 'All Registrations', 'bloor-dufferin' ),
				'add_new_item'          => __( 'Add New Registration', 'bloor-dufferin' ),
				'add_new'               => __( 'Add New', 'bloor-dufferin' ),
				'new_item'              => __( 'New Registration', 'bloor-dufferin' ),
				'edit_item'             => __( 'Edit Item', 'bloor-dufferin' ),
				'update_item'           => __( 'Update Registration', 'bloor-dufferin' ),
				'view_item'             => __( 'View Registration', 'bloor-dufferin' ),
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
				'label'                 => __( 'Registration', 'bloor-dufferin' ),
				'description'           => __( 'Area Registrations', 'bloor-dufferin' ),
				'labels'                => $labels,
				'supports'              => array( 'title'),
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
			register_post_type( 'registrations', $args );
		}
	}

	$theme_settings = new BJZM_ThemeSettings();