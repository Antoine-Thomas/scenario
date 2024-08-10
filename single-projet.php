<?php
/**
 * Template for displaying a single projet
 *
 * @package WordPress
 * @subpackage Scenario
 * @since 1.0
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
         <article id="post-<?php the_ID(); ?>" <?php post_class('single-projet-content'); ?>>
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();

            $prev_url = $prev_post ? get_permalink($prev_post) : '#';
            $next_url = $next_post ? get_permalink($next_post) : '#';
            ?>

            <div class="plexiglass-card">
                <h1 class="projet-title"><?php the_field('titre'); ?></h1>

                <div class="projet-display">
                    <?php if (get_field('projet')) : ?>
                        <img src="<?php echo esc_url(get_field('projet')['url']); ?>" alt="<?php echo esc_attr(get_field('projet')['alt']); ?>" loading="lazy">
                    <?php endif; ?>
                </div>

                <div class="projet-description">
                    <?php the_content(); ?>
                </div>
            </div>

            <a href="<?php echo esc_url(home_url('/')); ?>" class="plexibutton2">Retour à la page d'accueil</a>
        </article>
    </main>
</div>

<?php
get_footer();
?>













