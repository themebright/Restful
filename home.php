<?php get_header(); ?>

<section class="section-masthead">
  <div class="container">
    <?php tbf_breadcrumb(); ?>

    <h1 class="masthead-title"><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>
  </div>
</section>

<section class="section section-main">
  <div class="container">
    <div class="row">
      <div class="col col-xs-12 col-md-7">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'full' ); ?>
        <?php endwhile; ?>
          <?php if ( show_posts_nav() ) : ?>
            <nav class="pagination">
              <?php echo paginate_links(); ?>
            </nav>
          <?php endif; ?>
        <?php else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php get_sidebar( 'main' ); ?>
    </div>
  </div>
</section>

<?php get_footer();