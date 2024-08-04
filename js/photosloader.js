(function($) {
    // Déclaration de la variable ajaxUrl en utilisant nmAjax.ajaxUrl défini par wp_localize_script
    const ajaxUrl = nmAjax.ajaxUrl;

    // Fonction pour charger les photos en fonction des sélections de catégorie, format et ordre de date
    function loadPhotosBySelection() {
        const categorieId = $('#categorie_id').val();
        const formatId = $('#format_id').val();
        const dateOrder = $('#date').val() || "ASC"; // Par défaut, ordre ascendant si aucune valeur sélectionnée

        const args = {
            action: 'load_photos_by_selection',
            date_order: dateOrder.toUpperCase(),
            page: 1,
            photos_per_page: -1
        };

        $.ajax({
            type: 'POST',
            url: ajaxUrl,
            data: args,
            success: function(response) {
                $('.photo-grid-container').html(response);
                applyLightboxEffect();
                initializeFeatures();
            },
            error: function(response) {
                console.error('Erreur:', response);
            }
        });
    }

    function initializeFeatures() {
        $('.custom-dropdown .list_items_filter .list_item').off('click').on('click', function() {
            const $dropdown = $(this).closest('.custom-dropdown');
            const $selectedValue = $dropdown.find('.selected-value');
            const $hiddenInput = $dropdown.find('input[type="hidden"]');

            const selectedValue = $(this).data('value');
            $selectedValue.text($(this).text());
            $hiddenInput.val(selectedValue);

            loadPhotosBySelection();
        });
    }

    function applyLightboxEffect() {
        $('.photo-thumbnail').hover(
            function () {
                $(this).find('.lightbox').stop().fadeIn(300);
            },
            function () {
                $(this).find('.lightbox').stop().fadeOut(300);
            }
        );
    }

    $(document).ready(function() {
        initializeFeatures();
        loadPhotosBySelection();
        applyLightboxEffect();
    });

})(jQuery);
