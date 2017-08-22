<?php
/*// Register Custom Post Type
add_action('init', 'custom_post_type', 0);

function custom_post_type() {
	$project_labels = array(
		'name' => 'Gallery',
		'singular_name' => 'Gallery',
		'menu_name' => 'Gallery',
		'all_items' => 'All Projects',
		'view_item' => 'View Project',
		'add_new_item' => 'Add Project',
		'add_new' => 'Add Project',
		'edit_item' => 'Edit',
		'update_item' => 'Update',
		'search_items' => 'Search'
	);
	$project_args = array(
		'labels' => $project_labels,
		'supports' => array('title','thumbnail','editor'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => array(
			'with_front' => true
		)
	);
	register_post_type('gallery', $project_args);

	function tr_create_my_taxonomy() {
		register_taxonomy(
			'gallery',
			'gallery',
			array(
				'label' => __( 'Gallery category' ),
				'hierarchical' => true,
			)
		);
	}
	add_action( 'init', 'tr_create_my_taxonomy' );


}*/
