<?php
/**
 * Styles
 */

/**
 * Enqueues the stylesheets used throughout the theme.
 */
function restful_add_styles() {

  $skin = ( get_theme_mod( 'skin' ) ? get_theme_mod( 'skin' ) : 'light' );

  wp_enqueue_style( 'restful-fonts', '//fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic|Oswald:300,700' );
  wp_enqueue_style( 'restful', tbf_get_template_directory_uri() . "/assets/css/restful-$skin.css", false, TBF_THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'restful_add_styles' );

/**
 * Removes previously enqueued stylesheets usually added by plugins.
 */
function restful_remove_styles() {

  wp_deregister_style( 'grunion.css' );

}
add_action( 'wp_print_styles', 'restful_remove_styles' );