<footer id="footer">
    <div class="footer-container">
        <div class="footer-menu">
            <a href="<?php echo esc_url( home_url( 'cv' ) ); ?>" class="footer-icon" aria-label="CV">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon/cvoam.svg" alt="CV">
            </a>
            <a href="<?php echo esc_url( home_url( 'mentions-legales/' ) ); ?>" class="footer-icon" aria-label="Mentions légales">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon/mentions.svg" alt="Mentions légales">
            </a>
            <a href="<?php echo esc_url( home_url( 'privacy-policy/' ) ); ?>" class="footer-icon" aria-label="Politique de confidentialité">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon/privacy2.svg" alt="Politique de confidentialité">
            </a>
            <!-- Ajouter le lien de retour en haut de la page -->
            <a href="#top" class="footer-icon" aria-label="Retour en haut">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon/up.svg" alt="Retour en haut">
            </a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>




