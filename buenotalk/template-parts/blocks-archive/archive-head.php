<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<!-- Archive Hero Section Start -->
<section class="page_header_section" >
    <div class="archive_header_container container-fluid">
        <div class="container">
            <div class="row align-items-center">
            <div class=" col-sm-10 col-md-8 col-lg-8 center-area">
                <h1 class="hero_title mx-auto">
                    <?php single_cat_title();?>
                </h1>
                <span class="page_header_content d-block">
                    <?php echo category_description();?>
                </span>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Archive Hero Section End -->
