<?php
/**
 * Template Tags
 */

/**
 * Custom page menu function that allows for .menu class on wp_page_menu fallback.
 */
function restful_page_menu() {

  $args = array(
    'menu_class' => 'menu'
  );

  wp_page_menu( $args );

}