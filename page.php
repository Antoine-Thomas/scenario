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
if (!is_front_page() && !(is_singular() && !is_page())) : ?>
    <div class="plexiglass-card-4">
<?php endif; ?>
 
<main id="main" class="site-main" role="main">
    <?php
    while (have_posts()) : the_post();
        the_content();
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->
 
<?php
if (!is_front_page() && !(is_singular() && !is_page())) : ?>
    </div> <!-- Fin de la carte plexiglass -->
<?php endif; ?>
 
<?php get_footer(); ?>

