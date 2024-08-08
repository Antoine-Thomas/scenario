jQuery(document).ready(function ($) {
    // Fonction de défilement fluide
    function smoothScroll(target, offset = 0) {
        if (target.length) {
            var targetPosition = target.offset().top - offset;
            $('html, body').animate({
                scrollTop: Math.max(0, targetPosition)
            }, 1000);
        }
    }

    // Fonction pour gérer le défilement vers la section de contact
    function handleContactScroll(e) {
        if (e) e.preventDefault();
        var target = $('#contact-section');

        if (target.length) {
            var headerHeight = $('header').outerHeight() || 0;
            smoothScroll(target, headerHeight + 20);
        } else {
            window.location.href = '/#contact-section';
        }
    }

    // Gestion des clics sur les liens d'ancrage
    $('a[href^="#"]').not('[href="#top"]').on('click', function(event) {
        event.preventDefault();
        var target = $(this.getAttribute('href'));
        if (target.length) {
            var headerHeight = $('header').outerHeight() || 0;
            smoothScroll(target, headerHeight + 20);
        }
    });

    // Gestion des liens "Contact" et redirection
    $('.open-popup, a[href="#contact-section"]').on('click', handleContactScroll);

    // Vérification du hash dans l'URL après chargement complet
    $(window).on('load', function() {
        if (window.location.hash === '#contact-section') {
            setTimeout(handleContactScroll, 100);
        }
    });

    // Initialisation de particles.js si disponible
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-js', {
            // Votre configuration particles.js ici
        });
    } else {
        console.warn('particles.js n\'est pas chargé');
    }

    // Gestion du bouton "Retour en haut"
    var $scrollTopButton = $('.footer-icon[href="#top"]');

    $(window).scroll(function() {
        $scrollTopButton.toggleClass('show', $(this).scrollTop() > 300);
    });

    $scrollTopButton.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 1000);
    });
});