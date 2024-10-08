<?php

/* 
Plugin Name: Philosophy-Companion
Plugin URI:
Description: Companion plugin for the philosophy theme
Version: 1.0
Author: Sajjad Hossen
Author URI:
License: GPLv2 or later
Text Domain: philosophy_companion
*/


function philosophy_companion_register_my_cpts_book() {

	/**
	 * Post Type: Books.
	 */

	$labels = [
		"name" => __( "Books", "philosophy" ),
		"singular_name" => __( "Book", "philosophy" ),
		"menu_name" => __( "Book List", "philosophy" ),
		"all_items" => __( "My Books", "philosophy" ),
		"add_new" => __( "Add Book", "philosophy" ),
		"add_new_item" => __( "New Book", "philosophy" ),
		"featured_image" => __( "Book Cover", "philosophy" ),
	];

	$args = [
		"label" => __( "Books", "philosophy" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => "books",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "book", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-book-alt",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "author" ],
		"taxonomies" => [ "category", "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "book", $args );
}

add_action( 'init', 'philosophy_companion_register_my_cpts_book' );




/* google map shortcode */

function philosophy_google_map ($attributes) {

	$default = array (
		'place'	=> 'Dhaka',
		'width'	=> 800,
		'height'=> 600,
	);
	$params = shortcode_atts( $default, $attributes );

	$map = <<<HEREDOC

<iframe width="{$params['width']}" height="{$params['height']}"
	src="https://maps.google.com/maps?q={$params['place']}&t=&z={$params['zoom']}&ie=UTF8&iwloc=&output=embed"
	frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
</iframe>

HEREDOC;

return $map;

}

add_shortcode( 'gmap', 'philosophy_google_map' );