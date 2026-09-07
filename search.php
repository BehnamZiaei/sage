<?php
get_header();
?>
<main id="main" class="site-main">
    <header class="page-header">
        <h1 class="page-title"><?php printf(esc_html__('Search results for: %s', 'sage'), esc_html(get_search_query())); ?></h1>
    </header>
    <div class="content-grid">
        <div class="post-list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('post-card'); ?>>
                        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
                        <p class="entry-meta"><?php echo esc_html(get_the_date()); ?></p>
                        <div class="entry-summary"><?php the_excerpt(); ?></div>
                    </article>
                <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <p><?php esc_html_e('No results found.', 'sage'); ?></p>
            <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>
<?php get_footer(); ?>
