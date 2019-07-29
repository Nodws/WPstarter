<?php

  //Uncomment to clear revisions
  //$wpdb->query( "DELETE FROM $wpdb->posts WHERE post_type = 'revision'" );
  
/*
Clean up wp_head()
*/

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('welcome_panel', 'wp_welcome_panel');
remove_filter('comment_text', 'make_clickable', 9);

// Remove trash feature
remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );

//Disable very useful modals that log you out
remove_action( 'admin_enqueue_scripts', 'wp_auth_check_load' );

/* Patch dumb security hole */
add_action('template_redirect', 'disable_author_page');

function disable_author_page() {
    global $wp_query;
    if ( is_author() ) {
       $wp_query->set_404();
       status_header(404);  exit; 
    }
}
/*
Show less info to users on failed login for security.
(Will not let a valid username be known.)
*/

function show_less_login_info() { 
    return "<strong>ERROR</strong>!"; 
}
add_filter( 'login_errors', 'show_less_login_info' );

/*
Disable Admin bar
*/
add_filter('show_admin_bar', '__return_false');
remove_action('init', 'wp_admin_bar_init');

/*
Do not generate and display WordPress version
*/

function no_generator()  { 
    return ''; 
}
add_filter( 'the_generator', 'no_generator' );

add_filter('xmlrpc_enabled', '__return_false');

// disable default dashboard widgets
function disable_default_dashboard_widgets()
   {
      remove_meta_box('dashboard_primary', 'dashboard', 'side');
      remove_meta_box('dashboard_secondary', 'dashboard', 'side');
      remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
      remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
      remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
   }
add_action('admin_menu', 'disable_default_dashboard_widgets');

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
  add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
  add_filter( 'wp_calculate_image_srcset', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

// Remove useless retina images
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/*
Disable nagging
*/
add_action('admin_head', function() {
 remove_action( 'admin_notices', 'update_nag',      3  );
remove_action( 'admin_notices', 'maintenance_nag', 10 );
});
