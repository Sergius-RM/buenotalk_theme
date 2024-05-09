
<!-- Custom Shortcode Start -->
<section class="custom_shortcode_section">

    <div class="custom_shortcode_container container">
        <div class="row">
            <div class="col-12 mx-auto">
                <?php   $shortcode = get_sub_field('shortcode');
                        echo do_shortcode(" $shortcode "); ?>
            </div>
        </div>
    </div>
</section>
<!-- Custom Shortcode Section End -->