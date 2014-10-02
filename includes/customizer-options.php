<?php
/**
 * Customizer Options
 */

function restful_customizer_options() {

  // Theme defaults
  $co_accent = '#50e3c2';

  // Stores all the controls that will be added
  $options = array();

  // Stores all the sections to be added
  $sections = array();

  // Adds the sections to the $options array
  $options['sections'] = $sections;

  // Colors
  $section = 'colors';

  $sections[] = array(
    'id'       => $section,
    'title'    => __( 'Colors', 'restful' ),
    'priority' => '30'
  );

  $options['co-accent'] = array(
    'id'      => 'co-accent',
    'label'   => __( 'Primary Color', 'restful' ),
    'section' => $section,
    'type'    => 'color',
    'default' => $co_accent,
  );

  $options['skin'] = array(
    'id'      => 'skin',
    'label'   => __( 'Skin', 'restful' ),
    'section' => $section,
    'type'    => 'radio',
    'choices' => array(
      'light' => __( 'Light', 'restful'),
      'dark'  => __( 'Dark', 'restful')
    ),
    'default' => 'light'
  );

  // Adds the sections to the $options array
  $options['sections'] = $sections;

  $customizer_library = Customizer_Library::Instance();
  $customizer_library->add_options( $options );

}
add_action( 'init', 'restful_customizer_options' );