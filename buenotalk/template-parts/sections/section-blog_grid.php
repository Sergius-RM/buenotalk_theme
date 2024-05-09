<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $post;
$number = get_sub_field('number_of_posts');
$orderby = get_sub_field('order_by');
$order = get_sub_field('sorting_order');

$category = get_sub_field('from_category');
$category_array = array($category);
$category_ids = implode(',', $category);

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => $number,
    'orderby'        => $orderby,
    'order'          => $order,
    'tax_query'      => array(
        array(
            'taxonomy' => 'category',
            'terms'    => $category_array[0],
        ),
    ),
);


?>

<!-- Blog Grid Area Start -->
<section class="blogrid_articles">
    <div class="container">

        <div class="search_menu">
            <div class="search_btn">
                <img src="/wp-content/themes/buenotalk/assets/images/search.png" alt="">
                <div class="search_form">
                    <?php get_search_form();?>
                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/blocks-blogs/section-catfilter'); ?>

        <div class="row grid">
            <?php $wpex_query = new WP_Query($args);
            $post_counter = 0;
            foreach ($wpex_query->posts as $post) : setup_postdata($post); ?>
                <?php
                    $categories = wp_get_post_categories($post->ID);
                     $category_names = array_map(function ($category_id) {
                        return get_category($category_id)->slug;
                    }, $categories);
                ?>

                <div class="grid-item col-12 col-sm-4 col-xl-3 m-auto post_item post_risen equal-height"
                    data-post-id="<?php echo $post->ID; ?>"
                    data-categories="<?php echo implode(' ', $category_names); ?>">

                    <div class="articles-item">

                    <div class="category-thumbnails d-flex">
                        <?php foreach ($category_names as $category_slug) {
                            $image_id = get_term_meta(get_term_by('slug', $category_slug, 'category')->term_id, 'term_image_id', true);

                            if ($image_id) { ?>
                                <?php $category_image = wp_get_attachment_image($image_id, 'thumbnail'); ?>
                                <div class="thumbnail-item"><?php echo $category_image;?></div>
                            <?php }
                        } ?>
                    </div>

                    <div class="image">
                        <?php if ( get_field('use_in_category') == true ):?>
                            <?php $custom_thumbnail = get_field('blog_custom_thumbnail');?>
                            <img src="<?php echo $custom_thumbnail;?>" alt="<?php the_title(); ?>">
                        <?php elseif (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'image_full' ); ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
                            </a>
                        <?php else: ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/post_thumbnail.png" alt="<?php the_title(); ?>" />
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="articles-content">

                            <?php
                                if (get_field('use_in_category') == true):
                                    $title = get_field('blog_custom_title');
                                else:
                                    $title = get_the_title();
                                endif;

                            // Ограничение по количеству символов
                            $max_length = 100;
                            $trimmed_title = mb_strimwidth($title, 0, $max_length, '...');

                            $post_id = get_the_ID();
                            $meta_desc = get_post_meta($post_id, '_yoast_wpseo_metadesc', true);
                            $meta_desc_short = mb_strimwidth($meta_desc, 0, $max_length, '...');
                            // echo $category_slug;
                            ?>
                            <h4>
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ($category_slug == 'videot') {
                                        echo $meta_desc_short;
                                    } else {
                                        echo $trimmed_title;
                                    };?>
                                </a>
                            </h4>

                        <a href="<?php the_permalink(); ?>" class="learn-more">
                            <?php if ( get_field('readmore_link_name') ):?>
                                <?php echo get_field('readmore_link_name');?>
                            <?php else:?>

                                <?php if (has_category('videot')) :?>
                                    <?php _e( 'Katso video', 'buenotalk' );?>
                                <?php elseif (has_category('visat')) :?>
                                    <?php _e( 'Pelaa visa', 'buenotalk' );?>
                                <?php else:?>
                                    <?php _e( 'Lue lisää', 'buenotalk' );?>
                                <?php endif; ?>

                            <?php endif;?>
                            <!-- <i class="bi bi-arrow-right"></i> -->
                            <img class="arrow_r" src="/wp-content/themes/buenotalk/assets/images/icons/arrow_r.svg" alt="">
                        </a>
                    </div>
                    </div>
                </div>

                <?php $post_counter++;
                if ($post_counter === $number) {
                    break; // выводим только первые 16 записей
                }
                ?>
            <?php endforeach; ?>

        </div>

        <?php if ($number > 0):?>
            <div class="load-more-container">
                <button id="load-more-posts" class="btn more_posts mx-auto" data-offset="<?php echo $number; ?>" >
                    <?php _e( 'Lataa lisää', 'buenotalk' );?>
                </button>
            </div>
        <?php endif;?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>


    <?php if (is_page('ammattilaiset')) {
        $page_number = 1;
    } else {
        $page_number = 2;
    };?>

    <?php if (is_page('ammattilaiset')):?>
        <script>
          jQuery(function ($) {
                $('#load-more-posts').on('click', function () {
                    // После успешной загрузки новых постов
                    $(document).ajaxSuccess(function (event, xhr, settings) {
                        if (settings.data.includes('action=load_filtered_posts')) {
                            removeDuplicates();
                        }
                    });
                });

                function removeDuplicates() {
                    var $grid = $('.row.grid');
                    var postIds = [];
                    var duplicates = [];

                    // Собираем все уникальные идентификаторы постов
                    $grid.find('.grid-item').each(function () {
                        var $this = $(this);
                        var postId = $this.data('post-id');
                        if (postIds.indexOf(postId) === -1) {
                            postIds.push(postId);
                        } else {
                            duplicates.push($this);
                        }
                    });

                    // Удаляем один из дубликатов из DOM
                    duplicates.forEach(function (duplicate) {
                        var firstDuplicate = $grid.find('.grid-item[data-post-id="' + duplicate.data('post-id') + '"]').first();
                        if (duplicate.is(firstDuplicate)) {
                            $(duplicate.next('.grid-item[data-post-id="' + duplicate.data('post-id') + '"]')).remove();
                        } else {
                            $(duplicate).remove();
                        }
                    });
                }
            });
        </script>
    <?php endif;?>

    <script>
        jQuery(function ($) {
            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                layoutMode: 'fitRows'
            });

            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
            var pageNumber = '<?php echo $page_number; ?>';
            var categories = '<?php echo $category_ids; ?>';
            var number = '<?php echo $number; ?>';

            var activeFilters = {
                mother: [],
                subcats: []
            };

            $('.filter').on('click', function() {
                var $this = $(this);
                var filterValue = $this.attr('data-filter');
                var filterGroup = $this.closest('.subcat_list').length > 0 ? 'subcats' : 'mother';

                $this.toggleClass('is-checked');

                if ($this.hasClass('is-checked')) {
                    activeFilters[filterGroup].push(filterValue);
                } else {
                    var filterIndex = activeFilters[filterGroup].indexOf(filterValue);
                    if (filterIndex !== -1) {
                        activeFilters[filterGroup].splice(filterIndex, 1);
                    }
                }

                loadAndFilterPosts(false);
            });

            function loadAndFilterPosts(loadMore = false) {
                toggleLoadMoreButton(true);

                if (!loadMore) {
                    pageNumber = 1;
                    $grid.isotope('remove', $('.grid-item')).isotope('layout');
                }

                $.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    data: {
                        action: 'load_filtered_posts',
                        nonce: '<?php echo wp_create_nonce('load_more_posts'); ?>',
                        categories: categories,
                        mother_filters: activeFilters.mother.join(','),
                        subcat_filters: activeFilters.subcats.join(','),
                        page: pageNumber,
                        number: number,
                    },
                    success: function (data) {
                        var $items = $(data);
                        if (!loadMore) {
                            $grid.isotope('insert', $items);
                        } else {
                            $grid.append($items).isotope('appended', $items);
                        }
                        pageNumber++;
                        $('#load-more-posts').toggle($items.length > 0);
                        toggleLoadMoreButton(false);
                    },
                    error: function () {
                        alert('Artikkelien lataaminen epäonnistui. Yritä uudelleen.');
                        toggleLoadMoreButton(false);
                    }
                });
            }

            function toggleLoadMoreButton(isLoading) {
                var $loadMoreButton = $('#load-more-posts');
                if (isLoading) {
                    $loadMoreButton.text('Ladataan...').addClass('is_loading');
                } else {
                    $loadMoreButton.text('Lataa lisää').removeClass('is_loading');
                }
            }

            $('#load-more-posts').on('click', function () {
                loadAndFilterPosts(true);
            });

        });
    </script>
