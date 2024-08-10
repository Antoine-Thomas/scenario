jQuery(document).ready(function ($) {
    // Fonction de défilement fluide
    function smoothScroll(target, offset = 0) {
        if (target.length) {
            var targetPosition = target.offset().top - offset;
            $('html, body').animate({
                scrollTop: Math.max(0, targetPosition)
            }, 1500, 'swing'); // Ajustez la durée ici si nécessaire
        }
    }

    // Fonction pour gérer le défilement vers le footer ou la section de contact
    function handleScroll(e) {
        if (e) e.preventDefault();
        var href = $(this).attr('href');
        var target = $(href);

        if (target.length) {
            var headerHeight = $('header').outerHeight() || 0;
            var offset = headerHeight + 20; // Ajustez si nécessaire
            smoothScroll(target, offset);
        } else {
            window.location.href = href;
        }
    }

    // Gestion des clics sur les liens d'ancrage
    $('a[href^="#"]').not('[href="#top"]').on('click', handleScroll);

    // Gestion des liens "Contact" pour les pages de type "single photo"
    $(document).on('click', '.open-popup', handleScroll);

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
        $('html, body').animate({ scrollTop: 0 }, 1500, 'swing'); // Ajustez la durée ici si nécessaire
    });
});

