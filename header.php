<?php
/**
 * Header Template
 *
 * @package WordPress
 * @subpackage Scenario
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="Portofolio développeur web spécialisé Wordpress" />
    <meta name="description" content="Thomas Leroyer -Site personnel en expertise Wordpress-" >

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="particles-js"></div>
    <!-- Header -->
    <header id="header" class="header">
        <div class="container-header">
            <!-- Logo du site avec un lien vers la page d'accueil -->
            <a id="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Page d'accueil de Scenario">
                <img src="<?php echo get_template_directory_uri(); ?>/images/portofolio/logo.png" alt="Logo <?php echo esc_attr(get_bloginfo('name')); ?>">
            </a>

            <!-- Bouton du menu burger -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" title="Menu">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>

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

    <!-- Conteneur du menu burger -->
    <div class="burger-menu-container">
        <span class="close-menu"></span>
        <nav class="menu-nav">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary', // Localisation du menu
                    'menu_class'     => 'menu-nav-items', // Classe CSS pour les éléments du menu
                )
            );
            ?>
        </nav>
    </div>

    <?php
    // Inclure le fichier de la popup de contact
    get_template_part('popup-contact');
    ?>

    <?php wp_footer(); ?>
</body>

</html>


