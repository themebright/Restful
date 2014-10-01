<?php

get_header();

$has_sidebar = is_active_sidebar( 'main' );

?>

<section class="section-masthead <?php if ( ! $has_sidebar ) echo 'masthead-centered' ?>">
  <div class="container">
    <?php tbf_breadcrumb(); ?>

    <h1 class="masthead-title"><?php the_title(); ?></h1>
    <div class="masthead-subtitle">
      <?php _e( 'Published', 'restful' ); ?>: <?php the_time( 'F j, Y' ); ?>
    </div>
  </div>
</section>

<section class="section section-main">
  <div class="container">
    <div class="row">
      <div class="col col-xs-12 <?php echo ( $has_sidebar ? 'col-md-7' : 'col-md-8 col-md-push-2' ); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry-thumbnail">
                <?php the_post_thumbnail( 'large' ); ?>
              </div>
            <?php endif; ?>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </article>

          <?php comments_template(); ?>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php get_sidebar( 'main' ); ?>
    </div>
  </div>
</section>

<?php get_footer();