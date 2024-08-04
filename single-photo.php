<?php
/**
 * Template for displaying a single photo
 *
 * @package WordPress
 * @subpackage Scenario
 * @since 1.0
 */

get_header(); ?>

<div class="single-photo-content">
    <!-- Ajouter les flèches de navigation -->
    <?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();

    $url_page_precedente = $prev_post ? get_permalink($prev_post) : '#';
    $url_page_suivante = $next_post ? get_permalink($next_post) : '#';
    ?>

    <a href="<?php echo esc_url($url_page_precedente); ?>" class="navigation-arrow left-arrow">
        <img src="<?php echo get_template_directory_uri(); ?>/images/fleche-gauche.png" alt="Flèche gauche">
    </a>
    <a href="<?php echo esc_url($url_page_suivante); ?>" class="navigation-arrow right-arrow">
        <img src="<?php echo get_template_directory_uri(); ?>/images/fleche-droite.png" alt="Flèche droite">
    </a>

    <!-- Grande carte style plexiglas -->
    <div class="plexiglass-card">
        <!-- Titre de la photo -->
        <h1 class="photo-title"><?php the_field('titre'); ?></h1>

        <!-- Afficher la photo principale -->
        <div class="photo-display">
            <?php if (get_field('photo')) : ?>
                <img src="<?php echo esc_url(get_field('photo')['url']); ?>" alt="<?php echo esc_attr(get_field('photo')['alt']); ?>">
            <?php endif; ?>
        </div>

        <!-- Description longue -->
        <div class="photo-description">
            <?php the_content(); ?>
        </div>
    </div>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="plexibutton2">Retour à la page d'accueil</a>
</div>



<?php get_footer(); ?>










