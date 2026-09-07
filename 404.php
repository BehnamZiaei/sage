<?php
get_header();
?>
<main id="main" class="site-main">
    <h1 class="page-title"><?php esc_html_e('Page not found', 'sage'); ?></h1>
    <p><?php esc_html_e('The page you requested could not be found.', 'sage'); ?></p>
    <?php get_search_form(); ?>
</main>
<?php get_footer(); ?>
