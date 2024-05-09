<!-- Cat Filter Area Start -->
<div id="filters" class="button-group filter-button-group catfilter_section">

    <div class="col-12 col-sm-10 subcat_list mx-auto" data-filter-group="subcats">
        <?php

        $secondary_cats = get_sub_field('secondary_filter_cat');

        foreach($secondary_cats as $secondary_id) {
            $term = get_term( $secondary_id, 'category' );  // Указываем таксономию, если это категории

            if ($term) {
                $cat_class = 'cat-item ' . $term->slug; ?>

                <button class="filter filter-sub <?php echo $cat_class; ?>" data-filter="<?php echo $term->slug;?>">

                    <div class="cat-item-icon">
                        <?php echo $term->name; ?>
                    </div>
                </button>
            <?php
            }
        }; ?>
    </div>

    <div class="col-12 col-sm-10 col-xl-6 mx-auto mother_cat_list" data-filter-group="mother">
    <?php
    $term_ids = get_sub_field('main_filter_cat');

    if( $term_ids ) {
        echo '<ul>';
        foreach( $term_ids as $term_id ) {
            $term = get_term( $term_id, 'category' );  // Указываем таксономию, если это категории

            if ($term) {
                $image_id = get_term_meta($term->term_id, 'term_image_id', true);

                if($image_id) {
                    $image = wp_get_attachment_image($image_id, 'thumbnail');
                } else {
                    $image = '';
                }

                $cat_class = 'cat-item ' . $term->slug; ?>

                <button class="filter filter-mother <?php echo $cat_class; ?>" data-filter="<?php echo $term->slug;?>">

                    <div class="cat-item-icon">
                        <?php echo $image;?>
                        <?php echo $term->name; ?>
                    </div>
                </button>
            <?php
            }
        }
        echo '</ul>';
    }
    ?>
</div>

</div>
<!-- Cat Filter Area End -->