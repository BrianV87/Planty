<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    // Style du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    
    // Style principal du thème enfant
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    
    // Styles spécifiques
    wp_enqueue_style('reset', get_stylesheet_directory_uri() . '/css/reset.css', array('child-style'));
    wp_enqueue_style('header', get_stylesheet_directory_uri() . '/css/header.css', array('child-style'));
    wp_enqueue_style('navigation', get_stylesheet_directory_uri() . '/css/navigation.css', array('child-style'));
    wp_enqueue_style('burger-menu', get_stylesheet_directory_uri() . '/css/burger-menu.css', array('child-style'));
    wp_enqueue_style('forms', get_stylesheet_directory_uri() . '/css/forms.css', array('child-style'));
    wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css', array('child-style'));
    wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array('child-style'));
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

// Fonction qui vérifie si un utilisateur est connecté peut importe son rôle // 

// function planty_add_admin_menu_item($items, $args) {
//     // Vérifie si le menu est celui défini comme "main-menu"
//     if ($args->theme_location === 'main-menu' && is_user_logged_in()) {
//         // Ajoute un lien "Admin" à la fin du menu si l'utilisateur est connecté
//         $items .= '<li class="menu-item admin-only"><a href="' . esc_url(admin_url()) . '"><span itemprop="name">Admin</span></a></li>';
//     }
//     return $items;
// }
// add_filter('wp_nav_menu_items', 'planty_add_admin_menu_item', 10, 2);


function register_footer_menu() {
    register_nav_menu('menu-footer', 'Menu Footer');  // Enregistrer l'emplacement du menu footer
}
add_action('after_setup_theme', 'register_footer_menu');

function enqueue_menu_scripts() {
    wp_enqueue_script(
        'menu-js', 
        get_stylesheet_directory_uri() . '/js/menu.js', 
        array('jquery'), 
        '1.0', 
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_menu_scripts');