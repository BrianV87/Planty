<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}


function planty_add_admin_menu_item($items, $args) {
    // Vérifie si le menu est celui défini comme "main-menu"
    if ($args->theme_location === 'main-menu' && current_user_can('administrator')) {
        // Ajoute un lien "Admin" à la fin du menu
        $items .= '<li class="menu-item admin-only"><a href="' . esc_url(admin_url()) . '"><span itemprop="name">Admin</span></a></li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'planty_add_admin_menu_item', 10, 2);


function register_footer_menu() {
    register_nav_menu('menu-footer', 'Menu Footer');  // Enregistrer l'emplacement du menu footer
}
add_action('after_setup_theme', 'register_footer_menu');
