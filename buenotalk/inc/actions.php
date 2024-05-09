<?php
/**
 * Actions
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// без этого в админке просто не будет пункта "меню"
add_theme_support('menus');

function wpspec_menu_desc( $item_output, $item, $depth, $args ) {
    if ($item->description) {
        $item_output = str_replace( '</a>', '<span class="description">' . $item->description . '</span></a>', $item_output );
    }

    return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'wpspec_menu_desc', 10, 4 );

/**
 * Register navigation menus.
 */
register_nav_menus(
  [
    'menu-1' => esc_html__('Primary menu', 'buenotalk'),
    'footer-1' => esc_html__('Footer menu', 'buenotalk'),
  ]
);


register_sidebar(array(
    'name'          => __('Header Widget Area', 'buenotalk'),
    'id'            => 'header_1',
    'description'   => __('Appears on posts and pages in the sidebar.', 'buenotalk'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));


register_sidebar(array(
    'name'          => __('Right Sidebar Area', 'buenotalk'),
    'id'            => 'sidebar_1',
    'description'   => __('Appears on posts and pages in the sidebar.', 'buenotalk'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));

register_sidebar(array(
    'name'          => __('Footer Widget Area 1', 'buenotalk'),
    'id'            => 'footer_1',
    'description'   => __('Appears on posts and pages in the sidebar.', 'buenotalk'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));
register_sidebar(array(
    'name'          => __('Footer Widget Area 2', 'buenotalk'),
    'id'            => 'footer_2',
    'description'   => __('Appears on posts and pages in the sidebar.', 'buenotalk'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));
register_sidebar(array(
    'name'          => __('Footer Widget Area 3', 'buenotalk'),
    'id'            => 'footer_3',
    'description'   => __('Appears on posts and pages in the sidebar.', 'buenotalk'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));

register_sidebar(array(
    'name'          => __('Footer Copyright Widget Area', 'buenotalk'),
    'id'            => 'footer_bottom',
    'description'   => __('Appears on posts and pages in the sidebar.', 'buenotalk'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));

/**
 * WP Remove Guttenberg
 */

add_action('init', 'remove_guttenberg_from_pages', 10);
function remove_guttenberg_from_pages() {
    remove_post_type_support('page', 'editor');
}

function custom_search_form($form) {

    $form = '<form role="search" method="get" class="search-form" action="' . home_url('/') . '">';
  
    $form .= '<label>';
  
    $form .= '<span class="screen-reader-text">' . __('Etsi', 'buenotalk') . ':</span>';
  
    $form .= '<input type="search" class="search-field" placeholder="' . __('Etsi...', 'buenotalk') . '" value="" name="s" title="' . __('Etsi', 'buenotalk')  . ':" />';
  
    $form .= '</label>';
  
    $form .= '<input type="submit" class="search-submit" value="➤" />';
  
    $form .= '</form>';
  
    return $form;
  
  }

add_filter('get_search_form', 'custom_search_form');

/*-----------------------------------------------*
 * WP New Image Sizes
/*-----------------------------------------------*/
add_theme_support('custom-header');
// Add RSS feed links to <head> for posts and comments.
add_theme_support( 'automatic-feed-links' );
// Enable support for Post Thumbnails, and declare sizes.
add_theme_support( 'post-thumbnails' );
// Theme resize image
add_image_size( 'image_full'  , 1920, 1280, false ); //header carousel - aspect 3:2
add_image_size( 'image_blogpost', 1200 , 800, true ); //single blog - aspect 3:2
add_image_size( 'image_mediumM', 800 , 450, true ); //single Reference - aspect 16:9
add_image_size( 'image_small' , 480 , 320, true ); //blog masonry - aspect 3:2
add_image_size( 'image_reference' , 450 , 300, true ); //blog Overlay - aspect 3:2
add_image_size( 'image_allreferences' , 675 , 450, true ); //All references grid view - aspect 3:2
add_image_size( 'image_latestnews' , 390 , 260, true ); //Grid latestnews - aspect 3:2
add_image_size( 'image_team'  , 540 , 650, false );
add_image_size( 'image_square'  , 450 , 450, false );
add_image_size( 'image_thumb' , 100 , 100, false );

function my_pre_get_posts( $query ) {
    // do not modify queries in the admin
    if( is_admin() ) {
        return $query;
    }

    // only modify queries for 'event' post type
    if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'event' ) {

        $query->set('orderby', 'meta_value');
        $query->set('meta_key', 'start_date');
        $query->set('order', 'DESC');

    }

    // return
    return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');