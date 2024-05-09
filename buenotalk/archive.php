<?php
/**
 * The template for displaying archive pages
 *
 */

get_header();

?>

<?php get_template_part( 'template-parts/blocks-archive/archive-head' ); ?>

    <?php if ( have_posts() ) : ?>
    <!-- Posts Grid Area Start -->
    <section class="blogrid_articles">
        <div class="container">
            <div class="row grid">

                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post(); ?>

                    <div class="grid-item col-12 col-sm-4 col-xl-3 m-auto post_item post_risen equal-height" id="post-<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
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
                                    <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                                <?php else: ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/post_thumbnail.png" alt="<?php the_title(); ?>" />
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

                <?php endwhile; ?>
            </div>

                <?php // Previous/next page navigation.
                    the_posts_pagination( array(
                        'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
                        'next_text'          => __( 'Next page', 'twentyfifteen' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
                    ) );
                ?>

            </div>
        </div>
    </section>
    <!-- Posts Grid Area End -->

    <?php else :
        get_template_part( 'template-parts/content-none' );

    endif; ?>

<?php
get_footer();
