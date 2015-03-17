<?php

get_header();

$queried_object = get_queried_object();
$has_sidebar = is_active_sidebar( 'main' );

?>

<section class="section-masthead <?php if ( ! $has_sidebar ) echo 'masthead-centered' ?>">
  <div class="container">
    <h1 class="masthead-title"><?php echo $queried_object->post_title; ?></h1>
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

            <header class="entry-header">
              <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h1>
            </header>

            <div class="entry-meta entry-meta-inline">
              <?php restful_post_meta(); ?>
            </div>

            <div class="entry-content">
              <?php the_content(); ?>

              <?php restful_link_pages(); ?>
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

      <?php if ( $has_sidebar ) get_sidebar( 'main' ); ?>
    </div>
  </div>
</section>

<?php

get_footer();
