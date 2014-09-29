<article <?php post_class( 'entry' ); ?>>
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail( 'large' ); ?>
    </div>
  <?php endif; ?>

  <?php if ( tbf_event_date() || tbf_event_time() || tbf_event_venue() || tbf_event_address() ) : ?>
    <div class="entry-meta event-meta">
      <?php if ( tbf_event_date() ) : ?>
        <div class="entry-meta-item event-date"><i class="fa fa-calendar fa-fw"></i><?php echo tbf_event_date(); ?></div>
      <?php endif; ?>

      <?php if ( tbf_event_time() ) : ?>
        <div class="entry-meta-item event-time"><i class="fa fa-clock-o fa-fw"></i><?php echo tbf_event_time(); ?></div>
      <?php endif; ?>

      <?php if ( tbf_event_venue() ) : ?>
        <div class="entry-meta-item event-venue"><i class="fa fa-university fa-fw"></i><?php echo tbf_event_venue(); ?></div>
      <?php endif; ?>

      <?php if ( tbf_event_address() ) : ?>
        <div class="entry-meta-item event-address"><i class="fa fa-map-marker fa-fw"></i><?php echo tbf_event_address(); ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="entry-content">
    <?php the_content() ?>
  </div>

  <?php if ( tbf_event_map() ) : ?>
    <div class="entry-map">
      <?php echo tbf_event_map(); ?>
    </div>
  <?php endif; ?>
</article>