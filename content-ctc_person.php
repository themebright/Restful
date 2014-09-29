<article <?php post_class( 'entry' ); ?>>
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-thumbnail">
      <?php the_post_thumbnail( 'large' ); ?>
    </div>
  <?php endif; ?>

  <?php if ( tbf_person_position() || tbf_person_phone() || tbf_person_email() || tbf_person_urls() ) : ?>
    <div class="entry-meta person-meta">
      <?php if ( tbf_person_position() ) : ?>
        <div class="entry-meta-item person-position"><i class="fa fa-user fa-fw"></i><?php echo tbf_person_position(); ?></div>
      <?php endif; ?>

      <?php if ( tbf_person_phone() ) : ?>
        <div class="entry-meta-item person-phone"><i class="fa fa-phone fa-fw"></i><?php echo tbf_person_phone(); ?></div>
      <?php endif; ?>

      <?php if ( tbf_person_email() ) : ?>
        <div class="entry-meta-item person-email"><i class="fa fa-envelope fa-fw"></i><?php echo tbf_person_email(); ?></div>
      <?php endif; ?>

      <?php if ( tbf_person_urls() ) : ?>
        <div class="entry-meta-item"><?php echo tbf_person_urls(); ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="entry-content">
    <?php the_content() ?>
  </div>
</article>