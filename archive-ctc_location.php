<?php

get_header();

$queried_object = get_queried_object();
$has_sidebar    = is_active_sidebar( 'main' );

?>

<section class="masthead <?php if ( ! $has_sidebar ) echo 'masthead--centered' ?> section">
  <div class="container">
    <h1 class="masthead__title"><?php echo $queried_object->labels->name; ?></h1>
  </div>
</section>

<section class="main section">
  <div class="container">
    <div class="row">
      <div class="col col--xs--12 <?php echo ( $has_sidebar ? 'col--md--7' : 'col--sm--10 col--sm--offset--1 col--md--8 col--md--offset--2' ); ?>">
        <?php

        $locations = tbcf_query_locations();

        if ( $locations->have_posts() ) : while ( $locations->have_posts() ) : $locations->the_post();

        ?>
          <article <?php post_class( 'entry entry--location entry--excerpt' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
            <?php endif; ?>

            <header class="entry__header">
              <?php the_title( sprintf( '<h2 class="entry__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header>

            <?php if ( tbcf_location_address() || tbcf_location_phone() || tbcf_location_times() ) : ?>
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

                <?php if ( tbcf_location_times() ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-clock-o"></i>
                    <?php echo tbcf_location_times(); ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </article>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; wp_reset_postdata(); ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar(); ?>
    </div>
  </div>
</section>

<?php

get_footer();
