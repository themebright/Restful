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
    'size' => 'medium'
  ) );

  add_theme_support( 'title-tag' );

}
add_action( 'after_setup_theme', 'restful_add_theme_support' );

/**
 * Removes site logo header text checkbox added by the Jetpack Site Logo module.
 */
function restful_remove_site_logo_header_text() {

  global $wp_customize;

  $wp_customize->remove_control( 'site_logo_header_text' );

}
add_action( 'customize_register', 'restful_remove_site_logo_header_text', 11 );
