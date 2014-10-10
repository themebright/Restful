<?php

get_header();

$has_sidebar = is_active_sidebar( 'sermons' );

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
                <a href="<?php echo tbf_sermon_pdf(); ?>" class="button sermon-download-pdf"><i class="fa fa-download"></i><?php _e( 'PDF Transcript', 'restful' ) ?></a>
              </div>
            <?php endif; ?>

            <div class="entry-meta sermon-meta">
              <div class="entry-meta-item sermon-date"><i class="fa fa-calendar fa-fw"></i><?php the_time( get_option( 'date_format' ) ); ?></div>

              <?php if ( tbf_sermon_topics() ) : ?>
                <div class="entry-meta-item sermon-topics"><i class="fa fa-list fa-fw"></i><?php echo tbf_sermon_topics(); ?></div>
              <?php endif; ?>

              <?php if ( tbf_sermon_books() ) : ?>
                <div class="entry-meta-item sermon-books"><i class="fa fa-book fa-fw"></i><?php echo tbf_sermon_books(); ?></div>
              <?php endif; ?>

              <?php if ( tbf_sermon_series() ) : ?>
                <div class="entry-meta-item sermon-series"><i class="fa fa-th fa-fw"></i><?php echo tbf_sermon_series(); ?></div>
              <?php endif; ?>

              <?php if ( tbf_sermon_speakers() ) : ?>
                <div class="entry-meta-item sermon-speakers"><i class="fa fa-user fa-fw"></i><?php echo tbf_sermon_speakers(); ?></div>
              <?php endif; ?>

              <?php if ( tbf_sermon_tags() ) : ?>
                <div class="entry-meta-item sermon-tags"><i class="fa fa-tags fa-fw"></i><?php echo tbf_sermon_tags(); ?></div>
              <?php endif; ?>
            </div>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </article>

          <?php comments_template(); ?>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar( 'sermons' ); ?>
    </div>
  </div>
</section>

<?php get_footer();