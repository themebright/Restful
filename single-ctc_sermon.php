<?php

get_header();

$has_sidebar = is_active_sidebar( 'main' );

?>

<section class="masthead <?php if ( ! $has_sidebar ) echo 'masthead--centered' ?> section">
  <div class="container">
    <h1 class="masthead__title"><?php the_title(); ?></h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col col--xs--12 <?php echo ( $has_sidebar ? 'col--md--7' : 'col--md--8 col--md--push--2' ); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry' ); ?>>
            <?php if ( has_post_thumbnail() && ! tbf_sermon_video() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
            <?php endif; ?>

            <?php if ( tbf_sermon_video() ) : ?>
              <div class="sermon-media sermon-media--video">
                <?php echo wp_oembed_get( tbf_sermon_video() ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_sermon_audio() ) : ?>
              <div class="sermon-media sermon-media--audio">
                <?php echo do_shortcode( '[audio src="' . tbf_sermon_audio() . '"]' ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_sermon_pdf() ) : ?>
              <div class="sermon-media sermon-media--pdf">
                <a href="<?php echo tbf_sermon_pdf(); ?>" class="button"><i class="fa fa-download"></i><?php _e( 'PDF Transcript', 'restful' ) ?></a>
              </div>
            <?php endif; ?>

            <div class="entry__meta entry__meta--stacked">
              <div class="entry-meta-item"><i class="fa fa-calendar"></i><?php the_time( get_option( 'date_format' ) ); ?></div>

              <?php if ( tbf_sermon_series() ) : ?>
                <div class="entry__meta-item"><i class="fa fa-th-list"></i><?php echo tbf_sermon_series(); ?></div>
              <?php endif; ?>

              <?php if ( tbf_sermon_speakers() ) : ?>
                <div class="entry__meta-item"><i class="fa fa-user"></i><?php echo tbf_sermon_speakers(); ?></div>
              <?php endif; ?>
            </div>

            <div class="entry-content">
              <?php the_content(); ?>

              <?php restful_link_pages(); ?>
            </div>
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
