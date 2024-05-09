
<?php
/**
 * The template for displaying the footer.

 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

    get_template_part('template-parts/footer');
?>

    <?php wp_footer(); ?>

    <?php if (  get_field( 'google_analytics_footer', 'option') ) :?>
        <?php $footercode = get_field('google_analytics_footer', 'option');
            print $footercode; ?>
    <?php endif ?>

    <?php if (  get_field( 'footer_whatsapp_settings', 'option') ) :?>
        <?php $whatsapp = get_field('footer_whatsapp_settings', 'option');
            print $whatsapp; ?>
    <?php endif ?>

	<script>
        function setSameSiteCookie(cookieName, cookieValue) {
            document.cookie = `${cookieName}=${cookieValue}; SameSite=None; Secure`;
        }

		// Генерируем уникальный идентификатор сессии (пример)
		var sessionId = Math.random().toString(36).substring(2);

		// Устанавливаем куку с атрибутом SameSite=None и уникальным идентификатором сессии
		setSameSiteCookie('wp-wpml_current_language', sessionId);

    </script>
	

</body>
</html>
