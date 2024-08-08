<?php
/**
 * Template for displaying a single photo
 *
 * @package WordPress
 * @subpackage Scenario
 * @since 1.0
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
    <div id="particles-js"></div>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-photo-content'); ?>>
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();

            $prev_url = $prev_post ? get_permalink($prev_post) : '#';
            $next_url = $next_post ? get_permalink($next_post) : '#';
            ?>

         

            <div class="plexiglass-card">
                <h1 class="photo-title"><?php the_field('titre'); ?></h1>

                <div class="photo-display">
                    <?php if (get_field('photo')) : ?>
                        <img src="<?php echo esc_url(get_field('photo')['url']); ?>" alt="<?php echo esc_attr(get_field('photo')['alt']); ?>" loading="lazy">
                    <?php endif; ?>
                </div>

                <div class="photo-description">
                    <?php the_content(); ?>
                </div>
            </div>

            <a href="<?php echo esc_url(home_url('/')); ?>" class="plexibutton2">Retour à la page d'accueil</a>
        </article>
    </main>

  <!-- partial -->
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" async></script>

</div>

<?php
get_footer();
?>












