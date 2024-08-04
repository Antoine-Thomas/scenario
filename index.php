<?php
/**
 * Index Template
 *
 * @package Nathalie Mota
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-## -->
            <?php endwhile; ?>

            <div class="pagination">
                <?php
                // Pagination
                the_posts_pagination( array(
                    'prev_text' => 'Précédent',
                    'next_text' => 'Suivant',
                ) );
                ?>
            </div>

        <?php else : ?>
            <p>Aucun article trouvé</p>
        <?php endif; ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>





