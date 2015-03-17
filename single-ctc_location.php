<?php

get_header();

$has_sidebar = is_active_sidebar( 'locations' );

?>

<section class="section-masthead <?php if ( ! $has_sidebar ) echo 'masthead-centered' ?>">
  <div class="container">
    <h1 class="masthead-title"><?php the_title(); ?></h1>
  </div>
</section>

<section class="section section-main">
  <div class="container">
    <div class="row">
      <div class="col col-xs-12 <?php echo ( $has_sidebar ? 'col-md-7' : 'col-md-8 col-md-push-2' ); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry-thumbnail">
                <?php the_post_thumbnail( 'large' ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_location_address() || tbf_location_phone() || tbf_location_times() ) : ?>
              <div class="entry-meta entry-meta-stacked location-meta">
                <?php if ( tbf_location_address() ) : ?>
                  <div class="entry-meta-item location-position"><i class="genericon genericon-location"></i><?php echo tbf_location_address(); ?></div>
                <?php endif; ?>

                <?php if ( tbf_location_phone() ) : ?>
                  <div class="entry-meta-item location-phone"><i class="genericon genericon-phone"></i><?php echo tbf_location_phone(); ?></div>
                <?php endif; ?>

                <?php if ( tbf_location_times() ) : ?>
                  <div class="entry-meta-item location-email"><i class="genericon genericon-time"></i><?php echo tbf_location_times(); ?></div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="entry-content">
              <?php the_content(); ?>

              <?php restful_link_pages(); ?>
            </div>

            <?php if ( tbf_location_map() ) : ?>
              <div class="entry-map">
                <?php echo tbf_location_map(); ?>
              </div>
            <?php endif; ?>
          </article>

          <?php comments_template(); ?>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar( 'locations' ); ?>
    </div>
  </div>
</section>

<?php get_footer();
