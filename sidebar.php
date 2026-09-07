<?php
if (! defined('ABSPATH')) {
    exit;
}
if (is_active_sidebar('sidebar-primary')) : ?>
    <aside class="sidebar" aria-label="<?php esc_attr_e('Sidebar', 'sage'); ?>">
        <?php dynamic_sidebar('sidebar-primary'); ?>
    </aside>
<?php endif; ?>
