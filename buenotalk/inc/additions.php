<?php
/**
 * Actions
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Malicious URL Protection
if (strpos($_SERVER['REQUEST_URI'], "eval(") || strpos($_SERVER['REQUEST_URI'], "CONCAT") || strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") || strpos($_SERVER['REQUEST_URI'], "base64")) {
  @header("HTTP/1.1 400 Bad Request");
  @header("Status: 400 Bad Request");
  @header("Connection: Close");
  @exit;
}

// Automatic spam protection
function true_stop_spam($commentdata)
{
  // we will hide the usual comment field using CSS
  $fake = trim($_POST['comment']);
  // filling it with robots will result in an error, the comment will not be sent
  if (!empty($fake)) {
      wp_die('spam comment!');
  }
  // then we will assign it the value of the comment field, which for people
  $_POST['comment'] = trim($_POST['true_comment']);

  return $commentdata;
}

add_filter('pre_comment_on_post', 'true_stop_spam');

// Prohibition of pingbacks and trackbacks on yourself
function true_disable_self_ping(&$links)
{
  foreach ($links as $l => $link) {
      if (0 === strpos($link, get_option('home'))) {
          unset($links[$l]);
      }
  }
}

add_action('pre_ping', 'true_disable_self_ping');

// Hiding the WordPress Version
function true_remove_wp_version_wp_head_feed()
{
  return '';
}

add_filter('the_generator', 'true_remove_wp_version_wp_head_feed');

// Allow download svg
function allow_type($type) {
  $type['svg'] = 'image/svg+xml';
  return $type;
}
add_filter('upload_mimes', 'allow_type');

function my_customize_register( $wp_customize ) {
  $wp_customize->add_setting('header_logo', array(
      'default' => '',
      'sanitize_callback' => 'absint',
  ));

  $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo', array(
      'section' => 'title_tagline',
      'label' => 'Second Logo'
  )));

  $wp_customize->selective_refresh->add_partial('header_logo', array(
      'selector' => '.header-logo',
      'render_callback' => function() {
          $logo = get_theme_mod('header_logo');
          $img = wp_get_attachment_image_src($logo, 'full');
          if ($img) {
              return '<img src="' . $img[0] . '" alt="">';
          } else {
              return '';
          }
      }
  ));
}
add_action( 'customize_register', 'my_customize_register' );




// Функция для изменения запроса поиска
function exclude_custom_post_type_from_search( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
      return;
  }

  if ( $query->is_search() ) {
      $post_types = $query->get( 'post_type' );

      // Проверяем, является ли $post_types массивом
      if ( is_array( $post_types ) ) {
          // Удаляем кастомный тип записей "team" из массива
          $post_types = array_diff( $post_types, array( 'team' ) );
      } else {
          // Если $post_types не является массивом, преобразуем его в массив и удаляем "team"
          $post_types = array_diff( explode( ',', $post_types ), array( 'team' ) );
      }

      $query->set( 'post_type', $post_types );
  }
}
add_action( 'pre_get_posts', 'exclude_custom_post_type_from_search' );

function display_post_navigation() {
    $prev_post = get_previous_post();
    $next_post = get_next_post();

    if ($prev_post || $next_post) { ?>

        <div class="post-navigation">

            <?php if ($prev_post) :?>
            <a href="<?php echo get_permalink($prev_post->ID);?>">
                <i class="bi bi-arrow-left"></i> <?php _e( 'Edellinen', 'buenotalk' );?>
            </a>
            <?php endif;?>

            <?php if ($next_post) :?>
            <a href="<?php echo get_permalink($next_post->ID);?>">
                <?php _e( 'Seuraava', 'buenotalk' );?> <i class="bi bi-arrow-right"></i>
            </a>
            <?php endif;?>

        </div>
   <?php }
  }


/**
 * Добавляет возможность загружать изображения для элементов указанных таксономий - категории, метки.
 *
 * Получить ID картинки термина: $image_id = get_term_meta( $term_id, 'term_image_id', 1 );
 * Затем получить URL картинки: $image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
 *
 * @Author: Kama
 *
 * @ver: 1.1
 */
