<?php
if (have_posts()) : ?>
    <div class="post-list">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    // Afficher la miniature de l'article si disponible
                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail">';
                        the_post_thumbnail('medium'); // Taille de la vignette à adapter selon vos besoins
                        echo '</div>';
                    }
                    ?>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div><!-- .excerpt -->
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <a href="<?php the_permalink(); ?>" class="read-more">Voir plus</a>
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; ?>
    </div><!-- .post-list -->

    <?php
    // Pagination
    the_posts_pagination(array(
        'prev_text' => 'Précédent',
        'next_text' => 'Suivant',
    ));
else :
    ?>
    <p>Aucun article trouvé pour cette taxonomie.</p>
<?php endif; ?>