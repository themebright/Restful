<?php
/**
 * Theme Support
 */

/**
 * Adds theme support for the features used througout the theme.
 */
function restful_add_theme_support() {

  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'brightslider' );

}
add_action( 'init', 'restful_add_theme_support' );