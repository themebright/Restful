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
 * Event meta.
 */
function restful_event_meta() {

  $date = tbcf_event_date();
  $time = tbcf_event_time();

  if ( ! ( $date || $time || tbcf_event_venue() || tbcf_event_address() ) ) {
    return;
  }

  ?>

  <div class="entry__meta entry__meta--stacked">
    <?php if ( $date ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-calendar"></i>
        <?php echo $date['start']; ?>

        <?php if ( array_key_exists( 'end', $date ) ) : ?>
          <span class="entry__meta-to-sep">&ndash;</span>
          <?php echo $date['end']; ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ( $time ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-clock-o"></i>
        <?php echo $time['start']; ?>

        <?php if ( array_key_exists( 'end', $time ) ) : ?>
          <span class="entry__meta-to-sep">&ndash;</span>
          <?php echo $time['end']; ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ( tbcf_event_venue() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-map-marker"></i>
        <?php echo tbcf_event_venue(); ?>
      </div>
    <?php endif; ?>

    <?php if ( tbcf_event_address() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-map"></i>
        <?php echo tbcf_event_address(); ?>
      </div>
    <?php endif; ?>
  </div>

  <?php

}

/**
 * Location meta.
 */
function restful_location_meta() {

  if ( ! ( tbcf_location_address() || tbcf_location_phone() || tbcf_location_email() || tbcf_location_times() ) ) {
    return;
  }

  ?>

  <div class="entry__meta entry__meta--stacked">
    <?php if ( tbcf_location_address() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-map-marker"></i>
        <?php echo tbcf_location_address(); ?>
      </div>
    <?php endif; ?>

    <?php if ( tbcf_location_phone() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-phone"></i>
        <?php echo tbcf_location_phone(); ?>
      </div>
    <?php endif; ?>

    <?php if ( tbcf_location_email() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-envelope"></i>
        <?php echo tbcf_location_email(); ?>
      </div>
    <?php endif; ?>

    <?php if ( tbcf_location_times() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-clock-o"></i>
        <?php echo tbcf_location_times(); ?>
      </div>
    <?php endif; ?>
  </div>

  <?php

}

/**
 * Person meta.
 */
function restful_person_meta() {

  if ( ! ( tbcf_person_position() || tbcf_person_phone() || tbcf_person_email() ) ) {
    return;
  }

  ?>

  <div class="entry__meta entry__meta--stacked">
    <?php if ( tbcf_person_position() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-user"></i>
        <?php echo tbcf_person_position(); ?>
      </div>
    <?php endif; ?>

    <?php if ( tbcf_person_phone() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-phone"></i>
        <?php echo tbcf_person_phone(); ?>
      </div>
    <?php endif; ?>

    <?php if ( tbcf_person_email() ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-envelope"></i>
        <a href="mailto:<?php echo esc_attr( tbcf_person_email() ); ?>"><?php echo tbcf_person_email(); ?></a>
      </div>
    <?php endif; ?>
  </div>

  <?php

}

/**
 * Sermon meta.
 */
function restful_sermon_meta() {

  $allseries = tbcf_sermon_series();
  $books     = tbcf_sermon_books();
  $speakers  = tbcf_sermon_speakers();

  ?>

  <div class="entry__meta entry__meta--stacked">
    <div class="entry__meta-item">
      <i class="fa fa-calendar"></i>
      <?php the_time( get_option( 'date_format' ) ); ?>
    </div>

    <?php if ( $allseries ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-th-list"></i>

        <?php foreach ( $allseries as $series ) : ?>
          <a href="<?php echo esc_url( get_term_link( $series ) ); ?>"><?php echo $series->name; ?></a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ( $books ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-book"></i>

        <?php foreach ( $books as $book ) : ?>
          <a href="<?php echo esc_url( get_term_link( $book ) ); ?>"><?php echo $book->name; ?></a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ( $speakers ) : ?>
      <div class="entry__meta-item">
        <i class="fa fa-user"></i>

        <?php foreach ( $speakers as $speaker ) : ?>
          <a href="<?php echo esc_url( get_term_link( $speaker ) ); ?>"><?php echo $speaker->name; ?></a>
        <?php endforeach; ?>
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
