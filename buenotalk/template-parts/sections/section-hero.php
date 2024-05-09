
<!-- Hero Section Start -->
<section class="hero-section">

    <div class="hero-container container">
        <div class="container">
            <div class="row mx-auto slider slide_list">

                <?php if( have_rows('hero_slider') ): ?>
                    <?php while( have_rows('hero_slider') ) : the_row(); ?>
                        <?php $slide_type = get_sub_field('slide_type');?>

                        <?php if ($slide_type == 'post'):?>

                            <?php $slide_post = get_sub_field('slide_post');
                                if( $slide_post ):
                                    $use_custom_thumbnail = get_field('use_in_article', $slide_post);
                                    if( $use_custom_thumbnail ) {
                                        $custom_thumbnail = get_field('blog_custom_thumbnail', $slide_post);
                                    }
                                    $post_thumbnail = $use_custom_thumbnail && $custom_thumbnail ?  $custom_thumbnail : get_the_post_thumbnail($slide_post, 'large');

                                    $post_title = get_the_title($slide_post);
                                    $post_link = get_permalink($slide_post);
                                ?>
                                <div class="slide_item">
                                    <div class="banner_overlay"></div>

                                    <?php if ($use_custom_thumbnail && $custom_thumbnail) : ?>
                                        <img src="<?php echo $custom_thumbnail;?>">
                                    <?php elseif ($post_thumbnail): ?>
                                        <?php echo $post_thumbnail;?>
                                    <?php endif;?>

                                    <h3><?php echo $post_title; ?></h3>
                                    <a href="<?php echo $post_link; ?>" class="learn-more">
                                        <?php _e( 'Lue juttu', 'buenotalk' );?>
                                        <img class="arrow_r" src="/wp-content/themes/buenotalk/assets/images/icons/arrow_r_light.svg" alt="">
                                    </a>
                                </div>
                            <?php endif; ?>

                        <?php elseif ($slide_type == 'img'):?>
                            <div class="slide_item">
                                <div class="banner_overlay"></div>
                                <?php if ( get_sub_field('image') ):?>
                                    <?php $image_item = get_sub_field('image');?>
                                    <img src="<?php echo $image_item;?>">
                                <?php endif; ?>
                                <h3>
                                    <?php the_sub_field('title'); ?>
                                </h3>
                                <?php if ( get_sub_field('title_url') ):?>
                                    <a href="<?php the_sub_field('title_url'); ?>" class="learn-more">
                                        <?php the_sub_field('title_title'); ?>
                                        <img class="arrow_r" src="/wp-content/themes/buenotalk/assets/images/icons/arrow_r_light.svg" alt="">
                                    </a>
                                <?php endif;?>
                            </div>
                        <?php endif;?>

                    <?php endwhile; ?>
               <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->