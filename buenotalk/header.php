<?php
/**
 * The template for displaying the header
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$expires = 60 * 60 * 24 * 30; // 30 дней в секундах
header("Cache-Control: max-age=$expires, must-revalidate");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expires) . " GMT");
?>

<!DOCTYPE html>
<html
    <?php language_attributes(); ?>
    class="no-js"
>

    <head>

        <meta charset="<?php bloginfo('charset'); ?>">
        <?php $viewport_content = apply_filters('hello_elementor_viewport_content', 'width=device-width, initial-scale=1'); ?>
        <meta
            name="viewport"
            content="<?php echo esc_attr($viewport_content); ?>"
        >
        <!-- favicon here -->

        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php wp_head(); ?>

        <?php if (  get_field( 'google_analytics', 'option') ) :?>
            <?php $headcode = get_field('google_analytics', 'option');
                print $headcode;?>
        <?php endif ?>

        <?php if (has_category('videot')):?>
            <style>
                .blog-content-area .blog-details-content iframe {
                    max-height: 760px;
                    height: 100vh !important;
                    width: 320px !important;
                    overflow: overlay;
                    display: block;
                    margin: 0 auto;
                }
                .social-sharing-section,
                .post-navigation {
                    margin-top: 50px;
                    text-align: center !important;
                }
            </style>
        <?php endif;?>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.innerWidth < 580) {
                var style = document.createElement('style');
                style.innerHTML = `
                    .blogrid_articles .grid {
                        height: auto !important;
                    }
                `;
                document.head.appendChild(style);
            }
        });
        </script>

    </head>

    <body <?php body_class();?> <?php if (is_page('ammattilaiset')) { echo 'id="page-ammattilaiset"';}; ?>>

    <div class="body-multi-bg">
        <div class="decor-bg-1"></div>
        <div class="decor-bg-2"></div>
        <div class="decor-bg-3"></div>
    </div>

        <?php if (  get_field( 'google_analytics_body', 'option') ) :?>
            <?php $bodycode = get_field('google_analytics_body', 'option');
                print $bodycode; ?>
        <?php endif ?>

        <?php wp_body_open();
            get_template_part('template-parts/header');
        ?>
