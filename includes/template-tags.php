<?php
/**
 * Template Tags
 */

/**
 * Post meta for above the post.
 */
function restful_post_meta_above() {

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

  <?php if ( comments_open() || have_comments() ) : ?>
    <div class="entry__meta-item">
      <i class="fa fa-comment"></i>
      <a href="<?php esc_url( comments_link() ); ?>"><?php comments_number(); ?></a>
    </div>
  <?php endif; ?>

<?php

}
/**
 * Post meta for below the post.
 */
function restful_post_meta_below() {

  if ( ! has_category() && ! has_tag() ) {
    return false;
  }

?>

  <div class="entry__meta entry__meta--inline entry__meta--below">
    <?php if ( has_category() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-folder"></i>
        <?php the_category( ', ' ); ?>
      </div>
    <?php endif; ?>

    <?php if ( has_tag() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-tags"></i>
        <?php the_tags( '' ); ?>
      </div>
    <?php endif; ?>
  </div>

<?php

}

/**
 * Returns an array with all the site social URLs as set in the WP theme customizer.
 */
function restful_site_social_urls() {

  $has_urls = false;

  $url_mods = array( 'facebook', 'flickr', 'google', 'instagram', 'pinterest', 'soundcloud', 'twitter', 'vimeo', 'youtube' );

  foreach ( $url_mods as $url_mod ) {
    if ( get_theme_mod( $url_mod ) ) $has_urls = true;
  }

  if ( $has_urls ) {

    $urls = array();

    if ( get_theme_mod( 'facebook' ) )   $urls[] = get_theme_mod( 'facebook' );
    if ( get_theme_mod( 'flickr' ) )     $urls[] = get_theme_mod( 'flickr' );
    if ( get_theme_mod( 'google' ) )     $urls[] = get_theme_mod( 'google' );
    if ( get_theme_mod( 'instagram' ) )  $urls[] = get_theme_mod( 'instagram' );
    if ( get_theme_mod( 'pinterest' ) )  $urls[] = get_theme_mod( 'pinterest' );
    if ( get_theme_mod( 'soundcloud' ) ) $urls[] = get_theme_mod( 'soundcloud' );
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
function restful_social_icons( $urls ) {

  if ( ! empty( $urls ) ) {

    $output  = '';
    $output .= '<div class="social">';

    foreach ( $urls as $url ) {

      if ( strpos( $url, 'facebook.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--facebook" target="_blank"><i class="fa fa-facebook"></i></a>';
      }

      elseif ( strpos( $url, 'flickr.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--flickr" target="_blank"><i class="fa fa-flickr"></i></a>';
      }

      elseif ( strpos( $url, 'instagram.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--instagram" target="_blank"><i class="fa fa-instagram"></i></a>';
      }

      elseif ( strpos( $url, 'pinterest.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
      }

      elseif ( strpos( $url, 'plus.google.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--google" target="_blank"><i class="fa fa-google-plus"></i></a>';
      }

      elseif ( strpos( $url, 'soundcloud.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--soundcloud" target="_blank"><i class="fa fa-soundcloud"></i></a>';
      }

      elseif ( strpos( $url, 'twitter.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--twitter" target="_blank"><i class="fa fa-twitter"></i></a>';
      }

      elseif ( strpos( $url, 'vimeo.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--vimeo" target="_blank"><i class="fa fa-vimeo-square"></i></a>';
      }

      elseif ( strpos( $url, 'youtube.com' ) !== false ) {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--youtube" target="_blank"><i class="fa fa-youtube"></i></a>';
      }

      else {
        $output .= '<a href="' . esc_url( $url ) . '" class="social__item social__item--link" target="_blank"><i class="fa fa-link"></i></a>';
      }

    }

    $output .= '</div>';

    return $output;

  }

  return false;

}
