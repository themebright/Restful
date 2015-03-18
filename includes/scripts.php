<?php
/**
 * Scripts
 */

/**
 * Enqueues the scripts used throughout the theme.
 */
function restful_add_scripts() {

  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

  wp_enqueue_script( 'bxslider', tbf_get_template_directory_uri() . '/assets/js/library/jquery.bxslider.min.js', array( 'jquery' ), TBF_THEME_VERSION );
  wp_enqueue_script( 'restful', tbf_get_template_directory_uri() . '/assets/js/restful.js', array( 'jquery', 'bxslider' ), TBF_THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'restful_add_scripts' );
