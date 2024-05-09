<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
global $post;

?>
<?php
    $categories = wp_get_post_categories($post->ID);
        $category_names = array_map(function ($category_id) {
        return get_category($category_id)->slug;
    }, $categories);
?>

    <div class="grid-item col-12 col-sm-4 col-xl-3 m-auto post_item post_risen equal-height"
            data-post-id="<?php echo $post->ID; ?>"
            data-categories="<?php echo implode(' ', $category_names); ?>">

        <div class="articles-item">

        <div class="category-thumbnails d-flex">
            <?php foreach ($category_names as $category_slug) {
                $image_id = get_term_meta(get_term_by('slug', $category_slug, 'category')->term_id, 'term_image_id', true);

                if ($image_id) { ?>
                    <?php $category_image = wp_get_attachment_image($image_id, 'thumbnail'); ?>
                    <div class="thumbnail-item"><?php echo $category_image;?></div>
                <?php }
            } ?>
        </div>

        <div class="image">
            <?php if ( get_field('use_in_category') == true ):?>
                <?php $custom_thumbnail = get_field('blog_custom_thumbnail');?>
                <img src="<?php echo $custom_thumbnail;?>" alt="<?php the_title(); ?>">
            <?php elseif (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'image_full' ); ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                </a>
            <?php else: ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/post_thumbnail.png" alt="<?php the_title(); ?>" />
                </a>
            <?php endif; ?>
        </div>

        <div class="articles-content">

                <?php
                    if (get_field('use_in_category') == true):
                        $title = get_field('blog_custom_title');
                    else:
                        $title = get_the_title();
                    endif;

                // Ограничение по количеству символов
                $max_length = 100;
                $trimmed_title = mb_strimwidth($title, 0, $max_length, '...');

                $post_id = get_the_ID();
                $meta_desc = get_post_meta($post_id, '_yoast_wpseo_metadesc', true);
                $meta_desc_short = mb_strimwidth($meta_desc, 0, $max_length, '...');
                // echo $category_slug;
                ?>
                <h4>
                    <a href="<?php the_permalink(); ?>">
                        <?php if ($category_slug == 'videot') {
                            echo $meta_desc_short;
                        } else {
                            echo $trimmed_title;
                        };?>
                    </a>
                </h4>

            <a href="<?php the_permalink(); ?>" class="learn-more">
                <?php if ( get_field('readmore_link_name') ):?>
                    <?php echo get_field('readmore_link_name');?>
                <?php else:?>

                    <?php if (has_category('videot')) :?>
                        <?php _e( 'Katso video', 'buenotalk' );?>
                    <?php elseif (has_category('visat')) :?>
                        <?php _e( 'Pelaa visa', 'buenotalk' );?>
                    <?php else:?>
                        <?php _e( 'Lue lisää', 'buenotalk' );?>
                    <?php endif; ?>

                <?php endif;?>
                <!-- <i class="bi bi-arrow-right"></i> -->
                <img class="arrow_r" src="/wp-content/themes/buenotalk/assets/images/icons/arrow_r.svg" alt="">
            </a>
        </div>
        </div>
    </div>
