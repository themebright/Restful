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

        global $wp_query;

        $args = array_merge( $wp_query->query_vars, array(
          'order'      => 'ASC',
          'orderby'    => 'meta_value',
          'meta_key'   => '_ctc_event_start_date',
          'meta_query' => array(
            array(
              'key'     => '_ctc_event_end_date',
              'value'   => date_i18n( 'Y-m-d' ),
              'compare' => '>=',
              'type'    => 'DATE'
            )
          )
        ) );

        query_posts( $args );

        if ( have_posts() ) : while ( have_posts() ) : the_post();

        ?>
          <article <?php post_class( 'entry entry--event entry--excerpt' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
            <?php endif; ?>

            <header class="entry__header">
              <?php the_title( sprintf( '<h2 class="entry__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header>

            <?php if ( tbf_event_date() || tbf_event_time() ) : ?>

              <div class="entry__meta entry__meta--stacked">
                <?php $date = tbf_event_date(); if ( $date ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-calendar"></i>
                    <?php echo $date['start']; ?>

                    <?php if ( array_key_exists( 'end', $date ) ) : ?>
                      <span class="entry__meta-to-sep">&ndash;</span>
                      <?php echo $date['end']; ?>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <?php $time = tbf_event_time(); if ( $time ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-clock-o"></i>
                    <?php echo $time['start']; ?>

                    <?php if ( array_key_exists( 'end', $time ) ) : ?>
                      <span class="entry__meta-to-sep">&ndash;</span>
                      <?php echo $time['end']; ?>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="entry__body rich-text">
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; ?>
          <?php the_posts_pagination(); ?>
        <?php else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; wp_reset_query(); ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar(); ?>
    </div>
  </div>
</section>

<?php

get_footer();
