<?php
if (! defined('ABSPATH')) {
    exit;
}
?>
</div>
<footer class="site-footer">
    <div class="site-footer-inner">
        <?php if (is_active_sidebar('sidebar-footer')) : ?>
            <?php dynamic_sidebar('sidebar-footer'); ?>
        <?php else : ?>
            <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?></p>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
