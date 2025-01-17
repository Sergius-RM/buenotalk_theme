<?php

class WPVQGR_type_user
{
	static public function create_wordpress_type() 
	{
		$labels = array(
			'name'                  => _x( 'Quiz Users', 'Post Type General Name', 'wpvq' ),
			'singular_name'         => _x( 'User', 'Post Type Singular Name', 'wpvq' ),
			'menu_name'             => __( 'Users', 'wpvq' ),
			'name_admin_bar'        => __( 'Post Type', 'wpvq' ),
			'archives'              => __( 'Item Archives', 'wpvq' ),
			'attributes'            => __( 'Item Attributes', 'wpvq' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wpvq' ),
			'all_items'             => __( 'All Users', 'wpvq' ),
			'add_new_item'          => __( 'Create a New User', 'wpvq' ),
			'add_new'               => __( 'Create New User', 'wpvq' ),
			'new_item'              => __( 'New User', 'wpvq' ),
			'edit_item'             => __( 'Edit User', 'wpvq' ),
			'update_item'           => __( 'Update User', 'wpvq' ),
			'view_item'             => __( 'View Item', 'wpvq' ),
			'view_items'            => __( 'View Items', 'wpvq' ),
			'search_items'          => __( 'Search Item', 'wpvq' ),
			'not_found'             => __( 'Not found', 'wpvq' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wpvq' ),
			'featured_image'        => __( 'Featured Image', 'wpvq' ),
			'set_featured_image'    => __( 'Set featured image', 'wpvq' ),
			'remove_featured_image' => __( 'Remove featured image', 'wpvq' ),
			'use_featured_image'    => __( 'Use as featured image', 'wpvq' ),
			'insert_into_item'      => __( 'Insert into item', 'wpvq' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpvq' ),
			'items_list'            => __( 'Items list', 'wpvq' ),
			'items_list_navigation' => __( 'Items list navigation', 'wpvq' ),
			'filter_items_list'     => __( 'Filter items list', 'wpvq' ),
		);

		$args = array(
			'label'                 => __( 'User', 'wpvq' ),
			'description'           => __( 'An user', 'wpvq' ),
			'labels'                => $labels,
			'supports'              => array('title'),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => false,
			'menu_position'         => false,
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
			'capabilities' => array(
				'create_posts' => 'do_not_allow',
			),
		  	'map_meta_cap' => true,
		);		
		register_post_type( 'wpvqgr_user', $args );
		add_filter( 'enter_title_here', 'WPVQGR_type_user::change_default_title' );
		add_filter( 'gettext', 'WPVQGR_type_user::change_publish_button', 10, 2 );
	}

	static public function change_default_title($title) 
	{
		$screen = get_current_screen();
		if  ( 'wpvqgr_user' == $screen->post_type ) {
			$title = "User's ID";
		}
		return $title;
	}

	static public function change_publish_button( $translation, $text ) {
	    if ( 'wpvqgr_user' == get_post_type() && ($text == 'Publish' || $text == 'Update') ) {
	        return 'Save';
	    } else {
	        return $translation;
	    }
	}

	/**
	 * Add to the custom post type submenu
	 */
	public static function add_submenu()
	{
		add_submenu_page( 'wpvqgr-main', __( 'Users', 'wpvq' ), __( 'Users', 'wpvq' ), 'manage_options', 'edit.php?post_type=wpvqgr_user', NULL );
	}

	/**
	 * Tags
	 */
	static public function create_wordpress_tag() 
	{
		$labels = array(
			'name' => __( 'Quiz Tag', 'taxonomy general name' ),
			'singular_name' => __( 'Quiz Tag', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Quiz Tags' ),
			'popular_items' => __( 'Popular Quiz Tags' ),
			'all_items' => __( 'All Quiz Tags' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Quiz Tag' ), 
			'update_item' => __( 'Update Quiz Tag' ),
			'add_new_item' => __( 'Add New Quiz Tag' ),
			'new_item_name' => __( 'New Quiz Tag' ),
			'separate_items_with_commas' => __( 'Separate Quiz Tags with commas' ),
			'add_or_remove_items' => __( 'Add or remove Quiz Tags' ),
			'choose_from_most_used' => __( 'Choose from the most used quiz tags' ),
			'menu_name' => __( 'Quiz Tags' ),
		); 
		 
		register_taxonomy('wpvqgr_tag', 'wpvqgr_user', array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => false,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
		));
	}
}