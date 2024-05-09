<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$post_type = get_field('post_type');
?>

    <?php if ($post_type !== 'video_p' && $post_type !== 'quiz_p'):?>
    <?php if ( has_post_thumbnail() && get_field('blog_custom_thumbnail') ): ?>
    <!-- Page Banner Start -->
    <section class="blog-banner">
        <div class="container">
            <div class="row">
                <div class="col-10 page_header_container container"
                    style="<?php if ( get_field('use_in_article') == true ): ?>
                                <?php $custom_thumbnail = get_field('blog_custom_thumbnail');?>
                                background-image: url('<?php echo $custom_thumbnail;?>');
                            <?php elseif (has_post_thumbnail() ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'image_full' ); ?>
                                background-image: url('<?php echo $image[0]; ?>');
                            <?php endif;?>">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->
    <?php endif;?>
    <?php endif;?>

    <!-- Blog Details Area Start -->
    <section class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 mx-auto">
                    <div class="row">
                    <div class="<?php if ($post_type == 'video_p'):?>col-12 has-video-content<?php else:?>col-12<?php endif; ?> col-sm-10 blog-content-area">

                        <?php if ($post_type !== 'video_p' && $post_type !== 'quiz_p'):?>
                        <div class="banner-inner">
                            <div class="content-writer">
                                <div class="post-meta">
                                    <span class="posted-date">
                                        <span><?php echo get_the_date('d.m.Y'); ?></span>
                                    </span>
                                </div>
                            </div>

                            <?php if ( get_field('use_in_article') == true ) : ?>
                                <h1 class="page-title"><?php the_field('blog_custom_title');?></h1>
                            <?php else: ?>
                                <h1 class="page-title"><?php the_title(); ?></h1>
                            <?php endif; ?>
                        </div>
                        <?php endif;?>

                        <div class="blog-details-content">
                            <?php the_content();?>
                        </div>

                        <?php if ($post_type !== 'video_p' && $post_type !== 'quiz_p'):?>
                            <?php display_post_navigation(); ?>
                        <?php endif; ?>

                            <?php get_template_part( 'template-parts/blocks-blogs/section-social_sharing' ); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Blog Details Area End -->