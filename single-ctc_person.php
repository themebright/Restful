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
          <article <?php post_class( 'entry entry--person' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="entry__thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
            <?php endif; ?>

            <?php if ( tbf_person_position() || tbf_person_phone() || tbf_person_email() ) : ?>
              <div class="entry__meta entry__meta--stacked">
                <?php if ( tbf_person_position() ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-user"></i>
                    <?php echo tbf_person_position(); ?>
                  </div>
                <?php endif; ?>

                <?php if ( tbf_person_phone() ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-phone"></i>
                    <?php echo tbf_person_phone(); ?>
                  </div>
                <?php endif; ?>

                <?php if ( tbf_person_email() ) : ?>
                  <div class="entry__meta-item">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:<?php echo tbf_person_email(); ?>"><?php echo tbf_person_email(); ?></a>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php if ( tbf_person_urls() ) : ?>
              <div class="entry__social">
                <?php echo restful_social_icons( tbf_person_urls() ); ?>
              </div>
            <?php endif; ?>

            <div class="entry__body rich-text">
              <?php the_content(); ?>
            </div>
          </article>
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