if( ! class_exists('Term_Meta_Image') ){

    class Term_Meta_Image {

        public $for_taxes = array('category', 'post_tag'); // для каких таксономий должен работать код

        ## Initialize the class and start calling our hooks and filters
        public function __construct(){

            foreach( $this->for_taxes as $taxname ){
                add_action("{$taxname}_add_form_fields",   array( & $this, 'add_term_image' ),     10, 2 );
                add_action("{$taxname}_edit_form_fields",  array( & $this, 'update_term_image' ),  10, 2 );
                add_action("created_{$taxname}",           array( & $this, 'save_term_image' ),    10, 2 );
                add_action("edited_{$taxname}",            array( & $this, 'updated_term_image' ), 10, 2 );

                add_filter("manage_edit-{$taxname}_columns",  array( & $this, 'add_image_column' ) );
                add_filter("manage_{$taxname}_custom_column", array( & $this, 'fill_image_column' ), 10, 3 );
            }
        }

        ## Add a form field in the new category page
        public function add_term_image( $taxonomy ){
            wp_enqueue_media(); // подключим стили медиа, если их нет

            add_action('admin_print_footer_scripts', array( & $this, 'add_script' ), 99 );
            ?>
            <div class="form-field term-group">
                <label for="term_image_id">
                    <?php _e('Image', 'hero-theme'); ?>
                </label>
                <input type="hidden" id="term_image_id" name="term_image_id" class="custom_media_url" value="">
                <div id="term__image__wrapper"></div>
                <p>
                    <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
                    <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
                </p>
            </div>
            <?php
        }

        ## Edit the form field
        public function update_term_image( $term, $taxonomy ){
            wp_enqueue_media(); // подключим стили медиа, если их нет

            add_action('admin_print_footer_scripts', array( & $this, 'add_script' ), 99 );

            $image_id = get_term_meta( $term -> term_id, 'term_image_id', true );
            ?>
            <tr class="form-field term-group-wrap">
                <th scope="row">
                    <label for="term_image_id"><?php _e( 'Image', 'hero-theme' ); ?></label>
                </th>
                <td>
                    <input type="hidden" id="term_image_id" name="term_image_id" value="<?php echo $image_id; ?>">
                    <div id="term__image__wrapper">
                     <?php if( $image_id ){
                            echo wp_get_attachment_image( $image_id, 'thumbnail' );
                        } ?>
                    </div>
                    <p>
                        <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
                        <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
                    </p>
                </td>
            </tr>
            <?php
        }

        ## Save the form field
        public function save_term_image( $term_id, $tt_id ){
            if( isset( $_POST['term_image_id'] ) && '' !== $_POST['term_image_id'] ){
                $image = $_POST['term_image_id'];
                add_term_meta( $term_id, 'term_image_id', $image, true );
            }
        }

        ## Update the form field value
        public function updated_term_image( $term_id, $tt_id ){
            if( isset( $_POST['term_image_id'] ) && '' !== $_POST['term_image_id'] ){
                $image = $_POST['term_image_id'];
                update_term_meta( $term_id, 'term_image_id', $image );
            }
            else
                update_term_meta( $term_id, 'term_image_id', '' );
        }

        ## Add script
        public function add_script(){
            // выходим если мы не на нужной странице таксономии
            //$cs = get_current_screen();
            //if( ! in_array($cs->base, array('edit-tags','term')) || ! in_array($cs->taxonomy, (array) $this->for_taxes) )
            //  return;

            ?>
            <script>
            jQuery(document).ready( function($){
                function ct_media_upload( button_class ){
                    var _custom_media = true,
                    _orig_send_attachment = wp.media.editor.send.attachment;

                    $('body').on('click', button_class, function(e){
                        var button_id           = '#'+$(this).attr('id');
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button              = $(button_id);

                        _custom_media = true;

                        wp.media.editor.send.attachment = function( props, attachment ){
                            if( _custom_media ){
                                $('#term_image_id').val(attachment.id);
                                $('#term__image__wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                                $('#term__image__wrapper .custom_media_image').attr('src',attachment.sizes.thumbnail.url).css('display','block');
                            }
                            else {
                                return _orig_send_attachment.apply( button_id, [props, attachment] );
                            }
                        }
                        wp.media.editor.open(button);
                        return false;
                    });
                }

                ct_media_upload('.ct_tax_media_button.button');

                $('body').on('click','.ct_tax_media_remove',function(){
                    $('#term_image_id').val('');
                    $('#term__image__wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                });

                // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
                $(document).ajaxComplete(function( event, xhr, settings ){
                    var queryStringArr = settings.data.split('&');

                    if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
                        var xml = xhr.responseXML;
                        $response = $(xml).find('term_id').text();

                        if( $response != '' ){
                            $('#term__image__wrapper').html(''); // Clear the thumb image
                        }
                    }
                });
            });
            </script>
            <?php
        }

        ## Добавляет колонкку картинки в таблицу терминов
        public function add_image_column( $columns ){
            // подправим ширину колонки через css
            add_action('admin_notices', function(){
                echo '<style>.column-image{ width:60px; text-align:center; }</style>';
            });

            $num = 1; // после какой по счету колонки вставлять новые

            $new_columns = array( 'image'=>'Картинка' );

            return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
        }

        public function fill_image_column( $string, $column_name, $term_id ){
            // если есть картинка
            if( $image_id = get_term_meta( $term_id, 'term_image_id', 1 ) ){
                $string = '<img src="'. wp_get_attachment_image_url( $image_id, 'thumbnail' ) .'" width="40" height="40" alt="" />';
            }

            return $string;
        }
    }

    new Term_Meta_Image(); // init

}


function load_filtered_posts() {
    check_ajax_referer('load_more_posts', 'nonce');
    $categories = explode(',', sanitize_text_field($_POST['categories']));
    $mother_filters = !empty($_POST['mother_filters']) ? explode(',', $_POST['mother_filters']) : [];
    $subcat_filters = !empty($_POST['subcat_filters']) ? explode(',', $_POST['subcat_filters']) : [];

    $args = [
        'post_type' => 'post',
        'posts_per_page' => $_POST['number'] ?? 16,
        'paged' => $_POST['page'] ?? 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'terms' => $categories,
                'field' => 'term_id',
            ),
        ),
    ];

        if (!empty($mother_filters)) {
            $args['tax_query'][] = [
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $mother_filters,
                'operator' => 'IN',
                'relation' => 'AND',
            ];
        }

        if (!empty($subcat_filters)) {
            $args['tax_query'][] = [
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $subcat_filters,
                'operator' => 'IN',
                'relation' => 'OR',
            ];
        }


    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $posts = [];
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            if (!in_array($post_id, $posts)) {
                $posts[] = $post_id;
                get_template_part('template-parts/sections/section', 'blog_grid_item');
            }
        }
    } else {
        echo 'No posts found';
    }

    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_load_filtered_posts', 'load_filtered_posts');
add_action('wp_ajax_nopriv_load_filtered_posts', 'load_filtered_posts');


function load_filtered_ammattilaiset_posts() {

    $subcat_filters = !empty($_POST['subcat_filters']) ? explode(',', $_POST['subcat_filters']) : [];

    $args = [
        'post_type' => 'post',
        'posts_per_page' => $_POST['number'] ?? 16,
        'paged' => $_POST['page'] ?? 1,
        'tax_query' => [
            [
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'ammattilaisille',
                'operator' => 'IN',
            ],
        ],
    ];

    if (!empty($subcat_filters)) {
        $args['tax_query'][] = [
            'relation' => 'AND',
            [
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $subcat_filters,
                'operator' => 'IN',
            ],
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $posts = [];
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            if (!in_array($post_id, $posts)) {
                $posts[] = $post_id;
                get_template_part('template-parts/sections/section', 'blog_grid_item');
            }
        }
    } else {
        echo 'No posts found';
    }

    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_load_filtered_ammattilaiset_posts', 'load_filtered_ammattilaiset_posts');
add_action('wp_ajax_nopriv_load_filtered_ammattilaiset_posts', 'load_filtered_ammattilaiset_posts');