<?php
/**
 * Body Classes
 */

/**
 * Add custom classes to the to body_class()
 */
function restful_body_classes( $classes ) {

  // Blog
  if (
    is_home()
    ||
    is_category()
    ||
    is_tag()
    ||
    is_author()
    ||
    is_date()
    ||
    is_singular( 'post' )
  ) $classes[] = 'restful-blog';

  // Event
  if ( is_singular( 'ctc_event' ) ) $classes[] = 'restful-event';

  // Events
  if (
    is_page_template( 'page-templates/events.php' )
    ||
    is_post_type_archive( 'ctc_event' )
  ) $classes[] = 'restful-events';

  // Locations
  if (
    is_page_template( 'page-templates/locations.php' )
    ||
    is_post_type_archive( 'ctc_location' )
    ||
    is_singular( 'ctc_location' )
  ) $classes[] = 'restful-locations';

  // Location
  if ( is_singular( 'ctc_location' ) ) $classes[] = 'restful-location';

  // People
  if (
    is_page_template( 'page-templates/people.php' )
    ||
    is_post_type_archive( 'ctc_person' )
    ||
    is_tax( 'ctc_person_group' )
  ) $classes[] = 'restful-people';

  // Person
  if ( is_singular( 'ctc_person' ) ) $classes[] = 'restful-person';

  // Sermons
  if (
    is_page_template( 'page-templates/sermons.php' )
    ||
    is_post_type_archive( 'ctc_sermon' )
  ) $classes[] = 'restful-sermons';

  // Sermon
  if ( is_singular( 'ctc_sermon' ) ) $classes[] = 'restful-sermon';

  // No sidebar page template
  if ( is_page_template( 'page-templates/no-sidebar.php' ) ) $classes[] = 'restful-no-sidebar';

  // Home page template
  if ( is_page_template( 'page-templates/home.php' ) ) $classes[] = 'restful-home';

  // Return the custom classes
  return $classes;

}
add_filter( 'body_class', 'restful_body_classes' );