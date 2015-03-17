<?php
/**
 * Theme Support
 */

/**
 * Adds theme support for the features used througout the theme.
 */
function restful_add_theme_support() {

  add_theme_support( 'automatic-feed-links' );

  add_theme_support( 'brightslider' );

  add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
  ) );

  add_theme_support( 'jetpack-responsive-videos' );

  add_theme_support( 'post-thumbnails' );

  add_theme_support( 'site-logo', array(
    'size' => 'large'
  ) );

  add_theme_support( 'title-tag' );

}
add_action( 'after_setup_theme', 'restful_add_theme_support' );
