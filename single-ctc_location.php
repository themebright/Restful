<?php

get_header();

$has_sidebar = is_active_sidebar( 'main' );

?>

<section class="masthead <?php if ( ! $has_sidebar ) echo 'masthead--centered' ?> section">
  <div class="container">
    <?php the_title( '<h1 class="masthead__title">', '</h1>' ); ?>
  </div>
</section>

<section class="main section">
  <div class="container">
    <div class="row">
      <div class="col col--xs--12 <?php echo ( $has_sidebar ? 'col--md--7' : 'col--sm--10 col--sm--offset--1 col--md--8 col--md--offset--2' ); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry entry--location' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
            <?php endif; ?>

            <?php if ( tbf_location_address() || tbf_location_phone() || tbf_location_times() ) : ?>
              <div class="entry__meta entry__meta--stacked">
                <?php if ( tbf_location_address() ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-map-marker"></i>
                    <?php echo tbf_location_address(); ?>
                  </div>
                <?php endif; ?>

                <?php if ( tbf_location_phone() ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-phone"></i>
                    <?php echo tbf_location_phone(); ?>
                  </div>
                <?php endif; ?>

                <?php if ( tbf_location_times() ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-clock-o"></i>
                    <?php echo tbf_location_times(); ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="entry__body rich-text">
              <?php the_content(); ?>
            </div>

            <?php if ( tbf_location_map() ) : ?>
              <div class="entry__map">
                <?php echo tbf_location_map(); ?>
              </div>
            <?php endif; ?>
          </article>

          <?php comments_template(); ?>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar(); ?>
    </div>
  </div>
</section>

<?php

get_footer();
