<?php
/**
 * The main template file.
 *
 * @package Sage
 */

get_header();
?>

<main id="main" class="site-main">
    <?php if (have_posts()) : ?>
        <?php if (is_home() && ! is_front_page()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php elseif (is_archive()) : ?>
            <header class="page-header">
                <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
            </header>
        <?php endif; ?>

        <div class="content-grid">
            <div class="post-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <header class="entry-header">
                            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
                            <p class="entry-meta">
                                <?php echo esc_html(get_the_date()); ?>
                                <?php if (get_the_category_list(', ')) : ?>
                                    &middot; <?php echo wp_kses_post(get_the_category_list(', ')); ?>
                                <?php endif; ?>
                            </p>
                        </header>
                        <?php if (has_post_thumbnail()) : ?>
                            <a class="post-thumbnail" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="entry-summary"><?php the_excerpt(); ?></div>
                    </article>
                <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    <?php else : ?>
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Nothing Found', 'sage'); ?></h1>
        </header>
        <p><?php esc_html_e('No content was found.', 'sage'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
