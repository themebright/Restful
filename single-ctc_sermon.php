<?php

get_header();

$has_sidebar = is_active_sidebar( 'main' );

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
            <?php if ( has_post_thumbnail() && ! tbf_sermon_video() ) : ?>
              <div class="entry-thumbnail">
                <?php the_post_thumbnail( 'large' ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_sermon_video() ) : ?>
              <div class="sermon-media sermon-media-video">
                <?php echo wp_oembed_get( tbf_sermon_video() ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_sermon_audio() ) : ?>
              <div class="sermon-media sermon-media-audio">
                <?php echo do_shortcode( '[audio src="' . tbf_sermon_audio() . '"]' ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_sermon_pdf() ) : ?>
              <div class="sermon-media sermon-media-pdf">
                <a href="<?php echo tbf_sermon_pdf(); ?>" class="button sermon-download-pdf"><i class="genericon genericon-download"></i><?php _e( 'PDF Transcript', 'restful' ) ?></a>
              </div>
            <?php endif; ?>

            <div class="entry-meta entry-meta-stacked sermon-meta">
              <div class="entry-meta-item sermon-date"><i class="genericon genericon-month"></i><?php the_time( get_option( 'date_format' ) ); ?></div>

              <?php if ( tbf_sermon_series() ) : ?>
                <div class="entry-meta-item sermon-series"><i class="genericon genericon-hierarchy"></i><?php echo tbf_sermon_series(); ?></div>
              <?php endif; ?>

              <?php if ( tbf_sermon_speakers() ) : ?>
                <div class="entry-meta-item sermon-speakers"><i class="genericon genericon-user"></i><?php echo tbf_sermon_speakers(); ?></div>
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
