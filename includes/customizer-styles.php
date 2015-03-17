<?php
/**
 * Customizer Styles
 */

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
        '.btn',
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
