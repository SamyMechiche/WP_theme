<?php
function portfolio_thumbnails() {
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'portfolio_thumbnails');

if ( ! function_exists( 'portfolio_register_nav_menu' ) ) {

	function portfolio_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'text_domain' ),
		) );
	}
	add_action( 'after_setup_theme', 'portfolio_register_nav_menu', 0 );
}

function mon_portfolio_enqueue_assets() {
    wp_enqueue_style('mon-style', get_template_directory_uri() . 'style.css');
}

function my_load_scripts() {
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);

}

function add_project_body_class($classes) {
    if (is_singular('post') || is_singular('project')) {
        $classes[] = 'is-project';
    }
    return $classes;
}
add_filter('body_class', 'add_project_body_class');

add_action('wp_enqueue_scripts', 'my_load_scripts');
add_action('wp_enqueue_style', 'mon_portfolio_enqueue_assets');
