<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
    <header class="entry-header">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header>

    <div class="entry-content">
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('medium'); ?>
            </div>
        <?php endif; ?>
        <div class="excerpt">
            <?php the_excerpt(); ?>
        </div>
    </div>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more">Voir plus</a>
    </footer>
</article>
