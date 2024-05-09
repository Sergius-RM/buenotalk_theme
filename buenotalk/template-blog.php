<?php
/**
 * Template name: Blog Template
 *
 *
 */

get_header();
?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 mx-auto">
                <h2><?php the_title();?></h2>
            </div>
        </div>
    </div>

    <?php get_template_part( 'template-parts/main-sections' ); ?>

<?php
get_footer();