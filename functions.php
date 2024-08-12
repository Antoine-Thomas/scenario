<?php
/**
 * Functions File
 * @package Scenario
 */

// Configuration du thème
function scenario_setup() {
    // Support de fonctionnalités diverses
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

    // Enregistrement des menus
    register_nav_menus(array(
        'primary' => esc_html__('Menu principal', 'scenario'),
    ));

    // Support des sitemaps
    add_theme_support('sitemaps');
}
add_action('after_setup_theme', 'scenario_setup');

// Enqueue styles and scripts
function scenario_enqueue_scripts() {
    // Styles
    wp_enqueue_style('scenario-style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('scenario-querymedia', get_template_directory_uri() . '/css/querymedia.css');

    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('scenario-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
    wp_enqueue_script('scenario-photosloader', get_template_directory_uri() . '/js/photosloader.js', array('jquery'), null, true);

    // Localisation des scripts
    wp_localize_script('scenario-script', 'nmAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'home_url' => home_url('/'),  // URL de la page d'accueil
    ));
    wp_localize_script('scenario-photosloader', 'nmAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('projets_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'scenario_enqueue_scripts');

// Ajouter une classe pour envoyer à la section appropriée en fonction du type de page
function ajouter_classe_open_popup($atts, $item, $args) {
    if ($item->title === 'Contact') {
        $atts['class'] = isset($atts['class']) ? $atts['class'] . ' ' : '';

        if (is_singular('projet')) {
            // Rediriger vers le footer sur les pages de type "single projet"
            $atts['href'] = home_url('/') . '#footer';
            $atts['data-is-single-projet'] = 'true';
        } else {
            // Rediriger vers la section contact sur les autres pages
            $atts['href'] = home_url('/') . '#contact-section';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'ajouter_classe_open_popup', 10, 3);

// Ajouter des icônes au menu de navigation
function ajouter_icone_menu($items, $args) {
    $icon_map = array(
        'Accueil' => 'home.svg',
        'Contact' => 'email.svg'
    );

    foreach ($icon_map as $text => $icon) {
        $icon_url = get_template_directory_uri() . '/images/icon/' . $icon;
        $items = str_replace($text, "<img src='$icon_url' alt='$text' class='menu-icon' />", $items);
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'ajouter_icone_menu', 10, 2);

// Support des fichiers WebP
function add_webp_support($mimes) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('mime_types', 'add_webp_support');

// Lazy loading des images
function add_lazy_loading_to_images($content) {
    if (is_feed() || is_preview() || strpos($content, 'loading="lazy"') !== false) {
        return $content;
    }
    return preg_replace('/<img(.*?)\/?>/i', '<img$1 loading="lazy" />', $content);
}
add_filter('the_content', 'add_lazy_loading_to_images');
add_filter('post_thumbnail_html', 'add_lazy_loading_to_images');
add_filter('get_avatar', 'add_lazy_loading_to_images');
add_filter('widget_text', 'add_lazy_loading_to_images');

// Ajouter une image de fond sur toutes les pages
function scenario_body_background() {
    $background_image_url = get_template_directory_uri() . '/images/fond.webp';
    echo "<style>
        body {
            background-image: url('$background_image_url');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>";
}
add_action('wp_head', 'scenario_body_background');

// Inclure d'autres fichiers API REST nécessaires
require_once get_template_directory() . '/inc/photosloader.php';

// Ajouter un template pour les erreurs 404
function scenario_404_template($template) {
    if (is_404()) {
        $new_template = locate_template(array('404.php'));
        if ($new_template) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'scenario_404_template');

// Ajouter le support de la structure de permaliens pour éviter les erreurs de Yoast
function scenario_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action('init', 'scenario_permalinks');
?>
