<?php

get_header();

$has_sidebar = is_active_sidebar( 'main' );

?>

<section class="masthead <?php if ( ! $has_sidebar ) echo 'masthead--centered' ?> section">
  <div class="container">
    <?php the_title( '<h1 class="masthead__title">', '</h1>' ); ?>
  </div>
</section>

<section class="main section">
  <div class="container">
    <div class="row">
      <div class="col col--xs--12 <?php echo ( $has_sidebar ? 'col--md--7' : 'col--sm--10 col--sm--offset--1 col--md--8 col--md--offset--2' ); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article <?php post_class( 'entry entry--sermon' ); ?>>
            <?php if ( has_post_thumbnail() && ! tbcf_sermon_video() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
            <?php endif; ?>

            <?php if ( tbcf_sermon_video() ) : ?>
              <div class="entry__media-item entry__media-item--video ">
                <?php echo tbcf_embed_code( tbcf_sermon_video() ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbcf_sermon_audio() ) : ?>
              <div class="entry__media-item entry__media-item--audio">
                <?php echo tbcf_embed_code( tbcf_sermon_audio() ); ?>
              </div>
            <?php endif; ?>

            <?php if ( tbcf_sermon_pdf() ) : ?>
              <div class="entry__media-item entry__media-item--pdf">
                <a href="<?php echo esc_url( tbcf_sermon_pdf() ); ?>" class="button full-width">
                  <i class="fa fa-download"></i>
                  <?php _e( 'PDF Transcript', 'restful' ) ?>
                </a>
              </div>
            <?php endif; ?>

            <?php restful_sermon_meta(); ?>

            <div class="entry__body rich-text">
              <?php the_content(); ?>
            </div>
          </article>

          <?php comments_template(); ?>
        <?php endwhile; else: ?>
          <?php _e( 'Nothing found.', 'restful' ); ?>
        <?php endif; ?>
      </div>

      <?php if ( $has_sidebar ) get_sidebar(); ?>
    </div>
  </div>
</section>

<?php

get_footer();
