<?php
/*
LOADING
*/
	define('td', get_bloginfo('template_directory').'/' );
	define('tp', get_template_directory(''));
	define('hd', esc_url(home_url( '/' )));
	
	require 'functions/cleanup.php';
	require 'functions/setup.php';
	require 'functions/enqueues.php';
	require 'functions/navbar.php';
	require 'functions/widgets.php';
	require 'functions/search-widget.php';
	require 'functions/index-pagination.php';
	require 'functions/split-post-pagination.php';
	require 'functions/feedback.php';
