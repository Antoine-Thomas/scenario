<?php
/**
 * The template for displaying all single pages
 *
 * @package WordPress
 * @subpackage Nathalie Mota
 * @since 1.0
 */

 get_header(); ?>

<main id="main" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
    ?>
</main><!-- #main -->

<?php get_footer(); ?>
