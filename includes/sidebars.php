<?php
/**
 * Sidebars
 */

/**
 * Registers the sidebars used throughout the theme.
 */
function restful_register_sidebars() {

  // Default widget markup
  $default_widget_markup = array(
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title"><span>',
    'after_title'   => '</span></h4>'
  );

  // Main blog sidebar
  register_sidebar( array(
    'name'          => __( 'Main', 'restful' ),
    'id'            => 'main',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  // Page sidebar
  register_sidebar( array(
    'name'          => __( 'Pages', 'restful' ),
    'id'            => 'pages',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  // Search results sidebar
  register_sidebar( array(
    'name'          => __( 'Search', 'restful' ),
    'id'            => 'search',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  // Events sidebar
  register_sidebar( array(
    'name'          => __( 'Events', 'restful' ),
    'id'            => 'events',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  // Locations sidebar
  register_sidebar( array(
    'name'          => __( 'Locations', 'restful' ),
    'id'            => 'locations',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  // People sidebar
  register_sidebar( array(
    'name'          => __( 'People', 'restful' ),
    'id'            => 'people',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  // Sermons sidebar
  register_sidebar( array(
    'name'          => __( 'Sermons', 'restful' ),
    'id'            => 'sermons',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  // Footer sidebars
  register_sidebar( array(
    'name'          => __( 'Footer 1', 'restful' ),
    'id'            => 'footer-1',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 2', 'restful' ),
    'id'            => 'footer-2',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 3', 'restful' ),
    'id'            => 'footer-3',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  // Home sidebars
  register_sidebar( array(
    'name'          => __( 'Home 1', 'restful' ),
    'id'            => 'home-1',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

  register_sidebar( array(
    'name'          => __( 'Home 2', 'restful' ),
    'id'            => 'home-2',
    'before_widget' => $default_widget_markup['before_widget'],
    'after_widget'  => $default_widget_markup['after_widget'],
    'before_title'  => $default_widget_markup['before_title'],
    'after_title'   => $default_widget_markup['after_title']
  ) );

}
add_action( 'init', 'restful_register_sidebars' );

/**
 * Enables shortcodes in text widgets.
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Sort tag cloud widget by tag posts count.
 */
function restful_widget_tag_cloud_args( $args ) {

  $args['orderby'] = 'count';

  return $args;

}
add_filter( 'widget_tag_cloud_args', 'restful_widget_tag_cloud_args' );
