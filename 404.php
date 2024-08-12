<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <h1><?php esc_html_e('404 Not Found', 'your-theme'); ?></h1>
        <p><?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'your-theme'); ?></p>
        <?php get_search_form(); ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
