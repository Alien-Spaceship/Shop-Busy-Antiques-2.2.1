<?php

function theme_enqueue_styles() {

    $parent_style = 'avada-parent-stylesheet';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'avada-child',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2); function add_login_logout_link($items, $args) {         ob_start();         wp_loginout('index.php');         $loginoutlink = ob_get_contents();         ob_end_clean();         $items .= '<li>'. $loginoutlink .'</li>';     return $items; }

/**
 * Custom Admin Message. //DELETED AFTER BRANCH//
 * Messages for logged in users.
 */

/*
 *
 * Removes products count after categories name
 * 
 */
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );

function woo_remove_category_products_count() {
  return;
}
