<?php

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
	add_theme_support( 'woocommerce' );

   if(false === get_option("medium_crop")) { add_option("medium_crop", "1");  }
     else {       update_option("medium_crop", "1");     }
}
add_action('init', 'wpst_setup');

if (! isset($content_width))
	$content_width = 900;

function wpst_excerpt_readmore() {
	return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; READ MORE <i class="fa fa-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'wpst_excerpt_readmore');

/*  Disable Gallery Inline Style
	/* ------------------------------------ */
	add_filter( 'use_default_gallery_style', '__return_false' );

	/*  Oembed Responsive
	/* ------------------------------------ */
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
//Footer
function remove_footer_admin () {
	$theme = wp_get_theme();
echo 'by '.$theme->display( 'Author', FALSE );
}
add_filter('admin_footer_text', 'remove_footer_admin');

