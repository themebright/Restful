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
 * Returns an array with all the site social URLs as set in the WP theme customizer.
 */
function restful_site_social_urls() {

  $has_urls = false;

  $url_mods = array( 'facebook', 'flickr', 'googleplus', 'instagram', 'pinterest', 'tumblr', 'twitter', 'vimeo', 'youtube' );

  foreach ( $url_mods as $url_mod ) {
    if ( get_theme_mod( $url_mod ) ) $has_urls = true;
  }

  if ( $has_urls ) {

    $urls = array();

    if ( get_theme_mod( 'facebook' ) )   $urls[] = get_theme_mod( 'facebook' );
    if ( get_theme_mod( 'flickr' ) )     $urls[] = get_theme_mod( 'flickr' );
    if ( get_theme_mod( 'googleplus' ) ) $urls[] = get_theme_mod( 'googleplus' );
    if ( get_theme_mod( 'instagram' ) )  $urls[] = get_theme_mod( 'instagram' );
    if ( get_theme_mod( 'pinterest' ) )  $urls[] = get_theme_mod( 'pinterest' );
    if ( get_theme_mod( 'tumblr' ) )     $urls[] = get_theme_mod( 'tumblr' );
    if ( get_theme_mod( 'twitter' ) )    $urls[] = get_theme_mod( 'twitter' );
    if ( get_theme_mod( 'vimeo' ) )      $urls[] = get_theme_mod( 'vimeo' );
    if ( get_theme_mod( 'youtube' ) )    $urls[] = get_theme_mod( 'youtube' );

    return $urls;

  }

  return false;

}

/**
 * Converts an array of social URLs to a social component with Font Awesome icons.
 */
function restfuL_social_icons( $urls ) {

  if ( ! empty( $urls ) ) {

    $output  = '';
    $output .= '<div class="social">';

    foreach ( $urls as $url ) {

      if ( strpos( $url, '//facebook.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--facebook'><i class='fa fa-facebook'></i></a>";
      }

      elseif ( strpos( $url, '//flickr.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--flickr'><i class='fa fa-flickr'></i></a>";
      }

      elseif ( strpos( $url, '//instagram.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--instagram'><i class='fa fa-instagram'></i></a>";
      }

      elseif ( strpos( $url, '//pinterest.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--pinterest'><i class='fa fa-pinterest'></i></a>";
      }

      elseif ( strpos( $url, '//plus.google.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--google-plus'><i class='fa fa-google-plus'></i></a>";
      }

      elseif ( strpos( $url, '//tumblr.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--tumblr'><i class='fa fa-tumblr'></i></a>";
      }

      elseif ( strpos( $url, '//twitter.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--twitter'><i class='fa fa-twitter'></i></a>";
      }

      elseif ( strpos( $url, '//vimeo.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--vimeo'><i class='fa fa-vimeo-square'></i></a>";
      }

      elseif ( strpos( $url, '//youtube.com' ) !== false ) {
        $output .= "<a href='$url' class='social__item social__item--youtube'><i class='fa fa-youtube'></i></a>";
      }

      else {
        $output .= "<a href='$url' class='social__item social__item--link'><i class='fa fa-link'></i></a>";
      }

    }

    $output .= '</div>';

    return $output;

  }

  return false;

}
