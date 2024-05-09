<?php
/**
 * The template for displaying footer.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$copyright_data = get_field('copyright_data', 'option');

?>

<!-- Footer Area Start -->
<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="container-fluid">
        <div class="row">

            <!-- Branding Area Start -->
            <div class="site-branding">
                <a href="/" class="footer-logo">BuenoTalk</a>

                <?php
                $header_logo = get_theme_mod('header_logo');
                $img = wp_get_attachment_image_src($header_logo, 'full');
                if ($img) :
                    ?>
                    <a class="second-logo" href="https://ehyt.fi/">
                        <img class="second-logo-img" src="<?php echo $img[0]; ?>" alt="">
                    </a>
                <?php endif; ?>
            </div>
            <!-- END Branding Area -->

            <!-- Socials Area Start -->
            <div class="footer_socials">
                <?php if( have_rows('social_links', 'option') ): ?>
                    <?php while( have_rows('social_links', 'option') ) : the_row(); ?>
                        <a target="_blank" href="<?php the_sub_field('url'); ?>">
                            <i class="bi <?php the_sub_field('service_ico'); ?>"></i>
                            <?php if (get_sub_field('service_ico') == 'bi-tiktok'):?>
                                TikTok
                            <?php elseif (get_sub_field('service_ico') == 'bi-instagram'):?>
                                Instagram
                            <?php elseif (get_sub_field('service_ico') == 'bi-youtube'):?>
                                Youtube
                            <?php endif;?>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END Socials Area Start -->

            <div class="footer_nav_menu" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-1' ) ); ?>
            </div>

        </div>
    </div>

    <?php if (!is_page_template('template-ask.php')):?>
    <div class="cat_box" bis_skin_checked="1">
        <div class="cat_say" bis_skin_checked="1">
        </div>
        <div class="cat_popup" bis_skin_checked="1">
            <button class="close_popup">X</button>

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
    <?php endif;?>

</footer>
 <!-- Footer Area End -->