<?php
/**
 * Customizer
 */

/**
 * Register Customizer settings.
 */
function restful_customizer_register( $wp_customize ) {

  /** Theme panel */

  $wp_customize->add_panel( 'restful', array(
    'title' => 'Restful'
  ) );

  /** Appearance Section */

  $wp_customize->add_section( 'restful_appearance', array(
    'title' => __( 'Appearance', 'restful' ),
    'panel' => 'restful'
  ) );

  $wp_customize->add_setting( 'skin', array( 'default' => 'light', 'sanitize_callback' => 'sanitize_text_field' ) );
  $wp_customize->add_control( 'skin', array(
    'label'   => __( 'Color scheme', 'restful' ),
    'section' => 'restful_appearance',
    'type'    => 'select',
    'choices' => array(
      'light' => __( 'Light', 'restful' ),
      'dark'  => __( 'Dark', 'restful' )
    )
  ) );

  $wp_customize->add_setting( 'color_accent', array( 'default' => '#00bcd4', 'sanitize_callback' => 'sanitize_hex_color' ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_accent', array(
    'label'   => __( 'Accent color', 'restful' ),
    'section' => 'restful_appearance'
  ) ) );

  /** Social section */

  $wp_customize->add_section( 'restful_social', array(
    'title' => __( 'Social', 'restful' ),
    'panel' => 'restful'
  ) );

  $wp_customize->add_setting( 'facebook', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'facebook', array(
    'label'   => 'Facebook',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

  $wp_customize->add_setting( 'flickr', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'flickr', array(
    'label'   => 'Flickr',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

  $wp_customize->add_setting( 'google', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'google', array(
    'label'   => 'Google+',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

  $wp_customize->add_setting( 'instagram', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'instagram', array(
    'label'   => 'Instagram',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

  $wp_customize->add_setting( 'pinterest', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'pinterest', array(
    'label'   => 'Pinterest',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

  $wp_customize->add_setting( 'soundcloud', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'soundcloud', array(
    'label'   => 'SoundCloud',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

  $wp_customize->add_setting( 'twitter', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'twitter', array(
    'label'   => 'Twitter',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

  $wp_customize->add_setting( 'vimeo', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'vimeo', array(
    'label'   => 'Vimeo',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

  $wp_customize->add_setting( 'youtube', array( 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_control( 'youtube', array(
    'label'   => 'YouTube',
    'section' => 'restful_social',
    'type'    => 'url'
  ) );

}
add_action( 'customize_register', 'restful_customizer_register' );

/**
 * Build necessary styles to implement customizer options.
 */
function restful_customizer_styles() {

  ?>

  <style id="restful-custom-css">
    <?php if ( get_theme_mod( 'color_accent' ) ) : $color = esc_html( get_theme_mod( 'color_accent' ) ); ?>
      a { color: <?php echo $color; ?>; }
      .entry.sticky { border-color: <?php echo $color; ?>; }
      .button, button, input[type="button"], input[type="submit"] { background: <?php echo $color; ?>; }
    <?php endif; ?>
  </style>

  <?php

}
add_action( 'wp_head', 'restful_customizer_styles' );
