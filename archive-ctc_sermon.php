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
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry entry--sermon entry--excerpt' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
            <?php endif; ?>

            <header class="entry__header">
              <?php the_title( sprintf( '<h2 class="entry__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header>

            <div class="entry__meta entry__meta--stacked">
              <div class="entry__meta-item">
                <i class="fa fa-calendar"></i>
                <?php the_time( get_option( 'date_format' ) ); ?>
              </div>

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
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; ?>
          <?php the_posts_pagination(); ?>
        <?php else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar(); ?>
    </div>
  </div>
</section>

<?php

get_footer();
