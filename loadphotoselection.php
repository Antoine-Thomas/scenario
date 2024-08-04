<?php
function load_photos_by_selection() {
    // Récupération des paramètres envoyés par la requête AJAX
    $date_order = isset($_POST['date_order']) ? sanitize_text_field($_POST['date_order']) : 'DESC';
    $title_filter = isset($_POST['title']) ? sanitize_text_field($_POST['title']) : '';

    // Récupération des IDs de catégories et de formats, si présents
    $categorie_ids = isset($_POST['categorie_ids']) ? array_map('intval', $_POST['categorie_ids']) : array();
    $format_ids = isset($_POST['format_ids']) ? array_map('intval', $_POST['format_ids']) : array();

    // Construction de la requête WP_Query
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1, // Charger toutes les photos
        'orderby' => 'date',
        'order' => $date_order,
        's' => $title_filter, // Filtrer par titre si nécessaire
    );

    // Ajouter les tax_query si des filtres de catégorie ou de format sont spécifiés
    if (!empty($categorie_ids) || !empty($format_ids)) {
        $args['tax_query'] = array('relation' => 'AND');

        if (!empty($categorie_ids)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'categorie', // Assurez-vous que la taxonomie est correcte
                'field'    => 'term_id',
                'terms'    => $categorie_ids,
                'operator' => 'IN',
            );
        }

        if (!empty($format_ids)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'format', // Assurez-vous que la taxonomie est correcte
                'field'    => 'term_id',
                'terms'    => $format_ids,
                'operator' => 'IN',
            );
        }
    }

    // Exécuter la requête
    $photos_query = new WP_Query($args);

    // Génération de la sortie HTML
    ob_start();
    if ($photos_query->have_posts()) :
        while ($photos_query->have_posts()) : $photos_query->the_post();
            // Exemple de génération de HTML pour chaque photo
            ?>
            <div class="photo-item">
                <a href="<?php the_permalink(); ?>">
                   
                    <h1 class="photo-title"><?php the_field('titre'); ?></h1>
                </a>
            </div>
            <?php
        endwhile;
    else :
        echo '<p>No photos found.</p>';
    endif;
    wp_reset_postdata();

    $response = array(
        'html' => ob_get_clean(),
        'max_pages' => $photos_query->max_num_pages // Vous pouvez omettre ceci si non utilisé
    );

    echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_load_photos_by_selection', 'load_photos_by_selection');
add_action('wp_ajax_nopriv_load_photos_by_selection', 'load_photos_by_selection');
