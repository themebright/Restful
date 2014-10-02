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

  // Appearance
  $section = 'appearance';

  $sections[] = array(
    'id'       => $section,
    'title'    => __( 'Appearance', 'restful' ),
    'priority' => '30'
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

  $options['co-accent'] = array(
    'id'      => 'co-accent',
    'label'   => __( 'Primary Color', 'restful' ),
    'section' => $section,
    'type'    => 'color',
    'default' => $co_accent,
  );

  // Adds the sections to the $options array
  $options['sections'] = $sections;

  $customizer_library = Customizer_Library::Instance();
  $customizer_library->add_options( $options );

}
add_action( 'init', 'restful_customizer_options' );