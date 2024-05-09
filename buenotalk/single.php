<?php
/**
 * Template Name: Blog Post
 * Template Post Type: post
 * The template for displaying all single posts
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- start of the loop -->
<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/blocks-blogs/section-single_article' ); ?>

<?php endwhile; ?>
<!-- end of the loop -->

<?php
global $post;?>
<?php if (is_single() && !has_category('mysteeripelit', $post)):?>
    <?php if ($post_type !== 'video_p' && $post_type !== 'quiz_p'):?>
        <?php get_template_part('template-parts/blocks-blogs/section', 'related_articles');?>
    <?php endif; ?>
<?php endif; ?>

<!-- Blog Wigets Area Start -->
<!-- <?php if ( have_rows( 'blog_default_sections' ) ) : ?>
    <?php while ( have_rows('blog_default_sections' ) ) : the_row();
        if ( get_row_layout() == 'blog_related_articles' ) :
            get_template_part('template-parts/blocks-blogs/section', 'related_articles');
        ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?> -->
<!-- Blog Wigets Area End -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
  var iframes = document.querySelectorAll('iframe');
  iframes.forEach(function(iframe) {
    if (iframe.getAttribute('data-src') && iframe.getAttribute('data-src').includes('tiktok.com')) {
      iframe.classList.add('tiktok_iframe');
    }
  });
});
</script>
<?php get_footer();