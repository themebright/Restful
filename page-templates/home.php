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

?>
  <section class="brightslider <?php if ( ! ( count( $slides->posts ) > 1 ) ) echo 'one-slide'; ?>">
    <div class="brightslider__slides">
      <?php

      while ( $slides->have_posts() ) : $slides->the_post();

        $slide_id    = get_the_ID();

        $slide_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        $slide_image = $slide_image[0];

        $show_title  = get_post_meta( $slide_id, '_bs_show_title' );
        $show_title  = $show_title[0];

        $slide_text  = get_post_meta( $slide_id, '_bs_slide_text' );
        $slide_text  = $slide_text[0];

        $slide_url   = get_post_meta( $slide_id, '_bs_slide_url' );
        $slide_url   = $slide_url[0];

      ?>
        <div class="brightslider__slide" style="background-image: url(<?php echo $slide_image; ?>)">
          <?php if ( $slide_url ) echo "<a href='$slide_url' class='brightslider__slide-link'>"; ?>
            <div class="container">
              <?php if ( $show_title ) the_title( '<h1 class="brightslider__slide-title">', '</h1>' ); ?>

              <?php if ( $slide_text ) : ?>
                <div class="brightslider__slide-text"><?php echo $slide_text; ?></div>
              <?php endif; ?>
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
        <div class="rich-text col col--xs--12 col--sm--10 col--sm--offset--1 col--sm--10 col--sm--offset--1 col--md--8 col--md--offset--2">
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
