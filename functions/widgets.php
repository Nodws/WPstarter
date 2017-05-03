<?php

function wpst_widgets_init() {

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'wpst' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'wpst' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );


  register_sidebar( array(
    'name'            => __( 'Footer 3', 'wpst' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area col-sm-4', 'wpst' ),
    'before_widget'   => '<div class="%1$s %2$s col-sm-4">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  register_sidebar( array(
    'name'            => __( 'Footer Full', 'wpst' ),
    'id'              => 'full-footer',
    'description'     => __( 'Full footer widget area', 'wpst' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  register_sidebar( array(
    'name'            => __( 'Extra', 'wpst' ),
    'id'              => 'extra-widget',
    'description'     => __( 'Extra area', 'wpst' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

}
add_action( 'widgets_init', 'wpst_widgets_init' );
