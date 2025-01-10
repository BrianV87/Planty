</main>
</div>
<footer id="footer" role="contentinfo">
    <div id="copyright">
        <?php
        // Vérifiez si un menu a été attribué à l'emplacement "menu-footer"
        if ( has_nav_menu( 'menu-footer' ) ) {
            wp_nav_menu(array(
                'theme_location' => 'menu-footer',  // Emplacement du menu
                'container' => 'nav',                // Utiliser une balise <nav>
                'container_id' => 'footer-menu',     // ID pour le menu
                'container_class' => 'footer-menu-container', // Classe CSS pour le conteneur
                'menu_class' => 'footer-menu',       // Classe CSS pour la liste du menu
                'fallback_cb' => false               // Ne rien afficher si aucun menu n'est défini
            ));
        } else {
            // Si aucun menu n'est assigné à cet emplacement, afficher un message
            echo '<p>Aucun menu footer n\'est défini.</p>';
        }
        ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
