jQuery(document).ready(function ($) {
    // Smooth scrolling pour les liens d'ancrage
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });

    // Gestion des liens "Contact"
    $('.open-popup').on('click', function(e) {
        e.preventDefault();
        // Rediriger vers la section de contact sur la page d'accueil
        window.location.href = 'http://localhost:10101/#contact-section';
    });

    // Ajout de l'écouteur d'événement passif pour les appareils tactiles
    document.addEventListener('touchstart', function() {}, { passive: true });
});