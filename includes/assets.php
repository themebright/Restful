<?php
/**
 * Assets
 */

/**
 * Sets content width varaible for WordPress oEmbeds.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 600;
}

/**
 * Enqueues the scripts used throughout the theme.
 */
function restful_scripts() {

  wp_enqueue_script( 'bxslider', tbcf_get_template_directory_uri() . '/assets/vendor/bxslider/jquery.bxslider.js', array( 'jquery' ), TBCF_THEME_VERSION );
  wp_enqueue_script( 'fitvids', tbcf_get_template_directory_uri() . '/assets/vendor/fitvids/jquery.fitvids.js', array( 'jquery' ), TBCF_THEME_VERSION );

  wp_enqueue_script( 'restful', tbcf_get_template_directory_uri() . '/assets/js/restful.js', array( 'jquery', 'bxslider', 'fitvids' ), TBCF_THEME_VERSION );

  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}
add_action( 'wp_enqueue_scripts', 'restful_scripts' );

/**
 * Enqueues the stylesheets used throughout the theme.
 */
function restful_styles() {

  wp_enqueue_style( 'font-awesome', tbcf_get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.css' );
  wp_enqueue_style( 'restful-fonts', '//fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic|Oswald:300,700' );

  $skin = esc_attr( ( get_theme_mod( 'skin' ) ? get_theme_mod( 'skin' ) : 'light' ) );
  wp_enqueue_style( 'restful', tbcf_get_template_directory_uri() . "/assets/css/restful-$skin.css", array( 'tbcf' ), TBCF_THEME_VERSION );

  wp_enqueue_style( 'restful-style', tbcf_strip_protocol( get_stylesheet_uri() ), null, TBCF_THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'restful_styles' );
