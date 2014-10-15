<?php

get_header();

$queried_object = get_queried_object();
$has_sidebar = is_active_sidebar( 'locations' );

?>

<section class="section-masthead <?php if ( ! $has_sidebar ) echo 'masthead-centered' ?>">
  <div class="container">
    <h1 class="masthead-title"><?php echo $queried_object->labels->name; ?></h1>
  </div>
</section>

<section class="section section-main">
  <div class="container">
    <div class="row">
      <div class="col col-xs-12 <?php echo ( $has_sidebar ? 'col-md-7' : 'col-md-8 col-md-push-2' ); ?>">
        <?php

        global $wp_query;

        $args = array_merge( $wp_query->query_vars, array(
          'posts_per_page' => -1,
          'order'          => 'ASC',
          'orderby'        => 'menu_order'
        ) );

        query_posts( $args );

        if ( have_posts() ) : while ( have_posts() ) : the_post();

        ?>
          <article <?php post_class( 'entry entry-excerpt' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry-thumbnail">
                <?php the_post_thumbnail( 'thumbnail' ); ?>
              </div>
            <?php endif; ?>

            <header class="entry-header">
              <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
            </header>

            <?php if ( tbf_location_address() ) : ?>
              <div class="entry-meta entry-meta-stacked location-meta">
                <div class="entry-meta-item location-position"><i class="fa fa-map-marker fa-fw"></i><?php echo tbf_location_address(); ?></div>
              </div>
            <?php endif; ?>

            <div class="entry-content">
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; wp_reset_query(); ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar( 'locations' ); ?>
    </div>
  </div>
</section>

<?php get_footer();