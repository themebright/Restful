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

  <div class="entry-meta">
    <?php _e( 'Published', 'restful' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?>
  </div>

  <div class="entry-content">
    <?php the_content(); ?>
  </div>
</article>