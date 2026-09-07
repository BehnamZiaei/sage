<?php
/**
 * Sage Starter Theme
 *
 * A dependency-free WordPress theme entry point. The Blade/Vite source files
 * remain available for a future build workflow, while this fallback makes the
 * distributed theme installable without Composer or Node.js.
 */

if (! defined('ABSPATH')) {
    exit;
}

function sage_setup() {
    load_theme_textdomain('sage', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 280,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('html5', [
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);
}
add_action('after_setup_theme', 'sage_setup');

function sage_widgets_init() {
    $sidebar_args = [
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ];

    register_sidebar(array_merge($sidebar_args, [
        'name'        => __('Primary Sidebar', 'sage'),
        'id'          => 'sidebar-primary',
        'description' => __('Widgets shown in the main sidebar.', 'sage'),
    ]));

    register_sidebar(array_merge($sidebar_args, [
        'name'        => __('Footer', 'sage'),
        'id'          => 'sidebar-footer',
        'description' => __('Widgets shown in the footer.', 'sage'),
    ]));
}
add_action('widgets_init', 'sage_widgets_init');

function sage_enqueue_assets() {
    wp_enqueue_style('sage-style', get_stylesheet_uri(), [], '1.0.0');
}
add_action('wp_enqueue_scripts', 'sage_enqueue_assets');

function sage_excerpt_more() {
    return sprintf(
        ' &hellip; <a class="read-more" href="%s">%s</a>',
        esc_url(get_permalink()),
        esc_html__('Continue reading', 'sage')
    );
}
add_filter('excerpt_more', 'sage_excerpt_more');

function sage_body_classes($classes) {
    if (! is_active_sidebar('sidebar-primary')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'sage_body_classes');
