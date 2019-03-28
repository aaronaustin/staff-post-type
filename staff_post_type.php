<?php
/*Plugin Name: Create staff Post Type
Description: This plugin registers the staff post type.
Version: 1.1.0
License: GPLv2
GitHub Plugin URI: https://github.com/aaronaustin/staff-post-type
*/

// register custom post type to work with
function create_staff_post_type() {
	// set up labels
	$labels = array(
 		'name' => 'Staff',
    	'singular_name' => 'Staff',
    	'add_new' => 'New Staff',
    	'add_new_item' => 'New Staff',
    	'edit_item' => 'Edit Staff',
    	'new_item' => 'New Staff',
    	'all_items' => 'All Staff',
    	'view_item' => 'View Staff',
    	'search_items' => 'Search Staff',
    	'not_found' =>  'No Staff Found',
    	'not_found_in_trash' => 'No Staff found in Trash',
    	'parent_item_colon' => '',
    	'menu_name' => 'Staff'
    );
    //register post type
	register_post_type( 'staff', array(
		'labels' => $labels,
        'show_in_rest' => true,
		'has_archive' => true,
 		'public' => true,
		'taxonomies' => '',
		'exclude_from_search' => true,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'staff'),
		'rest_base' => 'staff',
        'rest_controller_class' => '',
        'menu_icon' => 'dashicons-id-alt',
        'supports' => array( 'title', 'editor', 'thumbnail','staff_start_datetime' )
		)
	);
}
add_action( 'init', 'create_staff_post_type' );

// Add the custom columns to the staff post type:
add_filter( 'manage_staff_posts_columns', 'set_custom_edit_staff_columns' );
function set_custom_edit_staff_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['categories'] );
    unset( $columns['comments'] );
    unset( $columns['tags'] );
 
    return $columns;
}

?>