<?php

// Template Name: Home

get_header();

// Check to see if the BrightSlider plugin is active
if ( function_exists( 'brightslider_register_post_type_slide' ) ) :

  $args = array(
    'post_type'      => 'bs_slide',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
  );

  $slides = get_posts( $args );

  if ( $slides ) :

?>
  <section class="section section-slider <?php if ( ! ( count( $slides ) > 1 ) ) echo 'one-slide'; ?>">
    <div id="bright-slider">
      <?php

      foreach ( $slides as $post ) : setup_postdata( $post );

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
        <div class="bx-slide" style="background-image: url(<?php echo $slide_image; ?>)">
          <?php if ( $slide_url ) echo "<a href='$slide_url' class='bx-slide-link'>"; ?>
            <div class="container">
              <?php if ( $show_title && get_the_title() ) : ?>
                <h1 class="bx-slide-title"><?php the_title(); ?></h1>
              <?php endif; ?>

              <?php if ( $slide_text ) : ?>
                <div class="bx-slide-text"><?php echo $slide_text; ?></div>
              <?php endif; ?>
            </div>
          <?php if ( $slide_url ) echo '</a>'; ?>
        </div>
      <?php

      endforeach;
      wp_reset_postdata();

      ?>
    </div>
  </section>
<?php endif; endif; ?>

<?php if ( have_posts() ) : ?>
  <section class="section section-intro">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif;

get_sidebar( 'home' );

get_footer();
