<?php
//Get theme dir
define('td', get_bloginfo('template_directory').'/' );
//Get home dir
define('hd', esc_url(home_url( '/' )));
//Get temes path
define('tp', get_template_directory('').'/');
//Get home path
define('hp', ABSPATH);
	
//Wp post schlep
define('AUTOSAVE_INTERVAL', 3600 ); 
define('WP_POST_REVISIONS', 9 );
define('EMPTY_TRASH_DAYS', 30 );
define('WP_MAX_MEMORY_LIMIT', '256M' );
define('CONCATENATE_SCRIPTS', false);
//Disable edit theme files in admin
define('DISALLOW_FILE_EDIT', true );
//Block requests
//define( 'WP_HTTP_BLOCK_EXTERNAL', true );
//Disable image duplication on edit
define('IMAGE_EDIT_OVERWRITE', true );
define('WP_AUTO_UPDATE_CORE', false );
//Hide in production
//define( 'WP_DEBUG', true );
//ini_set( 'display_errors', 'On' );

//Disable API
add_filter( 'rest_api_init', 'rest_only_for_authorized_users', 99 );
function rest_only_for_authorized_users($wp_rest_server){
    if ( !is_user_logged_in() ) 
        wp_die('sorry you are not allowed to access this data','cheatin eh?',403);    
}


function wpst_setup() {
	//add_editor_style('theme/css/editor-style.css');
	add_theme_support('post-thumbnails');
	update_option('thumbnail_size_w', 170);
	update_option('medium_size_w', 470);
	update_option('large_size_w', 970);
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		) );
	

   if(false === get_option("medium_crop")) { add_option("medium_crop", "1");  }
     else {       update_option("medium_crop", "1");     }
}
add_action('init', 'wpst_setup');

function add_woo_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'add_woo_support' );

//Annoying search redirect
add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );

if (! isset($content_width))
	$content_width = 900;

function wpst_excerpt_readmore() {
	return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; READ MORE <i class="fa fa-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'wpst_excerpt_readmore');

// Fix no shortcodes in widget bug
add_filter('widget_text', 'do_shortcode');
	
// Disable Gallery Inline Style
	add_filter( 'use_default_gallery_style', '__return_false' );

// Oembed Responsive
	add_filter( 'embed_oembed_html', 'wpst_oembed_filter', 10, 4 ) ;

	function wpst_oembed_filter($html, $url, $attr, $post_ID) {
		$return = '<figure class="video-container">'.$html.'</figure>';
		return $return;
	}

	/*  Enable hr button tiny MCE
	/* ------------------------------------ */
	function wpst_enable_more_buttons($buttons) {
	  $buttons[] = 'hr';
	  return $buttons;
	}
	add_filter("mce_buttons", "wpst_enable_more_buttons");


	/*  Remove P in description output
	/* ------------------------------------ */
	remove_filter('term_description','wpautop');
function override_mce_options($initArray)
   {
        $opts = '*[*]';
        $initArray['valid_elements'] = $opts;
        $initArray['extended_valid_elements'] = $opts;
        return $initArray;
    }
add_filter('tiny_mce_before_init', 'override_mce_options');


	/*  Add Excerpt on Pages for Seo description
	/* ------------------------------------ */
	add_action( 'init', 'wpst_add_excerpts_to_pages' );
	function wpst_add_excerpts_to_pages() {
	     add_post_type_support( 'page', 'excerpt' );
	}

	//Use for under construction sites, show a static HTML in root, show the blog in /index.php
	remove_filter('template_redirect', 'redirect_canonical');

	//Fix taxonomy list
	function taxonomy_checklist_checked_ontop_filter ($args)
	{
	$args['checked_ontop'] = false;
	return $args;
	}
	add_filter('wp_terms_checklist_args','taxonomy_checklist_checked_ontop_filter');

//Mind your own business wp
add_action( 'wp_print_scripts', 'DisableStrongPW', 100 );

function DisableStrongPW() {
    if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
        wp_dequeue_script( 'wc-password-strength-meter' );
    }
}

//Dashboard
add_action('wp_dashboard_setup', 'wpst_dashboard_widgets'); 
function wpst_dashboard_widgets() {  
	global $wp_meta_boxes; 
	wp_add_dashboard_widget('custom_help_widget', 'Welcome', 'wpst_dash'); 
} 
function wpst_dash() { 
	echo '<p>Welcome to The Starter theme, go to <a href="?page='.tp.'/functions/feedback.php">options</a> to start customizing.</p>'; 
} 

//Footer
function remove_footer_admin () {
	$theme = wp_get_theme();
echo 'by '.$theme->display( 'Author', FALSE );
}
add_filter('admin_footer_text', 'remove_footer_admin');

//Extra user fields
function extra_contact_info($contactmethods) { 
unset($contactmethods['aim']); 
unset($contactmethods['yim']); 
unset($contactmethods['jabber']); 
$contactmethods['facebook'] = 'Facebook'; 
$contactmethods['twitter'] = 'Twitter'; 
$contactmethods['linkedin'] = 'LinkedIn'; 
 
return $contactmethods; 
} 
add_filter('user_contactmethods', 'extra_contact_info'); 

//Default avatar
add_filter( 'avatar_defaults', 'newgravatar' ); 
function newgravatar ($avatar_defaults) { 
$myavatar = 'https://i.imgur.com/GXn8gBy.png'; 
$avatar_defaults[$myavatar] = "WPST"; 
 
return $avatar_defaults; 
} 
