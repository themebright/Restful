<?php
/**
 * Sidebars
 */

/**
 * Registers the sidebars used throughout the theme.
 */
function restful_register_sidebars() {

  $markup = array(
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget__title"><span>',
    'after_title'   => '</span></h4>'
  );

  register_sidebar( array(
    'name'          => __( 'Main', 'restful' ),
    'id'            => 'main',
    'before_widget' => $markup['before_widget'],
    'after_widget'  => $markup['after_widget'],
    'before_title'  => $markup['before_title'],
    'after_title'   => $markup['after_title']
  ) );

  register_sidebar( array(
    'name'          => __( 'Home 1', 'restful' ),
    'id'            => 'home-1',
    'before_widget' => $markup['before_widget'],
    'after_widget'  => $markup['after_widget'],
    'before_title'  => $markup['before_title'],
    'after_title'   => $markup['after_title']
  ) );

  register_sidebar( array(
    'name'          => __( 'Home 2', 'restful' ),
    'id'            => 'home-2',
    'before_widget' => $markup['before_widget'],
    'after_widget'  => $markup['after_widget'],
    'before_title'  => $markup['before_title'],
    'after_title'   => $markup['after_title']
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 1', 'restful' ),
    'id'            => 'footer-1',
    'before_widget' => $markup['before_widget'],
    'after_widget'  => $markup['after_widget'],
    'before_title'  => $markup['before_title'],
    'after_title'   => $markup['after_title']
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 2', 'restful' ),
    'id'            => 'footer-2',
    'before_widget' => $markup['before_widget'],
    'after_widget'  => $markup['after_widget'],
    'before_title'  => $markup['before_title'],
    'after_title'   => $markup['after_title']
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 3', 'restful' ),
    'id'            => 'footer-3',
    'before_widget' => $markup['before_widget'],
    'after_widget'  => $markup['after_widget'],
    'before_title'  => $markup['before_title'],
    'after_title'   => $markup['after_title']
  ) );

}
add_action( 'init', 'restful_register_sidebars' );
