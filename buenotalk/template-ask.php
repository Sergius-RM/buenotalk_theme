<?php
/**
 * Template name: Kysy / Fråga
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */

get_header();
?>

<section class="blog-details-area">

<div class="conteiner">
    <div class="row">

        <div class="col-12">
        <div class="cat_kysy_page">
            <div class="cat_face"></div>
            <div class="cat_kysy_box" style="display:block;">

                <?php if (get_field('title_kysy', 'option')):?>
                    <h3><?php echo get_field('title_kysy', 'option'); ?></h3>
                <?php endif;?>

                <?php if (get_field('content_kysy', 'option')):?>
                    <div><?php echo get_field('content_kysy', 'option'); ?></div>
                <?php endif;?>

                <?php if (get_field('form_kysy', 'option')):?>
                    <?php $form_id = get_field('form_kysy', 'option');?>
                    <?php echo do_shortcode('[gravityform id="'. $form_id .'" title="false" description="false" ajax="true"]');?>
                <?php endif;?>

            </div>
        </div>
        </div>

    </div>
</div>


</section>

<?php
get_footer();