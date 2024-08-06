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
    $('.open-popup, a[href="#contact-section"]').on('click', function(e) {
        e.preventDefault();
        var target = $('#contact-section');

        if (target.length) {
            // Si nous sommes sur la page d'accueil, faire défiler jusqu'à la section de contact
            $('html, body').animate({
                scrollTop: target.offset().top - 50 // Ajout d'un décalage de 50px
            }, 1000);
        } else {
            // Pour toute autre page, rediriger vers la page d'accueil + section de contact
            window.location.href = '/#contact-section';
        }
    });

    // Ajout d'un délai pour s'assurer que la page est complètement chargée
    setTimeout(function() {
        // Vérifier si nous avons été redirigés avec un hash dans l'URL
        if (window.location.hash === '#contact-section') {
            var target = $('#contact-section');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 50 // Ajout d'un décalage de 50px
                }, 1000);
            }
        }
    }, 500);


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
    if ($(this).scrollTop() > 300) {
        $scrollTopButton.addClass('show');
    } else {
        $scrollTopButton.removeClass('show');
    }
});

$scrollTopButton.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop : 0}, 800);
});

});