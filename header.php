<?php
if (! defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'sage'); ?></a>
<header class="site-header">
    <div class="site-header-inner">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <?php if (get_bloginfo('description')) : ?>
                    <p class="site-description"><?php bloginfo('description'); ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php if (has_nav_menu('primary_navigation')) : ?>
            <nav class="primary-navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'sage'); ?>">
                <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-menu']); ?>
            </nav>
        <?php endif; ?>
    </div>
</header>
<div class="site-container">
