<article <?php post_class( 'entry' ); ?>>
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail( 'large' ); ?>
    </div>
  <?php endif; ?>

  <div class="entry-content">
    <?php the_content() ?>
  </div>
</article>