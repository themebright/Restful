<?php if ( is_active_sidebar( 'home-1' ) || is_active_sidebar( 'home-2' ) ) : ?>

<section class="section section-sidebar-home sidebar sidebar-home">
  <div class="container">
    <div class="row">
      <?php if ( is_active_sidebar( 'home-1' ) ) : ?>
        <div class="widget-area col col-xs-12 col-sm-6">
          <?php dynamic_sidebar( 'home-1' ); ?>
        </div>
      <?php endif; ?>

      <?php if ( is_active_sidebar( 'home-2' ) ) : ?>
        <div class="widget-area col col-xs-12 col-sm-6">
          <?php dynamic_sidebar( 'home-2' ); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php endif;