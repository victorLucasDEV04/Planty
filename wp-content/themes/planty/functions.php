<?php

/**
 * Planty Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Planty
 * @since 1.0.0
 */


define('CHILD_THEME_PLANTY_VERSION', '1.0.0');

/**
 * Enqueue styles
 */
function child_enqueue_styles()
{

    wp_enqueue_style('planty-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_PLANTY_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles');

add_filter('astra_stretched_layout_with_spacing', '__return_false');


remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});

// Mise à jour point breakpoint personnalisé tablette - retour 921;
add_filter('astra_tablet_breakpoint', function () {
    return 921;
});




/* lien admin menu*/


function is_user_logged($items, $args)
{


    $add_menu = array('primary', 'mobile_menu');
    if (is_user_logged_in() && in_array($args->theme_location, $add_menu)) {

        $admin_url = admin_url();

        $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page admin-link"> <a class="menu-link" href="' . esc_url($admin_url) . '">Admin</a></li>';
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'is_user_logged', 10, 2);
