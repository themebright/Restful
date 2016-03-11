<?php

// Template Name: Home

get_header();

if ( function_exists( 'brightslider_register_post_type_slide' ) ) :

  $args = array(
    'posts_per_page' => 15,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'post_type'      => 'bs_slide',
    'no_rows_found'  => true
  );

  $slides = new WP_Query( $args );

  if ( $slides->have_posts() ) :

    wp_enqueue_script( 'bxslider' );

?>
  <script>
    jQuery( document ).ready( function( $ ) {
      $( '.brightslider__slides' ).bxSlider( {
        'mode'           : 'fade',
        'controls'       : false,
        'adaptiveHeight' : true,
        'auto'           : true
      } );
    } );
  </script>

  <section class="brightslider <?php if ( ! ( count( $slides->posts ) > 1 ) ) echo 'one-slide'; ?>">
    <div class="brightslider__slides">
      <?php

      while ( $slides->have_posts() ) : $slides->the_post();

        $slide_id    = get_the_ID();

        $slide_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        $slide_image = $slide_image[0];

        $slide_text  = get_post_meta( $slide_id, '_bs_slide_text' );
        $slide_text  = $slide_text[0];

        $slide_url   = get_post_meta( $slide_id, '_bs_slide_url' );
        $slide_url   = $slide_url[0];

        $rbs_show    = get_post_meta( $slide_id, '_restful_bs_show_title' );
        $bs_show     = get_post_meta( $slide_id, '_bs_show_title' ); // pre BS 1.1.0 compatibilty

        if ( isset( $rbs_show[0] ) ) {
          $show_title = $rbs_show[0];
        } elseif ( isset( $bs_show[0] ) ) {
          $show_title = $bs_show[0];
        } else {
          $show_title = true;
        }

        $image_only  = ! $slide_text && ! $slide_text;

      ?>
        <div class="brightslider__slide <?php if ( $image_only ) echo 'brightslider__slide--image-only' ?>" style="background-image: url(<?php echo $slide_image; ?>)">
          <?php if ( $slide_url ) echo "<a href='$slide_url' class='brightslider__slide-link'>"; ?>
            <div class="container">
              <div class="row">
                <div class="col col--xs--12 col--sm--10 col--sm--offset--1 col--md--8 col--md--offset--2">
                  <?php if ( $show_title ) the_title( '<h1 class="brightslider__slide-title">', '</h1>' ); ?>

                  <?php if ( $slide_text ) : ?>
                    <div class="brightslider__slide-text"><?php echo $slide_text; ?></div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php if ( $slide_url ) echo '</a>'; ?>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </section>
<?php endif; endif; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <section class="welcome-message section section--extra-padding">
    <div class="container">
      <div class="row">
        <div class="rich-text col col--xs--12 col--sm--10  col--sm--offset--1">
          <?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; endif; ?>

<?php

get_sidebar( 'home' );

get_footer();
