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
          <article <?php post_class( 'entry entry--sermon' ); ?>>
            <?php if ( has_post_thumbnail() && ! tbf_sermon_video() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
            <?php endif; ?>

            <?php if ( tbf_sermon_video() ) : ?>
              <div class="entry__media-item entry__media-item--video ">
                <?php echo tbf_embed_code( tbf_sermon_video() ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_sermon_audio() ) : ?>
              <div class="entry__media-item entry__media-item--audio">
                <?php echo tbf_embed_code( tbf_sermon_audio() ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_sermon_pdf() ) : ?>
              <div class="entry__media-item entry__media-item--pdf">
                <a href="<?php echo esc_url( tbf_sermon_pdf() ); ?>" class="button full-width">
                  <i class="fa fa-download"></i>
                  <?php _e( 'PDF Transcript', 'restful' ) ?>
                </a>
              </div>
            <?php endif; ?>

            <div class="entry__meta entry__meta--stacked">
              <div class="entry__meta-item">
                <i class="fa fa-calendar"></i>
                <?php the_time( get_option( 'date_format' ) ); ?>
              </div>

              <?php $allseries = tbf_sermon_series(); if ( $allseries ) : ?>
                <div class="entry__meta-item">
                  <i class="fa fa-th-list"></i>

                  <?php foreach ( $allseries as $series ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $series ) ); ?>"><?php echo $series->name; ?></a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php $books = tbf_sermon_books(); if ( $books ) : ?>
                <div class="entry__meta-item">
                  <i class="fa fa-book"></i>

                  <?php foreach ( $books as $book ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $book ) ); ?>"><?php echo $book->name; ?></a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php $speakers = tbf_sermon_speakers(); if ( $speakers ) : ?>
                <div class="entry__meta-item">
                  <i class="fa fa-user"></i>

                  <?php foreach ( $speakers as $speaker ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $speaker ) ); ?>"><?php echo $speaker->name; ?></a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="entry__body rich-text">
              <?php the_content(); ?>
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
