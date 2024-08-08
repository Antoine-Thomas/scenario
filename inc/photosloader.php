<?php
function load_photos_by_selection() {
    $date_order = isset($_POST['date_order']) ? sanitize_text_field($_POST['date_order']) : 'DESC';
    
    // Définir les arguments pour la requête
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1, // Charger toutes les photos
        'meta_key' => 'numero', // Clé du champ ACF
        'orderby' => 'meta_value_num', // Trier par valeur numérique du champ ACF
        'order' => 'ASC', // Ordre croissant
    );
    
    // Ajouter des filtres de taxonomie si nécessaire
    if (!empty($categorie_ids) || !empty($format_ids)) {  
        $args['tax_query'] = $tax_query;
    }

    // Requête WP_Query pour récupérer les photos
    $photos_query = new WP_Query($args);

    ob_start();
    if ($photos_query->have_posts()) {
        echo '<div class="photo-grid">';
        while ($photos_query->have_posts()) {
            $photos_query->the_post();
            $photo = get_field('photo');
            $titre = get_field('titre');
            $description = get_field('description');
            $numero = get_field('numero'); // Récupérer le champ ACF "Numero"

            echo '<div class="photo-item">';
            if ($photo) {
                $image = wp_get_attachment_image_src($photo['ID'], 'full');
                echo '<div class="photo-thumbnail ' . ($image[2] > $image[1] ? 'portrait' : 'landscape') . '">';
                echo '<img src="' . esc_url($image[0]) . '" alt="' . esc_attr(get_the_title()) . '" />';
                echo '<div class="lightbox" style="display: none;">';
                echo '<div class="lightbox-content">';
                echo '<a href="' . get_permalink() . '" class="lightbox-icon eye-icon" title="Voir le détail de la photo"></a>';
                echo '</div></div></div>';

                // Ajout du titre, de la description et du numéro
                if ($titre) {
                    echo '<div class="photo-title">' . esc_html($titre) . '</div>';
                }
                if ($description) {
                    echo '<div class="photo-description">' . esc_html($description) . '</div>';
                }
              
            }
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No photos found</p>';
    }
    wp_reset_postdata();

    $response = ob_get_clean();
    echo $response;
    wp_die();
}

add_action('wp_ajax_load_photos_by_selection', 'load_photos_by_selection');
add_action('wp_ajax_nopriv_load_photos_by_selection', 'load_photos_by_selection');
