<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Two Columns Section Start -->
<section class="two_columns_section wrap_two_columns">
    <div class="container">
        <div class="row align-items-center mx-auto section_two_columns">

            <div class="col-sm-6 col-md-6 col-lg-6 two_columns_image <?php if ( get_sub_field('swap_blocks') == true ) { echo 'right_side'; } ?>">
                <?php if ( get_sub_field('image') ):?>
                    <?php $quick_order_image = get_sub_field('image');?>
                    <img class="<?php if ( get_sub_field('attached_side') == true ) { echo 'attached_side'; } ?>" src="<?php echo $quick_order_image;?>">
                <?php endif; ?>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6 two_columns_content <?php if ( get_sub_field('attached_side') == true ) { echo 'attached_side_text'; } ?> <?php if ( get_sub_field('swap_blocks') == true ) { echo 'order-first'; } ?>">

                <?php if (get_sub_field('header_subtitle')):?>
                    <h4><?php the_sub_field('header_subtitle'); ?></h4>
                <?php endif;?>

                <h2><?php the_sub_field('h2_header'); ?></h2>

                <?php if (get_sub_field('content')):?>
                    <div class="content">
                        <?php the_sub_field('content'); ?>
                    </div>
                <?php endif;?>

            </div>

        </div>
    </div>
</section>
<!-- Two Columns Section End -->