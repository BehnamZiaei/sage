<?php
get_header();
?>
<main id="main" class="site-main">
    <div class="content-grid">
        <div class="post-list">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        <p class="entry-meta"><?php echo esc_html(get_the_date()); ?></p>
                    </header>
                    <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); endif; ?>
                    <div class="entry-content"><?php the_content(); ?></div>
                    <?php wp_link_pages(); ?>
                </article>
            <?php endwhile; ?>
            <?php if (comments_open() || get_comments_number()) : comments_template(); endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</main>
<?php get_footer(); ?>
