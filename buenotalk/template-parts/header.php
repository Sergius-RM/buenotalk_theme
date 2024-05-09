<?php
/**
 * The template for displaying header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
?>

<!-- Start main Header -->
<header class="header_area full-width" role="banner">
    <!--Header-Upper-->

    <div class="site-header">
        <div class="site-branding align-items-center d-flex">

            <div class="head_first">
            <?php
                $header_logo = get_theme_mod('header_logo');
                $img = wp_get_attachment_image_src($header_logo, 'full');
                if ($img) :
                    ?>
                    <a href="https://ehyt.fi/">
                        <img class="second-logo-img" width="70px" height="47px" src="<?php echo $img[0]; ?>" alt="">
                    </a>
            <?php endif; ?>
                <div class="head_socials">
                    <?php if( have_rows('social_links', 'option') ): ?>
                        <?php while( have_rows('social_links', 'option') ) : the_row(); ?>
                            <a target="_blank" href="<?php the_sub_field('url'); ?>">
                                <i class="bi <?php the_sub_field('service_ico'); ?>"></i>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="navbar-brandlogo_area no_mobile">
                <?php the_custom_logo();?>
            </div>

            <!-- Mobile Menu -->
            <div class="navbar navbar-light bg-light is_onmobile">
                <span class="navbar-brandlogo_area">
                    <span class="header-logo-darkmode">
                        <?php the_custom_logo();?>
                    </span>
                </span>


            </div>
            <!-- Mobole Menu End-->

            <div class="head-icons">
                <div class="lang_menu">
                    <!-- <ul>
                        <li>FI</li>
                    </ul> -->
                    <?php dynamic_sidebar( 'header_1' ); ?>
                    <!-- <ul>
                        <?php
                        $languages = icl_get_languages('skip_missing=0');
                        if(!empty($languages)){
                            foreach($languages as $l){
                            echo "<li>" . $l['language_code'] . "</li>";
                            }
                        }
                        ?>
                    </ul> -->

                    <button class="navbar-toggler is_onmobile" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>

            <!-- Main Menu -->
            <nav class="site-navigation">
                <div class="no_mobile" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
                </div>
            </nav>
            <!-- Main Menu End-->


    </div>

    <div class="collapse mob_menu" id="navbarToggleExternalContent">
        <div role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
        </div>
    </div>
    <!--End Header Upper-->
</header>
