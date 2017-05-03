<?php
/*
LOADING
*/
	define('td', get_bloginfo('template_directory').'/' );
	define('hd', esc_url(home_url( '/' )));
	
	require td . '/functions/cleanup.php';
	require td . '/functions/setup.php';
	require td . '/functions/enqueues.php';
	require td . '/functions/navbar.php';
	require td . '/functions/widgets.php';
	require td . '/functions/search-widget.php';
	require td . '/functions/index-pagination.php';
	require td . '/functions/split-post-pagination.php';
	require td . '/functions/feedback.php';
