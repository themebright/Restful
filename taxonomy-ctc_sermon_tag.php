<?php

get_header();

$queried_object = get_queried_object();
$taxonomy = get_taxonomy( $queried_object->taxonomy );
$has_sidebar = is_active_sidebar( 'sermons' );

?>

<section class="section-masthead <?php if ( ! $has_sidebar ) echo 'masthead-centered' ?>">
  <div class="container">
    <div class="masthead-subtitle"><?php echo $taxonomy->labels->singular_name; ?></div>
    <h1 class="masthead-title"><?php echo $queried_object->name; ?></h1>
  </div>
</section>

<section class="section section-main">
  <div class="container">
    <div class="row">
      <div class="col col-xs-12 <?php echo ( $has_sidebar ? 'col-md-7' : 'col-md-8 col-md-push-2' ); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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

            <div class="entry-meta entry-meta-stacked sermon-meta">
              <div class="entry-meta-item sermon-date"><i class="fa fa-calendar fa-fw"></i><?php the_time( get_option( 'date_format' ) ); ?></div>

              <?php if ( tbf_sermon_speakers() ) : ?>
                <div class="entry-meta-item sermon-speakers"><i class="fa fa-user fa-fw"></i><?php echo tbf_sermon_speakers(); ?></div>
              <?php endif; ?>
            </div>

            <div class="entry-content">
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

      <?php if ( $has_sidebar ) get_sidebar( 'sermons' ); ?>
    </div>
  </div>
</section>

<?php get_footer();