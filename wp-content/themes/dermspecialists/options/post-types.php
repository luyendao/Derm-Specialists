<?php  
/*
register_post_type('custom-type', array(
	'labels' => array(
		'name'	 => 'Custom Types',
		'singular_name' => 'Custom Type',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new Custom Type' ),
		'view_item' => 'View Custom Type',
		'edit_item' => 'Edit Custom Type',
		'new_item' => __('New Custom Type'),
		'view_item' => __('View Custom Type'),
		'search_items' => __('Search Custom Types'),
		'not_found' =>  __('No custom types found'),
		'not_found_in_trash' => __('No custom types found in Trash'),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => array(
		"slug" => "custom-type",
		"with_front" => false,
	),
	'query_var' => true,
	'supports' => array('title', 'editor', 'page-attributes'),
));
*/

register_post_type('derms_member', array(
	'labels' => array(
		'name'	 => 'Staff',
		'singular_name' => 'Member',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new Member' ),
		'view_item' => 'View Member',
		'edit_item' => 'Edit Member',
		'new_item' => __('New Member'),
		'view_item' => __('View Member'),
		'search_items' => __('Search Members'),
		'not_found' =>  __('No members found'),
		'not_found_in_trash' => __('No members found in Trash'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => false,
	'query_var' => true,
	'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
));
