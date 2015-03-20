<?php
/**
 * Customizer
 */

/**
 * Registers the options for the theme customizer.
 */
function restful_customizer_options() {

  $options = array();
  $sections = array();

  /**
   * Appearance section.
   */
  $sections[] = array(
    'id'       => 'appearance',
    'title'    => __( 'Appearance', 'restful' ),
    'priority' => '30'
  );

  $options['skin'] = array(
    'id'      => 'skin',
    'label'   => __( 'Skin', 'restful' ),
    'section' => 'appearance',
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
    'section' => 'appearance',
    'type'    => 'color',
    'default' => '#00bcd4',
  );

  /**
   * Social URLS section.
   */
  $sections[] = array(
    'id'    => 'social-urls',
    'title' => __( 'Social URLs', 'steadfast' )
  );

  $options['facebook'] = array(
    'id'      => 'facebook',
    'label'   => 'Facebook',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  $options['flickr'] = array(
    'id'      => 'flickr',
    'label'   => 'Flickr',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  $options['googleplus'] = array(
    'id'      => 'googleplus',
    'label'   => 'Google+',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  $options['instagram'] = array(
    'id'      => 'instagram',
    'label'   => 'Instagram',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  $options['pinterest'] = array(
    'id'      => 'pinterest',
    'label'   => 'Pinterest',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  $options['tumblr'] = array(
    'id'      => 'tumblr',
    'label'   => 'Tumblr',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  $options['twitter'] = array(
    'id'      => 'twitter',
    'label'   => 'Twitter',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  $options['vimeo'] = array(
    'id'      => 'vimeo',
    'label'   => 'Vimeo',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  $options['youtube'] = array(
    'id'      => 'youtube',
    'label'   => 'YouTube',
    'section' => 'social-urls',
    'type'    => 'url'
  );

  /**
   * Add options to Customizer Library.
   */
  $options['sections'] = $sections;
  $customizer_library = Customizer_Library::Instance();
  $customizer_library->add_options( $options );

}
add_action( 'init', 'restful_customizer_options' );

/**
 * Implements the styles as per the theme customizer settings.
 */
function restful_customizer_build_styles() {

  // Accent color
  $setting = 'co-accent';
  $mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

  if ( $mod !== customizer_library_get_default( $setting ) ) {

    $color = sanitize_hex_color( $mod );

    Customizer_Library_Styles()->add( array(
      'selectors' => array(
        'a'
      ),
      'declarations' => array(
        'color' => $color
      )
    ) );

    Customizer_Library_Styles()->add( array(
      'selectors' => array(
        '.entry.sticky'
      ),
      'declarations' => array(
        'border-left-color' => $color
      )
    ) );

    Customizer_Library_Styles()->add( array(
      'selectors' => array(
        '.button',
        'button',
        'input[type="button"]',
        'input[type="submit"]'
      ),
      'declarations' => array(
        'background' => $color
      )
    ) );

  }

}
add_action( 'customizer_library_styles', 'restful_customizer_build_styles' );

/**
 * Outputs the styles as per the theme customizer settings.
 */
function restful_customizer_output_styles() {

  do_action( 'customizer_library_styles' );

  // Store the rules
  $css = Customizer_Library_Styles()->build();

  // Echo the rules
  if ( $css ) {
    echo "<style id='restful-custom-css'>$css</style>";
  }

}
add_action( 'wp_head', 'restful_customizer_output_styles', 11 );
