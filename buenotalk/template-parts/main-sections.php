<?php
/**
 * All sections and template of EasyE theme
 *
 */
?>

<?php if ( have_rows( 'sections' ) ) : ?>
    <?php while ( have_rows('sections' ) ) : the_row();
        if ( get_row_layout() == 'hero' ) :
            get_template_part('template-parts/sections/section', 'hero');

        elseif ( get_row_layout() == 'two_columns' ) :
            get_template_part('template-parts/sections/section', 'two_columns');

        elseif ( get_row_layout() == 'highlighted_articles' ) :
            get_template_part('template-parts/sections/section', 'highlighted_articles');

        elseif ( get_row_layout() == 'pages_grid' ) :
            get_template_part('template-parts/sections/section', 'pages_grid');

        elseif ( get_row_layout() == 'blog_grid' ) :
            get_template_part('template-parts/sections/section', 'blog_grid');

        elseif ( get_row_layout() == 'custom_content' ) :
            get_template_part('template-parts/sections/section', 'custom_content');

        elseif ( get_row_layout() == 'custom_shortcode' ) :
            get_template_part('template-parts/sections/section', 'custom_shortcode');

        elseif ( get_row_layout() == 'team' ) :
            get_template_part('template-parts/sections/section', 'team');

        elseif ( get_row_layout() == 'related_articles' ) :
            get_template_part('template-parts/sections/section', 'related_articles');

        elseif ( get_row_layout() == 'posts_filter' ) :
            get_template_part('template-parts/blocks-archive/section', 'posts_filter');

            ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>