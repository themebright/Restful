<?php
/**
 * Church Themes Content
 */

/**
 * Enables and customizes the desired Church Themes Content post types and taxonomies.
 */
function restful_ctc_support() {

  add_theme_support( 'church-theme-content' );

  add_theme_support( 'ctc-sermons', array(
    'taxonomies' => array(
      'ctc_sermon_series',
      'ctc_sermon_speaker'
     ),
    'fields' => array(
      '_ctc_sermon_video',
      '_ctc_sermon_audio',
      '_ctc_sermon_pdf'
     )
  ) );

  add_theme_support( 'ctc-events', array(
    'fields' => array(
      '_ctc_event_start_date',
      '_ctc_event_end_date',
      '_ctc_event_time',
      '_ctc_event_recurrence',
      '_ctc_event_recurrence_end_date',
      '_ctc_event_address',
      '_ctc_event_map_lat',
      '_ctc_event_map_lng'
     )
  ) );

  add_theme_support( 'ctc-people', array(
    'fields' => array(
      '_ctc_person_position',
      '_ctc_person_phone',
      '_ctc_person_email'
    )
  ) );

  add_theme_support( 'ctc-locations', array(
    'fields' => array(
      '_ctc_location_address',
      '_ctc_location_map_lat',
      '_ctc_location_map_lng',
      '_ctc_location_phone',
      '_ctc_location_times'
    ),
    'field_overrides' => array(
      '_ctc_location_times' => array(
        'desc' => __( 'Enter one per line.', 'restful' )
      )
    )
  ) );

}
add_action( 'after_setup_theme', 'restful_ctc_support' );