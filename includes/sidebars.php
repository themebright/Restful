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
    'name'          => __( 'Sidebar', 'restful' ),
    'id'            => 'sidebar-main',
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