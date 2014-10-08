<?php
/**
 * Body Classes
 */

/**
 * Add custom classes to the to body_class()
 */
function restful_body_classes( $classes ) {

  // Event
  if ( is_singular( 'ctc_event' ) ) {
    $classes[] = 'restful-event';
  }

  // Events
  if ( is_post_type_archive( 'ctc_event' ) ) {
    $classes[] = 'restful-events';
  }

  // Locations
  if ( is_post_type_archive( 'ctc_location' ) ) {
    $classes[] = 'restful-locations';
  }

  // Location
  if ( is_singular( 'ctc_location' ) ) {
    $classes[] = 'restful-location';
  }

  // People
  if ( is_post_type_archive( 'ctc_person' ) || is_tax( 'ctc_person_group' ) ) {
    $classes[] = 'restful-people';
  }

  // Person
  if ( is_singular( 'ctc_person' ) ) {
    $classes[] = 'restful-person';
  }

  // Sermons
  $sermon_taxonomies = array(
    'ctc_sermon_book',
    'ctc_sermon_series',
    'ctc_sermon-series',
    'ctc_sermon_tag',
    'ctc_sermon_topic'
  );

  if ( is_post_type_archive( 'ctc_sermon' ) || is_tax( $sermon_taxonomies ) ) {
    $classes[] = 'restful-sermons';
  }

  // Sermon
  if ( is_singular( 'ctc_sermon' ) ) {
    $classes[] = 'restful-sermon';
  }

  // Home page template
  if ( is_page_template( 'page-templates/home.php' ) ) {
    $classes[] = 'restful-home';
  }

  return $classes;

}
add_filter( 'body_class', 'restful_body_classes' );