<?php
/**
 * Template pour afficher les articles associés à la taxonomie "options"
 *
 * @package Nathalie Mota
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="page-header">
            <h1 class="page-title"><?php single_term_title('', true); ?></h1>
            <?php
            $term_description = term_description();
            if (!empty($term_description)) :
            ?>
                <div class="taxonomy-description"><?php echo wp_kses_post($term_description); ?></div>
            <?php endif; ?>
        </header><!-- .page-header -->

        <div class="post-list">
            <?php if (have_posts()) : ?>
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
            <?php else : ?>
                <p>Aucun article trouvé pour cette taxonomie.</p>
            <?php endif; ?>
        </div><!-- .post-list -->

        <?php
        // Pagination
        the_posts_pagination(array(
            'prev_text' => 'Précédent',
            'next_text' => 'Suivant',
        ));
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>








