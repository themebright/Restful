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

  <div class="entry__meta-item">
    <i class="fa fa-calendar"></i>
    <a href="<?php esc_url( get_permalink() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
  </div>

  <div class="entry__meta-item">
    <i class="fa fa-user"></i>
    <a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>"><?php the_author_meta( 'display_name', $post->post_author ); ?></a>
  </div>

  <div class="entry__meta-item">
    <i class="fa fa-folder"></i>
    <?php the_category( ', ' ); ?>
  </div>

  <div class="entry__meta-item">
    <i class="fa fa-comment"></i>
    <a href="<?php esc_url( comments_link() ); ?>"><?php comments_number(); ?></a>
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
