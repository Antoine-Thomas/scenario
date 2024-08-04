<?php
/**
 * Functions File
 * @package Scenario
 */

// Enregistrer les menus
function scenario_register_menus() {
    register_nav_menus(array(
        'primary' => esc_html__('Menu principal', 'scenario'),
    ));
}
add_action('init', 'scenario_register_menus');

// Ajouter une classe pour ouvrir un popup au menu Contact
function ajouter_classe_open_popup($atts, $item, $args) {
    if ($item->title === 'Contact') {
        $atts['class'] = isset($atts['class']) ? $atts['class'] . ' open-popup' : 'open-popup';
        $atts['href'] = '#contact-popup'; // Changez ceci pour cibler votre popup
        $atts['data-target'] = '#contact-popup'; // Ajoutez cet attribut de données
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'ajouter_classe_open_popup', 10, 3);

// Enqueue styles and scripts
function scenario_enqueue_scripts() {
    // Enqueue styles
    wp_enqueue_style('scenario-style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('scenario-querymedia', get_template_directory_uri() . '/css/querymedia.css');

    // Enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('scenario-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('scenario-photosloader', get_template_directory_uri() . '/js/photosloader.js', array('jquery'), null, true);
    wp_enqueue_script('scenario-previews', get_template_directory_uri() . '/js/previews.js', array('jquery'), null, true);
   
    wp_enqueue_script('particles-js', get_template_directory_uri() . '/js/particles.js', array('jquery'), null, true);
   
    // Enfilez le script des particules
    wp_enqueue_script('particles-js', 'https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js', array(), null, true);

    // Localize scripts
    wp_localize_script('scenario-script', 'nmAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
    ));

    wp_localize_script('scenario-banner', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'scenario_enqueue_scripts');

// Inclure d'autres fichiers API REST nécessaires
require_once get_template_directory() . '/inc/photosloader.php';

// Ajouter support WebP
function add_webp_support($mimes) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('mime_types', 'add_webp_support');

// Lazy loading des images
function add_lazy_loading_to_images($content) {
    if (is_feed() || is_preview()) {
        return $content;
    }
    if (false !== strpos($content, 'loading="lazy"')) {
        return $content;
    }
    $content = preg_replace('/<img(.*?)\/?>/i', '<img$1 loading="lazy" />', $content);
    return $content;
}
add_filter('the_content', 'add_lazy_loading_to_images');
add_filter('post_thumbnail_html', 'add_lazy_loading_to_images');
add_filter('get_avatar', 'add_lazy_loading_to_images');
add_filter('widget_text', 'add_lazy_loading_to_images');

// Configuration des fonctionnalités du thème
function scenario_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'scenario_setup');

// Ajouter des icônes au menu de navigation
function ajouter_icone_menu($items, $args) {
    // Remplacez les noms de menu par les icônes appropriées
    $items = str_replace('Accueil', '<img src="' . get_template_directory_uri() . '/images/icon/home.svg" alt="Accueil" class="menu-icon" />', $items);
    $items = str_replace('Contact', '<img src="' . get_template_directory_uri() . '/images/icon/email.svg" alt="Contact" class="menu-icon" />', $items);
    return $items;
}
add_filter('wp_nav_menu_items', 'ajouter_icone_menu', 10, 2);
