<?php get_header(); ?>

<section class="section section-main">
  <div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'content', get_post_type() ); ?>
    <?php endwhile; else: ?>
      <?php _e( 'Nothing found.', 'restful' ); ?>
    <?php endif; ?>

    <?php get_sidebar( 'main' ); ?>
  </div>
</section>

<?php get_footer();