<?php

function wpst_enqueues() {

	/* Styles */
	$td = td;

	wp_register_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css', false, '4.0.0', null);
	wp_enqueue_style('bootstrap-css');

	wp_register_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0', null);
	wp_enqueue_style('font-awesome-css');
	
  	wp_register_style('default-css', $td . 'style.css', false, null);
	wp_enqueue_style('default-css');
	
  	wp_register_style('wpst-css', $td . 'wpst.css', false, null);
	wp_enqueue_style('wpst-css');

	/* Scripts */

	wp_deregister_script('jquery');

  	wp_register_script('jquery',  'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js', false, '2.2.1', true);
	wp_enqueue_script('jquery');

  	wp_register_script('modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, '2.8.3', true);
	wp_enqueue_script('modernizr');

	wp_register_script('popper',  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js', false, '1.13.0', true);
	wp_enqueue_script('popper');

  	wp_register_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', false, '4.0.0-beta.2', true);
	wp_enqueue_script('bootstrap-js');

	wp_register_script('wpst-js', $td . 'wpst.js', false, null, true);
	wp_enqueue_script('wpst-js');

	
}
add_action('wp_enqueue_scripts', 'wpst_enqueues', 100);
