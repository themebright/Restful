<?php

get_header();

$queried_object = get_queried_object();
$taxonomy = get_taxonomy( $queried_object->taxonomy );
$has_sidebar = is_active_sidebar( 'main' );

?>

<section class="masthead <?php if ( ! $has_sidebar ) echo 'masthead--centered' ?> section">
  <div class="container">
    <div class="masthead__subtitle masthead__subtitle--above"><?php echo $taxonomy->labels->singular_name; ?></div>
    <h1 class="masthead__title"><?php the_title(); ?></h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col col--xs--12 <?php echo ( $has_sidebar ? 'col--md--7' : 'col--md--8 col--md--push--2' ); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry entry--excerpt' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
            <?php endif; ?>

            <header class="entry__header">
              <?php the_title( sprintf( '<h2 class="entry__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header>

            <div class="entry__meta entry__meta--stacked">
              <div class="entry__meta-item"><i class="genericon genericon-month"></i><?php the_time( get_option( 'date_format' ) ); ?></div>

              <?php if ( tbf_sermon_speakers() ) : ?>
                <div class="entry__meta-item"><i class="genericon genericon-user"></i><?php echo tbf_sermon_speakers(); ?></div>
              <?php endif; ?>
            </div>

            <div class="entry__body">
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; ?>
          <?php if ( restful_show_posts_nav() ) : ?>
            <nav class="pagination">
              <?php echo paginate_links(); ?>
            </nav>
          <?php endif; ?>
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
