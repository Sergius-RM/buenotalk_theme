<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


$categories = get_the_category($post->ID);
$category_ids = array();
foreach($categories as $individual_category) {
    $category_ids[] = $individual_category->term_id;
}
$args=array(
    'post_type'         => 'post',
    'posts_per_page'    => 4,
    'post__not_in'      => array( get_the_ID() ),
    'no_found_rows'     => true,
    'orderby'           => 'rand',
    'category__in'      => $category_ids
);

?>

<!-- Related Articles Area Start -->
<section class="highlighted_articles">
    <div class="container">
        <div class="row">
            <div class="col-10 container section-title d-flex align-items-center">
                <?php if( get_sub_field('section_header_h2') ): ?>
                    <h2><?php echo get_sub_field('section_header_h2'); ?></h2>
                <?php else: ?>
                    <h2><?php _e( 'Lisää juttuja tästä aiheesta', 'buenotalk' );?></h2>
                <?php endif; ?>
            </div>
        </div>

        <div class="row justify-content-center related_articles_list">

            <?php $wpex_query = new WP_Query( $args );
            foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
            <div class="col-12 col-md-6 col-xl-3 mx-auto equal-height post_item post_risen" id="post-<?php the_ID(); ?>">
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
                        <a href="<?php the_permalink(); ?>">
                        <?php if ( get_field('use_in_category') == true ):?>
                            <?php $custom_thumbnail = get_field('blog_custom_thumbnail');?>
                            <img src="<?php echo $custom_thumbnail;?>" alt="<?php the_title(); ?>">
                        <?php elseif ( get_field('use_in_category') == true ):?>
                            <?php $custom_thumbnail = get_field('blog_custom_thumbnail');?>
                            <img src="<?php echo $custom_thumbnail;?>" alt="<?php the_title(); ?>">
                        <?php elseif (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'image_full' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/post_thumbnail.png" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                        </a>
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
                                    <?php if (!empty($meta_desc_short)) {
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
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>
</section>
<!-- Related Articles Area END  -->