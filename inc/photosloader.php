<?php
// AJAX function
function load_projects_by_selection() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'projets_nonce')) {
        wp_send_json_error('Nonce verification failed');
        wp_die();
    }

    $args = array(
        'post_type' => 'projet',
        'posts_per_page' => -1,
        'meta_key' => 'numero', // Clé méta pour le tri
        'orderby' => 'meta_value_num', // Tri numérique
        'order' => 'ASC', // Ordre croissant par défaut
    );
    
    $projects_query = new WP_Query($args);

    ob_start();
    if ($projects_query->have_posts()) {
        echo '<div class="photo-grid">';
        while ($projects_query->have_posts()) {
            $projects_query->the_post();
            $photo = get_field('projet');
            $titre = get_field('titre');
            $description = get_field('description');
            // $numero est défini mais ne sera pas affiché
            $numero = get_field('numero'); // Assurez-vous que ce champ est correctement défini

            echo '<div class="photo-item">';
            if ($photo) {
                $image = wp_get_attachment_image_src($photo['ID'], 'full');
                echo '<div class="photo-thumbnail">';
                echo '<img src="' . esc_url($image[0]) . '" alt="' . esc_attr(get_the_title()) . '" />';
                echo '<div class="lightbox" style="display: none;">';
                echo '<div class="lightbox-content">';
                echo '<a href="' . get_permalink() . '" class="lightbox-icon eye-icon" title="Voir le détail de la photo"></a>';
                echo '</div></div></div>';

                if ($titre) {
                    echo '<div class="photo-title">' . esc_html($titre) . '</div>';
                }
                if ($description) {
                    echo '<div class="photo-description">' . esc_html($description) . '</div>';
                }
                // Ne pas afficher le numéro ici
                // if ($numero) {
                //     echo '<div class="photo-numero">Numero: ' . esc_html($numero) . '</div>'; // Ne pas afficher
                // }
            }
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No projects found</p>';
    }
    wp_reset_postdata();

    $response = ob_get_clean();
    wp_send_json_success($response);
}
add_action('wp_ajax_load_projects_by_selection', 'load_projects_by_selection');
add_action('wp_ajax_nopriv_load_projects_by_selection', 'load_projects_by_selection');



