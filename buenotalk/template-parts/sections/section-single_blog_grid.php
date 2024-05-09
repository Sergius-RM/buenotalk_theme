<?php $wpex_query = new WP_Query( $args );
    foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>

<?php
    $categories = get_the_category();
    if (!empty($categories)) {
        $category_names = array_map(function($category) {
            return $category->slug;
        }, $categories);
    }
?>

<div class="grid-item col-12 col-sm-4 col-xl-3 m-auto post_item post_risen equal-height" data-post-id="<?php echo $post->ID; ?>" data-categories="<?php echo implode(' ', $category_names); ?>">

    <div class="articles-item">

        <?php
            $categories = get_the_category($post->ID);
            if ($categories) { ?>
            <div class="category-thumbnails d-flex">
                <?php foreach ($categories as $category) {
                    $image_id = get_term_meta($category->term_id, 'term_image_id', true);

                    if ($image_id) { ?>
                        <?php $category_image = wp_get_attachment_image($image_id, 'thumbnail'); ?>
                        <div class="thumbnail-item"><?php echo $category_image;?></div>
                    <?php }
                } ?>
            </div>
        <?php }
        ?>

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

            ?>
            <h4><a href="<?php the_permalink(); ?>"><?php echo $trimmed_title; ?></a></h4>

            <a href="<?php the_permalink(); ?>" class="learn-more">
                <?php _e( 'Lue lisää', 'buenotalk' );?>
                <!-- <i class="bi bi-arrow-right"></i> -->
                <img class="arrow_r" src="/wp-content/themes/buenotalk/assets/images/icons/arrow_r.svg" alt="">
            </a>
        </div>
    </div>
</div>
<?php endforeach;?>