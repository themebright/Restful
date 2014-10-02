<?php
/**
 * Template Tags
 */

/**
 * Returns true if more than one page of posts exists.
 */
function restful_show_posts_nav() {

  global $wp_query;

  return ( $wp_query->max_num_pages > 1 );

}

/**
 * Wrap and configures comment_form() for custom display.
 */
function restful_comment_form() {

  $fields = array(
    'author' => '<div class="row author-info"><div class="col col-xs-12 col-sm-6"><input class="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . __( 'Your Name', 'restful' ) . ' *"></div>',
    'email'  => '<div class="col col-xs-12 col-sm-6"><input class="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . __( 'Your Email', 'restful' ) . ' *"></div></div>',
    'url'    => ''
  );

  $args = array(
    'comment_field'        => '<textarea class="comment" name="comment" rows="10" placeholder="' . __( 'Your Comment', 'restful' ) . ' *"></textarea>',
    'fields'               => $fields,
    'comment_notes_before' => '',
    'comment_notes_after'  => ''
  );

  comment_form( $args );

}