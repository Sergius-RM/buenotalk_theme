<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$design_type = get_sub_field('design_type');
if ($design_type == 1) {
    $cols = 'col-sm-6 col-xl-6';
} else if ($design_type == 2) {
    $cols = 'col-sm-6 col-xl-6';
} else {
    $cols = 'col-sm-4 col-xl-4';
};

?>

<!-- Blog Grid Area Start -->
<section class="pages_grid">
    <div class="container">

        <div class="row">

        <?php if( have_rows('custom_pages') ): ?>
            <?php while( have_rows('custom_pages') ) : the_row(); ?>
                    <div class="col-12 <?php echo $cols;?> m-auto equal-height">
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

                            <?php if ( get_sub_field('image') ):?>
                                <div class="image">
                                    <a href="<?php the_sub_field('link');?>">
                                        <img src="<?php the_sub_field('image');?>" alt="<?php the_title(); ?>">
                                    </a>
                                </div>
                            <?php endif;?>

                            <div class="articles-content">

                                <h3>
                                    <a href="<?php the_sub_field('link');?>">
                                        <?php the_sub_field('title');?>
                                    </a>
                                </h3>

                                <p><?php the_sub_field('content');?></p>

                                <?php if ( get_sub_field('link') ):?>
                                    <a href="<?php the_permalink(); ?>" class="learn-more">
                                        <?php _e( 'Lue lisää', 'buenotalk' );?>
                                        <!-- <i class="bi bi-arrow-right"></i> -->
                                        <img class="arrow_r" src="/wp-content/themes/buenotalk/assets/images/icons/arrow_r.svg" alt="">
                                    </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        <?php endif; ?>

        </div>
    </div>
</div>
</section>
<!-- Blog Grid Area END  -->
