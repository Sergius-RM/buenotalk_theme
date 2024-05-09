<?php
/**
 * ACF Functions
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Add options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        [
            'page_title' => __('Site Settings', 'buenotalk'),
            'menu_title' => __('Site Settings', 'buenotalk'),
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]
    );
}

/**
 * Register ACF blocks
 */
function acf_init_block_types() {

    if (function_exists('acf_register_block_type')) {

        /**
         * Info-Box block
         */
        acf_register_block_type(
            array(
                'name'              => 'Escape Game',
                'title'             => __( 'Escape Game' ),
                'description'       => __( 'Escape Game' ),
                'render_callback'   => 'render_escape_game',
                'category'          => 'embed',
                'icon'              => 'games',
                'keywords'          => array('info box'),
                'multiple'          => true,
                'mode'              => 'edit',
            )
        );

    }
}

add_action( 'acf/init', 'acf_init_block_types' );

/**
 * Info Box Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function render_escape_game ( $block, $content = '', $is_preview = false, $post_id = 0 ) {
    ?>

        <div class="container block_escape_game">
            <div class="row align-items-center">
                <div class="col-12 col-sm-10 mx-auto">
                    <div class="item-content">
                        <?php if (get_field('title_egame')):?>
                            <h2><?php the_field('title_egame'); ?></h2>
                        <?php endif;?>

                        <?php if (get_field('description_egame')):?>
                            <?php the_field('description_egame'); ?>
                        <?php endif;?>

                        <?php if (get_field('question_egame')):?>
                            <h3 class="question"><?php the_field('question_egame'); ?></h3>
                        <?php endif;?>

                        <?php if (get_field('img_egame')):?>
                            <?php $img_egame = get_field('img_egame'); ?>
                            <img src="<?php echo $img_egame;?>"></img>
                        <?php endif;?>

                        <?php if ( get_field('use_pdf') == true ) : ?>

                            <?php if (get_field('hint_pdf_egame')):?>
                                <h4 class="hint"><?php the_field('hint_pdf_egame'); ?></h4>
                            <?php endif;?>

                            <?php $pdf_url = get_field('pdf_quest');?>
                            <div class="pdf-embed">
                                <iframe src="<?php echo $pdf_url; ?>" width="100%" height="500"></iframe>
                            </div>
                        <?php endif; ?>

                        <?php if (get_field('hint_egame')):?>
                            <h4 class="hint"><?php the_field('hint_egame'); ?></h4>
                        <?php endif;?>

                        <?php if (have_rows('answer_egame')): ?>
                            <?php while (have_rows('answer_egame')) : the_row(); ?>
                                <?php $answers[] = get_sub_field('answer_item'); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <form id="entering_answer_egame">
                            <input type="text" id="user_answer" required>
                            <button class="submit_btn" type="submit"><?php _e( 'Tarkista vastaus', 'buenotalk' );?></button>
                            <?php if (get_field('link_next_egame')):?>
                                <a class="next_stage" href="<?php the_field('link_next_egame'); ?>"><?php _e( 'Jatka', 'buenotalk' );?></a>
                            <?php endif;?>
                        </form>
                        <div id="error_message" style="color: red;"></div>

                        <?php if (get_field('error_egame')):?>
                            <?php $error = get_field('error_egame'); ?>
                        <?php else:?>
                            <?php $error = 'Väärä vastaus.'; ?>
                        <?php endif;?>

<?php if ( get_field('auto_redirection') == true ):?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var answers = <?php echo json_encode(array_map('strtolower', $answers)); ?>; // Приводим все ответы к нижнему регистру
            var correctAnswer = "<?php echo strtolower(get_sub_field('correct_answer')); ?>"; // Получаем правильный ответ

            document.getElementById('entering_answer_egame').addEventListener('submit', function(e) {
                e.preventDefault();

                var userAnswer = document.getElementById('user_answer').value.toLowerCase(); // Преобразуем в нижний регистр для регистронезависимого сравнения

                if (answers.includes(userAnswer) || userAnswer == correctAnswer) {
                    window.location.href = "<?php the_field('link_next_egame'); ?>";
                } else {
                    document.getElementById('error_message').textContent = '<?php echo ($error); ?>';
                }
            });
        });
    </script>
<?php else:?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('entering_answer_egame').addEventListener('submit', function(e) {
        e.preventDefault();

        var userAnswer = document.getElementById('user_answer').value.toLowerCase(); // Преобразуем в нижний регистр для регистронезависимого сравнения
        var answers = <?php echo json_encode(array_map('strtolower', $answers)); ?>; // Приводим все ответы к нижнему регистру

        if (answers.includes(userAnswer)) {
            document.querySelector('.next_stage').style.display = 'inline-block';
            document.querySelector('.submit_btn').style.display = 'none'; // Показываем ссылку
            document.getElementById('error_message').textContent = ''; // Очищаем сообщение об ошибке
        } else {
            document.getElementById('error_message').textContent = '<?php echo ($error); ?>';
        }
    });
});
</script>
<?php endif;?>
                    </div>
                </div>
            </div>
        </div>

<?php
}