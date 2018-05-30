<?php
$rw = rand(0,999);
function wpst_style() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css?e='.$rw, array('wpst-css') );

}
add_action( 'wp_print_styles', 'wpst_style',11 );


function theme_js() {
    wp_enqueue_script( 'wpst_js',  get_stylesheet_directory_uri() . '/script.js?e='.$rw, array( 'wpst' ), '1.0', true );
}

add_action('wp_enqueue_scripts', 'wpst_js');
?>