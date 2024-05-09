<?php
// https://codex.wordpress.org/Function_Reference

/* Disabling XML-RPC */
add_filter('xmlrpc_enabled', '__return_false');

require get_template_directory() .'/inc/acf.php';

require get_template_directory() .'/inc/sheets-api.php';

/**
 * Connecting Menus and Widgets
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Connecting scripts and styles
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Setting up and duplicating posts/pages
 */
require get_template_directory() .'/inc/post.php';

/**
 * Pagination.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom Post Type
 */
require get_template_directory() .'/inc/custom_post_type.php';

/**
 * Connecting scripts and styles
 */
require get_template_directory() . '/inc/wp_term_image.php';

/**
 * Media.
 */
require get_template_directory() .'/inc/media.php';

/**
 * Woocomerce
 */
require get_template_directory() .'/inc/woo.php';

/**
 * Additions
 */
require get_template_directory() .'/inc/additions.php';

require get_template_directory() .'/inc/no-category-parents.php';