<?php
/*
LOADING
*/
	define('td', get_bloginfo('template_directory').'/' );
	define('tp', get_template_directory(''));
	define('hd', esc_url(home_url( '/' )));
	
	require tp. '/functions/cleanup.php';
	require tp. '/functions/setup.php';
	require tp. '/functions/enqueues.php';
	require tp. '/functions/navbar.php';
	require tp. '/functions/widgets.php';
	require tp. '/functions/search-widget.php';
	require tp. '/functions/index-pagination.php';
	require tp. '/functions/split-post-pagination.php';
	require tp. '/functions/feedback.php';
