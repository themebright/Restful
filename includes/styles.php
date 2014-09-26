<?php
/**
 * Styles
 */

/**
 * Enqueues the stylesheets used throughout the theme.
 */
function restful_add_styles() {

  wp_enqueue_style( 'restful-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,600|Open+Sans+Condensed:300' );
  wp_enqueue_style( 'restful', tbf_template_url() . '/assets/css/restful-prefixed.css', false, TBF_THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'restful_add_styles' );