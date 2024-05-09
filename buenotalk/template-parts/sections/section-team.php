<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$number = get_sub_field( 'number_of_posts' );
$orderby = get_sub_field( 'order_by' );
$order = get_sub_field( 'sorting_order' );
$location = get_sub_field('from_dep');
$term_array = array( $location );

if ( get_sub_field('from_dep') == true ) {
    $team_posts = get_posts( array(
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => $number,
        'orderby'        => $orderby,
        'order'          => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'team_category',
                'field'    => 'tag_ID',
                'terms'    => $term_array[0],
            )
        )
    ) );
} else {
    $team_posts = get_posts( array(
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => $number,
        'orderby'        => $orderby,
        'order'          => $order
    ) );
}

?>

<!-- Team Area Start -->
<section class="team_section">
<div class="container">

        <div class="team_info">
            <?php if( get_sub_field('subtitle') ): ?>
                <h6><?php the_sub_field('subtitle'); ?></h6>
            <?php endif; ?>

            <h2><?php the_sub_field('h2_header'); ?></h2>

            <?php if( get_sub_field('content') ): ?>
                <?php the_sub_field('content'); ?>
            <?php endif; ?>
        </div>

        <div class="row">

        <?php if ( $team_posts ): ?>
            <?php
            foreach ( $team_posts as $post ): setup_postdata($post); $thumb_src = null;?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 member-item equal-height">
                    <div class="team-member">
                        <div class="image">
                            <?php the_post_thumbnail(); ?>
                            <div class="thumbnail-overlay"></div>
                            <img class="hover-image" src="<?php echo get_field('popup-image'); ?>">
                        </div>

                        <div class="member-designation">

                            <?php if( get_field('team_first_name') ): ?>
                                <h3><?php echo the_field('team_first_name'); ?> <?php echo the_field('team_last_name'); ?></h3>
                            <?php else:?>
                                <h3><?php the_title();?></h3>
                            <?php endif; ?>

                            <?php if( get_field('team_job_title') ): ?>
                                <span><?php echo the_field('team_job_title'); ?></span>
                            <?php endif; ?>
                            <?php if( get_field('member_location') ) : ?>
                                <span><?php echo the_field('member_location'); ?></span>
                            <?php endif; ?>

                            <div class="content">
                                <?php $post = get_post();
                                if (!empty( $post->post_excerpt )):?>
                                    <?php
                                        $excerpt = get_the_excerpt();
                                        $words = explode(' ', $excerpt);
                                        $limited_excerpt = implode(' ', array_slice($words, 0, 64));

                                        echo $limited_excerpt;
                                    ?>
                                <?php else:?>
                                    <?php the_content();?>
                                <?php endif;?>

                                <?php if( get_field('team_email_address') ): ?>
                                    <a href="mailto:<?php echo the_field('team_email_address'); ?>" class="team-cta-btn">
                                        <i class="bi bi-envelope-fill"></i> <?php echo the_field('team_email_address'); ?>
                                    </a>
                                <?php endif; ?>
                                <?php if( get_field('team_phone_number') ): ?>
                                    <a href="callto:<?php echo the_field('team_phone_number'); ?>" class="team-cta-btn">
                                        <i class="bi bi-telephone-fill"></i> <?php echo the_field('team_phone_number'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php wp_reset_query();?>
        </div>
    </div>

</section>
<!-- Team Area END  -->
