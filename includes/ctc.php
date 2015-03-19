<?php
/**
 * Church Themes Content
 */

/**
 * Enables and customizes the desired Church Themes Content post types and taxonomies.
 */
function restful_ctc_support() {

  // add_theme_support( 'church-theme-content' );

  // add_theme_support( 'ctc-sermons', array(
  //   'taxonomies' => array(
  //     'ctc_sermon_series',
  //     'ctc_sermon_speaker'
  //   ),
  //   'fields' => array(
  //     '_ctc_sermon_video',
  //     '_ctc_sermon_audio',
  //     '_ctc_sermon_pdf',
  //   )
  // ) );

  // add_theme_support( 'ctc-events', array(
  //   'taxonomies' => array(
  //     'ctc_event_category',
  //   ),
  //   'fields' => array(
  //     '_ctc_event_start_date',
  //     '_ctc_event_end_date',
  //     '_ctc_event_start_time',
  //     '_ctc_event_end_time',
  //     '_ctc_event_recurrence',
  //     '_ctc_event_recurrence_end_date',
  //     '_ctc_event_venue',
  //     '_ctc_event_address',
  //     '_ctc_event_show_directions_link',
  //     '_ctc_event_map_lat',
  //     '_ctc_event_map_lng',
  //     '_ctc_event_map_type',
  //     '_ctc_event_map_zoom',
  //   )
  // ) );

  // add_theme_support( 'ctc-people', array(
  //   'taxonomies' => array(
  //     'ctc_person_group',
  //   ),
  //   'fields' => array(
  //     '_ctc_person_position',
  //     '_ctc_person_phone',
  //     '_ctc_person_email',
  //     '_ctc_person_urls',
  //     )
  // ) );

  // add_theme_support( 'ctc-locations', array(
  //   'fields' => array(
  //     '_ctc_location_address',
  //     '_ctc_location_show_directions_link',
  //     '_ctc_location_map_lat',
  //     '_ctc_location_map_lng',
  //     '_ctc_location_map_type',
  //     '_ctc_location_map_zoom',
  //     '_ctc_location_phone',
  //     '_ctc_location_times',
  //   )
  // ) );

}
add_action( 'after_setup_theme', 'restful_ctc_support' );
