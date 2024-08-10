<?php
/**
 * The template for displaying all pages except front page and single posts
 *
 * @package WordPress
 * @subpackage scenario
 * @since 1.0
 */

get_header(); ?>

<?php
// Vérifiez si nous ne sommes pas sur la page d'accueil ou sur une page de type 'single'
if (!is_front_page() && !is_singular()) : ?>
    <div class="plexiglass-card-4">
<?php endif; ?>
 
<!-- Contenu principal de la page -->
<main id="main" class="site-main" role="main">
    <?php
    while (have_posts()) : the_post();
        the_content();
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->
 
<?php
// Fermez la carte plexiglass si nécessaire
if (!is_front_page() && !is_singular()) : ?>
    </div> <!-- Fin de la carte plexiglass -->
<?php endif; ?>
 
<?php get_footer(); ?>
