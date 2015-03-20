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

  add_theme_support( 'church-theme-content' );

  add_theme_support( 'ctc-sermons', array(
    'taxonomies' => array( 'ctc_sermon_book', 'ctc_sermon_series', 'ctc_sermon_speaker' ),
    'fields'     => array( '_ctc_sermon_video', '_ctc_sermon_audio', '_ctc_sermon_pdf', )
  ) );

  add_theme_support( 'ctc-events', array(
    'taxonomies' => array( 'ctc_event_category' ),
    'fields'     => array( '_ctc_event_start_date', '_ctc_event_end_date', '_ctc_event_start_time', '_ctc_event_end_time', '_ctc_event_recurrence', '_ctc_event_recurrence_end_date', '_ctc_event_venue', '_ctc_event_address', '_ctc_event_show_directions_link', '_ctc_event_map_lat', '_ctc_event_map_lng', '_ctc_event_map_type', '_ctc_event_map_zoom' )
  ) );

  add_theme_support( 'ctc-people', array(
    'taxonomies' => array( 'ctc_person_group' ),
    'fields'     => array( '_ctc_person_position', '_ctc_person_phone', '_ctc_person_email', '_ctc_person_urls' )
  ) );

  add_theme_support( 'ctc-locations', array(
    'fields' => array( '_ctc_location_address', '_ctc_location_show_directions_link', '_ctc_location_map_lat', '_ctc_location_map_lng', '_ctc_location_map_type', '_ctc_location_map_zoom', '_ctc_location_phone', '_ctc_location_times' )
  ) );

  add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
  ) );

  add_theme_support( 'post-thumbnails' );

  add_theme_support( 'site-logo', array(
    'size' => 'medium'
  ) );

  add_theme_support( 'title-tag' );

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
add_action( 'after_setup_theme', 'restful_add_theme_support' );

/**
 * Removes site logo header text checkbox added by the Jetpack Site Logo module.
 */
function restful_remove_site_logo_header_text() {

  global $wp_customize;

  $wp_customize->remove_control( 'site_logo_header_text' );

}
add_action( 'customize_register', 'restful_remove_site_logo_header_text', 11 );
