jQuery(document).ready(function ($) {
    // Fonction de défilement fluide
    function smoothScroll(target, offset = 0, duration = 1500) {
        if (target.length) {
            var targetPosition = target.offset().top - offset;
            $('html, body').animate({
                scrollTop: Math.max(0, targetPosition)
            }, duration, 'easeInOutQuad'); // Utilisation de easeInOutQuad pour une animation plus fluide
        }
    }

    // Fonction pour gérer le défilement vers le footer ou la section de contact
    function handleScroll(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var target = $(href);

        if (target.length) {
            var headerHeight = $('header').outerHeight() || 0;
            var offset = headerHeight + 20; // Ajustez si nécessaire
            
            // Déterminer la durée de l'animation en fonction de la classe
            var duration = $(this).hasClass('home-page') ? 2500 : 1500;
            
            smoothScroll(target, offset, duration);
        } else if (href.startsWith('#')) {
            window.location.href = home_url + href;
        } else {
            window.location.href = href;
        }
    }

    // Gestion des clics sur les liens d'ancrage et les liens "Contact"
    $('a[href^="#"]').not('[href="#top"]').add('.contact-link').on('click', handleScroll);

    // Vérification du hash dans l'URL après chargement complet
    $(window).on('load', function() {
        var hash = window.location.hash;
        if (hash === '#footer' || hash === '#contact-section') {
            setTimeout(function() {
                var target = $(hash);
                if (target.length) {
                    var headerHeight = $('header').outerHeight() || 0;
                    var offset = headerHeight + 20; // Ajustez si nécessaire
                    smoothScroll(target, offset);
                }
            }, 100);
        }
    });

    // Gestion du bouton "Retour en haut"
    var $scrollTopButton = $('.footer-icon[href="#top"]');
    $(window).scroll(function() {
        $scrollTopButton.toggleClass('show', $(this).scrollTop() > 300);
    });

    $scrollTopButton.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutQuad');
    });

    // Ajout de la fonction d'accélération easeInOutQuad si jQuery UI n'est pas utilisé
    if ($.easing.easeInOutQuad === undefined) {
        $.easing.easeInOutQuad = function (x, t, b, c, d) {
            if ((t/=d/2) < 1) return c/2*t*t + b;
            return -c/2 * ((--t)*(t-2) - 1) + b;
        };
    }
});
