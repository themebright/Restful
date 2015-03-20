<?php
/**
 * Filters
 */

/**
 * Configures and displays wp_link_pages() to fit in with theme styling.
 */
function restful_wp_link_pages( $content ) {

  $wp_link_pages_args = array(
    'before'      => '<nav class="pagination">',
    'after'       => '</nav>',
    'link_before' => '<span class="page-numbers">',
    'link_after'  => '</span>',
    'echo'        => false
  );

  return $content . wp_link_pages( $wp_link_pages_args );

}
add_filter( 'the_content', 'restful_wp_link_pages' );
