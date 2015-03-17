<?php
/**
 * Menus
 */

/**
 * Registers the nav menus used throughout the theme.
 */
function restful_register_nav_menus() {

  register_nav_menu( 'main', __( 'Main Menu Location', 'restful' ) );

}
add_action( 'init', 'restful_register_nav_menus' );
