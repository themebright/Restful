<?php

get_header();

$queried_object = get_queried_object();
$has_sidebar    = is_active_sidebar( 'main' );

?>

<?php if ( get_option( 'page_for_posts' ) && $queried_object->post_title ) : ?>
  <section class="masthead <?php if ( ! $has_sidebar ) echo 'masthead--centered' ?> section">
    <div class="container">
      <h1 class="masthead__title"><?php echo $queried_object->post_title; ?></h1>
    </div>
  </section>
<?php endif; ?>

<section class="main section">
  <div class="container">
    <div class="row">
      <div class="col col--xs--12 <?php echo ( $has_sidebar ? 'col--md--7' : 'col--sm--10 col--sm--offset--1 col--md--8 col--md--offset--2' ); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry entry--post' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
            <?php endif; ?>

            <header class="entry__header">
              <?php the_title( sprintf( '<h1 class="entry__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            </header>

            <div class="entry__meta entry__meta--inline">
              <?php restful_post_meta(); ?>
            </div>

            <div class="entry__body rich-text">
              <?php the_content(); ?>
            </div>
          </article>
        <?php endwhile; ?>
          <?php the_posts_pagination(); ?>
        <?php else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar( 'main' ); ?>
    </div>
  </div>
</section>

<?php

get_footer();
