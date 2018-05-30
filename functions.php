<?php
/*
LOADING
*/
require 'functions/cleanup.php';
require 'functions/setup.php';
require 'functions/enqueues.php';
require 'functions/navbar.php';
require 'functions/widgets.php';
require 'functions/search-widget.php';
require 'functions/index-pagination.php';
require 'functions/split-post-pagination.php';
require 'functions/feedback.php';
require 'helper-functions.php';

/* shortcodes.php */
function shortcode_news($atts) {
  $atts = shortcode_atts( ['show' => 4] , $atts );
  $n = $atts['show'];
	include 'lib/news.php'; //source of code
}
add_shortcode('news', 'shortcode_news');



