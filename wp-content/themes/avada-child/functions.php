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
 * Custom Admin Message.
 * Messages for logged in users.
 */
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Admin Support', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p><i class="fusion-li-icon fa fa-bullhorn" style="color:#262626;"></i> All new listings will be created and saved in "Pending". Click <a href="https://shopbusbyantiques.com/wp-admin/edit.php?post_status=pending&post_type=product" target="_blank">here</a> to see pending. Do not save as "Draft" Please use "Save as Pending" instead. Need help? For Tutorials visit: <a href="https://shopbusbyantiques.com/forums/topic/creating-new-listings/" target="_blank">Creating New Listings</a><br><i class="fusion-li-icon fa fa-check" style="color:#7ad03a;"></i> Agent1 updated: See your log sheet for new credentials</p>';
}

/*
 *
 * Removes products count after categories name
 * 
 */
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );

function woo_remove_category_products_count() {
  return;
}