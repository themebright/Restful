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

  <div class="entry-content">
    <?php the_excerpt(); ?>
  </div>
</article>