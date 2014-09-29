<article <?php post_class( 'entry' ); ?>>
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail( 'large' ); ?>
    </div>
  <?php endif; ?>

  <?php if ( tbf_location_address() || tbf_location_phone() || tbf_location_times() ) : ?>
    <div class="entry-meta location-meta">
      <?php if ( tbf_location_address() ) : ?>
        <div class="entry-meta-item location-position"><i class="fa fa-map-marker fa-fw"></i><?php echo tbf_location_address(); ?></div>
      <?php endif; ?>

      <?php if ( tbf_location_phone() ) : ?>
        <div class="entry-meta-item location-phone"><i class="fa fa-phone fa-fw"></i><?php echo tbf_location_phone(); ?></div>
      <?php endif; ?>

      <?php if ( tbf_location_times() ) : ?>
        <div class="entry-meta-item location-email"><i class="fa fa-clock-o fa-fw"></i><?php echo tbf_location_times(); ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="entry-content">
    <?php the_content() ?>
  </div>

  <?php if ( tbf_location_map() ) : ?>
    <div class="location-map">
      <?php echo tbf_location_map(); ?>
    </div>
  <?php endif; ?>
</article>