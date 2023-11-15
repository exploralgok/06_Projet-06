<?php
/**
 * astra child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package astra child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function add_google_fonts() {
    wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&display=swap', false );
}
    add_action( 'wp_enqueue_scripts', 'add_google_fonts' );



function ajouter_lien_admin_menu($items) {
    if (is_user_logged_in() && current_user_can('administrator')) {
        $lien_admin = '<li class="menu-item"><a href="http://localhost:8888/wp-admin/"  class="menu-link">Admin</a></li>';
        
        // Divisez le menu en un tableau d'éléments
        $menu_items = explode('</li>', $items);

        // Insérez le lien administrateur en deuxième position
        array_splice($menu_items, 1, 0, $lien_admin);

        // Rejoignez à nouveau les éléments du menu en une chaîne
        $items = implode('</li>', $menu_items);
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'ajouter_lien_admin_menu', 10, 1);


add_filter('wpcf7_autop_or_not', '__return_false');


?>