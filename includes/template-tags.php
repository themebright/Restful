<?php
/**
 * Template Tags
 */

/**
 * Clean way to display post meta in all the post templates.
 */
function restful_post_meta() {

  global $post;

?>

  <div class="entry-meta-item">
    <i class="genericon genericon-month"></i>
    <a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
  </div>

  <div class="entry-meta-item">
    <i class="genericon genericon-user"></i>
    <a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php the_author_meta( 'display_name', $post->post_author ); ?></a>
  </div>

  <div class="entry-meta-item">
    <i class="genericon genericon-category"></i>
    <?php the_category( ', ' ); ?>
  </div>

  <div class="entry-meta-item">
    <i class="genericon genericon-comment"></i>
    <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
  </div>

<?php

}

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

/**
 * Configures and displays wp_link_pages() to fit in with theme styling.
 */
function restful_link_pages() {

  $args = array(
    'before'      => '<nav class="pagination">',
    'after'       => '</nav>',
    'link_before' => '<span class="page-numbers">',
    'link_after'  => '</span>'
  );

  wp_link_pages( $args );

}