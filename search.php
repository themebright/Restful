<?php

get_header();

$has_sidebar = is_active_sidebar( 'search' );

?>

<section class="section-masthead <?php if ( ! $has_sidebar ) echo 'masthead-centered' ?>">
  <div class="container">
    <?php tbf_breadcrumb(); ?>

    <h1 class="masthead-title"><?php _e( 'Results', 'restful' ); ?>: <?php the_search_query(); ?></h1>
  </div>
</section>

<section class="section section-main">
  <div class="container">
    <div class="row">
      <div class="col col-xs-12 <?php echo ( $has_sidebar ? 'col-md-7' : 'col-md-8 col-md-push-2' ); ?>">
        <?php

        if ( have_posts() ) : while ( have_posts() ) : the_post();

          $post_type_object = get_post_type_object( get_post_type() );
          $post_type_label = $post_type_object->labels->singular_name;

        ?>
          <article <?php post_class( 'entry entry-excerpt' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry-thumbnail">
                <?php the_post_thumbnail( 'thumbnail' ); ?>
              </div>
            <?php endif; ?>

            <header class="entry-header">
              <span class="entry-type"><?php echo $post_type_label; ?></span>

              <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
            </header>

            <div class="entry-content">
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar( 'search' ); ?>
    </div>
  </div>
</section>

<?php get_footer();