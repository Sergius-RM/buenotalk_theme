<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Posts Filter Section Start -->
<section class="blogrid_articles posts_filter_section" >

    <div class="container posts_filter_list">

        <ul class="blogrid_categories">
            <?php $posts_filter_type = get_sub_field('posts_filter_type');?>

            <?php if (get_sub_field('button_link')):?>
                <li class="cat-item current-cat">
                    <a aria-current="page" href="<?php the_sub_field('button_link'); ?>">
                        <?php the_sub_field('button_text'); ?>
                    </a>
                </li>
            <?php elseif (is_category( )):?>
                <li class="cat-item">
                    <a aria-current="page" href="/blogi/">Kaikki</a>
                </li>
            <?php endif;?>

            <?php if (get_sub_field('posts_filter_type') && in_array('post_cat',$posts_filter_type)):?>
                <?php wp_list_categories('orderby=name&title_li='); ?><br>
            <?php endif;?>

            <?php if (is_category( )):?>
                <?php wp_list_categories('orderby=name&title_li='); ?>
            <?php endif;?>

        </ul>

    </div>

</section>
<!-- Posts Filter Section Start -->