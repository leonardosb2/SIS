<?php
function enqueue_styles_child_theme() {
    global $storefront_version;
	$parent_style = 'storefront-style';
	$child_style  = 'esquema';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'customCss2', get_stylesheet_directory_uri() . '/css/custom.css' );
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
    

	wp_enqueue_style( 'JSbootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js' );

    wp_enqueue_style( $child_style, get_stylesheet_directory_uri() . '/style.css',array( $parent_style ),wp_get_theme()->get('Version'));
    
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_child_theme' );

add_action( 'get_header', 'bbloomer_remove_storefront_sidebar' );
 
function bbloomer_remove_storefront_sidebar() {
    if ( is_product() ) {
        remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
    }
    remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
}
