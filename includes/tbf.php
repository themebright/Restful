<?php
/**
 * ThemeBright Framework
 */

/**
 * Register and configure ThemeBright framework support.
 */
function restful_tbf_support() {

  add_theme_support( 'tbf-widget-events', array(
    'options' => array(
      'title'     => true,
      'number'    => true,
      'thumbnail' => true,
      'excerpt'   => false,
      'date'      => true,
      'time'      => true,
      'venue'     => false,
      'address'   => false,
      'map'       => false
    )
  ) );

  add_theme_support( 'tbf-widget-locations', array(
    'options' => array(
      'title'     => true,
      'thumbnail' => true,
      'excerpt'   => false,
      'address'   => true,
      'phone'     => false,
      'times'     => true
    )
  ) );

  add_theme_support( 'tbf-widget-people', array(
    'options' => array(
      'title'     => true,
      'group'     => true,
      'thumbnail' => true,
      'excerpt'   => true,
      'position'  => true,
      'phone'     => false,
      'email'     => false,
      'urls'      => false
    )
  ) );

  add_theme_support( 'tbf-widget-sermons', array(
    'options' => array(
      'title'     => true,
      'number'    => true,
      'thumbnail' => true,
      'excerpt'   => true,
      'date'      => true,
      'media'     => false
    )
  ) );

}
add_action( 'after_setup_theme', 'restful_tbf_support' );