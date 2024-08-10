(function($) {
    const ajaxUrl = nmAjax.ajaxUrl;
    const nonce = nmAjax.nonce;

    function loadProjectsBySelection() {
        $.ajax({
            type: 'POST',
            url: ajaxUrl,
            data: {
                action: 'load_projects_by_selection', // Action définie dans functions.php
                nonce: nonce
            },
            success: function(response) {
                if (response.success) {
                    $('.photo-grid-container').html(response.data);
                    applyLightboxEffect();
                    initializeFeatures();
                } else {
                    console.error('Erreur:', response.data);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur:', status, error);
            }
        });
    }

    function initializeFeatures() {
        $('.list_items_filter .list_item').off('click').on('click', function() {
            const selectedValue = $(this).data('value');
            $selectedValue.text($(this).text());
            $hiddenInput.val(selectedValue);

            loadProjectsBySelection();
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
        loadProjectsBySelection();
        applyLightboxEffect();
    });

})(jQuery);




