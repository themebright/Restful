<?php get_header(); ?>

<section class="section-masthead">
  <div class="container">
    <?php tbf_breadcrumb(); ?>

    <h1 class="masthead-title"><?php the_title(); ?></h1>
  </div>
</section>

<section class="section section-main">
  <div class="container">
    <div class="row">
      <div class="col col-xs-12 col-md-7">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
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

            <?php if ( tbf_sermon_topics() || tbf_sermon_books() || tbf_sermon_series() || tbf_sermon_speakers() || tbf_sermon_tags() ) : ?>
              <div class="entry-meta sermon-meta">
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
            <?php endif; ?>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </article>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php get_sidebar( 'main' ); ?>
    </div>
  </div>
</section>

<?php get_footer();