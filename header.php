
<?php
/**
 * Template Name: Accueil
 *
 * @package Scenario
 */

 get_header(); // Inclut l'en-tête HTML commun à toutes les pages
 ?>
 
 
 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>
 
 <head>
     <meta charset="<?php bloginfo('charset'); ?>" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <meta name="keywords" content="Portofolio développeur web spécialisé Wordpress" />
   <!-- Balise meta pour la description SEO -->
<meta name="description" content="Bienvenue sur le site de Thomas Leroyer, développeur web spécialisé WordPress. Découvrez mes compétences et projets. Contactez-moi pour discuter de votre projet.">
 
     <?php wp_head(); ?>
 </head>
 
 <body <?php body_class(); ?>>
     <?php wp_body_open(); ?>
 
     <!-- Header -->
     <header id="header" class="header">
         <div class="container-header">
             <!-- Logo du site avec un lien vers la page d'accueil -->
             <a id="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Page d'accueil de Scenario">
                 <img src="<?php echo get_template_directory_uri(); ?>/images/portofolio/logo.webp" alt="Logo <?php echo esc_attr(get_bloginfo('name')); ?>">
             </a>
 
             <!-- Navigation principale -->
             <nav id="navigation" class="main-menu">
                 <?php
                 wp_nav_menu(
                     array(
                         'theme_location' => 'primary', // Localisation du menu
                         'menu_class'     => 'main-menu-nav', // Classe CSS pour le menu
                     )
                 );
                 ?>
             </nav>
         </div>
     </header>
 
     <?php wp_footer(); ?>
 </body>
 </html>
 


