jQuery(document).ready(function ($) {
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 180,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#000000" // Couleur noire
            },
            "shape": {
                "type": "star",
                "stroke": {
                    "width": 0,
                    "color": "#000000" // Couleur des lignes de contour des particules
                },
                "polygon": {
                    "nb_sides": 6 // Ajustez le nombre de côtés pour les étoiles
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": true,
                    "speed": 2,
                    "opacity_min": 0.2,
                    "sync": false
                }
            },
            "size": {
                "value": 3, // Augmentez la taille des particules si elles sont trop petites
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 100,
                "color": "#000000", // Couleur des lignes de connexion
                "opacity": 0.8,
                "width": 1.5
            },
            "move": {
                "enable": true,
                "speed": 1,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": true,
                "attract": {
                    "enable": true,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "bubble"
                },
                "onclick": {
                    "enable": true,
                    "mode": "repulse"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 100,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 150,
                    "size": 8,
                    "duration": 20,
                    "opacity": 0.5,
                    "speed": 2
                },
                "repulse": {
                    "distance": 135,
                    "duration": 2
                },
                "push": {
                    "particles_nb": 10
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
});






