<?php
/**
 * ThemeBright Framework
 */

/**
 * Register and configure ThemeBright framework support.
 */
function restful_tbf_support() {


  add_theme_support( 'tbf', array(
    'widgets' => array(
      'events' => array(
        'fields' => array( 'title', 'number', 'thumbnail', 'date', 'time' )
      ),
      'locations' => array(
        'fields' => array( 'title', 'thumbnail', 'address', 'times', 'map' )
      ),
      'people' => array(
        'fields' => array( 'title', 'group', 'number', 'thumbnail', 'excerpt', 'position' )
      ),
      'sermons' => array(
        'fields' => array( 'title', 'number', 'thumbnail', 'excerpt', 'date' )
      )
    )
  ) );

}
add_action( 'after_setup_theme', 'restful_tbf_support' );
