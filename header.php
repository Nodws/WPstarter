<!DOCTYPE html>
<html class="no-js">
<head>
	<title><?php wp_title('•', true, 'right'); bloginfo('name'); if(is_front_page()){ echo " | "; bloginfo('description'); } ?> </title>
	<meta charset="utf-8">
	<!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-dark navbar-expand-lg  nav-container navbar-toggleable-md navbar-inverse bg-dark">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
     <? the_custom_logo(); ?>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		<?php
      wp_nav_menu( array(
        'theme_location'		=> 'navbar',
        'container'         => false,
        'menu_class'				=> '',
        'fallback_cb'				=> '__return_false',
      	'items_wrap'				=> '<ul id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
        'depth'							=> 3,
				'walker'            => new wpst_walker_nav_menu()
      ) );
    ?>
		<?php get_template_part('navbar-search'); ?>
  </div>
</nav>


