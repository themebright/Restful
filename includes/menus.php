<?php
/**
 * Menus
 */

/**
 * Registers the nav menus used throughout the theme.
 */
function restful_register_nav_menus() {

  $args = array(
    'primary' => __( 'Primary Menu', 'restful' )
  );

  register_nav_menus( $args );

}
add_action( 'init', 'restful_register_nav_menus' );