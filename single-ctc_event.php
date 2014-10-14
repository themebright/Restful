<?php

get_header();

$has_sidebar = is_active_sidebar( 'events' );

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

            <?php if ( tbf_event_date() || tbf_event_time() || tbf_event_venue() || tbf_event_address() ) : ?>
              <div class="entry-meta event-meta">
                <?php if ( tbf_event_date() ) : ?>
                  <div class="entry-meta-item event-date"><i class="fa fa-calendar fa-fw"></i><?php echo tbf_event_date(); ?></div>
                <?php endif; ?>

                <?php if ( tbf_event_time() ) : ?>
                  <div class="entry-meta-item event-time"><i class="fa fa-clock-o fa-fw"></i><?php echo tbf_event_time(); ?></div>
                <?php endif; ?>

                <?php if ( tbf_event_venue() ) : ?>
                  <div class="entry-meta-item event-venue"><i class="fa fa-university fa-fw"></i><?php echo tbf_event_venue(); ?></div>
                <?php endif; ?>

                <?php if ( tbf_event_address() ) : ?>
                  <div class="entry-meta-item event-address"><i class="fa fa-map-marker fa-fw"></i><?php echo tbf_event_address(); ?></div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="entry-content">
              <?php the_content(); ?>

              <?php restful_link_pages(); ?>
            </div>

            <?php if ( tbf_event_map() ) : ?>
              <div class="entry-map">
                <?php echo tbf_event_map(); ?>
              </div>
            <?php endif; ?>
          </article>

          <?php comments_template(); ?>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar( 'events' ); ?>
    </div>
  </div>
</section>

<?php get_footer();