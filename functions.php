<?php
/**
 * Functions File
 * @package Scenario
 */

// Configuration du thème
function scenario_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    
    register_nav_menus(array(
        'primary' => esc_html__('Menu principal', 'scenario'),
    ));
}
add_action('after_setup_theme', 'scenario_setup');

// Enqueue styles and scripts
function scenario_enqueue_scripts() {
    // Styles
    wp_enqueue_style('scenario-style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('scenario-querymedia', get_template_directory_uri() . '/css/querymedia.css');

    // Scripts
    wp_enqueue_script('jquery');
    $scripts = array(
        'scenario-script' => '/js/script.js',
        'scenario-photosloader' => '/js/photosloader.js',
        'scenario-previews' => '/js/previews.js',
        'particles-js' => '/js/particles.js'
    );

    foreach ($scripts as $handle => $src) {
        wp_enqueue_script($handle, get_template_directory_uri() . $src, array('jquery'), null, true);
    }

    // Particles.js from CDN
    wp_enqueue_script('particles-js-cdn', 'https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js', array(), null, true);

    // Localize scripts
    wp_localize_script('scenario-script', 'nmAjax', array('ajaxUrl' => admin_url('admin-ajax.php')));
    wp_localize_script('scenario-banner', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'scenario_enqueue_scripts');

// Ajouter une classe pour ouvrir un popup au menu Contact
function ajouter_classe_open_popup($atts, $item, $args) {
    if ($item->title === 'Contact') {
        $atts['class'] = isset($atts['class']) ? $atts['class'] . ' open-popup' : 'open-popup';
        $atts['href'] = '#contact-popup';
        $atts['data-target'] = '#contact-popup';
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

// Ajouter support WebP
function add_webp_support($mimes) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('mime_types', 'add_webp_support');

// Lazy loading des images
function add_lazy_loading_to_images($content) {
    if (is_feed() || is_preview() || false !== strpos($content, 'loading="lazy"')) {
        return $content;
    }
    return preg_replace('/<img(.*?)\/?>/i', '<img$1 loading="lazy" />', $content);
}
add_filter('the_content', 'add_lazy_loading_to_images');
add_filter('post_thumbnail_html', 'add_lazy_loading_to_images');
add_filter('get_avatar', 'add_lazy_loading_to_images');
add_filter('widget_text', 'add_lazy_loading_to_images');

// Inclure d'autres fichiers API REST nécessaires
require_once get_template_directory() . '/inc/photosloader.php';
