<?php
/**
 * Template Name: Accueil
 *
 * @package Scenarios
 */

get_header();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <!-- Hero Section -->
            <section id="hero-section" class="hero">
                <div class="banner">
                    <div class="banner-content">
                        <div class="photo-banner">
                            <div class="title-hero">
                                <div class="plexiglass-card">
                                    <span class="name">Thomas Leroyer</span>
                                    <!-- Logo WordPress ajouté ici -->
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon/WP.png" alt="WordPress Logo" class="wordpress-logo">
                                </div>
                                <span class="title-subtext">Développeur Web WordPress</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div id="particles-js"></div>

            <!-- Skills Section -->
            <div class="title-container">
                <h1 class="title">MES COMPETENCES</h1>
                <p class="subtitle">Découvrez mes offres de développement web spécialisées</p>
            </div>

            <div id="app" class="card-container">
    <div class="card-wrap">
        <div class="card">
            <div class="card-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portofolio/banner.jpg');"></div>
            <div class="card-info">
                <div class="card-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon/html5.png" alt="HTML5 Icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon/css3.png" alt="CSS3 Icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon/javascript1.png" alt="JavaScript Icon">
                </div>
                <h1 slot="header">FRONTEND</h1>
                <p slot="content">Création de sites esthétiques et fonctionnels, un design personnalisé et adaptatif.</p>
            </div>
        </div>
    </div>
    <div class="card-wrap">
        <div class="card">
            <div class="card-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portofolio/black.jpg');"></div>
            <div class="card-info">
                <div class="card-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon/sql.png" alt="SQL Icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon/php.png" alt="PHP Icon">
                </div>
                <h1 slot="header">BACKEND</h1>
                <p slot="content">Services de maintenance régulière, assure sécurité et performances optimales de votre site.</p>
            </div>
        </div>
    </div>
    <div class="card-wrap">
        <div class="card">
            <div class="card-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portofolio/pop.png');"></div>
            <div class="card-info">
                <div class="card-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon/seo.png" alt="SEO Icon">
                </div>
                <h1 slot="header">SEO</h1>
                <p slot="content">Optimisation SEO améliorant la visibilité et le classement du site dans les moteurs de recherche.</p>
            </div>
        </div>
    </div>
</div>

<!-- Social Icons -->
<section class="social-icons-card">
    <div class="social-icons">
        <a href="https://github.com/Antoine-Thomas" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/icon/github.svg" alt="GitHub" class="social-icon">
        </a>
        <a href="https://codepen.io/Leroyer-Thomas" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/icon/codepen.svg" alt="CodePen" class="social-icon">
        </a>
        <a href="https://www.linkedin.com/in/thomas-leroyer-a187492a/" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/icon/linkedin.svg" alt="LinkedIn" class="social-icon">
        </a>
        <a href="https://www.youtube.com/@searchingmurphy/featured" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/icon/youtube-subscription.svg" alt="YouTube" class="social-icon">
        </a>
    </div>
</section>



            <!-- Portfolio Section -->
            <section id="portfolio-section" class="portfolio-section">
                <div class="plexiglass-card2">
                    <h2 class="title">SITES PORTOFOLIO</h2>
                </div>
            </section>


            <section class="additional-cards">
            <!-- Grande carte englobante -->
            <div class="large-card">
                <div class="photo-grid-container">
                  
                </div>
           
            </div>
            </section>


            <!-- Contact Section -->
            <section id="contact-section" class="contact-section">
                <div class="plexiglass-card contact-card">
                    <div class="profile-card">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/portrait.webp" alt="Thomas Leroyer" class="profile-photo">
                       
                        <div class="plexiglass-card2">
                        <p class="subtitle">Prêt à démarrer votre projet web ?
                                                       Profitez de mon expertise en développement web en me contactant.
                                                       Je suis là pour vous donner toutes les informations.
                                                       Envoyez les détails de votre projet via le formulaire.
                                                       N'attendez plus, contactez-moi dès maintenant !</p>
                    </div> </div>
                    <div class="contact-form-card">
                        <h3 class="form-title">Contactez-moi</h3>
                        <?php echo do_shortcode('[contact-form-7 id="93dcb91" title="Formulaire de contact 1"]'); ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->

        <!-- partial -->
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" async></script>
       
    </div><!-- #primary -->

    <?php get_footer(); ?>
</body>
</html>

