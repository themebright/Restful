<?php
/**
 * Scripts
 */

/**
 * Enqueues the scripts used throughout the theme.
 */
function restful_add_scripts() {

  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

  wp_enqueue_script( 'restful', tbf_template_url() . '/assets/js/restful.js', array( 'jquery' ), TBF_THEME_VERSION );

}
add_action( 'wp_enqueue_scripts', 'restful_add_scripts' );